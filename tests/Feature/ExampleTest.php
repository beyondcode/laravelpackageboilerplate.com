<?php

namespace Tests\Feature;

use App\Livewire\BoilerplateForm;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;
use ZipArchive;

class ExampleTest extends TestCase
{
    public function test_home_page_renders_the_generator(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Kickstart your next package')
            ->assertSee('Download my package');
    }

    public static function packageTypes(): array
    {
        return [
            'laravel' => ['laravel', 'Acme\\BlogTools\\BlogToolsServiceProvider'],
            'php' => ['php', 'Acme\\BlogTools\\'],
        ];
    }

    #[DataProvider('packageTypes')]
    public function test_post_boilerplate_returns_a_zip_with_replacements(string $type, string $expected): void
    {
        $response = $this->post('/boilerplate', [
            '_token' => csrf_token(),
            'packageType' => $type,
            'vendorName' => 'acme',
            'packageName' => 'blog-tools',
            'authorName' => 'Jane Doe',
            'authorEmail' => 'jane@example.com',
            'packageDescription' => 'Tools for blogs',
            'license' => 'mit',
        ]);

        $response->assertOk();
        $files = $this->unzip($response->streamedContent());

        $this->assertArrayHasKey('composer.json', $files);
        $this->assertStringContainsString('"acme/blog-tools"', $files['composer.json']);
        $this->assertStringContainsString(str_replace('\\', '\\\\', $expected), $files['composer.json']);
        $this->assertArrayHasKey('src/BlogTools.php', $files);
        $this->assertStringContainsString('MIT License', $files['LICENSE.md']);
    }

    public function test_livewire_form_streams_a_download(): void
    {
        Livewire::test(BoilerplateForm::class)
            ->set('packageType', 'php')
            ->set('vendorName', 'acme')
            ->set('packageName', 'blog-tools')
            ->set('authorName', 'Jane Doe')
            ->set('authorEmail', 'jane@example.com')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertFileDownloaded('download.zip');
    }

    public function test_livewire_form_validates(): void
    {
        Livewire::test(BoilerplateForm::class)
            ->call('submit')
            ->assertHasErrors(['vendorName', 'packageName', 'authorName', 'authorEmail']);
    }

    private function unzip(string $bytes): array
    {
        $path = tempnam(sys_get_temp_dir(), 'zip');
        file_put_contents($path, $bytes);
        $zip = new ZipArchive();
        $this->assertTrue($zip->open($path) === true, 'response is not a valid zip');
        $files = [];
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $name = ltrim($zip->getNameIndex($i), '/');
            $files[$name] = $zip->getFromIndex($i);
        }
        $zip->close();
        unlink($path);

        return $files;
    }
}

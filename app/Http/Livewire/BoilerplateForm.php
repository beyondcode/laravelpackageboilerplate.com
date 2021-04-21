<?php

namespace App\Http\Livewire;

use App\Boilerplates\BoilerplateRepository;
use Livewire\Component;

class BoilerplateForm extends Component
{
    public $packageType = "laravel";

    public $vendorName = "";
    public $packageName = "";
    public $authorName = "";
    public $authorEmail = "";
    public $packageDescription = "";
    public $license = "mit";
    public $newsletter = "";


    protected $rules = [
        'vendorName' => 'required',
        'packageName' => 'required',
        'authorName' => 'required',
        'authorEmail' => 'required|email',
        'packageDescription' => 'string|nullable',
        'license' => 'required',
    ];


    public function setPackageType($type)
    {
        $this->packageType = $type;
    }

    public function submit()
    {
        $this->validate();

        $boilerplate = BoilerplateRepository::findForBoilerplateType($this->packageType);

        if ($this->newsletter) {
            $boilerplate->subscribeToNewsletter($this->authorEmail);
        }

        $requestData = [
            "vendorName" => $this->vendorName,
            "packageName" => $this->packageName,
            "authorName" => $this->authorName,
            "authorEmail" => $this->authorEmail,
            "packageDescription" => $this->packageDescription,
            "license" => $this->license,
        ];

        return response()->streamDownload(function () use ($boilerplate, $requestData) {
            $boilerplate->zip($requestData);
        }, 'download.zip');
    }

    public function render()
    {
        return view('livewire.boilerplate-form');
    }
}

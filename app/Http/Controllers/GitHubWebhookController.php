<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateSkeletonJob;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class GitHubWebhookController extends Controller
{

    /**
     * @param Request $request
     */
    public function handle(Request $request)
    {
        $this->validateGithubWebhook(config('app.github_webhook_secret'), $request);

        $skeletonType = $this->detectSkeletonType($request->get("repository"));

        dispatch(new UpdateSkeletonJob($skeletonType));

    }

    /**
     * @param $repository
     * @return string
     */
    private function detectSkeletonType($repository): string
    {
        if (array_key_exists("name", $repository)) {
            switch ($repository["name"]) {
                case "skeleton-php":
                    return "php";
                case "skeleton-laravel":
                    return "laravel";
                default:
                    break;
            }
        }

        throw new BadRequestHttpException("Invalid payload");
    }

    /**
     * @param string $token
     * @param Request $request
     *
     * @return void
     * @throws BadRequestHttpException, \UnauthorizedException
     */
    private function validateGithubWebhook(string $token, Request $request)
    {
        if (($signature = $request->headers->get('X-Hub-Signature')) == null) {
            throw new BadRequestHttpException('Header not set');
        }

        $signature_parts = explode('=', $signature);

        if (count($signature_parts) != 2) {
            throw new BadRequestHttpException('signature has invalid format');
        }

        $known_signature = hash_hmac('sha1', $request->getContent(), $token);

        if (!hash_equals($known_signature, $signature_parts[1])) {
            throw new UnauthorizedException('Could not verify request signature ' . $signature_parts[1]);
        }
    }
}

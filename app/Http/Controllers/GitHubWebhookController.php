<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GitHubWebhookController extends Controller
{
    /**
     * Validate an incoming github webhook
     *
     * @param string $token Our known token that we've defined
     * @param Request $request
     *
     * @throws \BadRequestHttpException, \UnauthorizedException
     * @return void
     */
    protected function validateGithubWebhook($token, Request $request)
    {
        Log::info("validate");
        Log::info($token);
//        if (($signature = $request->headers->get('X-Hub-Signature')) == null) {
//            throw new BadRequestHttpException('Header not set');
//        }
//
//        $signature_parts = explode('=', $signature);
//
//        if (count($signature_parts) != 2) {
//            throw new BadRequestHttpException('signature has invalid format');
//        }
//
//        $known_signature = hash_hmac('sha1', $request->getContent(), $known_token);
//
//        if (! hash_equals($known_signature, $signature_parts[1])) {
//            throw new UnauthorizedException('Could not verify request signature ' . $signature_parts[1]);
//        }
    }


    /**
     * Entry point to our webhook handler
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        Log::info("handle");
        Log::info(print_r($request->getContent(),true));

        $this->validateGithubWebhook(config('app.github_webhook_secret'), $request);
    }

}

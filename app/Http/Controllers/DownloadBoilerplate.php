<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoilerplateRequest;
use App\Boilerplates\BoilerplateRepository;

class DownloadBoilerplate extends Controller
{

    public function __invoke(BoilerplateRequest $request)
    {
        $boilerplate = BoilerplateRepository::findForBoilerplateType($request->packageType);

        if ($request->newsletter) {
            $boilerplate->subscribeToNewsletter($request->authorEmail);
        }

        return $boilerplate->zip($request->all());
    }
}

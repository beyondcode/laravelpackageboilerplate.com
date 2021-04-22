<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoilerplateRequest;
use App\Boilerplates\BoilerplateRepository;

class CreateBoilerplateRepository extends Controller
{
    public function __invoke(BoilerplateRequest $request)
    {
        $boilerplate = BoilerplateRepository::findForBoilerplateType($request->packageType);

        if ($request->newsletter) {
            $boilerplate->subscribeToNewsletter($request->authorEmail);
        }

        try {
            $boilerplate->github($request->all());
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        return [
            'success' => true,
        ];
    }
}

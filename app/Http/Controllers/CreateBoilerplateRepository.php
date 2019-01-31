<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boilerplates\BoilerplateRepository;

class CreateBoilerplateRepository extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
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

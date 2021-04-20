<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class BoilerplateForm extends Component
{
    public $packageType = "laravel";

    public $vendorName = "";
    public $packageName = "";
    public $authorName = "";
    public $authorEmail = "";
    public $packageDescription = "";
    public $license = "MIT";


    // toDo check these with composer docs
    protected $rules = [
        'vendorName' => 'required',
        'packageName' => 'required',
        'authorName' => 'required',
        'authorEmail' => 'required|email',
//        'packageDescription' => '',
        'license' => 'required',
    ];


    public function setPackageType($type)
    {
        Log::info("setPackageType");
        Log::info($type);
        $this->packageType = $type;
    }

    public function submit()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.boilerplate-form');
    }
}

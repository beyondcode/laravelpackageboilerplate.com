<!DOCTYPE html>
<html class="h-full" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-lighter font-sans font-normal antialiased h-full w-full">
    <div class="w-full h-full lg:p-16" id="packageApp">
        <div class="lg:rounded-xl bg-blue-darker min-h-full w-full flex shadow-lg text-white">
            <div class="flex-grow w-full lg:w-2/3">
                <div class="px-4 lg:px-16 py-16 flex flex-col h-full">
                    <div class="flex items-center">
                        <h1 class="text-normal uppercase">PHP Package Boilerplate</h1>
                    </div>

                    <div class="flex-grow flex flex-col" v-if="step == 1">
                        <div class="pt-16 text-2xl">
                            <h2>Which package do you want to <span class="text-red">build</span>?</h2>
                        </div>

                        <div class="flex flex-row flex-grow justify-center items-center">

                            <div class="hover:text-red cursor-pointer mr-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                                 :class="{'text-red': form.packageType === 'laravel'}"
                                 @click="selectPackageType('laravel')"
                            >
                                Laravel
                            </div>

                            <div class="hover:text-red cursor-pointer mr-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                                 :class="{'text-red': form.packageType === 'php'}"
                                 @click="selectPackageType('php')"
                            >
                                PHP
                            </div>

                        </div>
                    </div>

                    <div v-if="step == 2">
                        <div class="pt-16 text-2xl">
                            <h2>Fill in some package <span class="text-red">details</span></h2>
                        </div>

                        <div class="flex flex-col lg:flex-row pt-16 pb-8">
                            <div class="flex flex-col w-1/2">
                                <label class="pb-4" for="package_name">Package Name</label>
                                <input class="outline-none rounded-sm p-4" type="text" placeholder="beyondcode/my-package">
                            </div>
                            <div class="lg:pl-4 pt-4 lg:pt-0 flex flex-col w-1/2">
                                <label class="pb-4" for="package_name">Package Name</label>
                                <input class="outline-none rounded-sm p-4" type="text" placeholder="beyondcode/my-package">
                            </div>
                        </div>

                        <div class="flex flex-col lg:flex-row pb-8">
                            <div class="flex flex-col w-1/2">
                                <label class="pb-4" for="package_name">Package Name</label>
                                <input class="outline-none rounded-sm p-4" type="text" placeholder="beyondcode/my-package">
                            </div>
                            <div class="lg:pl-4 pt-4 lg:pt-0 flex flex-col w-1/2">
                                <label class="pb-4" for="package_name">Package Name</label>
                                <input class="outline-none rounded-sm p-4" type="text" placeholder="beyondcode/my-package">
                            </div>
                        </div>
                    </div>

                    <div class="flex w-1/3">
                        <div class="cursor-pointer self-end w-full bg-red h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase" @click="nextStep">
                            Next
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/3 bg-white lg:rounded-r-xl text-grey-darkest">
                <div class="px-8 py-16">
                    <div class="flex flex-col">
                        <h1 class="text-normal">Get started with your package!</h1>

                        <p class="pt-16 text-lg leading-normal">
                            You have an idea for a PHP package and want to start working on it? Great!<br>
                            But where should you start?<br>
                            This generator helps you with the boilerplate code to help you focus on what's most important: <span class="text-red font-bold">your package</span>.
                        </p>

                        <div class="w-full flex flex-col pt-8">

                            <div class="flex-row flex items-center">
                                <div class="flex h-16 w-16 rounded-full bg-red text-white justify-center items-center">
                                    <div class="w-8 h-8 bg-white rounded-full" v-if="step == 1"></div>
                                </div>

                                <p class="pl-8 text-grey-darkest">
                                    Package type
                                </p>
                            </div>

                            <div class="pt-8 flex-row flex items-center">
                                <div class="flex h-16 w-16 rounded-full bg-red text-white justify-center items-center">
                                    <div class="w-8 h-8 bg-white rounded-full" v-if="step == 2"></div>
                                </div>

                                <p class="pl-8 text-grey-darkest">
                                    Package details
                                </p>
                            </div>

                            <div class="pt-8 flex-row flex items-center">
                                <div class="flex h-16 w-16 rounded-full bg-red text-white justify-center items-center">
                                    <div class="w-8 h-8 bg-white rounded-full" v-if="step == 3"></div>
                                </div>

                                <p class="pl-8 text-grey-darkest">
                                    Download your package
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

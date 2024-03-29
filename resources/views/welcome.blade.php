<!DOCTYPE html>
<html class="h-full" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Kickstart your next package</title>

    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:creator" content="@marcelpociot"/>
    <meta name="twitter:site" content="@marcelpociot"/>
    <meta name="twitter:title" content="Laravel Package Boilerplate"/>
    <meta name="twitter:description"
          content="Get started with your next PHP/Laravel package in no time with this package boilerplate generator."/>
    <meta name="twitter:image" content="https://laravelpackageboilerplate.com/img/twitter-card.png"/>

    <meta property="og:url" content="https://laravelpackageboilerplate.com"/>
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="Laravel Package Boilerplate"/>
    <meta property="og:description"
          content="Get started with your next PHP/Laravel package in no time with this package boilerplate generator."/>
    <meta property="og:image" content="https://laravelpackageboilerplate.com/img/twitter-card.png"/>

    <meta name="description" content="Get started with your next PHP/Laravel package in no time with this package boilerplate generator.">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
        window.user = {!! json_encode($user) !!};

        @if (request('github') === 'auth')
            window.step = 2;
        @endif
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-75386803-11"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-75386803-11');
    </script>

</head>
<body class="bg-grey-lighter font-sans font-normal antialiased h-full w-full">
    <div class="w-full h-full lg:p-16" id="packageApp">
        <div class="lg:rounded-xl bg-blue-darker min-h-full w-full flex shadow-lg text-white">
            <div class="flex-grow w-full lg:w-2/3">
                <div class="px-8 lg:px-16 py-16 flex flex-col h-full">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <h1 class="flex-no-shrink text-base md:text-lg uppercase">Laravel Package Boilerplate</h1>
                        <div class="md:pt-0 pt-2 uppercase text-right items-center flex flex-no-shrink font-bold">
                            From
                            <a href="https://beyondco.de" target="_blank"><img class="pl-2 h-8" src="https://beyondco.de/wp-content/uploads/2018/01/bc_logo_weiss.png"></a>
                        </div>
                    </div>

                    <router-view></router-view>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/3 bg-white lg:rounded-r-xl text-grey-darkest">
                <div class="px-8 py-16 h-full">
                    <div class="flex flex-col h-full">
                        <h2 class="text-2xl">Get started with your @{{ packageType }} package!</h2>

                        <p class="pt-16 text-lg leading-normal">
                            You have an idea for a @{{ packageType }} package and want to start working on it? Great!<br>
                            But where should you start?<br>
                            This generator helps you with the boilerplate code to help you focus on what's most important: <span class="text-red font-bold">your package</span>.
                        </p>

                        <div class="w-full flex flex-col pt-8">

                            <div class="flex-row flex items-center">
                                <div class="flex h-16 w-16 rounded-full bg-red text-white justify-center items-center">
                                    <div class="w-8 h-8 bg-white rounded-full" v-if="state.step == 1"></div>
                                </div>

                                <p class="pl-8 text-grey-darkest">
                                    Package type
                                </p>
                            </div>

                            <div class="pt-8 flex-row flex items-center">
                                <div class="flex h-16 w-16 rounded-full bg-red text-white justify-center items-center">
                                    <div class="w-8 h-8 bg-white rounded-full" v-if="state.step == 2"></div>
                                </div>

                                <p class="pl-8 text-grey-darkest">
                                    Package details
                                </p>
                            </div>

                            <div class="pt-8 flex-row flex items-center">
                                <div class="flex h-16 w-16 rounded-full bg-red text-white justify-center items-center">
                                    <div class="w-8 h-8 bg-white rounded-full" v-if="state.step == 3"></div>
                                </div>

                                <p class="pl-8 text-grey-darkest">
                                    Download your package
                                </p>
                            </div>

                        </div>

                        <h2 class="pt-8 text-2xl">Do you need help?</h2>

                        <div class="pt-8 text-lg leading-normal">
                            Do you need help with your @{{ packageType }} package? Take a look at <a class="text-red font-bold" href="https://phppackagedevelopment.com">PHP Package Development</a>,
                            a premium video course on building @{{ packageType }} packages.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center">
            <a class="text-black no-underline text-xs pt-4" style="font-size: 0.75em" href="https://beyondco.de/datenschutzbedingungen/">Imprint & Privacy</a>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

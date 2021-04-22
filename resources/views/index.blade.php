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
    <meta name="twitter:creator" content="@beyondcode"/>
    <meta name="twitter:site" content="@beyondcode"/>
    <meta name="twitter:title" content="Laravel Package Boilerplate"/>
    <meta name="twitter:description"
          content="Get started with your next PHP/Laravel package in no time with this package boilerplate generator."/>
    <meta name="twitter:image"
          content="https://og.beyondco.de/Laravel%20Package%20Boilerplate.png?theme=light&md=1&showLogo=1&body=This+generator+helps+you+with+the+boilerplate+code+to+help+you+focus+on+what%27s+most+important%3A+your+package.&fontSize=125px"/>

    <meta property="og:url" content="https://laravelpackageboilerplate.com"/>
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="Laravel Package Boilerplate"/>
    <meta property="og:description"
          content="Get started with your next PHP/Laravel package in no time with this package boilerplate generator."/>
    <meta property="og:image"
          content="https://og.beyondco.de/Laravel%20Package%20Boilerplate.png?theme=light&md=1&showLogo=1&body=This+generator+helps+you+with+the+boilerplate+code+to+help+you+focus+on+what%27s+most+important%3A+your+package.&fontSize=125px"/>

    <meta name="description"
          content="Get started with your next PHP/Laravel package in no time with this package boilerplate generator.">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">

    {{--    <script>--}}
    {{--        window.user = {!! json_encode($user) !!};--}}

    {{--        @if (request('github') === 'auth')--}}
    {{--            window.step = 2;--}}
    {{--        @endif--}}
    {{--    </script>--}}

    @livewireStyles

</head>
<body class="bg-gradient-to-tl from-hulk-10 via-white to-hulk-100 bg-no-repeat ">
<div class="container px-8 mx-auto mt-4">

    <a href="https://github.com/beyondcode/phppackageboilerplate.com" class="github-corner"
       aria-label="View source on GitHub">
        <svg width="80" height="80" viewBox="0 0 250 250"
             style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true">
            <path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path>
            <path
                d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2"
                fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path>
            <path
                d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z"
                fill="currentColor" class="octo-body">
            </path>
        </svg>
    </a>

    <header class="text-dark-blue-800 pb-6">
        <a href="https://beyondco.de" class="inline-flex items-center">
            <svg width="40" height="45" viewBox="0 0 40 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14.1169 3.30926C17.7698 1.25447 22.2302 1.25447 25.8831 3.30926L33.8831 7.80926C37.6617 9.93468 40 13.9329 40 18.2682V26.7318C40 31.0671 37.6617 35.0653 33.8831 37.1907L25.8831 41.6907C22.2302 43.7455 17.7698 43.7455 14.1169 41.6907L6.11686 37.1907C2.33834 35.0653 0 31.0671 0 26.7318V18.2682C0 13.9329 2.33834 9.93468 6.11687 7.80926L14.1169 3.30926Z"
                    fill="#0A214C"></path>
                <g clip-path="url(#clip0)">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M10.706 13.1211C11.2556 13.1211 11.7013 13.5597 11.7013 14.1008V20.7794C12.8332 19.7296 14.3561 19.0842 16.0304 19.0842C17.7282 19.0842 19.3328 19.7481 20.5159 20.9226C20.6518 21.0576 20.6827 21.1015 20.8072 21.2497C20.1107 22.0722 19.8121 23.1499 19.8121 23.1499C19.5138 22.758 19.2141 22.4172 19.2141 22.4172C18.3945 21.5414 17.2471 21.0437 16.0304 21.0437C13.6433 21.0437 11.7013 22.9553 11.7013 25.3051C11.7013 27.655 13.6433 29.5669 16.0304 29.5669C18.4175 29.5669 20.3598 27.655 20.3598 25.3051C20.3598 21.8749 23.1945 19.0842 26.6792 19.0842C27.7904 19.0842 28.8834 19.3724 29.8402 19.9175C30.3159 20.1882 30.4784 20.7876 30.2033 21.2559C29.9277 21.7242 29.3189 21.8844 28.8434 21.6131C28.1892 21.2405 27.4409 21.0437 26.6792 21.0437C24.2923 21.0437 22.3501 22.9553 22.3501 25.3051C22.3501 28.7353 19.515 31.5261 16.0304 31.5261C12.5457 31.5261 9.71094 28.7353 9.71094 25.3051L9.71246 25.2399C9.71195 25.2289 9.71094 25.2182 9.71094 25.2072V14.1008C9.71094 13.5597 10.1563 13.1211 10.706 13.1211ZM22.8974 27.4604C23.2955 28.0483 23.7029 28.4 23.7358 28.4304C24.5388 29.1643 25.5789 29.5669 26.6792 29.5669C27.4409 29.5669 28.1892 29.3698 28.8434 28.9972C29.3189 28.7264 29.9277 28.8861 30.2033 29.3544C30.4784 29.8227 30.3159 30.4221 29.8402 30.6931C28.8834 31.2381 27.7904 31.5261 26.6792 31.5261C25.0439 31.5261 23.5 30.917 22.3197 29.8087C22.2929 29.7838 21.9285 29.4453 21.9022 29.4199C21.9022 29.4199 22.6983 28.2441 22.8974 27.4604Z"
                          fill="white"></path>
                </g>
                <defs>
                    <clipPath id="clip0">
                        <rect x="9.28516" y="12.6565" width="21.4286" height="19.0848" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
            <p class="ml-4 font-headline text-lg">A Beyond<span class="text-hulk-800">Code</span> service</p>
        </a>
    </header>

    <main class="mt-8 md:px-4 py-5 sm:rounded-lg w-full md:w-11/12 mx-auto">
        <h1 class="text-4xl md:text-5.5xl text-center text-dark-blue-800 font-headline leading-tight">
            Boilerplate Generator for <br>
            <p class="inline-block relative text-hulk-800">
                <span class="px-1 absolute top-0 left-0 z-10">Laravel & PHP packages</span>
                <mark class="px-1 h-8 md:h-10 text-transparent inline-block bg-hulk-100 hero-os-mark1">Laravel & PHP
                    packages
                </mark>
            </p>
        </h1>

        <p class="pt-6 text-lg max-w-2xl mx-auto text-gray-700 leading-relaxed text-center">
            You have an idea for a Laravel package and want to start working on it? Great!
            But where should you start?
            This generator helps you with the boilerplate code to help you focus on what's most important:
            <span class="font-semibold text-hulk-800">your package</span>. </p>

        <div class="pt-6 text-lg flex mx-auto max-w-2xl text-gray-700 leading-relaxed ">
            <p class="inline-block relative text-hulk-800 w-1/2">
                <span class="px-1 absolute top-0 left-0 z-10">Do you need help?</span>
                <mark class="px-1 h-3 text-transparent inline-block bg-hulk-100 hero-os-mark1">
                    Do you need help?
                </mark>
            </p>

            <p>Take a look at <a href="http://phppackagedevelopment.com/" class="text-hulk-800 font-semibold">PHP
                    Package Development</a>, a premium video course on building Laravel packages.
            </p>
        </div>


        <livewire:boilerplate-form/>

    </main>

</div>
<footer class="flex items-center justify-center">
    <a class="text-gray-700 no-underline text-sm py-4"
       href="https://beyondco.de/privacy-policy">Imprint & Privacy</a>
</footer>
<script src="js/app.js"></script>
@livewireScripts
</body>
</html>






<div class="pt-24 w-full md:w-11/12 mx-auto">
    <form wire:submit.prevent="submit">
        <fieldset class="mt-6">
            <legend class="mb-4 text-3xl leading-6 font-medium text-dark-blue-800">
                Which <span class="text-hulk-800">package</span> do you want to build?
            </legend>
            <p class="text leading-6 text-gray-700">
                The package boilerplates come with pre-configured
                continuous
                integration services out of the box.
                With GitHub Actions and StyleCI you can rely on powerful tools for your software
                quality,
                automated tests and code styling.</p>
            <div x-data="{packageType: 'laravel'}"
                 class="mt-8 flex items-center flex-col md:flex-row w-full justify-center">
                <div class="flex flex-col items-center md:mr-16">
                    <button type="button" @click="packageType = 'laravel'" wire:click="setPackageType('laravel')"
                            class="ml-3 bg-white py-8 px-24 flex items-center justify-center hover:border-hulk-100 shadow border-transparent border-2 transition duration-150 h-36 md:h-auto"
                            :class="{ 'border-hulk-800': packageType === 'laravel' }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-24 md:h-12 md:w-auto" viewBox="0 0 50 52">
                            <path
                                d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-.002-21.481L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z"
                                fill="#FF2D20" fill-rule="evenodd"/>
                        </svg>
                    </button>
                    <a class="mt-4" target="_blank" class="text-dark-blue-800" href="https://github.com/beyondcode/skeleton-laravel">See on GitHub</a>
                </div>
                <div class="flex items-center flex-col mt-4 md:mt-0">
                    <button type="button" @click="packageType = 'php'" wire:click="setPackageType('php')"
                            class="ml-3 bg-white py-8 px-24 hover:border-hulk-100 shadow border-transparent border-2 transition duration-150 h-36 md:h-auto"
                            :class="{ 'border-hulk-800': packageType === 'php' }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-24 md:h-12 md:w-auto" viewBox="0 -1 100 50">
                            <path
                                d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"/>
                            <path
                                d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0"/>
                            <path
                                d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"/>
                        </svg>
                    </button>
                    <a class="mt-4" target="_blank" class="text-dark-blue-800" href="https://github.com/beyondcode/skeleton-php">See on GitHub</a>
                </div>
            </div>
        </fieldset>
        <fieldset class="mt-12">
            <legend class="mb-4 text-3xl leading-6 font-medium text-dark-blue-800">
                Fill in some package <span class="text-hulk-800">details</span>
            </legend>
            {{--            <div class="flex pb-8 text leading-5 text-gray-700">--}}
            {{--                <a href="/auth/github"--}}
            {{--                   alt="Login with GitHub"--}}
            {{--                   class="mr-6 w-full lg:w-auto  text-white inline-flex transition duration-150 text-white h-10 items-center justify-center px-4 hover:bg-hulk-700 bg-hulk-800 rounded shadow font-medium">--}}
            {{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"--}}
            {{--                         class="h-7 w-7" viewBox="0 0 438.549 438.549">--}}
            {{--                        <path--}}
            {{--                            d="M409.132,114.573c-19.608-33.596-46.205-60.194-79.798-79.8C295.736,15.166,259.057,5.365,219.271,5.365   c-39.781,0-76.472,9.804-110.063,29.408c-33.596,19.605-60.192,46.204-79.8,79.8C9.803,148.168,0,184.854,0,224.63   c0,47.78,13.94,90.745,41.827,128.906c27.884,38.164,63.906,64.572,108.063,79.227c5.14,0.954,8.945,0.283,11.419-1.996   c2.475-2.282,3.711-5.14,3.711-8.562c0-0.571-0.049-5.708-0.144-15.417c-0.098-9.709-0.144-18.179-0.144-25.406l-6.567,1.136   c-4.187,0.767-9.469,1.092-15.846,1c-6.374-0.089-12.991-0.757-19.842-1.999c-6.854-1.231-13.229-4.086-19.13-8.559   c-5.898-4.473-10.085-10.328-12.56-17.556l-2.855-6.57c-1.903-4.374-4.899-9.233-8.992-14.559   c-4.093-5.331-8.232-8.945-12.419-10.848l-1.999-1.431c-1.332-0.951-2.568-2.098-3.711-3.429c-1.142-1.331-1.997-2.663-2.568-3.997   c-0.572-1.335-0.098-2.43,1.427-3.289c1.525-0.859,4.281-1.276,8.28-1.276l5.708,0.853c3.807,0.763,8.516,3.042,14.133,6.851   c5.614,3.806,10.229,8.754,13.846,14.842c4.38,7.806,9.657,13.754,15.846,17.847c6.184,4.093,12.419,6.136,18.699,6.136   c6.28,0,11.704-0.476,16.274-1.423c4.565-0.952,8.848-2.383,12.847-4.285c1.713-12.758,6.377-22.559,13.988-29.41   c-10.848-1.14-20.601-2.857-29.264-5.14c-8.658-2.286-17.605-5.996-26.835-11.14c-9.235-5.137-16.896-11.516-22.985-19.126   c-6.09-7.614-11.088-17.61-14.987-29.979c-3.901-12.374-5.852-26.648-5.852-42.826c0-23.035,7.52-42.637,22.557-58.817   c-7.044-17.318-6.379-36.732,1.997-58.24c5.52-1.715,13.706-0.428,24.554,3.853c10.85,4.283,18.794,7.952,23.84,10.994   c5.046,3.041,9.089,5.618,12.135,7.708c17.705-4.947,35.976-7.421,54.818-7.421s37.117,2.474,54.823,7.421l10.849-6.849   c7.419-4.57,16.18-8.758,26.262-12.565c10.088-3.805,17.802-4.853,23.134-3.138c8.562,21.509,9.325,40.922,2.279,58.24   c15.036,16.18,22.559,35.787,22.559,58.817c0,16.178-1.958,30.497-5.853,42.966c-3.9,12.471-8.941,22.457-15.125,29.979   c-6.191,7.521-13.901,13.85-23.131,18.986c-9.232,5.14-18.182,8.85-26.84,11.136c-8.662,2.286-18.415,4.004-29.263,5.146   c9.894,8.562,14.842,22.077,14.842,40.539v60.237c0,3.422,1.19,6.279,3.572,8.562c2.379,2.279,6.136,2.95,11.276,1.995   c44.163-14.653,80.185-41.062,108.068-79.226c27.88-38.161,41.825-81.126,41.825-128.906   C438.536,184.851,428.728,148.168,409.132,114.573z"/>--}}
            {{--                    </svg>--}}
            {{--                </a> Login with GitHub to pre-fill your user information and--}}
            {{--                to be--}}
            {{--                able to create a public repository with your shiny package boilerplate code.--}}
            {{--            </div>--}}
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-3">
                    <label wire:target="vendorName" for="vendorName"
                           class="block text-sm font-medium leading-5 text-gray-700">Vendor
                        Name</label>
                    <input wire:model="vendorName"
                           id="vendorName"
                           placeholder="beyondcode"
                           class="mt-1 border form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('vendorName') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label wire:target="packageName" for="packageName"
                           class="block text-sm font-medium leading-5 text-gray-700">
                        Package Name
                    </label>
                    <input wire:model="packageName"
                           id="packageName"
                           placeholder="my-package"
                           class="mt-1  border form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('packageName') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label wire:target="authorName" for="authorName"
                           class="block text-sm font-medium leading-5 text-gray-700">
                        Author Name
                    </label>
                    <input wire:model="authorName"
                           id="authorName"
                           placeholder="Jane Doe"
                           class="mt-1 border form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('authorName') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label wire:target="authorEmail" for="authorEmail"
                           class="block text-sm font-medium leading-5 text-gray-700">
                        Author E-Mail
                    </label>
                    <input wire:model="authorEmail"
                           id="authorEmail"
                           placeholder="author@domain.com"
                           class="mt-1 border  form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('authorEmail') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                </div>

                <div class="col-span-6">
                    <label wire:target="packageDescription" for="packageDescription"
                           class="block text-sm font-medium leading-5 text-gray-700">
                        Package Description
                    </label>
                    <input wire:model="packageDescription"
                           id="packageDescription"
                           placeholder="My awesome package"
                           class="mt-1  border form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('packageDescription') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>


                <div class="col-span-6 ">
                    <div class=" flex items-center">
                        <label wire:target="license"
                               for="license"
                               class="block text-sm font-medium leading-5 text-gray-700">
                            License
                        </label>
                        <a href="https://choosealicense.com/"
                           class="text-gray-500 transition duration-300 hover:text-hulk-800" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                    <select wire:model="license"
                            id="license"
                            class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        <option value="mit">MIT License</option>
                        <option value="agpl-3">GNU AGPLv3</option>
                        <option value="gpl-3">GNU GPLv3</option>
                        <option value="lgpl-3">GNU LGPLv3</option>
                        <option value="mozilla-public-2">Mozilla Public License 2.0</option>
                        <option value="apache-2">Apache License 2.0</option>
                        <option value="unlicense">The Unlicense</option>
                    </select>
                </div>


                <div class="col-span-6">
                    <div class="mt-4">
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input wire:model="newsletter" id="newsletter" type="checkbox"
                                       class="form-checkbox h-4 w-4 text-hulk-600 transition duration-150 ease-in-out">
                            </div>
                            <div class="ml-4 leading-5 ">
                                <label wire:target="newsletter" for="newsletter"
                                       class="font-semibold text-dark-blue-800 mr-3">Stay in the <span
                                        class="text-hulk-800">loop</span></label>
                                <p class="text-dark-blue-800">I want to stay informed about upcoming Beyond Code
                                    products and courses</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </fieldset>
        <fieldset class="mt-12">
            <legend class="mb-4 text-3xl leading-6 font-medium text-dark-blue-800">
                You're almost <span class="text-hulk-800">done!</span>
            </legend>
            <div class=" pb-8 text leading-5 text-gray-700">
                {{--                How do you want to retrieve your package code?--}}
                Download the ZIP file and you're good to go!

                <div class="flex mx-auto mt-8 justify-center items-center ">
                    {{--                    <button--}}
                    {{--                        class="ml-3 bg-white py-8 px-24 shadow hover:border-hulk-800 border-transparent border-2">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"--}}
                    {{--                             class="h-16 w-16" viewBox="0 0 438.549 438.549">--}}
                    {{--                            <path--}}
                    {{--                                d="M409.132,114.573c-19.608-33.596-46.205-60.194-79.798-79.8C295.736,15.166,259.057,5.365,219.271,5.365   c-39.781,0-76.472,9.804-110.063,29.408c-33.596,19.605-60.192,46.204-79.8,79.8C9.803,148.168,0,184.854,0,224.63   c0,47.78,13.94,90.745,41.827,128.906c27.884,38.164,63.906,64.572,108.063,79.227c5.14,0.954,8.945,0.283,11.419-1.996   c2.475-2.282,3.711-5.14,3.711-8.562c0-0.571-0.049-5.708-0.144-15.417c-0.098-9.709-0.144-18.179-0.144-25.406l-6.567,1.136   c-4.187,0.767-9.469,1.092-15.846,1c-6.374-0.089-12.991-0.757-19.842-1.999c-6.854-1.231-13.229-4.086-19.13-8.559   c-5.898-4.473-10.085-10.328-12.56-17.556l-2.855-6.57c-1.903-4.374-4.899-9.233-8.992-14.559   c-4.093-5.331-8.232-8.945-12.419-10.848l-1.999-1.431c-1.332-0.951-2.568-2.098-3.711-3.429c-1.142-1.331-1.997-2.663-2.568-3.997   c-0.572-1.335-0.098-2.43,1.427-3.289c1.525-0.859,4.281-1.276,8.28-1.276l5.708,0.853c3.807,0.763,8.516,3.042,14.133,6.851   c5.614,3.806,10.229,8.754,13.846,14.842c4.38,7.806,9.657,13.754,15.846,17.847c6.184,4.093,12.419,6.136,18.699,6.136   c6.28,0,11.704-0.476,16.274-1.423c4.565-0.952,8.848-2.383,12.847-4.285c1.713-12.758,6.377-22.559,13.988-29.41   c-10.848-1.14-20.601-2.857-29.264-5.14c-8.658-2.286-17.605-5.996-26.835-11.14c-9.235-5.137-16.896-11.516-22.985-19.126   c-6.09-7.614-11.088-17.61-14.987-29.979c-3.901-12.374-5.852-26.648-5.852-42.826c0-23.035,7.52-42.637,22.557-58.817   c-7.044-17.318-6.379-36.732,1.997-58.24c5.52-1.715,13.706-0.428,24.554,3.853c10.85,4.283,18.794,7.952,23.84,10.994   c5.046,3.041,9.089,5.618,12.135,7.708c17.705-4.947,35.976-7.421,54.818-7.421s37.117,2.474,54.823,7.421l10.849-6.849   c7.419-4.57,16.18-8.758,26.262-12.565c10.088-3.805,17.802-4.853,23.134-3.138c8.562,21.509,9.325,40.922,2.279,58.24   c15.036,16.18,22.559,35.787,22.559,58.817c0,16.178-1.958,30.497-5.853,42.966c-3.9,12.471-8.941,22.457-15.125,29.979   c-6.191,7.521-13.901,13.85-23.131,18.986c-9.232,5.14-18.182,8.85-26.84,11.136c-8.662,2.286-18.415,4.004-29.263,5.146   c9.894,8.562,14.842,22.077,14.842,40.539v60.237c0,3.422,1.19,6.279,3.572,8.562c2.379,2.279,6.136,2.95,11.276,1.995   c44.163-14.653,80.185-41.062,108.068-79.226c27.88-38.161,41.825-81.126,41.825-128.906   C438.536,184.851,428.728,148.168,409.132,114.573z"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </button>--}}
                    <button
                        class="ml-3 font-semibold flex flex-col items-center justify-center tracking-wide text-white hover:bg-hulk-700 bg-hulk-800  py-8 px-12 hover:border-hulk-100 shadow border-transparent transition duration-150 hover:border-hulk-800 border-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-4" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>

                        Download my package
                    </button>
                </div>
            </div>
        </fieldset>

    </form>
</div>

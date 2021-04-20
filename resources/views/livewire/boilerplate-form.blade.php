<div class="pt-24 w-11/12 mx-auto">
    <form wire:submit.prevent="submit">
        <fieldset class="mt-6">
            <legend class="mb-4 text-3xl leading-6 font-medium text-dark-blue-800">
                Which <span class="text-hulk-800">package</span> do you want to build?
            </legend>
            <p class="text leading-5 text-gray-700">
                The package boilerplates come with pre-configured
                continuous
                integration services out of the box.
                With Travis-CI, Scrutinizer and StyleCI you can rely on powerful tools for your software
                quality,
                automated tests and code styling.</p>
            <div x-data="{packageType: 'laravel'}" class="mt-8 flex items-center w-full justify-center">
                <div class="flex items-center mr-16">
                    <button type="button" @click="packageType = 'laravel'" wire:click="setPackageType('laravel')"
                           class="ml-3 bg-white py-8 px-24 shadow border-transparent border-2"
                    :class="{ 'border-hulk-800': packageType === 'laravel' }">
                        <img src="https://laravel.com/img/logomark.min.svg" class="h-12">
                    </button>
                </div>
                <div class="flex items-center">
                    <button type="button" @click="packageType = 'php'" wire:click="setPackageType('php')"
                            class="ml-3 bg-white py-8 px-24 shadow border-transparent border-2"
                            :class="{ 'border-hulk-800': packageType === 'php' }">
                        <img src="https://www.php.net/images/logos/php-logo.svg" class="h-12">
                    </button>
                </div>
            </div>
        </fieldset>
        <fieldset class="mt-12">
            <legend class="mb-4 text-3xl leading-6 font-medium text-dark-blue-800">
                Fill in some package <span class="text-hulk-800">details</span>
            </legend>
            <div class="flex pb-8 text leading-5 text-gray-700">
                <a href="https://httpdump.app"
                   class="mr-6 w-full lg:w-auto inline-flex text-white h-10 items-center justify-center px-4 hover:bg-hulk-700 bg-hulk-800 rounded shadow font-medium">
                    GH
                </a> Login with GitHub to pre-fill your user information and
                to be
                able to create a public repository with your shiny package boilerplate code.
            </div>
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-3">
                    <label wire:target="vendorName" class="block text-sm font-medium leading-5 text-gray-700">Vendor
                        Name</label>
                    <input wire:model="vendorName"
                           class="mt-1 border form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('vendorName') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label  wire:target="packageName"  class="block text-sm font-medium leading-5 text-gray-700">Package
                        Name
                    </label>
                    <input wire:model="vendorName"
                           class="mt-1  border form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    @error('packageName') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">Author
                        Name</label>
                    <input id="first_name"
                           class="mt-1 border form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Author
                        E-Mail
                    </label>
                    <input id="last_name"
                           class="mt-1 border  form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>

                <div class="col-span-6">
                    <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Package
                        Description</label>
                    <input id="last_name"
                           class="mt-1  border form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>


                <div class="col-span-6 ">
                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Country /
                        License [?]</label>
                    <select id="country"
                            class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        <option>MIT</option>
                        <option>Canada</option>
                        <option>Mexico</option>
                    </select>
                </div>

            </div>
        </fieldset>
        <fieldset class="mt-12">
            <legend class="mb-4 text-3xl leading-6 font-medium text-dark-blue-800">
                You're almost <span class="text-hulk-800">done!</span>
            </legend>
            <div class=" pb-8 text leading-5 text-gray-700">
                How do you want to retrieve your package code?

                <div class="flex mx-auto mt-8 justify-center items-center">
                    <button
                        class="ml-3 bg-white py-8 px-24 shadow hover:border-hulk-800 border-transparent border-2">
                        GH
                    </button>
                    <button
                        class="ml-3 bg-white py-8 px-24 shadow hover:border-hulk-800 border-transparent border-2">
                        ZIP
                    </button>
                </div>
            </div>
        </fieldset>

    </form>
</div>

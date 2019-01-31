<template>
    <div class="flex-grow flex flex-col">
        <div class="flex-grow flex flex-col">
            <div class="pt-16 text-2xl">
                <h2>Fill in some package <span class="text-red">details</span></h2>
            </div>

            <div>

                <div class="flex pt-8" v-if="! user.id">
                    <a href="/auth/github" class="no-underline text-white cursor-pointer w-1/3 bg-red h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase">
                        Login with GitHub
                    </a>
                </div>

                <div class="flex flex-col lg:flex-row py-8">
                    <div class="flex flex-col lg:w-1/2">
                        <label class="pb-4" for="vendorName" :class="{ 'text-red': $v.vendorName.$error }">Vendor Name</label>
                        <input class="outline-none rounded-sm p-4" id="vendorName" type="text" placeholder="beyondcode" v-model="$v.vendorName.$model">
                    </div>
                    <div class="lg:pl-4 pt-4 lg:pt-0 flex flex-col lg:w-1/2">
                        <label class="pb-4" for="packageName" :class="{ 'text-red': $v.packageName.$error }">Package Name</label>
                        <input class="outline-none rounded-sm p-4" id="packageName" type="text" placeholder="my-package" v-model="$v.packageName.$model">
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row pb-8">
                    <div class="flex flex-col lg:w-1/2">
                        <label class="pb-4" for="authorName" :class="{ 'text-red': $v.authorName.$error }">Author Name</label>
                        <input class="outline-none rounded-sm p-4" id="authorName" type="text" placeholder="Jane Doe" v-model="$v.authorName.$model">
                    </div>
                    <div class="lg:pl-4 pt-4 lg:pt-0 flex flex-col lg:w-1/2">
                        <label class="pb-4" for="authorEmail" :class="{ 'text-red': $v.authorEmail.$error }">Author Email</label>
                        <input class="outline-none rounded-sm p-4" id="authorEmail" type="email" placeholder="author@domain.com" v-model="$v.authorEmail.$model">
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row pb-8">
                    <div class="flex flex-col w-full">
                        <label class="pb-4" for="packageDescription">Package Description</label>
                        <input class="outline-none rounded-sm p-4" v-model="packageDescription" id="packageDescription" type="text" placeholder="My awesome package">
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row pb-8">
                    <div class="flex flex-col w-full">
                        <label class="pb-4" for="license">License
                            <a href="https://choosealicense.com" target="_blank" class="no-underline text-white">[?]</a>
                        </label>
                        <div class="inline-block relative">
                            <select v-model="license" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-4 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="mit">MIT License</option>
                                <option value="agpl-3">GNU AGPLv3</option>
                                <option value="gpl-3">GNU GPLv3</option>
                                <option value="lgpl-3">GNU LGPLv3</option>
                                <option value="mozilla-public-2">Mozilla Public License 2.0</option>
                                <option value="apache-2">Apache License 2.0</option>
                                <option value="unlicense">The Unlicense</option>
                            </select>
                            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row pb-8">
                    <div class="flex flex-col w-full">
                        <h3>Stay in the loop</h3>
                        <div class="pt-2 flex">
                            <input type="checkbox" id="newsletter" value="1" v-model="newsletter">
                            <label for="newsletter" class="pl-2">I want to learn more about {{ packageType }} package development.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex">
            <div class="flex w-full">
                <div class="cursor-pointer px-4 md:w-1/3 bg-blue-darkest h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase" @click="previousStep">
                    Previous
                </div>
            </div>
            <div class="flex w-full self-end flex-col">
                <div class="cursor-pointer self-end px-4 md:w-1/3  bg-red h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase" @click="nextStep">
                    Next
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { required, email, alpha } from 'vuelidate/lib/validators'
    import { store } from './../store';
    import { routes } from './../routes';

    const alphaDash = (value) => value !== null && value && value.search(/^[a-zA-Z0-9-_]+$/) !== -1;

    export default {
        name: "PackageDetails",

        data() {
            return {
                user: window.user,

                state: store.state,

                vendorName: store.state.vendorName,
                packageName: store.state.packageName,
                authorName: store.state.authorName,
                authorEmail: store.state.authorEmail,
                license: store.state.license,
                packageDescription: store.state.packageDescription,
                newsletter: store.state.newsletter
            };
        },

        validations: {

            vendorName: {
                required,
                alphaDash
            },

            packageName: {
                required,
                alphaDash
            },

            authorName: {
                required,
            },

            authorEmail: {
                required,
                email
            }
        },

        computed: {
            packageType() {
                if (this.state.packageType === 'laravel') {
                    return 'Laravel';
                }
                return 'PHP';
            }
        },

        methods: {
            nextStep()
            {
                this.$v.$touch();

                if (! this.$v.$invalid) {
                    store.increaseStep();

                    store.setVendorName(this.vendorName);
                    store.setPackageName(this.packageName);
                    store.setAuthorName(this.authorName);
                    store.setAuthorEmail(this.authorEmail);
                    store.setLicense(this.license);
                    store.setPackageDescription(this.packageDescription);
                    store.setNewsletter(this.newsletter);

                    this.advanceRoute();
                }
            },

            previousStep()
            {
                store.decreaseStep();

                this.advanceRoute();
            },

            advanceRoute()
            {
                let route = routes.filter(route => {
                    return route.meta.step === this.state.step;
                }).pop();

                this.$router.push(route.path);
            }
        },
    }
</script>

<style scoped>

</style>
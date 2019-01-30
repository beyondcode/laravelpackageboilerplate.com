<template>
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
                <div class="flex flex-col w-1/2">
                    <label class="pb-4" for="vendorName" :class="{ 'text-red': $v.vendorName.$error }">Vendor Name</label>
                    <input class="outline-none rounded-sm p-4" id="vendorName" type="text" placeholder="beyondcode" v-model="$v.vendorName.$model">
                </div>
                <div class="lg:pl-4 pt-4 lg:pt-0 flex flex-col w-1/2">
                    <label class="pb-4" for="packageName" :class="{ 'text-red': $v.packageName.$error }">Package Name</label>
                    <input class="outline-none rounded-sm p-4" id="packageName" type="text" placeholder="my-package" v-model="$v.packageName.$model">
                </div>
            </div>

            <div class="flex flex-col lg:flex-row pb-8">
                <div class="flex flex-col w-1/2">
                    <label class="pb-4" for="authorName">Author Name</label>
                    <input class="outline-none rounded-sm p-4" id="authorName" type="text" placeholder="Jane Doe" v-model="state.authorName">
                </div>
                <div class="lg:pl-4 pt-4 lg:pt-0 flex flex-col w-1/2">
                    <label class="pb-4" for="authorEmail">Author Email</label>
                    <input class="outline-none rounded-sm p-4" id="authorEmail" type="text" placeholder="author@domain.com" v-model="state.authorEmail">
                </div>
            </div>

            <div class="flex flex-col lg:flex-row pb-8">
                <div class="flex flex-col w-full">
                    <label class="pb-4" for="packageDescription">Package Description</label>
                    <input class="outline-none rounded-sm p-4" id="packageDescription" type="text" placeholder="My awesome package">
                </div>
            </div>

            <div class="flex flex-col lg:flex-row pb-8">
                <div class="flex flex-col w-full">
                    <label class="pb-4" for="license">License</label>
                    <select class="outline-none rounded-sm p-4" id="license">
                        <option value="MIT">MIT</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { required } from 'vuelidate/lib/validators'
    import { store } from './../store';

    const alphaDash = (value) => value !== null && value.search(/^[a-zA-Z0-9-_]+$/) !== -1;

    export default {
        name: "PackageDetails",

        data() {
            return {
                user: window.user,

                state: store.state,

                vendorName: store.state.vendorName,
                packageName: store.state.packageName,
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
            }
        }
    }
</script>

<style scoped>

</style>
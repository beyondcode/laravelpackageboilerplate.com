<template>
    <div class="flex-grow flex flex-col">
        <div class="pt-16 text-2xl">
            <h2>Which package do you want to <span class="text-red">build</span>?</h2>
        </div>

        <div class="flex flex-row flex-grow justify-center items-center">

            <div class="hover:text-red cursor-pointer mr-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                 :class="{'text-red': state.packageType === 'laravel'}"
                 @click="selectPackageType('laravel')"
            >
                Laravel
            </div>

            <div class="hover:text-red cursor-pointer mr-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                 :class="{'text-red': state.packageType === 'php'}"
                 @click="selectPackageType('php')"
            >
                PHP
            </div>

        </div>
    </div>
</template>

<script>
    import { store } from './../store';

    export default {
        name: "PackageSelection",

        data() {
            return {
                state: store.state
            };
        },

        methods: {
            selectPackageType(packageType) {
                store.setPackageType(packageType);
            }
        }
    }
</script>

<style scoped>

</style>
<template>
    <div class="flex-grow flex flex-col">
        <div class="flex-grow flex flex-col">
            <div class="pt-16 text-2xl">
                <h2>Which package do you want to <span class="text-red">build</span>?</h2>
            </div>

            <div class="leading-normal text-normal pt-4">

                <p>
                    The package boilerplates come with pre-configured continuous integration services out of the box.<br>
                    With Travis-CI, Scrutinizer and StyleCI you can rely on powerful tools for your software quality, automated tests and code styling.
                </p>

            </div>


            <div class="py-8 flex flex-col md:flex-row flex-grow justify-center items-center">

                <div class="hover:text-red cursor-pointer mr-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                     :class="{'text-red': state.packageType === 'laravel'}"
                     @click="selectPackageType('laravel')"
                >
                    Laravel
                </div>

                <div class="hover:text-red cursor-pointer mr-8 md:mt-0 mt-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                     :class="{'text-red': state.packageType === 'php'}"
                     @click="selectPackageType('php')"
                >
                    PHP
                </div>

            </div>
        </div>

        <div class="flex">
            <div class="flex w-full self-end flex-col">
                <div class="cursor-pointer self-end w-1/3 bg-red h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase" @click="nextStep">
                    Next
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { store } from './../store';
    import { routes } from './../routes';

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
            },

            nextStep()
            {
                store.increaseStep();

                this.advanceRoute();
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
        }
    }
</script>

<style scoped>

</style>
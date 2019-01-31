<template>
    <div class="flex-grow flex flex-col">
        <div class="flex-grow flex flex-col">
            <div class="pt-16 text-2xl">
                <h2>You're almost <span class="text-red">done</span>!</h2>
            </div>

            <div class="flex flex-row flex-grow justify-center items-center">

                <div class="hover:text-red cursor-pointer mr-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                     :class="{'text-red': state.packageType === 'laravel'}"
                     @click="selectPackageType('laravel')"
                >
                    Download ZIP
                </div>

                <div class="hover:text-red cursor-pointer mr-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                     :class="{'text-red': state.packageType === 'php'}"
                     @click="selectPackageType('php')"
                >
                    Create repo
                </div>

            </div>
        </div>

        <div class="flex">
            <div class="flex w-full">
                <div class="cursor-pointer w-1/3 bg-blue-darkest h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase" @click="previousStep">
                    Previous
                </div>
            </div>
            <div class="flex w-full self-end flex-col">
                <div class="cursor-pointer self-end w-1/3 bg-red h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase">
                    Download
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { store } from './../store';
    import { routes } from './../routes';

    export default {
        name: "PackageDownload",

        data() {
            return {
                state: store.state,
                packageName: store.state.packageName,
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
        },
    }
</script>

<style scoped>

</style>
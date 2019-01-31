<template>
    <div class="flex-grow flex flex-col">
        <div class="flex-grow flex flex-col">
            <div class="pt-16 text-2xl">
                <h2>You're almost <span class="text-red">done</span>!</h2>
            </div>

            <div class="flex flex-row flex-grow justify-center items-center">

                <div class="hover:text-red cursor-pointer mr-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                     :class="{'text-red': state.downloadMethod === 'zip'}"
                     @click="selectDownloadMethod('zip')"
                >
                    Download ZIP
                </div>

                <div class="hover:text-red cursor-pointer mr-8 text-3xl font-bold flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center"
                     :class="{'text-red': state.downloadMethod === 'github'}"
                     @click="selectDownloadMethod('github')"
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
                <div class="cursor-pointer self-end w-1/3 bg-red h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase" @click="createPackage">
                    Download
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { store } from './../store';
    import { routes } from './../routes';

    export default {
        name: "PackageDownload",

        data() {
            return {
                state: store.state,
            };
        },

        methods: {
            selectDownloadMethod(downloadMethod) {
                store.setDownloadMethod(downloadMethod);
            },

            createPackage()
            {
                axios({
                    url: '/boilerplate',
                    method: 'POST',
                    responseType: 'blob',
                    data: store.state,
                }).then((response) => {
                        const url = window.URL.createObjectURL(new Blob([response.data]));

                        const link = document.createElement('a');
                        link.href = url;
                        link.setAttribute('download', `${this.state.packageName}.zip`);

                        document.body.appendChild(link);

                        link.click();
                    });
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
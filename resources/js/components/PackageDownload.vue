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

                <div class="hover:text-red cursor-pointer mr-8 flex rounded-lg bg-blue-darkest shadow h-64 w-64 text-white justify-center items-center text-center"
                     v-if="user.id"
                     :class="{'text-red': state.downloadMethod === 'github'}"
                     @click="selectDownloadMethod('github')"
                >
                    <p class="text-3xl font-bold" v-if="! error">Create repo</p>
                    <p class="text-xl font-bold text-center" v-else>
                        <span class="text-red">Oh no</span>!<br>Something went wrong.<br>Please download your package instead.
                    </p>
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
                <div
                        :disabled="busy"
                        :class="{'opacity-50': busy}"
                        class="text-white cursor-pointer self-end bg-red h-16 px-4 flex justify-center items-center font-bold rounded-sm text-lg uppercase" @click="downloadZip" v-if="state.downloadMethod === 'zip'">
                    Download
                </div>
                <button
                        :disabled="busy"
                        :class="{'opacity-50': busy}"
                        class="text-white cursor-pointer self-end bg-red h-16 px-4 flex justify-center items-center font-bold rounded-sm text-lg uppercase" @click="createRepository" v-if="state.downloadMethod === 'github'">
                    Create public GitHub repository
                </button>
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
                error: false,
                user: window.user,
                busy: false,
                state: store.state,
            };
        },

        methods: {
            selectDownloadMethod(downloadMethod) {
                store.setDownloadMethod(downloadMethod);
            },

            downloadZip()
            {
                this.busy = true;

                axios({
                    url: '/boilerplate',
                    method: 'POST',
                    responseType: 'blob',
                    data: store.state,
                }).then((response) => {
                        this.busy = false;

                        const url = window.URL.createObjectURL(new Blob([response.data]));

                        const link = document.createElement('a');
                        link.href = url;
                        link.setAttribute('download', `${this.state.packageName}.zip`);

                        document.body.appendChild(link);

                        link.click();
                    }).catch(error => {
                        this.busy = false;
                        this.error = true;
                    });
            },

            createRepository()
            {
                this.busy = true;

                axios({
                    url: '/boilerplate/github',
                    method: 'POST',
                    data: store.state,
                }).then((response) => {
                    this.busy = false;
                }).catch(error => {
                    this.busy = false;
                    this.error = true;
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
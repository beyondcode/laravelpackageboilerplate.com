<template>
    <div class="flex-grow flex flex-col">
        <div class="flex-grow flex flex-col">
            <div class="pt-16 text-2xl">
                <h2>Now go and build <span class="text-red">awesome things</span>!</h2>
            </div>

            <div class="leading-normal text-normal pt-8">

                <p class="py-4">
                    You have successfully created your next package boilerplate code!
                </p>

                <a v-if="state.downloadMethod === 'github'"
                   class="no-underline text-white cursor-pointer self-end w-1/3 bg-red h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase"
                   target="_blank"
                   :href="'https://github.com/'+ state.vendorName +'/'+ state.packageName">
                    Access GitHub repository
                </a>

                <p class="py-4">
                    You have successfully created your next package boilerplate code!<br>
                    If you still feel like you could use some help with your package, take a look at my <a class="text-white" href="https://www.phppackagedevelopment.com">PHP Package Development</a> video course.
                </p>

            </div>
        </div>

        <div class="flex">
            <div class="flex w-full self-end flex-col">
                <div class="cursor-pointer self-end bg-red px-4 h-16 flex justify-center items-center font-bold rounded-sm text-lg uppercase" @click="restart">
                    Create another package
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { store } from './../store';
    import { routes } from './../routes';

    export default {
        name: "Finished",

        data() {
            return {
                user: window.user,

                state: store.state,
            };
        },

        methods: {
            restart()
            {
                store.setStep(1);

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
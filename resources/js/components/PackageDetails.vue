<template>
    <div class="flex-grow flex flex-col">
        <div class="pt-16 text-2xl">
            <h2>Fill in some package <span class="text-red">details</span></h2>
        </div>

        <div class="flex flex-col lg:flex-row pt-16 pb-8">
            <div class="flex flex-col w-1/2">
                <label class="pb-4" for="package_name">Package Name</label>
                <input class="outline-none rounded-sm p-4" type="text" placeholder="beyondcode/my-package">
            </div>
            <div class="lg:pl-4 pt-4 lg:pt-0 flex flex-col w-1/2">
                <label class="pb-4" for="package_name">Package Name</label>
                <input class="outline-none rounded-sm p-4" type="text" placeholder="beyondcode/my-package">
            </div>
        </div>

        <div class="flex flex-col lg:flex-row pb-8">
            <div class="flex flex-col w-1/2">
                <label class="pb-4" for="package_name">Package Name</label>
                <input class="outline-none rounded-sm p-4" type="text" placeholder="beyondcode/my-package">
            </div>
            <div class="lg:pl-4 pt-4 lg:pt-0 flex flex-col w-1/2">
                <label class="pb-4" for="package_name">Package Name</label>
                <input class="outline-none rounded-sm p-4" type="text" placeholder="beyondcode/my-package">
            </div>
        </div>
    </div>
</template>

<script>
    import { store } from './../store';

    export default {
        name: "PackageDetails",

        data() {
            return {
                state: store.state
            };
        }
    }
</script>

<style scoped>

</style>
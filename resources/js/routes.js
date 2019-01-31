import PackageSelection from './components/PackageSelection.vue';
import PackageDetails from './components/PackageDetails.vue';
import PackageDownload from './components/PackageDownload.vue';

export const routes = [
    { path: '/', component: PackageSelection, meta: { step: 1} },
    { path: '/package-details', component: PackageDetails, meta: { step: 2} },
    { path: '/package-download', component: PackageDownload, meta: { step: 3} }
];
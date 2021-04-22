import PackageSelection from './components/PackageSelection';
import PackageDetails from './components/PackageDetails';
import PackageDownload from './components/PackageDownload';
import Finished from "./components/Finished";

export const routes = [
    { path: '/', component: PackageSelection, meta: { step: 1} },
    { path: '/package-details', component: PackageDetails, meta: { step: 2} },
    { path: '/package-download', component: PackageDownload, meta: { step: 3} },
    { path: '/finished', component: Finished, meta: { step: 4} },
];
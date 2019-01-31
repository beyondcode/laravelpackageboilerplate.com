export const store = {
    state: {
        step: parseInt(window.step) || 1,

        packageType: localStorage.getItem('packageType') || 'laravel',

        packageName: '',

        vendorName: window.user.nickname || '',

        authorName: window.user.name || '',

        authorEmail: window.user.email || '',

        packageDescription: '',

        license: 'mit',

        downloadMethod: 'zip',

        newsletter: false,
    },

    setStep(step) {
        this.state.step = step;
    },

    increaseStep() {
        this.state.step++;

        localStorage.setItem('step', this.state.step);
    },

    decreaseStep() {
        this.state.step--;

        localStorage.setItem('step', this.state.step);
    },

    setPackageType(packageType) {
        this.state.packageType = packageType;

        localStorage.setItem('packageType', this.state.packageType);
    },

    setVendorName(vendorName) {
        this.state.vendorName = vendorName;
    },

    setPackageName(packageName) {
        this.state.packageName = packageName;
    },

    setAuthorName(authorName) {
        this.state.authorName = authorName;
    },

    setAuthorEmail(authorEmail) {
        this.state.authorEmail = authorEmail;
    },

    setPackageDescription(packageDescription) {
        this.state.packageDescription = packageDescription;
    },

    setLicense(license) {
        this.state.license = license;
    },

    setDownloadMethod(downloadMethod) {
        this.state.downloadMethod = downloadMethod;
    },

    setNewsletter(newsletter) {
        this.state.newsletter= newsletter;
    },
};
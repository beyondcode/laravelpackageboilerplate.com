export const store = {
    state: {
        step: parseInt(localStorage.getItem('step')) || 1,

        packageType: localStorage.getItem('packageType') || 'laravel',

        packageName: localStorage.getItem('packageName'),

        vendorName: localStorage.getItem('vendorName') || window.user.nickname,

        authorName: localStorage.getItem('authorName') || window.user.name,

        authorEmail: localStorage.getItem('authorEmail') || window.user.email,
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
    }
};
export const store = {
    state: {
        step: 1,

        packageType: 'laravel',
    },

    setStep(step) {
        this.state.step = step;
    },

    increaseStep() {
        this.state.step++;
    },

    decreaseStep() {
        this.state.step--;
    },

    setPackageType(packageType) {
        this.state.packageType = packageType;
    }
};
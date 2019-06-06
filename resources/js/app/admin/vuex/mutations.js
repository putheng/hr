export const allPackages = (state, packages) => {
    state.packages = packages
}

export const setPackage = (state, packages) => {
    state.package = packages
}

export const clearPackage = (state, packages) => {
    state.package = []
}
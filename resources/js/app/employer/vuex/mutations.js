export const allPackages = (state, packages) => {
    state.packages = packages
}

export const setPackage = (state, packages) => {
    state.package = packages
}

export const clearPackage = (state, packages) => {
    state.package = []
}

export const setUser = (state, user) => {
	return state.user = user
}

export const clearUserState = (state) => {
	return state.user = []
}
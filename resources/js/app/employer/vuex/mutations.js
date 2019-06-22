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

export const setCompany = (state, company) => {
	return state.company = company
}

export const setListing = (state, listing) => {
	return state.listing = listing
}

export const clearUserState = (state) => {
	return state.user = []
}

export const setPackages = (state, packages) => {
	return state.packages = packages
}

export const setDeposits = (state, deposits) => {
	return state.deposits = deposits
}
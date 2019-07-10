export const allPackages = (state, packages) => {
    state.packages = packages
}

export const setQuestion = (state, question) => {
    state.question = question
}

export const setUser = (state, user) => {
    state.user = user
}

export const setPackage = (state, packages) => {
    state.package = packages
}

export const setBlog = (state, blogs) => {
    state.blogs = blogs
}

export const setPage = (state, pages) => {
    state.pages = pages
}

export const setPageType = (state, pageTypes) => {
    state.pageTypes = pageTypes
}

export const clearPackage = (state, packages) => {
    state.package = []
}

export const setCategories = (state, categories) => {
	state.categories = categories
}

export const setCompanyType = (state, types) => {
	state.companyType = types
}

export const setEducation = (state, educations) => {
	state.educations = educations
}

export const setExperience = (state, experiences) => {
	state.experiences = experiences
}

export const setIndustries = (state, industries) => {
	state.industries = industries
}

export const setLevel = (state, levels) => {
	state.levels = levels
}

export const setLocation = (state, locations) => {
	state.locations = locations
}

export const setSalary = (state, salaries) => {
	state.salaries = salaries
}

export const setTerm = (state, terms) => {
	state.terms = terms
}

export const setEmployeeType = (state, employee) => {
	state.employee = employee
}

export const setPaymentGateway = (state, gatways) => {
	state.paymentGatway = gatways
}

export const setPackages = (state, packages) => {
	state.packages = packages
}

export const setListings = (state, listings) => {
	state.listings = listings
}

export const resetListings = (state) => {
	state.listings = []
}

export const setCompany = (state, company) => {
	state.company = company
}

export const setDeposits = (state, deposits) => {
	state.deposits = deposits
}

export const resetDeposits = (state) => {
	state.deposits = []
}

export const setAds = (state, ads) => {
	state.ads = ads
}
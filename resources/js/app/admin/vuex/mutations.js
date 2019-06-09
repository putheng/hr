export const allPackages = (state, packages) => {
    state.packages = packages
}

export const setPackage = (state, packages) => {
    state.package = packages
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
<template>
<div>
	<h2 class="section-title"> Create Resume </h2>
	<div class="row">
		<div class="col-md-8">
			<form @submit.prevent="submit">

				<!-- Title -->
				<div class="card card-fluid">
					<div class="card-header">
						Resume Title
						<div></div>
					</div>
					<div class="card-body">
						<app-input name="title" v-model="title" />
					</div>
				</div>

				<!-- Personal Information -->
				<div class="card card-fluid">
					<div class="card-header">
						Personal Information
						<div></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<app-input v-model="personal.first_name" 
									name="first_name" label="First name"/>
							</div>
							<div class="col-md-6">
								<app-input v-model="personal.last_name" 
									name="last_name" label="Last name"/>
							</div>
							<div class="col-md-6">
								<app-input v-model="personal.gender" 
									name="gender" label="Gender"/>
							</div>
							<div class="col-md-6">
								<app-input v-model="personal.dob" 
									name="dob" label="Date of Birth"/>
							</div>
							<div class="col-md-6">
								<app-input v-model="personal.email" 
									name="email" label="Email"/>
							</div>
							<div class="col-md-6">
								<app-input v-model="personal.marital" 
									name="marital" label="Marital"/>
							</div>
							<div class="col-md-6">
								<app-input v-model="personal.mobile" 
									name="mobile" label="Mobile"/>
							</div>
							<div class="col-md-6">
								<app-input v-model="personal.nationality" 
									name="nationality" label="Nationality"/>
							</div>
							<div class="col-md-6">
								<app-input v-model="personal.address" 
									name="address" label="Address"/>
							</div>
						</div>
					</div>
				</div>

				<!-- Career Profile -->
				<div class="card card-fluid">
					<div class="card-header">
						Career Profile
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<app-input name="position" label="Latest Position" 
									v-model="career.position"/>
							</div>
							<div class="col-md-6">
								<app-select commit="Education" v-model="career.qualification" name="qualification" label="Qualification"/>
							</div>
							<div class="col-md-6">
								<app-select commit="Level" v-model="career.level" name="level" label="Level"/>
							</div>
							<div class="col-md-6">
								<app-select commit="Categories" v-model="career.category" name="category" label="Function"/>
							</div>
							<div class="col-md-6">
								<app-select commit="Industries" v-model="career.industry" name="industry" label="Industry"/>
							</div>
							<div class="col-md-6">
								<app-input name="salary" label="Latest Salary ($)" 
									v-model="career.salary"/>
							</div>
							<div class="col-md-6">
								<app-input name="experience" label="Years of experience" 
									v-model="career.experience"/>
							</div>
						</div>
					</div>
				</div>

				<!-- Job Preferrences -->
				<div class="card card-fluid">
					<div class="card-header">
						Job Preferrences
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<app-input name="Position" label="Position" 
									v-model="preferrences.position"/>
							</div>
							<div class="col-md-6">
								<app-select 
									commit="Industries" v-model="preferrences.industry" 
									name="industry" label="Industry"/>
							</div>
							<div class="col-md-6">
								<app-select 
									commit="Location" v-model="preferrences.location" 
									name="location" label="Location"/>
							</div>
							<div class="col-md-6">
								<app-select 
									commit="Categories" v-model="preferrences.category" 
									name="location" label="Function"/>
							</div>
							<div class="col-md-6">
								<app-select 
									commit="Salary" v-model="preferrences.salary" 
									name="Salary" label="Expected Salary"/>
							</div>
							<div class="col-md-6">
								<app-select 
									commit="Term" v-model="preferrences.term" 
									name="term" label="Term"/>
							</div>
							<div class="col-md-6">
								<main-select 
									v-model="preferrences.availability" :data="availability"
									name="availability" label="Availability"/>
							</div>
							<div class="col-md-6">
								<main-select 
									v-model="preferrences.travel" :data="travel"
									name="travel" label="Willing to travel?"/>
							</div>
						</div>
					</div>
				</div>

				<!-- Education -->
				<div class="card card-fluid">
					<div class="card-header">
						Education
						<span class="push-right">
							<button class="btn btn-link" @click.prevent="addEducation">
								<span class="oi oi-plus"></span>
							</button>
							<button class="btn btn-link" @click.prevent="removeEducation">
								<span class="oi oi-minus"></span>
							</button>
						</span>
					</div>
					<div class="card-body no-tb-padding" :key="key" v-for="(education, key) in educations">
						<div class="row">
							<div class="col-md-12">
								<app-select commit="Education" v-model="education.qualification" name="qualification" label="Qualification"/>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<app-input v-model="education.university" name="university" label="Institute/University"/>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<app-input v-model="education.field" name="field" label="Field of Study"/>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<app-input v-model="education.from" name="from" label="From" type="date"/>
							</div>
							<div class="col">
								<app-input v-model="education.to" name="to" label="To" type="date"/>
							</div>
						</div>
						<app-text v-model="education.descritpion" name="descritpion" label="Description" max="1000" />
						<hr v-if="experiences.length > 1">
					</div>
				</div>

				<!-- Experience -->
				<div class="card card-fluid">
					<div class="card-header">
						Work Experience
						<span class="push-right">
							<button class="btn btn-link" @click.prevent="addExperience">
								<span class="oi oi-plus"></span>
							</button>
							<button class="btn btn-link" @click.prevent="removeExperience">
								<span class="oi oi-minus"></span>
							</button>
						</span>
					</div>
					<div class="card-body no-tb-padding" :key="key" v-for="(experience, key) in experiences">
						<div class="row">
							<div class="col-md-12">
								<app-input v-model="experience.company" name="company" label="Company"/>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<app-input v-model="experience.position" name="position" label="Position"/>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<app-input v-model="experience.from" name="from" label="From" type="date"/>
							</div>
							<div class="col">
								<app-input v-model="experience.to" name="to" label="To" type="date"/>
							</div>
						</div>
						<app-text v-model="experience.description" name="description" label="Description" max="1000" />
						<hr v-if="experiences.length > 1">
					</div>
				</div>

				<!-- Skill -->
				<div class="card card-fluid">
					<div class="card-header">
						Skills
						<span class="push-right">
							<button class="btn btn-link" @click.prevent="addSkill">
								<span class="oi oi-plus"></span>
							</button>
							<button class="btn btn-link" @click.prevent="removeSkill">
								<span class="oi oi-minus"></span>
							</button>
						</span>
					</div>
					<div class="card-body no-tb-padding" :key="key" v-for="(skill, key) in skills">
						<div class="row">
							<div class="col">
								<app-input v-model="skill.title" name="skill" label="Skill"/>
							</div>
							<div class="col">
								<app-input v-model="skill.experiences" name="experiences" label="Years of experience"/>
							</div>
						</div>
					</div>
				</div>

				<!-- Language -->
				<div class="card card-fluid">
					<div class="card-header">
						Languages
						<span class="push-right">
							<button class="btn btn-link" @click.prevent="addLanguage">
								<span class="oi oi-plus"></span>
							</button>
							<button class="btn btn-link" @click.prevent="removeLanguage">
								<span class="oi oi-minus"></span>
							</button>
						</span>
					</div>
					<div class="card-body no-tb-padding" :key="key" v-for="(language, key) in languages">
						<div class="row">
							<div class="col">
								<app-input v-model="language.title" name="language" label="Language"/>
							</div>
							<div class="col">
								<app-input v-model="language.level" name="level" label="Level"/>
							</div>
						</div>
					</div>
				</div>

				<!-- Training -->
				<div class="card card-fluid">
					<div class="card-body">
						<app-text name="training" label="Training" max="1000" v-model="training"/>
					</div>
				</div>

				<div class="card card-fluid">
					<div class="card-body">
						<app-text name="reference" label="Reference" max="1000" v-model="reference"/>
					</div>
				</div>

				<div class="card card-fluid">
					<div class="card-body">
						<app-text name="hobby" label="Hobby" max="1000" v-model="hobby"/>
					</div>
				</div>

				<div class="card card-fluid">
					<div class="card-footer">
						<div class="card-footer-item card-footer-item-bordered card-link">
							<app-button type="submit">Save</app-button>
						</div>
					</div>
				</div>
			</form>
			
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		data(){
			return {
				title: '',
				training: '',
				hobby: '',
				reference: '',
				experiences: [
					{
						company: '',
						from: '',
						to: '',
						position: '',
						description: '',
					}
				],
				skills :[
					{
						title: '',
						experiences: '',
					}
				],
				languages :[
					{
						title: '',
						level: '',
					}
				],
				educations :[
					{
						qualification: '',
						university: '',
						field: '',
						from: '',
						to: '',
						description: '',
					}
				],
				preferrences: {
					industry: '',
					location: '',
					category: '',
					position: '',
					salary: '',
					term: '',
					availability: '',
					travel: '',
				},
				availability: [
					{id: 'Immediately Available', title: 'Immediately Available'},
					{id: '1 Month', title: '1 Month'},
					{id: '1 Week', title: '1 Week'},
					{id: '2 Weeks', title: '2 Weeks'},
					{id: '1 Month Above', title: '1 Month Above'}
				],
				travel: [
					{id: 'yes', title: 'Yes'},
					{id: 'no', title: 'No'},
				],
				career: {
					qualification: '',
					position: '',
					level: '',
					category: '',
					industry: '',
					salary: '',
					experience: '',
				},
				personal: {
					first_name: '',
					last_name: '',
					gender: '',
					dob: '',
					email: '',
					marital: '',
					mobile: '',
					nationality: '',
					address: '',
				}
			}
		},
		methods:{
			submit(){
				this.$store.commit('setLoading')
				axios.post('/api/resume/create', {
					title: this.title,
					training: this.training,
					hobby: this.hobby,
					reference: this.reference,
					experiences: this.experiences,
					skills: this.skills,
					languages: this.languages,
					educations: this.educations,
					preferrences: this.preferrences,
					personal: this.personal,
					career: this.career
				}).then((response) => {
					this.$router.replace('/jobseeker/resume')
				})
			},
			addExperience(){
				this.experiences.push({
					company: '',
					from: '',
					to: '',
					position: '',
					description: '',
				})
			},
			removeExperience(index){
			   this.experiences.splice(index, 1)
			},

			addSkill(){
				this.skills.push({
					title: '',
					experiences: '',
				})
			},
			removeSkill(index){
			   this.skills.splice(index, 1)
			},

			addLanguage(){
				this.languages.push({
					title: '',
					level: '',
				})
			},
			removeLanguage(index){
			   this.languages.splice(index, 1)
			},

			addEducation(){
				this.educations.push({
					qualification: '',
					university: '',
					field: '',
					from: '',
					to: '',
					description: '',
				})
			},
			removeEducation(index){
			   this.educations.splice(index, 1)
			}
		},
		computed: {
			...mapGetters({
				user: 'employer/getUser'
			})
		}
	}
</script>
<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Update your profile
			</h4>
			<div class="card-text col-md-6">
				<app-form commit="seeker/setUser" action="/api/seeker/profile" method="post">
					<template v-for="(item, key, index) in user">
						<app-input :value="item" name="name" label="Username" v-if="key == 'name'"/>

						<app-input :value="item" name="email" label="Email" v-if="key == 'email'"/>

						<app-input :value="item" name="first_name" label="First name" v-if="key == 'first_name'"/>

						<app-input :value="item" name="last_name" label="Last name" v-if="key == 'last_name'"/>

						<app-input :value="item" name="phone" label="Phone" v-if="key == 'mobile'"/>

						<app-input :value="item" name="nationality" label="Nationality" v-if="key == 'nationality'"/>

						<main-select :data="marital" :value="item" name="marital" label="Marital" v-if="key == 'marital'"/>

						<main-select :data="gender" :value="item" name="gender" label="Gender" v-if="key == 'gender'"/>

						<app-input type="date" :value="item" name="dob" label="Date of Birth" v-if="key == 'dob'"/>

						<app-text :value="item" name="address" label="Your Address" max="255" v-if="key == 'address'"></app-text>
					</template>
					
					<br>
					<app-button type="submit">Update</app-button>
					<br>
					<br>
				</app-form>
			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		data(){
			return {
				marital: [
					{ id: 'Single', title: 'Single' },
					{ id: 'Married', title: 'Married'}
				],
				gender: [
					{ id: 'Male', title: 'Male' },
					{ id: 'Female', title: 'Female'}
				]
			}
		},
		computed: {
			...mapGetters({
				user: 'seeker/getUser'
			})
		}
	}
</script>
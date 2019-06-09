<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Update your profile
			</h4>
			<div class="card-text col-md-6">
				<app-form action="/api/user/profile" method="post">
					<template v-for="(item, key, index) in user">
						<app-input :value="item" name="name" label="Name" v-if="key == 'name'"/>
						<app-input :value="item" name="email" label="Email" v-if="key == 'email'"/>
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
		computed: {
			...mapGetters({
				user: 'employer/getUser'
			})
		}
	}
</script>
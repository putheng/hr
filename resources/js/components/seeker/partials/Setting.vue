<template>
	<div class="dropdown">
		<button class="btn-account d-none d-md-flex" type="button" 
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="user-avatar user-avatar-md">
				<img :src="users.avatar" alt="">
			</span>
			<span class="account-summary pr-lg-4 d-none d-lg-block">
				<span class="account-name">{{ users.name }}</span>
				<span class="account-description">{{ users.role }}</span>
			</span>
		</button>
		<div class="dropdown-arrow dropdown-arrow-left"></div>
		<!-- .dropdown-menu -->
		<div class="dropdown-menu">
			<h6 class="dropdown-header d-none d-md-block d-lg-none"> {{ users.name }} </h6>
			<router-link class="dropdown-item" :to="{ name:'j-profile' }">
				<span class="dropdown-icon oi oi-person"></span>
				Profile
			</router-link>
			<app-log-out></app-log-out>
		</div>
		<!-- /.dropdown-menu -->
	</div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
	computed: {
		...mapGetters({
			users: 'seeker/getUser'
		})
	}
}
</script>
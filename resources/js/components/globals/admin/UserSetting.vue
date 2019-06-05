<template>
	<div class="dropdown">
		<button class="btn-account d-none d-md-flex" type="button" 
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="user-avatar user-avatar-md">
				<img src="/images/avatars/profile.jpg" alt="">
			</span>
			<span class="account-summary pr-lg-4 d-none d-lg-block">
				<span class="account-name">{{ username }}</span>
				<span class="account-description">{{ userrole }}</span>
			</span>
		</button>
		<div class="dropdown-arrow dropdown-arrow-left"></div>
		<!-- .dropdown-menu -->
		<div class="dropdown-menu">
			<h6 class="dropdown-header d-none d-md-block d-lg-none"> {{ username }} </h6>
			<a class="dropdown-item" href="#">
				<span class="dropdown-icon oi oi-person"></span>
				Profile
			</a>
			<a class="dropdown-item" href="#">
				<span class="dropdown-icon oi oi-account-logout"></span>
				Logout
			</a>
		</div>
		<!-- /.dropdown-menu -->
	</div>
</template>
<script>
export default {
	data(){
		return {
			username: '',
			userrole: ''
		}
	},
	mounted(){
		axios.get('/admin/api/user').then((response) => {
			this.username = response.data.name
			this.userrole = response.data.roles[0].name
		})
	},
}
</script>
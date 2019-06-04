<template>
	<header class="aside-header d-block d-md-none">
		<!-- .btn-account -->
		<button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
			<span class="user-avatar user-avatar-lg">
				<img src="/images/avatars/profile.jpg" alt="">
			</span>
			<span class="account-icon">
				<span class="fa fa-caret-down fa-lg"></span>
			</span>
			<span class="account-summary">
				<span class="account-name">Beni Arisandi</span>
				<span class="account-description">Marketing Manager</span>
			</span>
		</button> <!-- /.btn-account -->
		<!-- .dropdown-aside -->
		<div id="dropdown-aside" class="dropdown-aside collapse">
			<!-- dropdown-items -->
			<div class="pb-3">
				<a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
			</div>
			<!-- /dropdown-items -->
		</div>
		<!-- /.dropdown-aside -->
	</header>
</template>

<script>
	export default {

	}
</script>
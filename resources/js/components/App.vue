<template>
<div>
	<app-alert></app-alert>
<header class="app-header app-header-dark">
	<div class="top-bar">
		<div class="top-bar-brand">
			<a href="/" target="_blank">
				<img src="/images/logo-t.png" alt="" style="height: 32px;width: auto;">
			</a>
		</div>
		<div class="top-bar-list">
			<div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
				<button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
			</div>
			<div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
				<ul class="header-nav nav">
				</ul>
				<user-setting></user-setting>

			</div>
		</div>
	</div>
</header>
<aside class="app-aside app-aside-expand-md app-aside-light">
	<div class="aside-content">
		<left-user-setting></left-user-setting>
		<div class="aside-menu overflow-hidden">
			<left-menu></left-menu>
		</div>
		<main-footer></main-footer>
	</div>
</aside>
	<app-main></app-main>
</div>
</template>

<script>
	import { mapActions } from 'vuex'

	export default {
		methods: {
			...mapActions({
				fetchUser: 'admin/fetchUser'
			})
		},
		mounted(){
			this.fetchUser()
		},
	}
</script>
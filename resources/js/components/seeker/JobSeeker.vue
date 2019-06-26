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
				<button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
			</div>
			<div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
				
				<ul class="header-nav nav">
				</ul>

				<setting></setting>

			</div>
		</div>
	</div>
</header>
<aside class="app-aside app-aside-expand-md app-aside-light">
	<div class="aside-content">
		<left-user-setting></left-user-setting>
		<div class="aside-menu overflow-hidden">
			<seeker-left-menu></seeker-left-menu>
		</div>
		<main-footer></main-footer>
	</div>
</aside>
	<app-main></app-main>
</div>
</template>

<script>
	import { mapActions } from 'vuex'
	import SeekerLeftMenu from './partials/LeftMenu'
	import Setting from './partials/Setting'

	export default {
		methods: {
			...mapActions({
				fetchUser: 'seeker/fetchUser'
			})
		},
		mounted(){
			this.fetchUser()
		},
		components: {
			SeekerLeftMenu, Setting
		}
	}
</script>
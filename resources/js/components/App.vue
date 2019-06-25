<template>
<div>
	<app-alert></app-alert>
<!-- .app-header -->
<header class="app-header app-header-dark">
	<!-- .top-bar -->
	<div class="top-bar">
		<!-- .top-bar-brand -->
		<div class="top-bar-brand">
			<a href="index.html">
				<img src="/images/logo-t.png" alt="" style="height: 32px;width: auto;">
			</a>
		</div>
		<!-- /.top-bar-brand -->
		<!-- .top-bar-list -->
		<div class="top-bar-list">
			<!-- .top-bar-item -->
			<div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
				<!-- toggle menu -->
				<button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
			</div>
			<!-- /.top-bar-item -->
			<!-- .top-bar-item -->
			<!-- <main-search></main-search> -->
			<!-- /.top-bar-item -->
			<!-- .top-bar-item -->
			<div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
				<!-- .nav -->
				<ul class="header-nav nav">
					<!-- activities -->
					<!-- <activities></activities> -->
					<!-- /activities -->

					<!-- messages -->
					<!-- <messages></messages> -->
					<!-- /messages -->

					<!-- sheets -->
					<!-- <sheets></sheets> -->
					<!-- /sheets -->
				</ul>
				<!-- /.nav -->

				<!-- .btn-account -->
				<user-setting></user-setting>
				<!-- /.btn-account -->

			</div>
			<!-- /.top-bar-item -->
		</div>
		<!-- /.top-bar-list -->
	</div>
	<!-- /.top-bar -->
</header>
<!-- /.app-header -->
<!-- .app-aside -->
<aside class="app-aside app-aside-expand-md app-aside-light">
	<!-- .aside-content -->
	<div class="aside-content">
		<!-- .aside-header -->
		<left-user-setting></left-user-setting>
		<!-- /.aside-header -->
		<!-- .aside-menu -->
		<div class="aside-menu overflow-hidden">
			<!-- .stacked-menu -->
			<left-menu></left-menu>
			<!-- /.stacked-menu -->
		</div>
		<!-- /.aside-menu -->
		<!-- Footer -->
		<main-footer></main-footer>
		<!-- /footer -->
	</div>
	<!-- /.aside-content -->
</aside>
<!-- /.app-aside -->
<!-- .app-main -->
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
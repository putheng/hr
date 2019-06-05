<template>
	<nav id="stacked-menu" class="stacked-menu">
		<!-- .menu -->
		<ul class="menu">
			<!-- .menu-item -->
			<li class="menu-item">
				<router-link :to="{ name: 'admin' }" class="menu-link">
					<span class="menu-icon fas fa-home"></span>
					<span class="menu-text">Dashboard</span>
				</router-link>
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Packages</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{ name: 'create-package' }">
							Create
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
		</ul>
		<!-- /.menu -->
	</nav>
</template>
<script>
	export default {
		
	}
</script>
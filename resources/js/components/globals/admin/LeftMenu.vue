<template>
	<nav id="stacked-menu" class="stacked-menu">
		<!-- .menu -->
		<ul class="menu">
			<!-- .menu-item -->
			<li class="menu-item">
				<a href="index.html" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Level Menu</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<a href="#" class="menu-link">Menu item</a>
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
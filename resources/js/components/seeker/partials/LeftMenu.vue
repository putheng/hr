<template>
	<nav id="stacked-menu" class="stacked-menu">
		<!-- .menu -->
		<ul class="menu">
			<!-- .menu-item -->
			<li class="menu-item">
				<router-link :to="{ name: 'jobseeker' }" class="menu-link">
					<span class="menu-icon fas fa-home"></span>
					<span class="menu-text">Home</span>
				</router-link>
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link">
					<span class="menu-icon oi oi-list-rich"></span>
					<span class="menu-text">Resumes</span>
				</a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{ name:'j-resume' }">
							Resume
						</router-link>
						<router-link class="menu-link" :to="{ name:'j-create-resume' }">
							Create
						</router-link>
						<router-link class="menu-link" :to="{ name:'j-create-upload' }">
							Upload
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon fa fa-tasks"></span> <span class="menu-text">Jobs</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{ name:'j-listing-favorite' }">
							Favorite
						</router-link>
						<a href="/listings" target="_blank" class="menu-link">Jobs Search</a>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon fas fa-wrench"></span> <span class="menu-text">Setting</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{ name:'j-profile' }">
							Profile
						</router-link>
						<router-link class="menu-link" :to="{ name:'j-password' }">
							Password
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item">
				<a href="#" class="menu-link" @click.prevent="submit">
					<span class="menu-icon fas fa-lock"></span>
					<span class="menu-text">Logout</span>
				</a>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
		</ul>
		<!-- /.menu -->
	</nav>
</template>
<script>
export default {
	methods : {
	    submit(){
	    	document.getElementById("logout-form").submit()
	    }
	}
}
</script>
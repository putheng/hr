<template>
	<nav id="stacked-menu" class="stacked-menu">
		<!-- .menu -->
		<ul class="menu">
			<!-- .menu-item -->
			<li class="menu-item">
				<router-link :to="{ name: 'employer' }" class="menu-link">
					<span class="menu-icon fas fa-home"></span>
					<span class="menu-text">Dashboard</span>
				</router-link>
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Listings</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<a href="" class="menu-link">Listings</a>
						<a href="" class="menu-link">Create listing</a>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon oi oi-folder"></span> <span class="menu-text">Package</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{ name:'my-packages' }">
							My Packages
						</router-link>
						<router-link class="menu-link" :to="{ name:'buy-package' }">
							Buy Packages
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon fas fa-money-check-alt"></span> <span class="menu-text">Payments</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{ name:'my-wallet' }">
							My Wallet
						</router-link>
						<router-link class="menu-link" :to="{ name:'my-deposit' }">
							Deposit
						</router-link>
						<router-link class="menu-link" :to="{ name:'my-transaction' }">
							Transactions
						</router-link>
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
						<router-link class="menu-link" :to="{ name:'my-profile' }">
							Profile
						</router-link>
						<router-link class="menu-link" :to="{ name:'company-profile' }">
							Company
						</router-link>
						<router-link class="menu-link" :to="{ name:'change-password' }">
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
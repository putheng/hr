<template>
<div class="section-block">
	<h4 class="section-title">Payment Transactions</h4>

	<div class="card card-fluid">
		<div class="card-header border-0">
			<div class="d-flex align-items-center">
				<span class="mr-auto">Wallet</span>
				<div class="dropdown">
					<button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
					<div class="dropdown-arrow"></div>
					<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: top, left; top: 36px; left: 36px;">
						<a href="#" class="dropdown-item">Date</a>
						<a href="#" class="dropdown-item">Gateway</a>
						<a href="#" class="dropdown-item">Amount</a>
						<a href="#" class="dropdown-item">Status</a>
					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="thead-">
					<tr>
						<th> DATE </th>
						<th> Gateway </th>
						<th> AMOUNT </th>
						<th> TRANSACTION CODE </th>
						<th> STATUS </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Wednesday 5th of December 2018 05:04:55 PM</td>
						<td> Truemoney </td>
						<td> $30.00 </td>
						<td> 12345678 </td>
						<td> complete </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</template>

<script>
	export default {
		
	}
</script>
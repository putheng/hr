<template>
	<div class="modal modal-alert fade" :id="id" data-backdrop="static" tabindex="-1" role="dialog" :aria-labelledby="id" aria-hidden="true">
		<!-- .modal-dialog -->
		<div class="modal-dialog" role="document">
			<!-- .modal-content -->
			<div class="modal-content">
				<!-- .modal-header -->
				<div class="modal-header">
					<h5 id="exampleModalAlertDangerLabel" class="modal-title">
						<i class="fa fa-exclamation-triangle text-red mr-1"></i> {{ title }}
					</h5>
				</div>
				<!-- /.modal-header -->
				<!-- .modal-body -->
				<div class="modal-body">
					<p class="text-center">
						Are you sure you want to permanently delete this file ?
					</p>
				</div>
				<!-- /.modal-body -->
				<!-- .modal-footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				</div>
				<!-- /.modal-footer -->
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
</template>
<script>
export default {
	props: {
		id: {
			required: true,
			type: String
		},
		title: {
			required: true,
			type: String
		}
	},
}
</script>
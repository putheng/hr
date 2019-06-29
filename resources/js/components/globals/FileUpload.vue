<template>
	<div class="avatar-uploadx">
	    <div class="avatar-editx">
	        <input 
	        	@change="readURL"
	        	type='file'
	        	:accept="accept"
	         />
	    </div>
	    <br>
	    <div>
	    	<img style="width:100%" id="imagePreview">
	    </div>

	</div>
</template>

<script>
	export default {
		props: {
			accept: {
				required: false,
				type: String,
				default: '.png, .jpg, .jpeg'
			},
			
		},
		methods: {
			readURL(e) {
			    if (e.target.files && e.target.files[0]) {
				    
			        var reader = new FileReader()

			        reader.onload = function(e) {
			            $('#imagePreview').attr('src', e.target.result)
			            $('#imagePreview').hide()
			            $('#imagePreview').fadeIn(650)
			        }

			        reader.readAsDataURL(e.target.files[0])
			    }
			},
		}
	}
</script>

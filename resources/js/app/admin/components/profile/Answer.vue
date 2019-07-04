<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Create Question & Answer
			</h4>
			<br>
			<div class="card-text col-md-12">
				<app-form commit="admin/setQuestion" action="/api/admin/question" method="post">
					<app-input class="col-md-6" name="question" label="Question"/>

					<app-text name="answer" label="Answer" max="1000"/>

					<app-button type="submit">Submit</app-button>
				</app-form>
			</div>
		</div>
	</div>

<div class="card">
	<div class="card-body">
		<h3 class="card-title"> All Packages </h3>

		<table class="table">
			<thead>
				<th>#</th>
				<th>Question</th>
				<th>Answer</th>
				<th></th>
			</thead>
			<tbody>
				<template v-if="question.length">
					<tr v-for="(item, key) in question" :key="key">
						<td>{{ item.id }}</td>
						<td>{{ item.question }}</td>
						<td>{{ item.answer_short }}</td>
						<td>
							<a href="#" class="btn btn-sm btn-icon btn-secondary"
								data-toggle="modal"
								:data-target="'#'+ convertToID(item.id)+'edit'">
								<i class="fa fa-pencil-alt"></i>
								<span class="sr-only">Edit</span>
							</a>
							<app-modal 
								commit="admin/setQuestion"
								:key="key" :data="{id:item.id}"
								:option="{ title: 'Update', url: '/api/admin/question/edit'}"
								cancel="Close" :id="convertToID(item.id) +'edit'" :title="'Update'" >
								<h6>{{ item.question }}</h6>
								<app-input :value="item.question" name="question" label="Question"/>
								<app-text max="1000" :value="item.answer" name="answer" label="Answer"/>
							</app-modal>
							
							<a href="#" class="btn btn-sm btn-icon btn-secondary"
									data-toggle="modal"
								:data-target="'#'+ convertToID(item.id)">
								<i class="far fa-trash-alt"></i>
								<span class="sr-only">Remove</span>
							</a>
							<app-modal 
								commit="admin/setQuestion"
								:key="item.id" :data="{id:item.id}"
								:option="{ title: 'Delete', url: '/api/admin/question/delete'}"
								cancel="Close" :id="convertToID(item.id)" :title="'Delete ?'" >
								<h6>Question id: {{ item.id }}</h6>
							</app-modal>
						</td>
					</tr>
				</template>

				<template v-else>
					<tr>
						<td colspan="6">
							<p class="text-center">No any Q&A</p>
						</td>
					</tr>
				</template>
			</tbody>
		</table>
	</div>
</div>
</div>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		methods: {
	        ...mapActions({
	        	fetch: 'admin/fetchQuestion'
	        }),
	        convertToID(text){
			    return 'ab'+ text + 'ab'
			}
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors',
				question: 'admin/getQuestion'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>
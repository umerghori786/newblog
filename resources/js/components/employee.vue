<template>
	<div class="container p-5">
		<table class="table table-bordered">
			<thead>
				<th>Name</th>
				<th>description</th>
				<th>Action</th>
			</thead>
			<tbody>
				<template v-for="employee in employees" :key="employee.id">
					<tr>	
					<td>{{employee.name}}</td>
					<td>{{employee.description}}</td>
					<td>Edit</td>
					</tr>
				</template>
				
			</tbody>
		</table>
	</div>
</template>
<script type="text/javascript">
	import { ref , onMounted} from 'vue';
	import axios from 'axios';
	export default {
		setup(){
			const employees = ref([]);
			const getEmployee = async() => {
				let res  = await axios.get('api/product');
				employees.value = res.data;
			}

			onMounted(getEmployee());
			return {
				employees
			}


		}
	}
</script>
 <section id="" class="d-flex align-items-center">
<main id="main">
	<div class="container-fluid">
	<div class="heading_container">
          <h2>
             <span>Bus List</span>
          </h2>
          <p>
		  Choose from our diverse selection of well-maintained buses, ensuring a comfortable and hassle-free journey for every traveler. Whether you're commuting,
		   traveling with family, or exploring new destinations, our fleet provides reliable transportation solutions tailored to your needs. Start your adventure with us today!
          </p>
        </div>
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-12">
					<button class="float-right btn btn-success btn-md" type="button" id="new_bus">Add New <i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="card col-md-12 border-0">
					
					<div class="card-body">
						<table class="table-borderless" id="bus-field">
						<colgroup>
								<col width="5%">
								<col width="10%">
								<col width="40%">
								<col width="20%">
							</colgroup>
						<thead class='thead-light'>
								<tr>
									<th >#</th>
									<th >Bus Registration</th>
									<th >Bus Name</th>
									<th >Action</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</main>
</section>
<script>
	$('#new_bus').click(function(){
		uni_modal('Add New Bus','manage_bus.php')
	})
	window.load_bus = function(){
		$('#bus-field').dataTable().fnDestroy();
		$('#bus-field tbody').html('<tr><td colspan="4" class="text-center">Please wait...</td></tr>')
		$.ajax({
			url:'load_bus.php',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','danger');
			},
			success:function(resp){
				if(resp){
					if(typeof(resp) != undefined){
						resp = JSON.parse(resp)
							if(Object.keys(resp).length > 0){
								$('#bus-field tbody').html('')
								var i = 1 ;
								Object.keys(resp).map(k=>{
									var tr = $('<tr></tr>');
									tr.append('<td >'+(i++)+'</td>')
									tr.append('<td >'+resp[k].bus_number+'</td>')
									tr.append('<td>'+resp[k].name+'</td>')
									tr.append('<td><button class="btn btn-sm btn-info edit_bus mr-2" data-id="'+resp[k].id+'">Edit</button><button class="btn btn-sm btn-danger remove_bus" data-id="'+resp[k].id+'">Delete</button></td>')
									$('#bus-field tbody').append(tr)

								})

							}else{
								$('#bus-field tbody').html('<tr><td colspan="4" class="text-center"><b>No data found, Sorry :(</b>.</td></tr>')
							}
					}
				}
			},
			complete:function(){
				$('#bus-field').dataTable()
				manage();
			}
		})
	}
	function manage(){
		$('.edit_bus').click(function(){
		uni_modal('Edit New Bus','manage_bus.php?id='+$(this).attr('data-id'))

		})
		$('.remove_bus').click(function(){
		_conf('Are you sure to delete this data?','remove_bus',[$(this).attr('data-id')])

		})
	}
	function remove_bus($id=''){
		start_load()
		$.ajax({
			url:'delete_bus.php',
			method:'POST',
			data:{id:$id},
			error:err=>{
				console.log(err)
				alert_toast("An error occured","danger");
				end_load()
			},
			success:function(resp){
				if(resp== 1){
					alert_toast("Data succesfully deleted","success");
					end_load()
					$('.modal').modal('hide')
					load_bus()
				}
			}
		})
	}
	$(document).ready(function(){
		load_bus()
	})
</script>
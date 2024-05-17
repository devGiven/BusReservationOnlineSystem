 <section id="" class="d-flex align-items-center">
<main id="main">
<!-- schedule section -->

	<div class="container-fluid">
	<div class="heading_container">
          <h2>
             <span>Bus Schedule List</span>
          </h2>
          <p>
          a comprehensive timetable detailing the departure and arrival times,
							 routes, and any additional pertinent information for a public transportation service.
							 It serves as a reference guide for passengers, allowing them to plan their journeys efficiently and effectively.
          </p>
        </div>

		<div class="col-lg-12">
			<?php  if(isset($_SESSION['admin_login_id'])): ?>
			<div class="row">
				<div class="col-md-12">
					<button class="float-right btn btn-success btn-md" type="button" id="new_schedule">Add New <i class="fa fa-plus"></i></button>
				</div>
			</div>
				<?php endif; ?>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="card col-md-12 border-0">					
					<div class="card-body">
						<table class="table-borderless" id="schedule-field">
							<colgroup>
								<col width="5%">
								<col width="10%">
								<col width="15%">
								<col width="25%">
								<col width="10%">
								<col width="10%">
								<col width="10%">
								<col width="5%">
								<col width="10%">
							</colgroup>
							<thead class="thead-light">
								<tr>
									<th >#</th>
									<th>Date</th>
									<th >Bus</th>
									<th >Location</th>
									<th >Departure</th>
									<th >ETA</th>
									<th >Availability</th>
									<th >Price</th>
									<th >Actions</th>
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



  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved 
       
      </p>
    </div>
  </section>

<script>
	$('#new_schedule').click(function(){
		uni_modal('Add New Schedule','manage_schedule.php')
	})
	window.load_schedule = function(){
		$('#schedule-field').dataTable().fnDestroy();
		$('#schedule-field tbody').html('<tr><td colspan="7" class="text-center">Please wait...</td></tr>')
		$.ajax({
			url:'load_schedule.php',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','danger');
			},
			success:function(resp){
				if(resp){
					if(typeof(resp) != undefined){
						resp = JSON.parse(resp)
							if(Object.keys(resp).length > 0){
								$('#schedule-field tbody').html('')
								var i = 1 ;
								Object.keys(resp).map(k=>{
									var tr = $('<tr></tr>');
									tr.append('<td>'+(i++)+'</td>')
									tr.append('<td class="">'+resp[k].date+'</td>')
									tr.append('<td class="">'+resp[k].bus+'</td>')
									tr.append('<td class="">'+resp[k].from_location+' - '+resp[k].to_location+'</td>')
									tr.append('<td>'+resp[k].time+'</td>')
									tr.append('<td>'+resp[k].eta+'</td>')
									tr.append('<td>'+resp[k].availability+'</td>')
									tr.append('<td>R'+resp[k].price+'</td>')
									if('<?php echo isset($_SESSION['admin_login_id']) ? 1 : 0 ?>' == 1){

									tr.append('<td><center><button class="btn btn-sm btn-info edit_schedule mr-2" data-id="'+resp[k].id+'">Edit</button><button class="btn btn-sm btn-danger remove_schedule" data-id="'+resp[k].id+'">Delete</button></center></td>')
									}else{
										tr.append('<td><center><button class="btn btn-sm btn-info mr-2 text-white book_now" data-id="'+resp[k].id+'"> Reserve ticket </button></center></td>')
									}
									$('#schedule-field tbody').append(tr)

								})

							}else{
								$('#schedule-field tbody').html('<tr><td colspan="7" class="text-center"><b>No data found :(</b>.</td></tr>')
							}
					}
				}
			},
			complete:function(){
				$('#schedule-field').dataTable()
				manage();
				$('.book_now').click(function(){
					uni_modal('Reservation Details','customer_book.php?id='+$(this).attr('data-id'),1)
				})
			}
		})
	}
	function manage(){
		$('.edit_schedule').click(function(){
		uni_modal('Edit New Schedule','manage_schedule.php?id='+$(this).attr('data-id'))

		})
		$('.remove_schedule').click(function(){
		_conf('Are you sure to delete this data?','remove_schedule',[$(this).attr('data-id')])

		})
	}
	function remove_schedule($id=''){
		start_load()
		$.ajax({
			url:'delete_schedule.php',
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
					load_schedule()
				}
			}
		})
	}
	$(document).ready(function(){
		load_schedule()
	})
</script>
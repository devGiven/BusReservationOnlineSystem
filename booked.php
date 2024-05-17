 <section id="" class="d-flex align-items-center">
<main id="main">
	<div class="container-fluid">
	<div class="heading_container">
          <h2>
             <span>Reservations</span>
          </h2>
          <p>
		  Choose from our diverse selection of well-maintained buses, ensuring a comfortable and hassle-free journey for every traveler. Whether you're commuting,
		   traveling with family, or exploring new destinations, our fleet provides reliable transportation solutions tailored to your needs. Start your adventure with us today!
          </p>
        </div>

		<div class="col-lg-12">
			<?php  if(isset($_SESSION['admin_login_id'])): ?>
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>
		<?php endif; ?>
			<!-- <div class="row">
				&nbsp;
			</div> -->
			<div class="row">
			<!-- <h4 style="color:black;">List of Reservations</h4> -->
				<div class="card col-md-12 border-0">

					
					<div class="card-body">
						<table class="table-borderless" id="booked-field">
							
							<thead class='thead-light'>
								<tr>
									<th>#</th>
									<th>Ref. No.</th>
									<th>Name</th>
									<th>Qty</th>
									<th>Total Amt</th>
									<th>Status</th>
									<th>Action</th>
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
	$('#new_schedule').click(function(){
		uni_modal('Add New Schedule','manage_schedule.php')
	})
	window.load_booked = function(){
		$('#booked-field').dataTable().fnDestroy();
		$('#booked-field tbody').html('<tr><td colspan="7" class="text-center">Please wait...</td></tr>')
		$.ajax({
			url:'load_booked.php',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','danger');
			},
			success:function(resp){
				if(resp){
					if(typeof(resp) != undefined){
						resp = JSON.parse(resp)
							if(Object.keys(resp).length > 0){
								$('#booked-field tbody').html('')
								var i = 1 ;
								Object.keys(resp).map(k=>{
									var tr = $('<tr></tr>');
									tr.append('<td class="text-center">'+(i++)+'</td>')
									tr.append('<td class="">'+resp[k].ref_no+'</td>')
									tr.append('<td class="">'+resp[k].name+'</td>')
									tr.append('<td class="">'+resp[k].qty+'</td>')
									tr.append('<td class="">R'+resp[k].amount+'</td>')
									tr.append('<td class="">'+(resp[k].status == 1 ? 'Paid' :'Unpaid')+'</td>')
									
										tr.append('<td><center><button class="btn btn-sm btn-info mr-2 text-white edit_booked" data-id="'+resp[k].schedule_id+'" data-bid="'+resp[k].id+'">Edit</button></center></td>')
									$('#booked-field tbody').append(tr)

								})

							}else{
								$('#booked-field tbody').html('<tr><td colspan="7" class="text-center"><b>THEREs NO DATA HERE!!</b></td></tr>')
							}
					}
				}
			},
			complete:function(){
				$('#booked-field').dataTable()
				$('.edit_booked').click(function(){
					uni_modal('Edit Reservation','customer_book.php?id='+$(this).attr('data-id')+'&bid='+$(this).attr('data-bid'),1)
				})
			}
		})
	}
	
	$(document).ready(function(){
		load_booked()
	})
</script>
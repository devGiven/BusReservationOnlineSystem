 <section id="" class="d-flex align-items-center">
<main id="main">
  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container-fluid ">
        <div class="heading_container">
          <h2>
             <span>Our Services</span>
          </h2>
          <p>
          Discover a world of convenience with our comprehensive range of services designed to elevate your travel experience. 
          </p>
        </div>
        <div class="row">
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="assets/img/n1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Wide Range of Destinations 
                </h5>
                <p>
                  <small><b>Explore the Nation with Ease</b></small><br>

                  Our online bus reservation system offers access to a vast network of routes, connecting you to cities,
                   towns, and tourist destinations across the country. Whether you're heading to a bustling metropolis or
                    a remote getaway, we've got you covered with options to suit every traveler's needs.
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="assets/img/n2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Flexible Ticket Options
                </h5>
                <p>
                <small><b>Your Journey Starts Here</b></small><br>
                With our flexible ticketing options, you can choose the type of fare that best fits your travel plans. 
                Whether you need a one-way ticket, a round trip, or a multi-destination itinerary, our system allows you to
                 customize your journey according to your preferences and schedule.
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="assets/img/n3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Real-Time Updates and Notifications
                </h5>
                <p>
                <small><b>Stay Informed, Stay on Track</b></small><br>
                Stay informed every step of the way with our real-time updates and notifications. Receive instant
                 alerts about changes to your bus schedule, gate assignments, and other important information, 
                 ensuring that you're always in the loop and ready to embark on your adventure.
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="assets/img/n4.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                24/7 Customer Support
                </h5>
                <p>
                <small><b>Assistance When You Need It</b></small><br>
                We understand that travel plans can sometimes change unexpectedly, which is why our 
                dedicated customer support team is available around the clock to assist you with any questions or concerns. Whether you need help with booking modifications,
                 seat assignments, or general inquiries, our friendly and knowledgeable staff are here to 
                 provide prompt assistance and ensure a smooth and enjoyable travel experience.
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
									tr.append('<td class="text-center">'+(i++)+'</td>')
									tr.append('<td class="">'+resp[k].date+'</td>')
									tr.append('<td class="">'+resp[k].bus+'</td>')
									tr.append('<td class="">'+resp[k].from_location+' - '+resp[k].to_location+'</td>')
									tr.append('<td>'+resp[k].time+'</td>')
									tr.append('<td>'+resp[k].eta+'</td>')
									tr.append('<td>'+resp[k].availability+'</td>')
									tr.append('<td>$'+resp[k].price+'</td>')
									if('<?php echo isset($_SESSION['admin_login_id']) ? 1 : 0 ?>' == 1){

									tr.append('<td><center><button class="btn btn-sm btn-info edit_schedule mr-2" data-id="'+resp[k].id+'">Edit</button><button class="btn btn-sm btn-danger remove_schedule" data-id="'+resp[k].id+'">Delete</button></center></td>')
									}else{
										tr.append('<td><center><button class="btn btn-sm btn-info mr-2 text-white book_now" data-id="'+resp[k].id+'"><strong>Reserve</strong></button></center></td>')
									}
									$('#schedule-field tbody').append(tr)

								})

							}else{
								$('#schedule-field tbody').html('<tr><td colspan="7" class="text-center"><b>THEREs NO DATA HERE!!</b>.</td></tr>')
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
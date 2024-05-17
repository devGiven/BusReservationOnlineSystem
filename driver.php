<section id="" class="d-flex align-items-center">
<main id="main">
	<div class="container-fluid">
	<div class="heading_container">
          <h2>
             <span>Our Drivers</span>
			 <img src="/assets/img/drivers/driver1.png" alt="">
			 
          </h2>
          <p>
		  Integration with multiple bus operators for a wide range of options
          </p>
        </div>
		<div class="col-lg-12">
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="card col-md-12 border-0">
					
					<div class="card-body">
					<table class="table-borderless" id="driver-field">
							<colgroup>
								<col width="2%">
								<col width="10%">
								<col width="15%">
								<col width="15%">
								<col width="15%">
							</colgroup>
							<thead class="thead-light">
								<tr>
									<th >#</th>
									<th>Picture</th>
									<th>Name</th>
									<th>Licence no</th>
									<th></th>

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
	window.load_driver = function(){
		$('#driver-field').dataTable().fnDestroy();
		$('#driver-field tbody').html('<tr><td colspan="4" class="text-center"> Data loading, please wait...</td></tr>')
		$.ajax({
			url:'load_driver.php',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','danger');
			},
			success:function(resp){
				if(resp){
					if(typeof(resp) != undefined){
						resp = JSON.parse(resp)
							if(Object.keys(resp).length > 0){
								$('#driver-field tbody').html('')
								var i = 1 ;
								var x = 1;
								Object.keys(resp).map(k=>{
									var st = ""; 
									if (resp[k].status == 1) {
										st = "assets/img/status/active.png";
									} else {
										st = "assets/img/status/offline.png";
									}
									var tr = $('<tr></tr>');
									//tr.append('<td >'+(i++)+'</td>')
									// <img src="assets/img/drivers/driver1.png" alt="Girl in a jacket" width="70" height="80">
									// assets/img/driver1.png
									tr.append('<td> <img src="'+resp[k].image+(x++)+'.png"  alt="id picture" width="70" height="80"> </td>') 
									//tr.append('<td>' ++'</td>')
									//tr.append('<td>'+resp[k].image+(x++)+'.png</td>')
									tr.append('<td>'+resp[k].name+'</td>')
									tr.append('<td >'+resp[k].license_number+'</td>')
									tr.append('<td ><img src="'+st+'"  alt="id picture" ></td>')
									/* tr.append('<td><button class="btn btn-sm btn-info edit_bus mr-2" data-id="'+resp[k].id+'">Edit</button><button class="btn btn-sm btn-danger remove_bus" data-id="'+resp[k].id+'">Delete</button></td>')*/
									$('#driver-field tbody').append(tr)

								})

							}else{
								$('#driver-field tbody').html('<tr><td colspan="4" class="text-center"><b>No data found, Sorry :(</b>.</td></tr>')
							}
					}
				}
			},
			complete:function(){
				$('#driver-field').dataTable()
				manage();
			}
		})
	}
	$(document).ready(function(){
		load_driver()
	})
</script>
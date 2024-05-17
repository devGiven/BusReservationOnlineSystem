<?php
include('db_connect.php');
if(isset($_GET['id']) && !empty($_GET['id']) ){
	$qry = $conn->query("SELECT * FROM users where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $val){
		$meta[$k] =  $val;
	}
}
?>
<style>
    body{
        background-image: url('assets/img/background.jpg');
    }
</style>
 <!-- <div class="container-fluid">
	<form id="adding_user">
		<div class="col-md-12">
			<div class="form-group mb-2">
				<label for="name" class="control-label">Name</label>
				<input type="hidden" class="form-control" id="id" name="id" value='<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>' required="">
				<input type="text" class="form-control" id="name" name="name" required="" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>">
			</div>
			<div class="form-group mb-2">
				<label for="username" class="control-label">User Name</label>
				<input type="text" class="form-control" id="username" name="username" required value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>">
			</div>
			<div class="form-group mb-2">
				<label for="password" class="control-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" required value="<?php echo isset($meta['password']) ? $meta['password'] : '' ?>">
                <button class="button" type="submit" >Login</button>
			</div>
		</div>
	</form>
</div> -->



<div id='login-body'>
    		<div class="card col-md-4 offset-md-4 mt-4">
                <div class="card-header-edge text-white">
                    <strong>Login</strong>
                </div>
            <div class="card-body">
                     <form id="adding_user">
                     <p><b>Hellooooo :)</b><br><b></b><small  style="color: red;">Fill in form to register..</small></b></p>
                        <div class="form-group">
                            <label for="name" class="control-label">Full Name</label>
                            <input type="hidden" class="form-control" id="id" name="id" value='<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>' required="">
                            <input type="text" class="form-control" id="name" name="name" required="" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <input type="email" class="form-control" id="username" name="username" required value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>">
                        </div>
                        <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required value="<?php echo isset($meta['password']) ? $meta['password'] : '' ?>">
                        </div> 
                        <div class="form-group text-right">
                            <button class="btn btn-success btn-block" name="submit">Register</button>
							<br>
                        </div>
                    </form>
            </div>
        </div>
</div>


<script>
	$('#adding_user').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'./save_new_user.php',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
    			end_load()
    			alert_toast('An error occured','danger');
			},
			success:function(resp){
				if(resp == 1){
    				end_load()
    				$('.modal').modal('hide')
    				alert_toast('You have successfully registered','success');
    				load_user()
				}
			}
		})
	})
</script>
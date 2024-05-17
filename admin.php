
<!DOCTYPE html>
<html>
	<head>
		<?php include('header.php') ?>
        <?php 
        // session_start();
        // if(isset($_SESSION['admin_login_id'])){
        //     header('Location:home.php');
        // }
        ?>
	</head>
    <style>
        body {
            body{
                background-image: url('assets/img/background.jpg');
            }
        }
    </style>


	<body id='login-body' class="bg-light">
    		<div class="card col-md-4 offset-md-4 mt-4">
                <div class="card-header-edge text-white">
                    <strong>Login</strong>
                </div>
            <div class="card-body">
                     <form id="login-frm">
                     <p><b>Hellooooo :)</b><br><b></b><small style="color: red;">Log in as admin....</small></b></p>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="email" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div> 
                        <div class="form-group text-right">
                            <button class="btn btn-success btn-block" name="submit">Login</button>
							<br>
							<a href="./index.php">Back to Home</a>
                        </div>
                        
                    </form>
            </div>
        </div>

		</body>

        <script>
            $(document).ready(function(){
                $('#login-frm').submit(function(e){
                    e.preventDefault()
                    $('#login-frm button').attr('disable',true)
                    $('#login-frm button').html('Checking details...')

                    $.ajax({
                        url:'./login_auth.php',
                        method:'POST',
                        data:$(this).serialize(),
                        error:err=>{
                            console.log(err)
                            alert('An error occured');
                            $('#login-frm button').removeAttr('disable')
                            $('#login-frm button').html('Login')
                        },
                        success:function(resp){
                            if(resp == 1){
                                location.replace('index.php?page=home')
                            }else{
                                alert("Incorrect username or password.")
                                $('#login-frm button').removeAttr('disable')
                                $('#login-frm button').html('Login')
                            }
                        }
                    })

                })
            })
        </script>
</html>
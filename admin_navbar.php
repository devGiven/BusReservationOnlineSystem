




  <header class="header_section">
      <div class="header_top">
        <div class="container-fluid ">
          <div class="contact_nav">
            <a href="">
              <span>
              Admininstrator
              </span>
            </a>
            <a href="mailto:busreservation.suport@gmail.com">
              <span>
               
              </span>
            </a>
            <a href="">
              <span>
                
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">

        
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="./index.php?page=home">
              <span>
                Bus Reservation Online System 
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item">
                  <a class="nav-link" href="./index.php?page=home">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./index.php?page=booked">Reservations</a>
                </li>
                <li class="dropdown nav-bus nav-location"><a style="color:black;" href="#">Manage</a>
                    <div class="dropdown-content">
                      <a  href="./index.php?page=schedule"> Schedule</a>
                      <a href="./index.php?page=bus">Buses</a>
                      <a href="./index.php?page=driver">Drivers</a>
                      <a href="./index.php?page=location">Location</a>  
                  </div>
                </li> 

                <li class="dropdown nav-bus nav-location"><a style="color:red;" href="#"><?php echo $_SESSION['admin_login_name'] ?></a>
                    <div class="dropdown-content">
                       <a href="./index.php?page=user">Manage Users</a>
                    <a href="./logout.php" style="color:red; font-weight:bold;">Logout</a>
                     
                    </div>
                </li> 

             
            </ul>
          </li>

                <form class="form-inline">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </form>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>

  <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>';
      if(page != ''){
        $('#top-nav li').removeClass('active')
        $('#top-nav li.nav-'+page).addClass('active')
      }
      $('#manage_account').click(function(){
      uni_modal('Manage Account','manage_account.php')
  })
    })

  </script>
  <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>';
      if(page != ''){
        $('#top-nav li').removeClass('active')
        $('#top-nav li.nav-'+page).addClass('active')
      }
      $('#manage_account').click(function(){
      uni_modal('Manage Account','manage_account.php')
  })
    })

  </script>
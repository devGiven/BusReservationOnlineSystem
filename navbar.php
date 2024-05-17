<header class="header_section">
      <div class="header_top">
        <div class="container-fluid ">
          <div class="contact_nav">
            <a href="">
              <span>
                Call : +27 12 345 6789
              </span>
            </a>
            <a href="mailto:busreservation.suport@gmail.com">
              <span>
                Email : busreservation.suport@gmail.com
              </span>
            </a>
            <a href="">
              <span>
                Location
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
                <?php if(isset($_SESSION['user_login_id'])): ?>
                <li class="nav-item ">
                  <a class="nav-link" href="./index.php?page=schedule">View Bus Schedule</a>
                </li>
               
                <li class="nav-item ">
                  <a class="nav-link" href="./index.php?page=driver">View Drivers</a>
                </li>
                <?php else: ?>
                <?php endif; ?>

                <li class="nav-item">
                  <a class="nav-link" href="./index.php?page=service">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./index.php?page=about"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./index.php?page=contact">Contact Us</a>
                </li>

                <?php if(!isset($_SESSION['user_login_id'])): ?>
                <li class="dropdown nav-bus nav-location"><a style="color:black;" href="#">Login</a>
                    <div class="dropdown-content">
                      <a  href="./index.php?page=admin"> Admin</a>
                      <a  href="./index.php?page=login"> User</a>
                      <a  href="./index.php?page=register"> Register</a>
                  </div>
                </li> 
                <?php else: ?>

                  <li class="nav-item">
                    <a class="nav-link" href="./user_logout.php" style="color:red; font-weight:bold;">Logout</a>
                  </li>

                <?php endif; ?>

                
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
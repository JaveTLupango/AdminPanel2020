<aside class="main-sidebar sidebar-dark-primary elevation-4">
 
    <!-- Brand Logo -->
    <a href="<?php echo($url) ?>/home/home" class="brand-link">
      <img src="https://raw.githubusercontent.com/PanggaJave/aa/f1d7a8769960fc98d48be89147c9139a68923d16/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminPanel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library --> 
          <?php
              $aside_access = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "usertype", $_SESSION["username"]);
              if($aside_access == "client")
              {
                echo '
                <li class="nav-item">
                  <a href="'.$url.'/home/home" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Home
                    </p>
                  </a>
                </li>  

              <li class="nav-item">
                <a href="'.$url.'/home/viewalluser" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    View total user
                  </p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="'.$url.'/home/viewactiveuser" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    View Active users
                  </p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="'.$url.'/home/setting" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Setting
                  </p>
                </a>
              </li>  

              <li class="nav-item">
                <a href="'.$url.'/home/history" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    History
                  </p>
                </a>
              </li> 

                ';
              }
              else
              {
                echo '
                <li class="nav-item">
                <a href="'.$url.'/home/home" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Home
                  </p>
                </a>
              </li>  
    
              <li class="nav-item">
                <a href="'.$url.'/home/viewalluser" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    View total user
                  </p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="'.$url.'/home/viewclient" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    View total client
                  </p>
                </a>
              </li>    

              <li class="nav-item">
                <a href="'.$url.'/home/addbulkuser" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Add bulk user
                  </p>
                </a>
              </li>  
    
              <li class="nav-item">
                <a href="'.$url.'/home/addquickuser" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Add Quick user
                  </p>
                </a>
              </li>  
    
              <li class="nav-item">
                <a href="'.$url.'/home/viewactiveuser" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    View Active users
                  </p>
                </a>
              </li>  
    
              <li class="nav-item">
                <a href'.$url.'/home/viewblockuser" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    View Block users
                  </p>
                </a>
              </li>  
    
              <li class="nav-item">
                <a href="'.$url.'/home/viewreseller" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    View Reseller
                  </p>
                </a>
              </li>          
    
              <li class="nav-item">
                <a href="'.$url.'/home/setting" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Setting
                  </p>
                </a>
              </li>  
    
              <li class="nav-item">
                <a href="'.$url.'/home/history" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    History
                  </p>
                </a>
              </li>    
                ';
              }

          ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
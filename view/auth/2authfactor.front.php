<div class="login-box">
  <?php include 'view/auth/auth.name.jtl';
  $get_data = $_GET["data2"];
  
   $c_Del->deleteRecord($conn, "UPDATE 2authfactorlogs SET status='inactive' WHERE try = 0");
   $s_2authF = $c_Select->fn_SingleResponse($conn, "SELECT * FROM 2authfactorlogs WHERE (status='active' OR status='validate') AND try > 0 AND username=?", "hash", $get_data);     
   if($s_2authF != "")
   {
    $c_Del->deleteRecord($conn, "UPDATE 2authfactorlogs SET status='validate', try= try - 1 WHERE username='$get_data'");
     ?>

<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Two Factor Authentication</b></p>
      <p class="login-box-msg">Check email for the Verification Code</p>
      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="twoauthfact" placeholder="Code" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-barcode"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="submit" class="btn btn-primary btn-block" name="btntwoauthfactor" value="Click to Validate">
          </div>
          <!-- /.col -->
          <?php
          if(isset($_POST["btntwoauthfactor"]))
            {
              $val_auth = $c_Select->fn_SingleResponse($conn, "SELECT * FROM 2authfactor WHERE status='active' AND duration > 0 AND userid = ? ORDER BY dt DESC LIMIT 1", "code", $get_data);
              if(trim($_POST["twoauthfact"]) === trim($val_auth))
              {
                $val_username = $c_Select->fn_SingleResponse($conn, "SELECT * FROM 2authfactorlogs WHERE status='validate' AND duration > 0 AND username = ? ORDER BY dt DESC LIMIT 1", "hash", $get_data);
                $_SESSION["username"] = $val_username;
                //echo "success - ". $val_auth;
                $c_Del->deleteRecord($conn, "UPDATE 2authfactorlogs SET status='enactive', try= 0 WHERE username='$get_data'");
                $c_Del->deleteRecord($conn, "UPDATE 2authfactor SET status='enactive' WHERE userid='$get_data'");
                header("Location: ".$url."/home");
              }
              else
              {                
                echo "<center><b>Error Code Validation</b><center>";
              }
              //echo $_POST["twoauthfact"];
            }
          ?>
        </div>  
      </form>
      <p class="mt-3 mb-1">
        <a href="../login">Login</a>
      </p>
      <p class="mb-0">
        <a href="../register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>

<?php
   }
   else{
    ?>
<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Two Factor Authentication</b></p>
      <p class="login-box-msg">Session Expired!</p>
      <p class="mt-3 mb-1">
        <a href="../login">Login</a>
      </p>
      <p class="mb-0">
        <a href="../register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
    <?php
   }    
  
   ?>
  <!-- /.login-logo -->
 
</div>
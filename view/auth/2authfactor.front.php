<div class="login-box">
  <?php include 'view/auth/auth.name.jtl';
   $s_2authF = $c_Select->fn_SingleResponse($conn, "SELECT * FROM 2authfactorlogs WHERE status='active' AND username=?", "hash", $_GET["data2"]);
   ?>
  <!-- /.login-logo -->
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
</div>
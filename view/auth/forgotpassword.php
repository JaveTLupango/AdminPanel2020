<div class="login-box">
  <?php include 'view/auth/auth.name.jtl'; ?>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="submit" class="btn btn-primary btn-block" name="newPass" value="Request new password">
          </div>
          <!-- /.col -->
        </div>        
        <?php
            if(isset($_POST["newPass"]))
            {
              $resEmail = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE email=?", "email", $_POST["email"]);
              if($resEmail == "" || $resEmail == null)
              {
                echo '<center><p style="color: red;">Email not Found! </p></center>';
              }
              else
              {
                $resPass = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE email=?", "passkey", $_POST["email"]);  
                $resname = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE email=?", "name", $_POST["email"]);  
                $content1 = "You request a new password for you VPN Account. But instead the system generate new code. We must email your current password. <br/> Here is it:";
                $content2 = "Do not share this email to others.";
                $content3 = "Having trouble to log into your account? Just relay to your upline.";
                $EmailContent = $c_email->email_Content_Func("Admin Panel", $resname, $resPass, $content1, $content2, $content3);
                $resEmail = $c_email->sendEmailForgotPassword($resEmail, $EmailContent, $resname, "Reset Password");  
                if ($resEmail == "send")
                {
                  echo '<center><p style="color: blue;">Email Request Send! </p></center>';
                }
                else
                {
                  echo '<center><p style="color: red;"> Failed Sending Email Request! </p></center>';
                }
              }
            }
        ?>
      </form>
      <p class="mt-3 mb-1">
        <a href="login">Login</a>
      </p>
      <p class="mb-0">
        <a href="register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
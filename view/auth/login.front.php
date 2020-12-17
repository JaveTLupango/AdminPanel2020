
<div class="login-box">
  <?php include 'view/auth/auth.name.jtl'; ?>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="" method="post">
        <?php
          if (isset($_POST["btn_login"]))
          {
            $login_username = $_POST["login_username"];
            $login_password = $_POST["login_password"];
            $login_ret = $c_Auth->fn_Login($conn, $login_username, $login_password);
            if ($login_ret == "success")
            {
              $s_2authF = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "2authfactor", $login_username);
              if($s_2authF === "0")
              {
                $_SESSION["username"] = $login_username;
                echo '<button type="button" class="col-12 btn btn-success" style="margin-bottom: 15px;">Sucess</button><br>';
                header("Location: ".$url."/home");
              }              
              else
              {
                $usernamehash = md5($login_username);
                $c_Auth->insert_2authfactorlogs($conn, $usernamehash, $login_username);
                $genCode = $c_Func->GenerateUsername("CODE");
                $c_Auth->insert_2authfactor_func($conn, $usernamehash, $genCode);                
                $g_email = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "email", $login_username);                
                $content1 = "You’re almost there! You have now enabled Two-Factor Authentication for your account and your login code is:";
                $content2 = "The code will expire in 15 minutes.";
                $content3 = "Having trouble to log into your account? Just relay to your upline.";
                $EmailContent = $c_email->email_Content_Func("Admin Panel", $login_username, $genCode, $content1, $content2, $content3);
                $resEmail = $c_email->sendEmailForgotPassword($g_email, $EmailContent, $login_username, "Two Factor Authentication");                
                header("Location: ".$url."/home/twoauthfactor/".$usernamehash);
              }
            }
            else
            {
                echo '<button type="button" class="col-12 btn btn-warning" style="margin-bottom: 15px;">'.$login_ret.'</button><br>';
            }
          }
        ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="login_username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="login_password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="btn_login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgotpass">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->

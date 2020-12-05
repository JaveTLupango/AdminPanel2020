<div class="register-box">
  <?php include 'view/auth/auth.name.jtl'; ?>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
     <form action="" method="post">
      <?php 
        if (isset($_POST["btn_register"]))
        {
          $nameString = $_POST["reg_fullname"];
          $usernameString = $_POST["reg_username"];
          $emailString = $_POST["reg_email"];
          $passwordString = $_POST["reg_password"];
          $password2String = $_POST["reg_password2"];
          $vaLUser = $c_InsertControl->fn_username_Validate($conn,$usernameString);  //fn_email_Validate
          $vaLEmail = $c_InsertControl->fn_email_Validate($conn,$emailString);  //fn_email_Validate

          if ($passwordString == $password2String)
          {        
            if ($vaLUser == "0")
            { 
              if ($vaLEmail == "")
              {
                   $reg_ret = $c_InsertControl->fn_register($conn, $usernameString,md5($passwordString), $passwordString, $nameString, $emailString);
                   if ($reg_ret == "success")
                   {
                    echo '<button type="button" class="col-12 btn btn-success" style="margin-bottom: 15px;">Sucess</button><br>';
                   }
              }
              else
              {  
                 echo '<button type="button" class="col-12 btn btn-warning" style="margin-bottom: 15px;">Email is already exist!</button><br>';
              }               
            }
            else
            {
              echo '<button type="button" class="col-12 btn btn-warning" style="margin-bottom: 15px;">Username is already exist!</button><br>';
            }            
          }
          else
          {
            echo '<button type="button" class="col-12 btn btn-warning" style="margin-bottom: 15px;">Password Not Match!</button><br>';
          }
        }
      ?>  
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="reg_fullname" required  name="reg_fullname" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="reg_username" required name="reg_username" placeholder="User name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="reg_email" required name="reg_email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="reg_password" required name="reg_password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="reg_password2" required name="reg_password2" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="agreeTerms2" required value="valid">
              <label for="agreeTerms">
               I agree to the <a href="">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="btn_register" class="btn btn-primary btn-block">
          </div>
          <!-- /.col -->
        </div>
     </form>
      <a href="login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
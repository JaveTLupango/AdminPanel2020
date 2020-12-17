
<?php if (strtoupper($data) == "ADDQUICKUSER"){ ?>
  <div class="col-md-8" style=" margin: auto;
  width: 80%;">
            <!-- general form elements -->      
        <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add User</h3>
        </div>
        <form role="form" method="POST">
          <br>
            <?php                     
              $AddQ_name = "";             
              $AddQ_email = "";             
              $AddQ_username = "";
              if (isset($_POST['AddQ_submit'])) 
              {
                $AddQ_name = $_POST['AddQ_name'];             
                $AddQ_email =  $_POST['AddQ_email'];            
                $AddQ_username =  $_POST['AddQ_username'];     
                $AddQ_password =  $_POST['AddQ_password'];            
                $AddQ_passwordNew =  $_POST['AddQ_passwordNew'];      
                $AddQ_Option =  $_POST['Add_Option'];                      
                $vaLUser = $c_InsertControl->fn_username_Validate($conn,$AddQ_username);  //fn_email_Validate
                $vaLEmail = $c_InsertControl->fn_email_Validate($conn,$AddQ_email);  //fn_email_Validate
                if ($AddQ_password == $AddQ_passwordNew)
                  {        
                    if ($vaLUser == "0")
                    { 
                      if ($vaLEmail == "")
                      {
                           $userID_Upline = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "userid", $_SESSION['username']);
                           $reg_ret = $c_InsertControl->fn_AddNewUser($conn, $AddQ_username,md5($AddQ_password), $AddQ_password, $AddQ_name, $AddQ_email, $userID_Upline, $AddQ_Option);
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
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="AddQ_name" id="exampleInputEmail1" value="<?php echo $AddQ_name; ?>" required placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="AddQ_email" id="exampleInputEmail1" value="<?php echo $AddQ_email; ?>" required placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Usertype</label>
                <select name="Add_Option" id="Add_Option" class="form-control" >
                  <option value="client">client</option>
                  <option value="reseller">reseller</option>
                </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" name="AddQ_username" id="exampleInputEmail1" value="<?php echo $AddQ_username; ?>" required placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="AddQ_password" id="exampleInputPassword1" value="" required placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm Password</label>
              <input type="password" class="form-control" name="AddQ_passwordNew" id="exampleInputPassword1" value="" required placeholder="Confirm Password">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="AddQ_submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>            
      <!-- /.card -->
    </div>
<?php }
 else if (strtoupper($data) == "SETTING"){ ?>

<div class="col-md-8" style=" margin: auto;
  width: 80%;">
            <!-- general form elements -->      
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Update Username</h3>
      </div>
      <form role="form" method="POST">
      
        <div class="card-body">
        <div class="form-group">
              <label for="exampleInputEmail1">UserName</label>
              <input type="text" class="form-control" name="usernameOR" id="exampleInputEmail1" value="<?php echo $_SESSION["username"];//$AddQ_name; ?>" required placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">New Username</label>
              <input type="text" class="form-control" name="update_username" id="exampleInputEmail1" value="" required placeholder="Enter New Username">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="btnupdate_username" class="btn btn-primary">Update</button>
            <?php 
          if(isset($_POST["btnupdate_username"]))
          {
            $usernameOR = $_POST["usernameOR"];
            $update_username = $_POST["update_username"];
            $retUpdateusername = $c_Del->deleteRecord($conn, "UPDATE users SET username='$update_username' WHERE username='$usernameOR'");
            if($retUpdateusername === "success")
            {
              $_SESSION["username"] = $update_username;
              echo '<button type="button" name="" class="btn btn-success" style="float: right;" >Successfully Updated!</button>';
            }
            else
            {              
               echo '<button type="button" name="" class="btn btn-danger" style="float: right;" >Unsuccessfully Updated!</button>';
            }
          }
      ?>
            
        </div>
      </form> 
  </div>            
      <!-- /.card -->
</div>

<div class="col-md-8" style=" margin: auto;
  width: 80%;">
            <!-- general form elements -->      
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Update Two Factor Authentication</h3>
      </div>
      <form role="form" method="POST">
        <div class="card-body">
        <div class="form-group">
              <label for="exampleInputEmail1">UserName</label>
              <input type="text" class="form-control" name="usernameOR" id="exampleInputEmail1" value="<?php echo $_SESSION["username"];//$AddQ_name; ?>" required placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Enable (Yes or No)</label>
                <select name="Update2Authfact" id="Add_Option" class="form-control" >
                <?php 
                $res_Update2Authfact = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "2authfactor", $_SESSION['username']);
                if($res_Update2Authfact === "0")
                {
                  echo '<option value="0">No</option>';
                }
                else
                {
                  echo '<option value="1">Yes</option>';
                }                  
                ?>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="btnupdate_2factAuth" class="btn btn-primary">Update</button>
            <?php 
          if(isset($_POST["btnupdate_2factAuth"]))
          {
            $usernameOR = $_POST["usernameOR"];
            $Update2Authfact = $_POST["Update2Authfact"];
            $retUpdateusername = $c_Del->deleteRecord($conn, "UPDATE users SET 2authfactor='$Update2Authfact' WHERE username='$usernameOR'");
            if($retUpdateusername === "success")
            {
              echo '<button type="button" name="" class="btn btn-success" style="float: right;" >Successfully Updated!</button>';
            }
            else
            {              
               echo '<button type="button" name="" class="btn btn-danger" style="float: right;" >Unsuccessfully Updated!</button>';
            }
          }
      ?>
        </div>
      </form> 
  </div>            
      <!-- /.card -->
</div>

<div class="col-md-8" style=" margin: auto;
  width: 80%;">
            <!-- general form elements -->      
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Update Password</h3>
      </div>
      <form role="form" method="POST">
        <div class="card-body">
        <div class="form-group">
              <label for="exampleInputEmail1">UserName</label>
              <input type="text" class="form-control" name="usernameOR" id="exampleInputEmail1" value="<?php echo $_SESSION["username"];//$AddQ_name; ?>" required placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="Update_password" id="exampleInputPassword1" value="" required placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm Password</label>
              <input type="password" class="form-control" name="Update_passwordNew" id="exampleInputPassword1" value="" required placeholder="Confirm Password">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="btnupdate_password" class="btn btn-primary">Update</button>
            <?php 
          if(isset($_POST["btnupdate_password"]))
          {
            $usernameOR = $_POST["usernameOR"];
            $Update_password = $_POST["Update_password"];
            $Update_passwordNew = $_POST["Update_passwordNew"];
            if($Update_password === $Update_passwordNew)
            {
              $hashUpdate_password= md5($Update_password);
              $retUpdateusername = $c_Del->deleteRecord($conn, "UPDATE users SET password='$hashUpdate_password', passkey='$Update_password' WHERE username='$usernameOR'");
              if($retUpdateusername === "success")
              {
                echo '<button type="button" name="" class="btn btn-success" style="float: right;" >Successfully Updated!</button>';
              }
              else
              {              
                 echo '<button type="button" name="" class="btn btn-danger" style="float: right;" >Unsuccessfully Updated!</button>';
              }
            }
            else
            {
              echo '<button type="button" name="" class="btn btn-danger" style="float: right;" >Password not match!</button>';
            }            
          }
      ?>
        </div>
      </form>
  </div>            
      <!-- /.card -->
</div>
<?php }
 else if (strtoupper($data) == "ADDBULKUSER") {
?>
        <div class="col-md-8" style=" margin: auto;
          width: 80%;">
                    <!-- general form elements -->      
                <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Bulk User</h3>
                </div>
                <form role="form" method="POST">
                  <br>
                  <?php
                  $access = "";
                  $bulkArray = array();

                    if (isset($_POST['AddB_submit']))
                    {
                      
                      $nou_ = $_POST["AddB_nou"];
                      if ($nou_ <= 10)
                      {
                         $Prefix_ = $_POST["AddB_prefix"];
                          for ($row = 1; $row <= $nou_; $row++)
                          {
                            $genuserinfo_ = $c_Func->GenerateUsername($Prefix_);
                            $vaLUser = $c_InsertControl->fn_username_Validate($conn,$genuserinfo_);
                            if ($vaLUser == "0")
                            {
                              $userID_Upline = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "userid", $_SESSION['username']);
                              $Add_email_ = $genuserinfo_."@admin.com";
                              $okRets = $c_InsertControl->fn_AddNewUser($conn, $genuserinfo_,md5($genuserinfo_), $genuserinfo_, $genuserinfo_, $Add_email_, $userID_Upline, "client");
                              $b = array($genuserinfo_,$genuserinfo_);
                              array_push($bulkArray,$b);
                              sleep(1);
                            }
                            else
                            {
                              $row--;
                              sleep(1);
                            }                        
                          }
                          $access = "ok";
                          echo '<button type="button" class="col-12 btn btn-success" style="margin-bottom: 15px;">'.$okRets.'</button><br>';
                      }
                      else
                      {
                        echo '<button type="button" class="col-12 btn btn-warning" style="margin-bottom: 15px;">Above maximum limit.</button><br>';
                      }                     
                    }
                  ?>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Number of User</label>
                      <input type="Number" class="form-control" id="exampleInputEmail1" name="AddB_nou" required placeholder="Number of User">
                    </div>    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Prefix</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="AddB_prefix" placeholder="Input Prefix">
                    </div>
                  </div>
                  <!-- /.card-body -->                  
                  <div class="card-footer">
                    <button type="submit" name="AddB_submit" class="btn btn-primary">Submit</button> <label>Max of 10 user</label>
                  </div>
                </form>
              </div>     
            </div>
<?php
  if ($access ==  "ok") {
    ?>
        <div class="col-md-8" style=" margin: auto;
            width: 80%;">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of users generated</h3>         
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Username</th>
                      <th>password</th>
                    </tr>
                  </thead>
                  <tbody>  
                  <?php 
                  for ($row = 1; $row <= $nou_; $row++)
                   {
                    echo '<tr>
                      <td>'.$row.'</td>
                      <td>'. $bulkArray[$row-1][0] .'</td>
                      <td>
                        '.$bulkArray[$row-1][1].'
                      </td>
                    </tr>';
                   // echo $bulkArray[$row][0]. " ==== " . $a[$row][1]. "<br>";
                   }
                  ?>                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    <?php   # code...
  }
} ?>


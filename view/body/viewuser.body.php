<?php
$SelectQuery = "";

$upline_res = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "userid", $_SESSION['username']);
    if (strtoupper($data) == "VIEWALLUSER")
    { 
        $SelectQuery = "SELECT * FROM users WHERE status != 'delete' AND username != '".$_SESSION['username']."' ORDER BY  dtjoin DESC";      
    }
    else if (strtoupper($data) == "VIEWCLIENT")
    {
         $SelectQuery = "SELECT * FROM users WHERE status != 'delete' AND  upline ='$upline_res'  ORDER BY  dtjoin DESC";      
    }
    else if (strtoupper($data) == "VIEWRESELLER")
    {
      if ($aside_access == "admin")
      {
         $SelectQuery = "SELECT * FROM users WHERE status != 'delete' AND usertype = 'reseller'  ORDER BY  dtjoin DESC";
      }
      else
      {
         $SelectQuery = "SELECT * FROM users WHERE status != 'delete' AND usertype = 'reseller' AND  upline ='$upline_res'  ORDER BY  dtjoin DESC";
      }
    }
    else if (strtoupper($data) == "VIEWBLOCKUSER")
    {
       if ($aside_access == "admin")
      {
         $SelectQuery = "SELECT * FROM users WHERE status = 'block'  ORDER BY  dtjoin DESC ";
      }
      else
      {
         $SelectQuery = "SELECT * FROM users WHERE status = 'block' AND  upline ='$upline_res'  ORDER BY  dtjoin DESC ";
      }
      //$SelectQuery = "SELECT * FROM users WHERE usertype = 'block'";
    }
    else if (strtoupper($data) == "VIEWACTIVEUSER")
    {
         $SelectQuery = "SELECT * FROM users WHERE status = 'active'  ORDER BY  dtjoin DESC";      
      //$SelectQuery = "SELECT * FROM users WHERE status = 'active'";
    }
    else if (strtoupper($data) == "HISTORY")
    {
      //if ($aside_access == "admin")
     // {
    //     $SelectQuery = "SELECT * FROM users WHERE status = 'active'  ORDER BY  dtjoin DESC";
     // }
    //  else
     // {
        // $upline_res = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "userid", $_SESSION['username']);
     //    $SelectQuery = "SELECT * FROM users WHERE status = 'active' AND  upline ='$upline_res'  ORDER BY   dtjoin DESC";
     // }
      $upline_res = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "id", $_SESSION['username']);
      $SelectQuery = "SELECT (SELECT username From users WHERE users.id = creditlogs.userid) as userid,
                      (SELECT username From users WHERE users.id = creditlogs.ap_id) as ap_id, 
                      credit ,type, duration, dt FROM creditlogs WHERE userid = '$upline_res'  ORDER BY dt DESC";
    }
    $s_res = $c_Select->fn_SelectAll($conn, $SelectQuery);    
?>
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">          

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $tableLogs; ?></h3>
              </div>
              <!-- /.card-header -->
              <?php if (strtoupper($data) != "HISTORY"){ ?>
                <div class="card-body">                  
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>duration</th>
                    <th>type</th>
                    <th>option</th>
                  </tr>
                  </thead>
                  <tbody>   
                  <?php                
                    $countb = 1;
                    while ($row = $s_res->fetch())
                    {  

                        echo '<tr>';
                        echo '<td>'.$countb.'</td>
                              <td>'.$row['username'].'</td>
                              <td>'. $c_Func->_duration($row['duration']).'</td>
                              <td>'.$row['usertype'].'</td>
                              <td>';
                         if(strtoupper($data) === "VIEWALLUSER" || strtoupper($data) === "VIEWACTIVEUSER")
                         {
                            if($aside_access != "admin")
                            {
                              echo '<button type="button" name="" class="btn btn-danger">No Access</button>';
                            }
                            else{
                                  echo '<button onclick="user_edit_function('.$row['id'].')" class="btn btn-success" title="Update Client Info"><i class="fa fa-edit"></i></button>
                                        <button onclick="modalClientInformationView('.$row['id'].')" class="btn btn-info"  title="View Client Info"><i class="fa fa-file"></i></button>
                                        <button onclick="functionDeleteUsers('.$row['id'].')"  class="btn btn-danger"  title="Delete Client Info"><i class="fa fa-trash"></i></button>';
                                    if ($row['usertype'] == "reseller")
                                    {
                                      echo'<button onclick="functionReloadVoucher('.$row['id'].')" class="btn btn-warning"><i class="fa fa-share" title="Reload Client Credit"></i></button>';
                                      echo'<button onclick="functionReloadDuration('.$row['id'].')" class="btn btn-success"><i class="fa fa-barcode" title="Reload Client Duration"></i></button>';
                                    }
                                    else
                                    {
                                      echo'<button onclick="functionReloadDuration('.$row['id'].')" class="btn btn-success"><i class="fa fa-barcode" title="Reload Client Duration"></i></button>';
                                    }
                            }
                         }
                         else{
                            if($aside_access === "client")
                            {
                              echo '<button type="button" name="" class="btn btn-danger">No Access</button>';
                            }
                            else{
                                  echo '<button onclick="user_edit_function('.$row['id'].')" class="btn btn-success" title="Update Client Info"><i class="fa fa-edit"></i></button>
                                        <button onclick="modalClientInformationView('.$row['id'].')" class="btn btn-info"  title="View Client Info"><i class="fa fa-file"></i></button>
                                        <button onclick="functionDeleteUsers('.$row['id'].')"  class="btn btn-danger"  title="Delete Client Info"><i class="fa fa-trash"></i></button>';
                                    if ($row['usertype'] == "reseller")
                                    {
                                      echo'<button onclick="functionReloadVoucher('.$row['id'].')" class="btn btn-warning"><i class="fa fa-share" title="Reload Client Credit"></i></button>';
                                      echo'<button onclick="functionReloadDuration('.$row['id'].')" class="btn btn-success"><i class="fa fa-barcode" title="Reload Client Duration"></i></button>';
                                    }
                                    else
                                    {
                                      echo'<button onclick="functionReloadDuration('.$row['id'].')" class="btn btn-success"><i class="fa fa-barcode" title="Reload Client Duration"></i></button>';
                                    }
                            }
                         }
                            
                        echo '</td> </tr>';
                        $countb++;
                    }             //functionReloadVoucher 
                  ?>             
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <?php } else{
                ?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Upline</th>
                    <th>Client</th>
                    <th>Credit</th>
                    <th>type</th>
                    <th>duration</th>
                    <th>date</th>
                  </tr>
                  </thead>
                  <tbody>   
                  <?php                
                    $countb = 1;
                    while ($row = $s_res->fetch())
                    {
                      echo '<tr>';
                      echo ' <td>'.$countb.'</td>
                              <td>'.$row['userid'].'</td>
                              <td>'.$row['ap_id'].'</td>
                              <td>'.$row['credit'].'</td>
                              <td>'.$row['type'].'</td>
                              <td> '. $c_Func->_duration($row['duration']).' </td>                              
                              <td>'.$row['dt'].'</td>';
                                echo ' </tr>';
                        $countb++;
                    }                    
                  ?>             
                  </tbody>
                </table>
              </div>
                <?php
              }?>              
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
        <!-- Modal 
          Update Client Information
        --> 
        <div class="modal fade" id="modalClientInformation" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">          
            <!-- Modal content-->
            <div class="modal-content">                      
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Client Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Session ID</label>
                    <input type="text" class="form-control" name="Session" id="UpdateSessionID" disabled placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="Update_name" id="Update_name" placeholder="Enter Name">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="Update_Email" id="Update_Email" placeholder="Enter Email">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Usernmae</label>
                    <input type="text" class="form-control" name="Update_username" id="Update_username" placeholder="Enter Username">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Usertype</label>
                    <select name="Update_usertype" id="Update_usertype" class="form-control">
                      <option value="client">client</option>
                      <option value="reseller">reseller</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="Update_password" id="Update_password" placeholder="Password">
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" name="Update_Cpassword" id="Update_Cpassword" placeholder="Confirm Password">
                  </div>              
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" onclick="UpdateBtnFunction()" class="btn btn-primary" name="UpdateBtn">Submit</button><button style="float: right;" data-dismiss="modal" class="btn btn-warning">Close</button>
                </div>
              </form>
            </div>
            </div>            
          </div>
        </div>
          <!-- Modal 
          View Client Information
        --> 
        <div class="modal fade" id="modalClientInformationView" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">          
            <!-- Modal content-->
            <div class="modal-content">
                      
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Client Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="View_name" id="View_name" disabled >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="View_Email" id="View_Email" disabled >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Usernmae</label>
                    <input type="text" class="form-control" name="View_username" id="View_username"disabled  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Usertype</label>
                    <input type="text" class="form-control" name="View_Usertype" id="View_Usertype"disabled  >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="text" class="form-control" name="View_password" id="View_password"disabled >
                  </div>                           
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button  data-dismiss="modal" class="btn btn-primary">Close</button><button style="float: right;" data-dismiss="modal" class="btn btn-warning">Close</button>
                </div>
              </form>
            </div>
            </div>            
          </div>
        </div> 

        <!-- Modal 
          Reload Voucher
        --> 
        <div class="modal fade" id="modalReloadVoucher" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">          
            <!-- Modal content-->
            <div class="modal-content">                      
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Reloading of Reseller Credit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Session ID</label>
                    <input type="text" class="form-control" name="Voucher_ID" id="Voucher_ID" disabled >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="Voucher_name" id="Voucher_name" disabled >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Usernmae</label>
                    <input type="text" class="form-control" name="Voucherusername" id="Voucherusername"disabled  >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Balance Credit</label>
                    <input type="email" class="form-control" name="VoucherCredit" id="VoucherCredit" disabled >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Reload Credits</label>
                    <input type="number" class="form-control" name="VoucherReload_" id="VoucherReload_">
                  </div>                           
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" onclick="functionReloadVoucherToClient()" class="btn btn-primary">Submit</button><button style="float: right;" data-dismiss="modal" class="btn btn-warning">Close</button>
                </div>
              </form>
            </div>
            </div>            
          </div>
        </div> 

         <div class="modal fade" id="modalReloadDuration" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">          
            <!-- Modal content-->
            <div class="modal-content">
                      
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Reloading of Client Duration</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Session ID</label>
                    <input type="text" class="form-control" name="duration_ID" id="duration_ID" disabled >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="duration_name" id="duration_name" disabled >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Usernmae</label>
                    <input type="text" class="form-control" name="durationusername" id="durationusername"disabled  >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Expiration</label>
                    <input type="email" class="form-control" name="durationCredit" id="durationCredit" disabled >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Reload Credits</label>
                    <input type="number" class="form-control" name="durationReloadC" id="durationReloadC"  >
                  </div>   

                  <div class="form-group">
                    <label for="exampleInputEmail1">Reload Credits</label>
                    Note: 1 Credit = 30days duration
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" onclick="functionReloadDurationToClient()" class="btn btn-primary">Submit</button><button style="float: right;" data-dismiss="modal" class="btn btn-warning">Close</button>
                </div>
              </form>
            </div>
            </div>            
          </div>
        </div> 

    <script type="text/javascript">
        function user_edit_function(id)
        {   
            $.ajax({
                    type: "POST",
                    url : "../class/api.function.php",
                    data : {
                      id : 'user_edit_function',
                      data  : id
                    },
                    success: function(a)
                    {
                      var a_J = JSON.parse(a);
                      if (a !="[]")
                      {
                        
                        document.getElementById("UpdateSessionID").value = a_J[0].id;
                        document.getElementById("Update_name").value = a_J[0].name;
                        document.getElementById("Update_Email").value = a_J[0].email;
                        document.getElementById("Update_username").value = a_J[0].username;
                        var usertype = a_J[0].usertype;
                        if (usertype == "client")
                        {
                          document.getElementById("Update_usertype").selectedIndex = "0";
                        }
                        else
                        {
                          document.getElementById("Update_usertype").selectedIndex = "1";
                        }                

                        $("#modalClientInformation").modal();
                      }
                      else
                      {
                        alert("Can't Find your Identity!");
                      }
                      
                      //$("#Update_name").value = a_J[0].name;
                    },
                    error: function(x)
                    {
                     alert("Something Went Wrong, Please try again later.  Code : user_edit_function");
                    }
            });            
        }
        //modalClientInformationView\
        function modalClientInformationView(id)
        {
          $.ajax({
                    type: "POST",
                    url : "../class/api.function.php",
                    data : {
                      id : 'user_edit_function',
                      data  : id
                    },
                    success: function(a)
                    {
                      var a_J = JSON.parse(a);
                      if (a !="[]")
                      {
                        
                        document.getElementById("View_name").value = a_J[0].name;
                        document.getElementById("View_Email").value = a_J[0].email;
                        document.getElementById("View_username").value = a_J[0].username;
                        document.getElementById("View_Usertype").value = a_J[0].usertype;
                        document.getElementById("View_password").value = a_J[0].passkey; 
                        $("#modalClientInformationView").modal();
                      }
                      else
                      {
                        alert("Can't Find your Identity!");
                      }
                      
                      //$("#Update_name").value = a_J[0].name;
                    },
                    error: function(x)
                    {
                     alert("Something Went Wrong, Please try again later.  Code : user_edit_function");
                    }
            });   
        }
        function functionDeleteUsers(id)
        {
          var r = confirm("Are you sure you want to delete?");
          if (r == true) {
            $.ajax({
              type: "POST",
                    url : "../class/api.function.php",
                    data : {
                      id : 'functionDeleteUsers',
                      data  : id
                    },
                    success: function(a)
                    {
                      if (a=="success")
                      {
                        alert("Done");
                        location.reload();
                      }
                      else
                      {
                        alert(a);
                      }
                    },
                    error: function(x)
                    {
                      alert("Something Went Wrong, Please try again later. Code : functionDeleteUsers");
                    }
            });
          } else {
             alert("You pressed Cancel!");
          }
        }

        function functionReloadVoucher(id)
        {
            $.ajax({
                    type: "POST",
                    url : "../class/api.function.php",
                    data : {
                      id : 'user_edit_function',
                      data  : id
                    },
                    success: function(a)
                    {
                      var a_J = JSON.parse(a);
                      if (a !="[]")
                      {
                        document.getElementById("Voucher_ID").value = a_J[0].id;
                        document.getElementById("Voucher_name").value = a_J[0].name;
                        document.getElementById("VoucherCredit").value = a_J[0].voucher;
                        document.getElementById("Voucherusername").value = a_J[0].username;
                         $("#modalReloadVoucher").modal();
                      }
                      else
                      {
                        alert("Record not found!");
                      }
                    },
                    error: function(x)
                    {
                      alert("Something Went Wrong, Please try again later. Code : functionDeleteUsers");
                    }
            });
        }       

        function functionReloadVoucherToClient()
        {
          try
          {
           var Voucher_ID = document.getElementById("Voucher_ID").value;
           var Voucher_name = document.getElementById("Voucher_name").value;
           var VoucherCredit = document.getElementById("VoucherCredit").value;
           var Voucherusername = document.getElementById("Voucherusername").value;   
           var VoucherReload_ = document.getElementById("VoucherReload_").value;        
           
           $.ajax({
                type: "POST",
                url : "../class/api.function3.php",
                data:{
                  id : 'ReloadVoucher',
                  data1 : Voucher_ID,
                  data2 : Voucher_name,
                  data3 : Voucherusername,
                  data4 : VoucherCredit,
                  data5 : Voucherusername,
                  data6 : VoucherReload_
                },
                success: function(ab)
                {
                  alert(ab);
                }
           });   
          }
          catch(err)
          {
            alert(err);
          }
        }

        function validate_duration(du)
        {
          $.ajax({
                  type: "POST",
                    url : "../class/api.function.php",
                    data : {
                      id : 'validateDuration',
                      data  : du
                    },
                    success: function(a)
                    {
                      document.getElementById("durationCredit").value =a
                    }
          });
        }

        function UpdateBtnFunction()
        {
          try
          {
            var UpdateSessionID = document.getElementById("UpdateSessionID").value;
            var Update_name = document.getElementById("Update_name").value;
            var Update_Email = document.getElementById("Update_Email").value;
            var Update_usertype = document.getElementById("Update_usertype").value;
            var Update_username = document.getElementById("Update_username").value;
            var Update_password = document.getElementById("Update_password").value;
            var Update_Cpassword = document.getElementById("Update_Cpassword").value;
            if (Update_Cpassword == "")
            {
                alert("Please input password");
            }
            else if (Update_password == Update_Cpassword)
            {
                if (validateEmailfunction(Update_Email))
                {
                  $.ajax({
                          type: "POST",
                          url : "../class/api.function2.php",
                          data : {
                            id : 'validate',
                            data1 : Update_Email,
                            data2 : Update_username,
                            data3 : UpdateSessionID
                          },
                          success: function(a)
                          {
                            var retA = a.split("-");
                            if (retA[0] == 1 && retA[1] == 1)
                            {
                              alert("Username And Email Already Exist!");
                            }
                            else if(retA[0] == 1)
                            {
                              alert("Email Already Exist!");
                            }
                            else if(retA[1] == 1)
                            {
                              alert("Username Already Exist!");
                            }
                            else
                            {
                              $.ajax({
                                      type: "POST",
                                      url : "../class/api.function3.php",
                                      data : {
                                        id : 'UpdateInfo',
                                        data1 : Update_name,
                                        data2 : Update_Email,
                                        data3 : Update_username,
                                        data4 : Update_password,
                                        data5 : UpdateSessionID,
                                        data6 : Update_usertype
                                      },
                                      success: function(b)
                                      {
                                        if (b == "success") {
                                          alert("Information Successfully Updated!");
                                          location.reload();
                                        }
                                        else
                                        {
                                          alert(b);
                                        }
                                      }
                              });
                            }
                          }
                  });
                }
                else
                {
                  alert("You have entered an invalid email address!");
                }
            }
            else
            {
               alert("Password Not Match!");
            }            

          }catch(err)
          {
            alert(err);
          }
                        //document.getElementById("UpdateSessionID").value = a_J[0].id;
                        //document.getElementById("Update_name").value = a_J[0].name;
                       // document.getElementById("Update_Email").value = a_J[0].email;
                       // document.getElementById("Update_username").value = a_J[0].username;
        }

        function validateEmailfunction(mail)
        {
              const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;              
              return re.test(String(mail).toLowerCase());       
        }

        function functionReloadDuration(id)
        {
            $.ajax({
              type: "POST",
                    url : "../class/api.function.php",
                    data : {
                      id : 'user_edit_function',
                      data  : id
                    },
                    success: function(a)
                    {
                       var a_J = JSON.parse(a);
                      if (a !="[]")
                      {
                        document.getElementById("duration_ID").value = a_J[0].id; 
                        document.getElementById("duration_name").value = a_J[0].name; //duration_ID
                        document.getElementById("durationusername").value = a_J[0].username;
                        validate_duration(a_J[0].duration);
                        $("#modalReloadDuration").modal();
                      }
                      else
                      {
                        alert("Record not found!");
                      }
                    },
                    error: function(x)
                    {
                      alert("Something Went Wrong, Please try again later. Code : functionDeleteUsers");
                    }
            });
        }         

        function functionReloadDurationToClient()
        {
          try
          {
           var duration_ID = document.getElementById("duration_ID").value; 
           var durationReloadC = document.getElementById("durationReloadC").value; 
           var durationusername = document.getElementById("durationusername").value;
           $.ajax({
                    type: "POST",
                    url : "../class/api.function2.php",
                    data : {
                      id : 'functionReloadDurationToClient',
                      data1 : duration_ID,
                      data2 : durationReloadC,
                      data3 : durationusername
                    },
                    success: function(a)
                    {
                      alert(a);
                    }
           });

          }catch(err)
          {
            alert(err);
          }
        }

    </script>



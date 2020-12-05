
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
                echo $c_Select->fb_SelectCount($conn, "SELECT COUNT(*) FROM users");
                ?></h3>
                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo($url) ?>/home/viewalluser" class="small-box-footer">View All Users <i class="fas fa-arrow-circle-right"></i></a>
              <a href="<?php echo($url) ?>/home/addbulkuser" class="small-box-footer">Add New User <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php 
                echo $c_Select->fb_SelectCount($conn, "SELECT COUNT(*) FROM users WHERE usertype='reseller'");
                ?></h3>
                <p>Total Reseller</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo($url) ?>/home/viewreseller" class="small-box-footer">View All Reseller <i class="fas fa-arrow-circle-right"></i></a>
              <a href="<?php echo($url) ?>/home/addbulkuser" class="small-box-footer">Add New Reseller <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $s_credit; ?></h3>
                <p>Credits</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo($url) ?>/home/history" class="small-box-footer">View Credits Logs<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
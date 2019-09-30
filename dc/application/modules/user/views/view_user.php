        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                  <h3 class="box-title">View User </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
				<?php if(isset($_GET['msg'])):  ?>
                   <div class="errors" style="color:red;"> This Email already exits </div>
                <?php endif; ?>
				
                  <div class="box-body">
					<form  action="#" method="post" enctype="multipart/form-data"><?php //echo'<pre>'; print_r($user);die;?>
					<?php  foreach($user as $userOneDetails):?>
					<div class="form-group">
                      <label for="InputName">Name</label>
                      <input type="text" name="name" value="<?php echo $userOneDetails['name'];?>" class="form-control" id="InputName" placeholder="Enter Name" readonly>
                    </div>
                    <div class="form-group">
                      <label for="InputEmailAddress">Email/User Name</label>
                      <input type="email" name="emailAddress" value="<?php echo $userOneDetails['user_name'];?>" class="form-control" id="InputEmailAddress" placeholder="Enter Email" readonly>
                    </div>
                    <div class="form-group">
                      <label for="InputPassword1">Password</label>
                      <input type="password" name="password" value="<?php echo $userOneDetails['password'];?>" class="form-control" id="InputPassword1" placeholder="Password" readonly>
                    </div>
					<div class="form-group">
                      <label for="InputMobile">Mobile No</label>
                      <input type="text" name="mobileno" value="<?php echo $userOneDetails['mobile_no'];?>" class="form-control" id="InputMobile" placeholder="Mobile No" readonly>
                    </div>
			
				  <div class="form-group">
                      <label for="InputProfilePhoto">Profile Image</label>
					  <?php if($userOneDetails['profile_photo_att']) { ?><a href="<?php echo base_url().'upload/'.$userOneDetails['profile_photo_att']; ?>" target="_blank"><span class="label label-success" style="font-size:11px;">View</span></a><?php } else { echo "N/A"; } ?>
                      
                    </div>	
                  <div class="box-footer">
                    
                  </div>
                </form><?php endforeach;?>
				  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
			  
			  
			  </div><!-- /.col (right) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
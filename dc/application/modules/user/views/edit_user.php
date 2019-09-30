<style>
span.constraint {
    font-size: 10px;
    color: #676565;
}
</style> 
 <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                  <h3 class="box-title">User Info</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
				<?php if(isset($_GET['msg'])):  ?>
                   <div class="errors" style="color:red;"> This Email already exits </div>
                <?php endif; ?>
				
                  <div class="box-body"><?php  foreach($user as $userOneDetails):?>
				  <?php //echo "<pre>";print_r($userOneDetails);die;?>
					<form  action="<?php echo base_url()?>user/User/updateUserDetails?userId=<?php echo $userOneDetails['user_id'];?>" method="post" enctype="multipart/form-data"><?php //echo'<pre>'; print_r($user);die;?>
					
					<div class="form-group">
                      <label for="InputMarket">Market</label>
                      <!--input type="text" name="market" value="<?php echo $userOneDetails['market_id'];?>" class="form-control" id="InputName" placeholder="Market" --->
					  
					  <select class="form-control" name="market_name" id="InputMarket" required>
						 <option value="">---Select Market---</option>
                   
					<?php if($marketLists){
						//print_r($marketLists);
						foreach($marketLists as $keys=>$marketList):
					?>	
                      <option value="<?php echo $marketList['market_id'] ?>" <?php if($marketList['market_id'] ==   $userOneDetails['market_id']){ echo "selected";
					  }?>><?php echo ucfirst($marketList['market_name']); ?></option>
                        <?php 
						endforeach; } ?>
					
                      </select>
                    </div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">	
                    <div class="form-group">
                      <label for="InputRole">User Type</label>
                      <!--input type="text" name="usertype" value="<?php echo $userOneDetails['user_type'];?>" class="form-control" id="InputEmailAddress" placeholder="Usertype" -->
					  <select name="usertype" aria-controls="example1" value="" class="form-control input-sm" style="width:100%;" id="InputRole" required>
								<option value="">-----Select User Type-------</option>
								<option value="1" <?php echo ($userOneDetails['user_type'] == 1)? 'selected':''; ?>>Admin</option>
								<option value="2" <?php echo ($userOneDetails['user_type'] == 2)? 'selected':''; ?>>Market Admin</option>
								<option value="3" <?php echo ($userOneDetails['user_type'] == 3)? 'selected':''; ?>>Content Admin</option>
								<option value="4" <?php echo ($userOneDetails['user_type'] == 4)? 'selected':''; ?>>Member</option>
						</select> 
                    </div>
					<div class="form-group">
                      <label for="InputFirstname">First Name</label>
                      <input type="text" name="firstname" value="<?php echo $userOneDetails['first_name'];?>" class="form-control" id="InputFirstname" placeholder="First name" required>
                    </div>
					<div class="form-group">
                      <label for="InputEmailAddress">Email</label>
                      <input type="email" name="email" value="<?php echo $userOneDetails['email'];?>" class="form-control" id="InputEmailAddress" placeholder="Email" required>
                    </div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="form-group">
                      <label for="InputUsername">Username</label><span class="constraint"> (No Special Characters and Spaces are allowed.)</span>
                      <input type="text" name="username" onkeypress="return checkSpcialChar(event)" value="<?php echo $userOneDetails['username'];?>" class="form-control" id="InputUsername" placeholder="Username" required>
                    </div>
					<div class="form-group">
                      <label for="InputLastname">Last Name</label>
                      <input type="text" name="lastname" value="<?php echo $userOneDetails['last_name'];?>" class="form-control" id="InputLastname" placeholder="Last name" required>
                    </div>
                    <div class="form-group">
                      <label for="InputPassword">Password</label>
                      <input type="password" name="password" value="<?php echo $userOneDetails['password'];?>" class="form-control" id="InputPassword" placeholder="Password" required>
                    </div>
				</div>
			</div>
			<!--div class="form-group">
                      <label for="InputProfilePhoto">Profile Image</label>
                     
					 <?php if($userOneDetails['profile_photo_att']) { ?>
					  <a href="<?php echo base_url().'upload/'.$userOneDetails['profile_photo_att']; ?>" id="link" target="_blank">
							<span class="label label-success" style="font-size:11px;">View</span>
					  </a>
					  <?php } else { echo '<input type="file" name="profile_photo_att" id="InputProfilePhoto">'; } ?>
					  <?php if($userOneDetails['profile_photo_att']) { ?>
					  <a href="#" id="userLink" style="visibility:visible;" onclick="deleteUserDetails()">
							<span class="label label-danger" style="font-size:11px;">Update</span>
							
					  </a>
					           <input type="file" name="profile_photo_att" id="InputProfilePhoto" style="display:none">  
						
							
						<?php } ?>
                      
                    </div-->
				  
                  <div class="box-footer">
                    <center><input class="btn btn-info" type="submit" value="Submit" id="UserValidation"></center>
                  </div>
                </form>
				  
                </div><?php endforeach;?><!-- /.box-body -->
              </div><!-- /.box -->
			  
			  
			  
			  </div><!-- /.col (right) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
		<script>
 function deleteUserDetails() {
		//alert('hi');
		document.getElementById('InputProfilePhoto').style.display='block';
		document.getElementById('userLink').style.display='none';
		
		}
</script>
<script>

$(document).ready(function(e) {
    $('#UserValidation').click(function() {
	
    var userMarket = $("#InputMarket").val();
    var userRole = $("#InputRole").val();
	var userFirstname = $("#InputFirstname").val();
	var userLastname = $("#InputLastname").val();
	var userUsername = $("#InputUsername").val();
	var userEmailAddress = $("#InputEmailAddress").val();
	var userPassword = $("#InputPassword").val();
	
	
	 if(userMarket=="")
	 {
	 $("#InputMarket").html('Market ');
	 $("#InputMarket").focus();
	  $("#InputMarket").fadeOut(10000);
	 return false;
	 }
	 if(userRole=="")
	 {
	 $("#InputRole").html('Market ');
	 $("#InputRole").focus();
	  $("#InputRole").fadeOut(10000);
	 return false;
	 }
	 if(userFirstname=="")
	 {
	 $("#InputFirstname").html('Enter Firstname');
	 $("#InputFirstname").focus();
	  $("#InputFirstname").fadeOut(10000);
	 return false;
	 }
	 if(userLastname=="")
	 {
	 $("#InputLastname").html('Enter Lastname');
	 $("#InputLastname").focus();
	  $("#InputLastname").fadeOut(10000);
	 return false;
	 }
	 if(userUsername=="")
	 {
	 $("#InputUsername").html('Enter Username');
	 $("#InputUsername").focus();
	  $("#InputUsername").fadeOut(10000);
	 return false;
	 }if(userEmailAddress=="")
	 {
	 $("#InputEmailAddress").html('Enter Email Address');
	 $("#InputEmailAddress").focus();
	  $("#InputEmailAddress").fadeOut(10000);
	 return false;
	 }
	  if(userPassword=="")
	 {
	 $("#InputPassword").html('Enter Password');
	 $("#InputPassword").focus();
	  $("#InputPassword").fadeOut(10000);
	 return false;
	 }
   return true;
     
}	
	
	</script>
<script type="text/javascript">
         function checkSpcialChar(event){
            if(!((event.keyCode >= 65) && (event.keyCode <= 90) || (event.keyCode >= 97) && (event.keyCode <= 122) || (event.keyCode >= 48) && (event.keyCode <= 57))){
               event.returnValue = false;
               return;
            }
            event.returnValue = true;
         }
</script>
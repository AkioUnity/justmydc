        <!-- Main content -->
		<style>
	span.suggest {
    font-weight: 400;
    color: #a29c9c;
    font-size: 11px;
}
</style>
<section class="content">
    <div class="row">
            <!-- left column -->
		<div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                  <h3 class="box-title">Add channel </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
				
				
			    <div class="box-body">
					<form  action="<?php echo base_url();?>channel/insertChannel" method="post" enctype="multipart/form-data" onsubmit="return ChannelValidation();">
						<div class="row">
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<div class="form-group">					
								  <label for="ChannelName">Name</label>
								  <input type="text" name="channel_name" class="form-control" id="ChannelName" placeholder="Enter Channel name" value="" required>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<div class="form-group">
								  <label for="ChannelKeywords">Keywords <span class="suggest">(Separate by comma please)</span></label>
								  <input type="text" name="channel_keywords" value="" class="form-control" id="ChannelKeywords" placeholder="Enter Keywords" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<div class="form-group">					
								  <label for="ChannelDescription">Description</label>
								  <textarea id="ChannelDescription" name="channel_description" class="form-control" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<div class="form-group">					
								  <label for="ChannelTitle">Title</label>
								  <textarea id="ChannelTitle" name="channel_title" class="form-control" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<div class="form-group">
								  <label for="inputFacebookPhoto">Facebook Image</label><span id="ProductPhoto" style="color:red;"></span>
								  <input type="file" name="channel_facebook_image" id="inputFacebookPhoto" accept="image/x-png,image/gif,image/jpeg,image/jpg">
								</div>
							</div>
						</div>
                        <?php include 'channel_detail.php'; ?>
						<center><input class="btn btn-success" type="submit" value="Submit" id="ChannelValidation"></center>	
					</form>
				</div><!-- /.box -->
			</div>
		</div>
	</div>
</section>
					
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>					
<style> 
#menu ul,
#menu li {
  list-style: none
}
#menu ul {
  height: auto;
}

#menu li {
  float: left;
  display: inline;
  position: relative;
}
#menu a {
  display: block;
  
  color: #333;
}
#menu ul.menus {
    width: 213px;
    position: absolute;
    z-index: 99;
    display: none;
    border: 1px solid #d7d7d7;
	    background: white;
}
#ul.submenu{
    width: 213px;
    position: absolute;
    z-index: 99;
    display: none;
    border: 1px solid #d7d7d7;
	background: white;
}


#menu ul.menus li {
  display: block;
  width: 100%;
  
 
}

#menu li:hover ul.menus {
  display: block
}
.rr{
	margin:0;
}
.prett {
    padding: 16px 0px 16px 0px;
    font-size: 15px;
    box-shadow: 1px 3px 10px #8080804d;
}


#menu a.prett::after {
  content: "";
 
  position: absolute;
  top: 15px;
  right: 9px
}

#menu ul.menus a:hover {
  background: #00adff;
  color: white;
}

#menu ul.menus .submenu {
  display: none;
  left: 180px;
  top: 0;
  width: 213px;
    position: absolute;
    z-index: 99;
    display: none;
    border: 1px solid #d7d7d7;
    background: white;
}




#menu ul.menus .has-submenu:hover .submenu {
  display: block;
}

</style>

  
  
					
				
              
			  

			 <script src="<?php echo base_url(); ?>assets/datepickar/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/datepickar/jquery.datetimepicker.full.js"></script>
<script>
$(document).ready(function(e) {
    $('#ChannelValidation').click(function() {
		
		
    var ChannelName = $("#ChannelName");
    var ChannelKeywords = $("#ChannelKeywords");
    var ChannelDescription = $("#ChannelDescription");
	var ChannelTitle = $("#ChannelTitle");
	var inputFacebookPhoto = $("#inputFacebookPhoto");
	
	
	
	 if(ChannelName=="")
	 {
	 $("#ChannelName").html('Enter Channel Name');
	 $("#ChannelName").focus();
	  $("#ChannelName").fadeOut(15000);
	 return false;
	 }
	 if(ChannelKeywords=="")
	 {
	 $("#ChannelKeywords").html('Enter Keywords');
	 $("#ChannelKeywords").focus();
	  $("#ChannelKeywords").fadeOut(15000);
	 return false;
	 
	 }
	 
       
	  if(ChannelDescription=="")
	 {
	 $("#ChannelDescription").html('Enter Description');
	 $("#ChannelDescription").focus();
	  $("#ChannelDescription").fadeOut(15000);
	 return false;
	 }
	  
	  if(ChannelTitle=="")
	 {
	 $("#ChannelTitle").html('Enter Title ');
	 $("#ChannelTitle").focus();
	  $("#ChannelTitle").fadeOut(15000);
	 return false;
	 }
	  //if(inputFacebookPhoto=="")
	 //{
	 //$("#inputFacebookPhoto").html('Upload Facebook Image');
	 //$("#inputFacebookPhoto").focus();
	  //$("#inputFacebookPhoto").fadeOut(15000);
	 //return false;
	// }
	 
   
    });
});	

          
</script>
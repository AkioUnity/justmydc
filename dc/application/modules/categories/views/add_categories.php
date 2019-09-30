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
                  <h3 class="box-title">Add Primary Category </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
				<?php if(isset($_GET['msg'])):  ?>
                   <div class="errors" style="color:red;"> This Email already exits </div>
                <?php endif; ?>
				
			    <div class="box-body">
					<form  action="<?php echo base_url();?>categories/insertCategories" method="post" enctype="multipart/form-data" onsubmit="return CategoryVaildation();">
						<div class="row">
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<div class="form-group">					
								  <label for="CategoryTitle">Title</label>
								  <input type="text" name="cc_title" class="form-control" id="CategoryTitle" placeholder="Enter Category Title" value="" required>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<div class="form-group">
								  <label for="CategoryKeywords">Keywords <span class="suggest">(Separate by comma please)</span></label>
								  <input type="text" name="cc_keywords" value="" class="form-control" id="CategoryKeywords" placeholder="Enter comma separated keywords" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<div class="form-group">					
								  <label for="CategoryDescription">Description</label>
								  <textarea id="CategoryDescription" name="cc_description" class="form-control" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<div class="form-group">
								  <label for="inputFacebookPhoto">Facebook Image</label><span id="ProductPhoto" style="color:red;"></span>
								  <input type="file" name="cc_fbimage" id="inputFacebookPhoto" accept="image/x-png,image/gif,image/jpeg,image/jpg">
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<div class="form-group">
								  <label for="inputProductPhoto">Featured Image</label><span id="ProductPhoto" style="color:red;"></span>
								  <input type="file" name="cc_featuredimage" id="inputProductPhoto" accept="image/x-png,image/gif,image/jpeg,image/jpg">
								</div>
							</div>
						</div>
                        <?php include 'category_detail.php'; ?>
						<center><input class="btn btn-info" type="submit" value="Submit" id="CategoryVaildation"></center>	
					</form>
				</div><!-- /.box -->
			</div>
		</div>
	</div>
</section>
						
					
				
              
			  

	<script src="<?php echo base_url(); ?>assets/datepickar/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/datepickar/jquery.datetimepicker.full.js"></script>
<script>

$(document).ready(function(e) {
    $('#CategoryVaildation').click(function() {
		
		
    var Title = $("#CategoryTitle");
    var Keywords = $("#CategoryKeywords")
	var Description = $("#CategoryDescription")
	var facebook = $("#inputFacebookPhoto")
	var product = $("#inputProductPhoto");
	
	
	
	
	 if(Title=="")
	 {
	 $("#Title").html('Enter  Title');
	 $("#CategoryTitle").focus();
	  $("#Title").fadeOut(15000);
	 return false;
	 }
	 if(Keywords=="")
	 {
	 $("#Keywords").html('Enter Keywords');
	 $("#CategoryKeywords").focus();
	  $("#Keywords").fadeOut(15000);
	 return false;
	 
	 }
	 
	  if(Description=="")
	 {
	 $("#Description").html('Enter Description');
	 $("#CategoryDescription").focus();
	  $("#Description").fadeOut(15000);
	 return false;
	 }
	  /*
	  if(facebook=="")
	 {
	 $("#facebook").html('Upload Your Facebook Image ');
	 $("#inputFacebookPhoto").focus();
	  $("#facebook").fadeOut(15000);
	 return false;
	 }
	  if(product=="")
	 {
	 $("#product").html('Upload Your Featured Image');
	 $("#inputProductPhoto").focus();
	  $("#product").fadeOut(15000);
	 return false;
	 }
	 */
    });
});

</script>
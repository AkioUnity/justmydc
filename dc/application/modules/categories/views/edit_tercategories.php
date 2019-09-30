<!-- Main content -->
<section class="content">
	<div class="row">
            <!-- left column -->
		<div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                  <h3 class="box-title">Edit Category</h3>
			
                </div><!-- /.box-header -->
					
                <!-- form start -->
                <div class="box-body">				  
				    
					<?php //echo "<pre>";print_r($categories); die; ?>
					<?php $i=1; foreach ($categories as $categories):$i++;?>
					<form role="form" action="<?php echo base_url(); ?>categories/updateTerCategories?Id=<?php echo $categories['id'];?>&&parent_id=<?php echo $_GET['parent_id'];?>&&name=<?php echo $_GET['name']?>" enctype="multipart/form-data" method="post"  onsubmit="return CategoryVaildation();"/>
                    <input type="hidden" name="id" value="<?php echo $categories['id']; ?>" >
						<div class="form-group">					
						  <label for="CategoryTitle">Title</label>
						  <input type="text" name="cc_title" class="form-control" id="CategoryTitle" value="<?php echo $categories['cc_title']; ?>" required>
						</div>
						<div class="form-group">
						  <label for="CategoryKeywords">Keywords</label>
						  <input type="text" name="cc_keywords" class="form-control" id="CategoryKeywords" value="<?php echo $categories['cc_keywords']; ?>" required>
						</div>
						<div class="form-group">					
						  <label for="CategoryDescription">Description</label>
						  <textarea id="CategoryDescription" name="cc_description" class="form-control" required><?php echo $categories['cc_description']; ?></textarea>
						</div>	
						<div class="form-group">
							  <label for="inputfacebookimage">Facebook Image</label>
							 
							 <?php if($categories['cc_fbimage']) { ?>
							  <a href="<?php echo base_url().'upload/images/'.$categories['cc_fbimage']; ?>" id="link" target="_blank">
									<span class="label label-info" style="font-size:11px;">View</span>
							  </a>
							  <?php } else { echo '<input type="file" name="cc_fbimage" id="inputfacebookimage">'; } ?>
							  <?php if($categories['cc_fbimage']) { ?>
							  <a href="#" id="productLinkfb" style="visibility:visible;" onclick="deletefacebookimage()">
									<span class="label label-danger" style="font-size:11px;">Update</span>
							  </a>
							  <input type="file" name="cc_fbimage" id="inputfacebookimage" style="display:none" accept="image/x-png,image/gif,image/jpeg,image/jpg"> 
								<?php } ?>
						</div>		
						<div class="form-group">
						  <label for="inputlogoimage">Featured Image</label>
						 
						 <?php if($categories['cc_featuredimage']) { ?>
						  <a href="<?php echo base_url().'upload/images/'.$categories['cc_featuredimage']; ?>" id="link" target="_blank">
								<span class="label label-info" style="font-size:11px;">View</span>
						  </a>
						  <?php } else { echo '<input type="file" name="cc_featuredimage" id="inputlogoimage">'; } ?>
						  <?php if($categories['cc_featuredimage']) { ?>
						  <a href="#" id="productLinklogo" style="visibility:visible;" onclick="deletelogoimage()">
								<span class="label label-danger" style="font-size:11px;">Update</span>
						  </a>
							   <input type="file" name="cc_featuredimage" id="inputlogoimage" style="display:none" accept="image/x-png,image/gif,image/jpeg,image/jpg"> 
							<?php } ?>
						</div>
						
							<center><button class="btn btn-info" style="margin:10px;" id="CategoryVaildation">Update</button></center>
						
					</form>
					<?php  endforeach;?>
				</div>
			</div>
		</div>
	</div>	
</section>
<script>
 function deletelogoimage() {
		//alert('hi');
		document.getElementById('inputlogoimage').style.display='block';
		document.getElementById('productLinklogo').style.display='none';
		
		}
function deletefacebookimage() {
		//alert('hi');
		document.getElementById('inputfacebookimage').style.display='block';
		document.getElementById('productLinkfb').style.display='none';

		}	
</script>	


<script src="//code.jquery.com/jquery-1.10.2.js"></script>  
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
<script src="<?php echo base_url(); ?>assets/datepickar/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/datepickar/jquery.datetimepicker.full.js"></script>
		
		
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
	
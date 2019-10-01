<!-- Main content -->
<style>
	textarea#content {
    height: 150px;
}
</style>>
	<div class="row">
            <!-- left column -->
		<div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                  <h3 class="box-title">Edit Profile Media</h3>
			
                </div><!-- /.box-header -->
					
                <!-- form start -->
                <div class="box-body">
					<?php $i=1; foreach ($profileMedia as $profileMedia):$i++;?>
					<form id="" role="form" action="<?php echo base_url(); ?>profile/updateProfileMedia?Id=<?php echo $profileMedia['id'];?>&&profileId=<?php echo $this->input->get('profileId') ?>" enctype="multipart/form-data" method="post">
						<div class="row">
							<div class="col-lg-6 col-sm-6 col-xs-6">
								<div class="form-group">
									  <label for="inputmedia">Media</label>
									 
									 <?php if($profileMedia['pm_file_path']) { ?>
									  <a href="<?php echo base_url().'upload/profile/'.$profileMedia['pm_file_path']; ?>" id="link" target="_blank">
											<span class="label label-success" style="font-size:11px;">View</span>
									  </a>
									  <?php } else { echo '<input type="file" name="media_file" id="inputmedia">'; } ?>
									  <?php if($profileMedia['pm_file_path']) { ?>
									  <a href="#" id="inputmediadelete" style="visibility:visible;" onclick="deleteprofilemedia()">
											<span class="label label-danger" style="font-size:11px;">Update</span>
									  </a>
									  <input type="file" name="media_file" id="inputmedia" style="display:none"> 
										<?php } ?>
								</div>	
							</div>
							<div class="col-lg-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label for="MediaFile">Image / Video</label>
									<select class="form-control" name="media_type">
										<option value="">---Type---</option>
										<option value="1" <?php if($profileMedia['pm_type'] == "image") {?> <?php echo "selected"?> <?php } ?>>Image</option>
										<option value="2" <?php if($profileMedia['pm_type'] == "video") {?> <?php echo "selected"?> <?php } ?>>Video</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-sm-6 col-xs-6">
								<div class="form-group">					
								  <label for="MediaUrl">Url</label>
								 <input type="text" name="media_url" class="form-control name_list" placeholder="Enter Url" value="<?php echo $profileMedia['pm_url']; ?>">
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-xs-6">
								<div class="form-group">
								  <label for="MediaTitle">Title</label>
								  <input type="text" name="media_title" value="<?php echo $profileMedia['title']; ?>" class="form-control" id="MediaTitle" placeholder="Enter Title" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<div class="form-group">					
								  <label for="Address">Content</label>
								  <textarea type="text" name="content" class="form-control textbox" id="content" placeholder="Within 500 characters"><?php echo $profileMedia['content']; ?>"</textarea>
								</div>
							</div>
						</div>
							<center><button class="btn btn-info" style="margin:10px;">Update</button></center>
					</form>
					<?php  endforeach;?>
				</div>
			</div>
		</div>
	</div>	
</section>
<script>
 function deleteprofilemedia() {
		//alert('hi');
		document.getElementById('inputmedia').style.display='block';
		document.getElementById('inputmediadelete').style.display='none';
		
		}
</script>
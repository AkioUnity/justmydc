<style>
 textarea#details {
    height: 150px;
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
                  <h3 class="box-title">Edit Profile Features</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
			    <div class="box-body">
					<?php if ($profileFeatures) { ?>
					<?php $i=1; foreach($profileFeatures as $profileFeatures): ?>
					<form id="" role="form" action="<?php echo base_url(); ?>profile/updateProfileFeatures?Id=<?php echo $profileFeatures['id'];?>&&profileId=<?php echo $this->input->get('id')?>" enctype="multipart/form-data" method="post"/>
                    <input type="hidden" name="id" value="<?php echo $profileFeatures['id']; ?>" >
						<div class="row">
							<div class="col-lg-4 col-sm-4 col-xs-4">
								<div class="form-group">					
								  <label for="FeatureTitle">Feature Title</label>
								  <input type="text" name="FeatureTitle" class="form-control" id="FeatureTitle" placeholder="EnterTitle" value="<?php echo $profileFeatures['feature_title'];?>" required>
								</div>
							</div>
							<div class="col-lg-4 col-sm-4 col-xs-4">
								<div class="form-group">
								  <label for="UrlName">Url Name</label> 
								  <input type="text" name="UrlName" value="<?php echo $profileFeatures['name_url'];?>" class="form-control" id="UrlName" placeholder="Enter Url name">
								</div>
							</div>
							<div class="col-lg-4 col-sm-4 col-xs-4">
								<div class="form-group">
								  <label for="Url">Learn more</label>
								  <input type="text" name="url" value="<?php echo $profileFeatures['learn_url'];?>" class="form-control" id="Url" placeholder="Enter Url">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<div class="form-group">
								  <label for="FeatureDetails">Feature Details</label>
								  <textarea type="text" name="FeatureDetails" value="" class="form-control" id="details" placeholder="Enter Details" required><?php echo $profileFeatures['feature_detail'];?></textarea>
								</div>
							</div>
						</div>
						<center><input class="btn btn-info" type="submit" value="Submit" ></center>	
					</form>
					<?php  endforeach; } ?>
				</div><!-- /.box -->
			</div>
		</div>
	</div>
</section>
			

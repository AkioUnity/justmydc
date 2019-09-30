        <!-- Main content -->
<section class="content">
    <div class="row">
            <!-- left column -->
		<div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                  <h3 class="box-title">Add Ads </h3>
                </div><!-- /.box-header -->
                <!-- form start -->

				
			    <div class="box-body">
					<form  action="<?php echo base_url();?>ads/insertAd" method="post" enctype="multipart/form-data">
						<div class="row">
                            <?php include 'ads_detail.php'; ?>
						</div>
						<center><input class="btn btn-info" type="submit" value="Submit" ></center>	
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

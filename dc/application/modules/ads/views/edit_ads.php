<style>
    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 500;
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
                    <h3 class="box-title">Edit Ads</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <?php //echo "<pre>";print_r($categories); die; ?>
                    <?php $i = 1;
                    $i++; ?>
                    <form id="" role="form" action="<?php echo base_url(); ?>ads/updateAd?Id=<?php echo $ads['id']; ?>"
                          enctype="multipart/form-data" method="post" class="attireCodeToggleBlock"/>
                    <input type="hidden" name="id" value="<?php echo $ads['id']; ?>">
                    <div class="row">
                        <?php include 'ads_detail.php'; ?>
                    </div>
                    <div class="row">

                        <center><input class=" btn btn-info" type="submit" value="Submit"></center>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div>
        </div>
</section>

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
                    <h3 class="box-title">Edit Profile Keyword</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <?php if ($profileFeatures) { ?>
                        <?php $i = 1;
                        foreach ($profileFeatures as $profileFeatures): ?>
                            <form id="" role="form"
                                  action="<?php echo base_url().'profile/updateProfileFeatures?Id='.$profileFeatures['id'].'&profileId='.$this->input->get('profileId') ?>"
                                  enctype="multipart/form-data" method="post">
                            <input type="hidden" name="id" value="<?php echo $profileFeatures['id']; ?>">
                            <input type="hidden" name="link" value="<?php echo $link; ?>">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Keyword</label>
                                        <input type="text" name="FeatureTitle" class="form-control" id="FeatureTitle"
                                               placeholder="Enter Keyword"
                                               value="<?php echo $profileFeatures['feature_title']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" name="UrlName"
                                               value="<?php echo $profileFeatures['name_url']; ?>" class="form-control"
                                               id="UrlName" placeholder="Enter Url">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Keyword Description</label>
                                        <textarea type="text" name="FeatureDetails" value="" class="form-control"
                                                  id="details" placeholder="Enter Details"
                                                  required><?php echo $profileFeatures['feature_detail']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <center><input class="btn btn-info" type="submit" value="Submit"></center>
                            </form>
                        <?php endforeach;
                    } ?>
                </div><!-- /.box -->
            </div>
        </div>
    </div>
</section>
			

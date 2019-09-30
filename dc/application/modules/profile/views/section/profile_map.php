<button class="accordion">Map<i class="fa fa-angle-double-down"></i></button>
<div class="panel">
    <div class="box-body">
        <?php if ($profile) { ?>
            <?php $i = 1;
            foreach ($profile as $profile): ?>
                <form action="<?php echo base_url(); ?>profile/updateProfileMap?profileId=<?php echo $this->input->get('id') ?>"
                      method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="show">Show</label>
                                <input type="text" name="map_show" class="form-control"
                                       placeholder="Enter Show"
                                       value="<?php echo $profile['map_show']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="lat">Latitude</label>
                                <input type="text" id="" name="latitude" class="form-control"
                                       placeholder="Enter Latitude"
                                       value="<?php echo $profile['latitude']; ?>" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="long">Longitude</label>
                                <input type="text" id="" name="longitude" class="form-control"
                                       placeholder="Enter Longitude"
                                       value="<?php echo $profile['longitude']; ?>" >
                            </div>
                        </div>
                    </div>
                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                </form>
                <?php $i++; endforeach;
        } ?>
    </div><!-- /.box -->
</div>
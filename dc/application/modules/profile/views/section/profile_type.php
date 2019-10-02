<button class="accordion">Type<i class="fa fa-angle-double-down"></i></button>
<div class="panel fixed-panel">
    <div class="box-body">
        <form action="<?php echo base_url(); ?>profile/updateProfileType?profileId=<?php echo $this->input->get('id') ?>"
              method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                </div>
                <div class="col-lg-7 col-sm-7 col-xs-7">
                    <div class="form-group">
                        <label for="InputProfile">Profile Type</label>
                        <select class="form-control" name="profile_type_id">
                            <option value="">---Select Profile Type---</option>
                            <?php if ($typeList) {
                                foreach ($typeList as $type):
                                    $isSelected = '';
                                    if ($profile->profile_type_id == $type->id) {
                                        $isSelected = "selected";
                                    }
                                    ?>
                                    <option value="<?php echo $type->id ?>" <?php echo $isSelected; ?>><?php echo ucfirst($type->name); ?></option>
                                <?php
                                endforeach;
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-3 submit-button">
                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                </div>
            </div>
        </form>
    </div><!-- /.box -->
</div>
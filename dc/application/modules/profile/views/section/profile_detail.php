<button class="accordion">Profile Details<i class="fa fa-angle-double-down"></i></button>
<div class="panel">
    <div class="box-body">
        <?php if ($profile) {
            //echo "<pre>"; print_r($profile); die;?>
            <?php $i = 1;
            foreach ($profile as $profile): ?>
                <form action="<?php echo base_url(); ?>profile/updateProfile?profileId=<?php echo $this->input->get('id') ?>"
                      method="post" enctype="multipart/form-data">
                    <?php include "profile_parameters.php";  ?>
                </form>

                <?php $i++; endforeach;
        } else { ?>
        <?php } ?>
    </div><!-- /.box -->
</div>
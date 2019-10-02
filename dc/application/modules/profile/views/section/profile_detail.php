<button class="accordion">Profile Details<i class="fa fa-angle-double-down"></i></button>
<div class="panel">
    <div class="box-body">
        <form action="<?php echo base_url(); ?>profile/updateProfile?profileId=<?php echo $this->input->get('id') ?>"
              method="post" enctype="multipart/form-data">
                    <?php include "profile_parameters.php";  ?>
                </form>
    </div><!-- /.box -->
</div>
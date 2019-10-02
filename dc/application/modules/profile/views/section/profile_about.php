<button class="accordion">About<i class="fa fa-angle-double-down"></i></button>
<div class="panel">
    <div class="box-body">
        <form action="<?php echo base_url(); ?>profile/updateProfileDetail?profileId=<?php echo $this->input->get('id') ?>"
              method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row">
               <?php $this->load->view('profile/components/about_keywords.php'); ?>
            </div>
            <center><input class="btn btn-info" type="submit" value="Submit"></center>
        </form>
    </div><!-- /.box -->
</div>
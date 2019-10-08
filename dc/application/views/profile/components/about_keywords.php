<div class="panel">
    <form action="profile/updateProfile?profileId=<?php echo $post->profile_id; ?>" method="post" role="form"
          class="form-horizontal">
        <input type="hidden" name="link" value="<?php echo $link; ?>">
        <div class="form-group">
            <label class="col-md-4 control-label">Slogan/Mission/Short Statement:</label>
            <div class="col-md-8">
                <input type="text" name="profile_tagline" placeholder="Slogan/Mission/Short Statement"
                       value="<?php echo $post->profile_tagline; ?>" class="form-control">
                <?php echo form_error('profile_tagline'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">About You:</label>
            <div class="col-md-8">
                        <textarea rows="15" name="profile_about"
                                  class="form-control rich"><?php echo $post->profile_about; ?></textarea>
                <?php echo form_error('profile_about'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="align-right">
                    <button class="btn btn-primary" type="submit">save</button>
                </div>
                <hr>
            </div>
        </div>
    </form>
    <div class="standard_profile">
        <?php
        $this->load->view('profile/section/profile_keyword.php');
        ?>
    </div>
</div>

<h4>about & keywords</h4>
<hr/>

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
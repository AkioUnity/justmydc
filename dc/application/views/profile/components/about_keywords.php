<h4>about & keywords</h4>
<hr/>

<div class="form-group">
    <label class="col-md-4 control-label">Slogan/Mission/Short Statement:</label>
    <div class="col-md-8">
        <input type="text" name="title2" placeholder="Slogan/Mission/Short Statement"
               value="<?php echo $post->title2; ?>" class="form-control">
        <?php echo form_error('title2'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">About You:</label>
    <div class="col-md-8">
                        <textarea rows="15" name="description"
                                  class="form-control rich"><?php echo $post->description; ?></textarea>
        <?php echo form_error('description'); ?>
    </div>
</div>
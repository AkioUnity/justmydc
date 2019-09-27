<h4>media</h4>
<hr/>
<div class="form-group">
    <label class="col-md-3 control-label">Slider Media</label>
    <div class="col-md-8">
        <?php $tmp_gallery = ($post->gallery != '') ? json_decode($post->gallery) : array(); ?>
        <?php $gallery = (isset($_POST['gallery'])) ? $_POST['gallery'] : $tmp_gallery; ?>
        <ul class="multiple-uploads">
            <?php foreach ($gallery as $item) {
                ?>
                <li class="gallery-img-list">
                    <input type="hidden" name="gallery[]" value="<?php echo $item; ?>"/>
                    <img src="<?php echo base_url('uploads/gallery/' . $item); ?>"/>
                    <div class="remove-image" onclick="removeImage(this);" img="<?php echo $item; ?>">
                        X
                    </div>
                </li>
            <?php } ?>
            <li class="add-image" id="dragandrophandler">+</li>
        </ul>
        <div class="clearfix"></div>
        <span class="gallery-upload-instruction">You can drag drop to reorder the gallery photos. Photos are not resized.</span>
        <div class="clearfix clear-top-margin"></div>
    </div>
</div>
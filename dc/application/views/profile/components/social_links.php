<h4>Link & Social</h4>
<hr/>
<div class="form-group">
    <label class="col-md-3 control-label">website</label>
    <div class="col-md-8">
        <?php $v = (set_value('website') != '') ? set_value('website') : $post->website; ?>
        <input id="website" type="text" name="website" placeholder="website"
               value="<?php echo $v; ?>" class="form-control">
        <?php echo form_error('website'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-12 link-label">Hotlink 1</label>
    <label class="col-md-1 control-label">Label</label>
    <div class="col-md-2">
        <input type="text" name="label1"
               value="<?php echo get_post_meta($post->id, 'label1', ''); ?>"
               class="form-control">
    </div>
    <label class="col-md-1 control-label">link</label>
    <div class="col-md-8">
        <input type="text" name="link1"
               value="<?php echo get_post_meta($post->id, 'link1', ''); ?>"
               class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="col-md-12 link-label">Hotlink 2</label>
    <label class="col-md-1 control-label">Label</label>
    <div class="col-md-2">
        <input type="text" name="label2"
               value="<?php echo get_post_meta($post->id, 'label2', ''); ?>"
               class="form-control">
    </div>
    <label class="col-md-1 control-label">link</label>
    <div class="col-md-8">
        <input type="text" name="link2"
               value="<?php echo get_post_meta($post->id, 'link2', ''); ?>"
               class="form-control">
    </div>
</div>
<?php for ($i = 3; $i < 6; $i++) { ?>

    <div class="form-group">
        <label class="col-md-12 link-label">Select Social <?php echo $i - 2; ?></label>
        <label class="col-md-1 control-label">Type</label>
        <div class="col-md-2">
            <input type="text" name="label<?php echo $i; ?>"
                   value="<?php echo get_post_meta($post->id, 'label' . $i, ''); ?>"
                   class="form-control">
        </div>
        <label class="col-md-1 control-label">link</label>
        <div class="col-md-8">
            <input type="text" name="link<?php echo $i; ?>"
                   value="<?php echo get_post_meta($post->id, 'link' . $i, ''); ?>"
                   class="form-control">
        </div>
    </div>
<?php } ?>

<h4>Link & Social</h4>

<div class="form-group">
    <label class="col-md-3 control-label">website</label>
    <div class="col-md-8">
        <?php $v = (set_value('profile_web') != '') ? set_value('profile_web') : $post->profile_web; ?>
        <input id="website" type="text" name="profile_web" placeholder="website"
               value="<?php echo $v; ?>" class="form-control">
        <?php echo form_error('website'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-12 link-label">Hotlink 1</label>
    <label class="col-md-1 control-label">Label</label>
    <div class="col-md-2">
        <input type="text" name="label1"
               value="<?php echo isset($profileSocial[3]['hotlink_name'])?$profileSocial[3]['hotlink_name']:''; ?>"
               class="form-control">
    </div>
    <label class="col-md-1 control-label">link</label>
    <div class="col-md-8">
        <input type="text" name="link1"
               value="<?php echo isset($profileSocial[3]['ps_url'])?$profileSocial[3]['ps_url']:''; ?>"
               class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="col-md-12 link-label">Hotlink 2</label>
    <label class="col-md-1 control-label">Label</label>
    <div class="col-md-2">
        <input type="text" name="label2"
               value="<?php echo isset($profileSocial[4]['hotlink_name'])?$profileSocial[4]['hotlink_name']:''; ?>"
               class="form-control">
    </div>
    <label class="col-md-1 control-label">link</label>
    <div class="col-md-8">
        <input type="text" name="link2"
               value="<?php echo isset($profileSocial[4]['ps_url'])?$profileSocial[4]['ps_url']:''; ?>"
               class="form-control">
    </div>
</div>
<?php for ($i = 0; $i < 3; $i++) {
//    print_r($social_enum)?>
    <div class="form-group">
        <label class="col-md-12 link-label">Select Social <?php echo $i +1; ?></label>
        <label class="col-md-1 control-label">Type</label>
        <div class="col-md-2">
            <select class="form-control" name="ps_name[]">
                <?php for($j=0;$j<count($social_enum)-1 ;$j++){
                    $enum=$social_enum[$j];
                    ?>
                    <option value="<?php echo $enum; ?>" <?php if (isset($profileSocial[$i]['ps_name']) && $enum == $profileSocial[$i]['ps_name']) {
                        echo "selected";
                    } ?>><?php echo $enum; ?></option>
                    <?php
                } ?>
            </select>
        </div>
        <label class="col-md-1 control-label">link</label>
        <div class="col-md-8">
            <input type="text" name="ps_url[]"
                   value="<?php echo isset($profileSocial[$i]['ps_url'])?$profileSocial[$i]['ps_url']:''; ?>"
                   class="form-control">
        </div>
    </div>
<?php } ?>

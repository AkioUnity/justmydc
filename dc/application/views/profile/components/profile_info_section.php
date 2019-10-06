<h4>Profile Info</h4>

<!--                        --><?php //include 'components/select_category.php' ?>
<div class="form-group">
    <label class="col-md-3 control-label">Business Name</label>
    <div class="col-md-8">
        <input type="text" name="profile_name" placeholder="title"
               value="<?php echo $post->profile_name; ?>" class="form-control">
        <?php echo form_error('title'); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">address</label>
    <div class="col-md-8">
        <input type="text" name="profile_add" placeholder="address"
               value="<?php echo $post->profile_add; ?>" class="form-control">
        <?php echo form_error('address'); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">city</label>
    <div class="col-md-8">
        <input type="text" id="city" name="profile_city"
               value="<?php echo $post->profile_city; ?>"
               placeholder="city" class="form-control">
        <?php echo form_error('city'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">state</label>
    <div class="col-md-8">
        <input type="text" name="profile_st"
               value="<?php echo $post->profile_st; ?>"  class="form-control">
        <?php echo form_error('profile_st'); ?>
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label">zip_code</label>
    <div class="col-md-8">
        <?php $v = (set_value('zip_code') != '') ? set_value('zip_code') : $post->profile_zip; ?>
        <input type="text" name="profile_zip" placeholder="zip_code" value="<?php echo $v; ?>"
               class="form-control">
        <?php echo form_error('zip_code'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Phone</label>
    <div class="col-md-8">
        <?php $v = (set_value('profile_contact') != '') ? set_value('profile_contact') : $post->profile_contact; ?>
        <input id="phone_no" type="text" name="profile_contact" placeholder="phone"
               value="<?php echo $v; ?>" class="form-control">
        <?php echo form_error('profile_contact'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Email</label>
    <div class="col-md-8">
        <?php $v = (set_value('profile_email') != '') ? set_value('profile_email') : $post->profile_email; ?>
        <input id="email" type="text" name="profile_email" placeholder="email"
               value="<?php echo $v; ?>" class="form-control">
        <?php echo form_error('email'); ?>
    </div>
</div>
<h4>Profile Info</h4>
<hr/>
<!--                        --><?php //include 'components/select_category.php' ?>
<div class="form-group">
    <label class="col-md-3 control-label">Business Name</label>
    <div class="col-md-8">
        <input type="text" name="title" placeholder="title"
               value="<?php echo $post->title; ?>" class="form-control">
        <?php echo form_error('title'); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">address</label>
    <div class="col-md-8">
        <input type="text" name="address" placeholder="address"
               value="<?php echo $post->address; ?>" class="form-control">
        <?php echo form_error('address'); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">city</label>
    <div class="col-md-8">
        <input type="text" id="city" name="city"
               value="<?php echo $post->city; ?>"
               placeholder="city" class="form-control">
        <?php echo form_error('city'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">state</label>
    <div class="col-md-8">
        <input type="text" name="state"
               value="<?php echo $post->state; ?>"  class="form-control">
        <?php echo form_error('state'); ?>
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label">zip_code</label>
    <div class="col-md-8">
        <?php $v = (set_value('zip_code') != '') ? set_value('zip_code') : $post->zip_code; ?>
        <input type="text" name="zip_code" placeholder="zip_code" value="<?php echo $v; ?>"
               class="form-control">
        <?php echo form_error('zip_code'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Phone</label>
    <div class="col-md-8">
        <?php $v = (set_value('phone_no') != '') ? set_value('phone_no') : $post->phone_no; ?>
        <input id="phone_no" type="text" name="phone_no" placeholder="phone"
               value="<?php echo $v; ?>" class="form-control">
        <?php echo form_error('phone_no'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Email</label>
    <div class="col-md-8">
        <?php $v = (set_value('email') != '') ? set_value('email') : $post->email; ?>
        <input id="email" type="text" name="email" placeholder="email"
               value="<?php echo $v; ?>" class="form-control">
        <?php echo form_error('email'); ?>
    </div>
</div>
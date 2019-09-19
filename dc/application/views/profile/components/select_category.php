<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.14
 * Time: 4:00 上午
 */
?>

<div class="form-group">
    <label class="col-md-3 control-label" for="inputEmail1">Category</label>
    <div class="col-md-9">
        <select name="category" class="form-control" required style="height: calc(3.25rem + 3px);">
            <option value="">Select Category</option>
            <?php foreach ($categories as $row) {
                $sel = (isset($post->category) && $post->category==$row->id)?'selected="selected"':'';
                ?>
                <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->cc_title;?></option>
                <?php
            }?>
        </select>
        <?php echo form_error('category');?>
    </div>
</div>

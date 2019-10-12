    <div class="box-header">
        <h3 class="box-title" style="padding-left: 25px">
            <a href="<?php echo base_url().'business?name='.$parent_title.'&&id='.$sub_category->parent_id ?>">
                <?php echo $parent_title; ?>
            </a> | <a href="<?php echo base_url().'business/sub?name='.$parent_title.'&&sub_id='.$sub_category->id ?>">
                <?php echo $sub_category->cc_title ?>
            </a>
        </h3>
    </div><!-- /.box-header -->
<!--    <hr/>-->

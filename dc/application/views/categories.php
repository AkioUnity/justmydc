<link rel="stylesheet" type="text/css" href="<?php echo css_url('channel.css') ?>"/>
<?php //echo $this->input->get('id'); ?>
<!-- Main content -->
<?php //include 'sections/like_us_facebook.php'; ?>
<?php include 'sections/category_section.php'; ?>

<section class="content">
    <div class="row">
        <div class="col-md-9">
            <?php include 'categories_table.php'; ?>
        </div>
        <div class="col-md-3">
            <div class="box-header">
                <h3 class="box-title">Related Categories</h3>
            </div><!-- /.box-header -->
            <table class="table borderless">
                <tbody>
                <?php if ($sub_categories) {
                    //echo "<pre>"; print_r($categories); die;?>
                    <?php
                    foreach ($sub_categories as $c_categories): ?>
                        <tr>
                            <td>
                                <a href="<?php echo base_url().'business/sub?name='.$_GET['name'].'&&sub_id='.$c_categories['id'] ?>">
                                    <span id="viewDet"><?php echo $c_categories['cc_title']; ?></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;
                } ?>
                </tbody>
            </table>
            <h3>Trending on JustMy</h3>
            <?php foreach ($posts as $post) {
                include 'sections/trending_td.php';
             } ?>
        </div>
    </div>
</section><!-- /.content -->
<?php $ad_id = -1; ?>
<?php include 'sections/interactive_ad.php'; ?>


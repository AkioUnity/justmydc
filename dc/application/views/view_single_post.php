<link rel="stylesheet" type="text/css" href="<?php echo css_url('article.css')?>"/>
<?php
//if ($view) { ?>
<!--    <div class="section-header section">-->
<!--        <div class="container-fluid">-->
<!--            <div class="row">-->
<!--                <div class="col-md-6 section-header-left">-->
<!--                    --><?php //if ($view['cp_image']){ ?>
<!--                    <img id="photo" src="https://2019fun.justmy.com/upload/images/--><?php //echo $view['cp_image']; ?><!--" alt="Logo Image">-->
<!--                    --><?// } ?>
<!--                    <h1 id="title1">--><?php //echo $view['cp_title']; ?><!--</h1>-->
<!--                    <br>-->
<!--                    <h6 id="header">--><?php //echo $view['post_date']; ?><!--| --><?php //echo $view['cp_author_name']; ?><!--</h6>-->
<!--                    <br>-->
<!--                    <p id="excerpt">-->
<!--                        --><?php //echo $view['cp_post_excerpt']; ?>
<!--                    </p>-->
<!--                </div>-->
<!--                -->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    --><?php
//} ?>

<?php
//if ($viewDataContent) { ?>
<!--    --><?php //foreach ($viewDataContent as $viewcont): ?>
<!--        <div class="row no-gutters">-->
<!--            <div class="col-12">-->
<!--                <div class="container-fluid" style="padding: 5%">-->
<!--                    <p id="body">-->
<!--                        --><?php //$original_array = unserialize($viewcont['content']); ?>
<!--                        --><?php //foreach ($original_array as $viewd): ?>
<!--                            --><?php //echo $viewd . "</br>"; ?>
<!--                        --><?php //endforeach; ?>
<!--                    </p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    --><?php //endforeach;
//} ?>
<?php $i=0;
foreach ($post_section as $section) { $i++; ?>
    <?php echo $section['content'] ?>
    <?php if ($i==0){  ?>
        <div class="col-md-6" style="padding-right: 0 ;text-align: right;">
            <!--                    section-header-right-->
            <img src="https://2019fun.justmy.com/upload/images/<?php echo $view['cp_post_image']; ?>" alt="featured Image">

        </div>
    <? }?>
<?php } ?>

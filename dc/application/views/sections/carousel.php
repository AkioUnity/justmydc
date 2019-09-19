<?php /**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.05
 * Time: 1:38 上午
 */
?>

<!--carousel start -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php for ($i = 0; $i < sizeof($spotlights); $i++) { ?>
            <li data-target="#myCarousel"
                data-slide-to="<?php echo $i ?>" <?php echo $i == 0 ? "class=\"active\"" : ""; ?>></li>
        <?php } ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php for ($i = 0; $i < sizeof($spotlights); $i++) { ?>
            <div class="item <?php echo $i == 0 ? "active" : ""; ?>">
                <a href="<?php echo str_replace('https://2019fun.justmy.com', 'https://' . $_SERVER['SERVER_NAME'], $spotlights[$i]->cp_url); ?>">
                    <img src="<?php echo admin_image_url($spotlights[$i]->spotlight_image) ?>"
                         alt="<?php echo $spotlights[$i]->spotlight_image ?>" style="width:100%;">
                    <div class="carousel-caption">
                        <h3><?php echo $spotlights[$i]->link_text ?></h3>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!--carousel end -->
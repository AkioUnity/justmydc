<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.05
 * Time: 1:46 上午
 */
?>
<style>
    .img_click {
        width: 3.5rem;
        /*float: left;*/
    }

    .img_btn {
        position: absolute;
        margin: 20px;
    }

    body, .modal-open {
        padding-right: 0px !important;
    }

    .business_field {
        display: initial;
    }

    #title.business_field {
        font-size: 4rem;
    }

    #title2.business_field {
        font-size: 26px;
    }

    .channel_detail .business{
        font-weight: 600;
        color: #666666;
        font-size: 19px;
    }

</style>

<!-- Central Modal Small -->
<div class="row">
    <div class="channel_section ">
        <div class="channel_detail">
            <div class="container-fluid" style="padding-right: 50%;padding-bottom: 2%">
                <img class="img_click img_btn" onclick="editValue('title')" data-toggle='modal' data-target='#myModal'
                     src="<?php echo image_url('cross_icon.png') ?>"/>
                <img src="http://2019fun.justmy.com//bran-media/absolutemoving_alogovert.png"
                     style="width:100%; border-radius: 50%">
            </div>

            <div>
                <?php editBtn('title'); ?>
                <span id="title" class="business_field"><?php echo $post['title']; ?></span>
            </div>
            <div>
                <?php editBtn('title2'); ?>
                <span id="title2" class="business_field"><?php echo $post['title2']; ?></span>
            </div>

            <h6 class="business">
                <?php editBtn('phone_no'); ?>
                <a href="tel:<?php echo $post['phone_no']; ?>" id="phone_no"><?php echo $post['phone_no']; ?></a> | <a
                        href="mailto:<?php echo $post['email']; ?>" id="email"><?php echo $post['email']; ?></a>
                <?php editBtn('email'); ?>
            </h6>


            <br>
            <h6 id="header">Links</h6>
            <p id="excerpt">
                <?php editBtn('website'); ?>
                <a href="<?php echo $post['website']; ?>">Website</a> | <a href="link2">Donate</a> | <a href="link3">Quote
                    Request</a></p>
            <h6 id="header">Social</h6>
            <p id="facebook">
                <?php editBtn('facebook_profile'); ?>
                <a href="">Facebook</a> | <a href="instagram_url">Instagram</a> | <a
                        href="pinterest_url">Pinterest</a></p>

            <p id="excerpt">
                <?php editBtn('excerpt'); ?>
                <?php echo $post['excerpt']; ?></p>
        </div>
    </div>
    <div class="channel_section">
        <img class="img_click img_btn" onclick="editValue('title')" src="<?php echo image_url('cross_icon.png') ?>"/>
        <img src="http://2019fun.justmy.com//bran-media/teamlocal_pro_abosolute_moving.jpg" style="width: 100%">
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Input Text</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="div-crop">
                    <input type="text" placeholder="Please input text" value="text" id="modal_text"
                           class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary onclick_save" data-dismiss="modal">OK</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    let cur_id;

    function editValue(id) {
        cur_id = id;
        $("#modal-title").text('Please input ' + id);
        console.log(id, $("#" + id).text());
        $("#modal_text").val($("#" + id).text());
    }

    $('.onclick_save').on('click', function () {
        let cur_val = $("#modal_text").val();
        $("#" + cur_id).text(cur_val);
        $("[name='" + cur_id + "']").val(cur_val);
    });

    // $(".img_click").mousedown(function () {
    //     var mrgtb = parseInt($(this).css("margin-top"));
    //
    //     var mrglf = parseInt($(this).css("margin-left"));
    //
    //     mrgtb = mrgtb + 3;
    //
    //     mrglf = mrglf + 3;
    //
    //     $(this).css("margin-top", mrgtb + "px").css("margin-left", mrglf + "px");
    //
    //
    // }).mouseup(function () {
    //     var mrgtb = parseInt($(this).css("margin-top"));
    //
    //     var mrglf = parseInt($(this).css("margin-left"));
    //
    //     mrgtb = mrgtb - 3;
    //
    //     mrglf = mrglf - 3;
    //
    //     $(this).css("margin-top", mrgtb + "px").css("margin-left", mrglf + "px");
    //
    // });
</script>
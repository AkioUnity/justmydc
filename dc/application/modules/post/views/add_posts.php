<!-- Main content -->
<style>
    .urlpost {
        display: inline-block;
        width: 70%;
    }

    .urlfont {
        font-weight: 100;
    }

    .fstMultipleMode .fstQueryInput {
        font-size: 15px;
    }

    label {
        font-size: 14px;
    }

    .fstChoiceItem {
        font-size: 14px;
    }
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/fastselect.min.css">
<script src="<?php echo base_url(); ?>assets/dist/js/fastselect.standalone.js"></script>
<section class="content addPost">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                    <h3 class="box-title">Add <?php echo $title; ?> </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <form action="<?php echo base_url(); ?>post/insertPost" method="post" enctype="multipart/form-data" id="post_form">
                        <input type="hidden" name="title" value="<?php echo $title; ?>">
                        <input type="hidden" name="post_user" value="0">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="PostTitle">Title</label>
                                    <input type="text" name="post_title" class="form-control" id="PostTitle"
                                           placeholder="Enter <?php echo $title; ?> Title" value="" required>
                                </div>
                            </div>
                        </div>
                        <?php if ($title == "Post") { ?>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="InputMarket">Market</label>
                                        <select class="form-control multipleSelect" name="markets[]" multiple>
                                            <option value="">---Select Market---</option>

                                            <?php if ($marketLists) {
                                                //echo "<pre>"; print_r($categoryLists);die;
                                                foreach ($marketLists as $keys => $marketList):
                                                    $isSelected = '';
                                                    foreach ($marketAddedLists as $marketAddedList) {
                                                        if ($marketAddedList['market_id'] == $marketList['market_id']) {
                                                            $isSelected = 'selected';
                                                        }
                                                    }
                                                    ?>
                                                    <option value="<?php echo $marketList['market_id'] ?>" <?php echo $isSelected; ?>><?php echo ucfirst($marketList['market_name']); ?></option>
                                                <?php
                                                endforeach;
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="InputProfile">Channel</label>
                                        <select class="form-control multipleSelect" name="channel[]" multiple>
                                            <option value="">---Select Channels---</option>

                                            <?php if ($channelLists) {
                                                //echo "<pre>"; print_r($categoryLists);die;
                                                foreach ($channelLists as $keys => $channelList):
                                                    $isSelected = '';
                                                    foreach ($channelAddedLists as $channelAddedList) {
                                                        if ($channelAddedList['channel_id'] == $channelList['channel_id']) {
                                                            $isSelected = 'selected';
                                                        }
                                                    }
                                                    ?>
                                                    <option value="<?php echo $channelList['channel_id'] ?>" <?php echo $isSelected; ?>><?php echo ucfirst($channelList['channel_name']); ?></option>
                                                <?php
                                                endforeach;
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="InputProfile">Profile</label>
                                        <select class="form-control multipleSelect" name="profile[]" multiple>
                                            <option value="">---Select Profile Type---</option>

                                            <?php if ($profileLists) {
                                                //echo "<pre>"; print_r($categoryLists);die;
                                                foreach ($profileLists as $keys => $profileList):
                                                    $isSelected = '';
                                                    foreach ($profileAddedLists as $profileAddedList) {
                                                        if ($profileAddedList['profile_id'] == $profileList['profile_id']) {
                                                            $isSelected = "selected";
                                                        }
                                                    }
                                                    ?>
                                                    <option value="<?php echo $profileList['profile_id'] ?>" <?php echo $isSelected; ?>><?php echo ucfirst($profileList['profile_name']); ?></option>
                                                <?php
                                                endforeach;
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="html">Post Facebook Image</label>
                                        <input type="file" name="cp_post_facebook_image" id="html">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="PostTitle2">Title 2</label>
                                        <input type="text" name="post_title2" class="form-control" id="PostTitle2"
                                               placeholder="Enter Post Title second" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="Postexcerpt">Post excerpt</label>
                                        <input type="text" name="post_excerpt" class="form-control" id="Postexcerpt"
                                               placeholder="Enter Post excerpt" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Url</label><br>
                                        <label class="urlfont">http://2019fun.justmy.com/post/viewpost/&nbsp;</label>
                                        <input type="text" name="post_url" class="form-control urlpost"
                                               placeholder="Enter Post Url" value="" required><span> /</span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="PostAuthor">Author </label>
                                        <input type="text" id="PostAuthor" name="post_author" class="form-control"
                                               value="">
                                        <?php $date = date("F d, Y"); ?>
                                        <input type="hidden" id="Post_date" name="Post_date"
                                               value="<?php echo $date; ?>">
                                    </div>
                                </div>
                                <?php include 'post_detail.php'; ?>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="inputProductPhoto">Logo Image</label>
                                        <input type="file" name="post_image" id="inputProductPhoto"
                                               accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php include 'post_section.php'; ?>
                        <center><input class="btn btn-info" type="submit" value="Submit"></center>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function () {
        jQuery('.dropdown-submenu a.test').on("click", function (e) {
            jQuery(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });

    });
</script>
<script>

    $('.multipleSelect').fastselect();

</script>
<style>
    #menu ul,
    #menu li {
        list-style: none
    }

    #menu ul {
        height: auto;
    }

    #menu li {
        float: left;
        display: inline;
        position: relative;
    }

    #menu a {
        display: block;

        color: #333;
    }

    #menu ul.menus {
        width: 213px;
        position: absolute;
        z-index: 99;
        display: none;
        border: 1px solid #d7d7d7;
        background: white;
    }

    #ul.submenu {
        width: 213px;
        position: absolute;
        z-index: 99;
        display: none;
        border: 1px solid #d7d7d7;
        background: white;
    }

    #menu ul.menus li {
        display: block;
        width: 100%;

    }

    #menu li:hover ul.menus {
        display: block
    }

    .rr {
        margin: 0;
    }

    .prett {
        padding: 16px 0px 16px 0px;
        font-size: 15px;
        box-shadow: 1px 3px 10px #8080804d;
    }

    #menu a.prett::after {
        content: "";

        position: absolute;
        top: 15px;
        right: 9px
    }

    #menu ul.menus a:hover {
        background: #00adff;
        color: white;
    }

    #menu ul.menus .submenu {
        display: none;
        left: 180px;
        top: 0;
        width: 213px;
        position: absolute;
        z-index: 99;
        display: none;
        border: 1px solid #d7d7d7;
        background: white;
    }

    #menu ul.menus .has-submenu:hover .submenu {
        display: block;
    }

</style>
<script src="<?php echo base_url(); ?>assets/datepickar/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/datepickar/jquery.datetimepicker.full.js"></script>

<!-- Main content -->
<style>
    .fstResultItem {
        font-size: 15px !important;
        display: block;
        margin: 0;
        cursor: pointer;
        border-top: 1px solid #fff;
    }

    .fstMultipleMode .fstControls {
        box-sizing: border-box;
        padding: 0.3em 0.5em 0em 0.5em !important;
        overflow: hidden;
        width: 100%;
        cursor: text;
    }

    .fstMultipleMode .fstQueryInputExpanded {
        float: none;
        width: 100%;
        padding: .28571em .35714em !important;
    }

    .fstMultipleMode .fstQueryInput {
        font-size: 15px !important;
        float: left;
        padding: 0 !important;
        margin: 0 0 0.35714em 0;
        width: 2em;
        color: #999;
    }

    box-header.a {
        color: #525456;
        font-size: 15px;
    }

    .status {
        text-align: right;
    }

    span#res {
        color: #5c5e61;
        font-size: 15px;
    }
</style>
<style>
    .urlpost {
        display: inline-block !important;
        width: 70% !important;
    }

    .urlfont {
        font-weight: 100;
    }

    .urlfont-size {
        font-size: 14px;
    }

    .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
        text-align: center;
    }

    .nav-pills > li > a {
        text-align: center;
    }

    .tabshtml {
        border: solid 1px #c1c1c1;
        border-radius: 3px;
    }

</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/fastselect.min.css">
<script src="<?php echo base_url(); ?>assets/dist/js/fastselect.standalone.js"></script>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                    <div class="col-md-6">
                        <h3 class="box-title">Edit Post <?php echo $posts['c_user_id'] == 0 ? 'Type' : '' ?></h3>
                    </div>
                    <?php if ($posts['c_user_id'] != 0) { ?>
                        <div class="col-md-6 status"><a
                                    href="<?php echo base_url(); ?>post/postStatus?id=<?php echo $this->input->get('id') ?>"><span
                                        class="fa fa-pencil-square-o" id="res">Add Status</span></a></div>
                    <?php } ?>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <div class="box-body">
                    <form id="post_form" role="form"
                          action="<?php echo base_url(); ?>post/updatePost"
                          enctype="multipart/form-data" method="post" class="attireCodeToggleBlock">
                        <input type="hidden" name="post_id" value="<?php echo $posts['post_id']; ?>">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="PostTitle">Title</label>
                                <input type="text" name="post_title" class="form-control" id="PostTitle"
                                       placeholder="Enter Post Title"
                                       value="<?php echo $posts['cp_title']; ?>"
                                       required>
                            </div>
                        </div>
                        <?php if ($posts['c_user_id'] != 0) { ?>
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
                            <div class="col-lg-6 colvalue-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="PostTitle2">Title 2</label>
                                    <input type="text" name="post_title2" class="form-control" id="PostTitle2"
                                           placeholder="Enter Post Title second" required
                                           value="<?php echo $posts['cp_title2']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="Postexcerpt">Post excerpt</label>
                                    <input type="text" name="post_excerpt" class="form-control" id="Postexcerpt"
                                           placeholder="Enter Post excerpt"
                                           value="<?php echo $posts['cp_post_excerpt']; ?>" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="PostUrl">Url</label>
                                    <br>
                                    <label class="urlfont">http://2019fun.justmy.com/post/viewpost/&nbsp;</label>
                                    <input type="text" name="post_url" class="form-control urlpost" id="PostUrl"
                                           placeholder="Enter Post Url"
                                           value="<?php echo substr($posts['cp_url'], 40); ?>" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="PostAuthor">Author</label>
                                    <input type="text" id="PostAuthor" name="post_author" class="form-control"
                                           value="<?php echo $posts['cp_author_name'];; ?>">
                                </div>
                            </div>
                            <?php include 'post_detail.php'; ?>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="inputProductPhoto">Logo Image</label>
                                    <?php if ($posts['cp_image']) { ?>
                                        <a href="<?php echo base_url() . 'upload/images/' . $posts['cp_image']; ?>"
                                           id="link" target="_blank"> <span class="label label-success"
                                                                            style="font-size:11px;">View</span>
                                        </a>
                                        <input type="hidden" name="cp_image" value="<?php echo ($posts['cp_image']) ?>">
                                    <?php } else {
                                        echo '<input type="file" name="post_image" id="inputProductPhoto">';
                                    } ?>
                                    <?php if ($posts['cp_image']) { ?>
                                        <a href="#" id="productLinklogo" style="visibility:visible;"
                                           onclick="deletelogoimage()"> <span class="label label-danger"
                                                                              style="font-size:11px;">Update</span>
                                        </a>
                                        <input type="file" name="post_image" id="inputProductPhoto"
                                               style="display:none"
                                               accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Post Facebook Image</label>
                                    <?php if ($posts['cp_post_facebook_image']) { ?>
                                        <a href="<?php echo base_url() . 'upload/images/' . $posts['cp_post_facebook_image']; ?>"
                                           id="link" target="_blank"> <span class="label label-success"
                                                                            style="font-size:11px;">View</span>
                                        </a>
                                        <a href="#" id="productLinklogo2" style="visibility:visible;"
                                           onclick="deletefacebookimage()"> <span class="label label-danger"
                                                                                  style="font-size:11px;">Update</span>
                                        </a>
                                        <input type="file" name="cp_post_facebook_image" id="inputProductPhoto2"
                                               style="display:none"
                                               accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                    <?php } else {
                                        echo '<input type="file" name="cp_post_facebook_image" id="inputProductPhoto2">';
                                    } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php include 'post_section.php'; ?>
                        <center>
                            <button type="submit" class="btn btn-info" style="margin:10px;">Update</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    $('.multipleSelect').fastselect();

</script>
<script>
    function deletelogoimage() {
        document.getElementById('inputProductPhoto').style.display = 'block';
        document.getElementById('productLinklogo').style.display = 'none';

    }

    function deletefacebookimage() {
        document.getElementById('inputProductPhoto2').style.display = 'block';
        document.getElementById('productLinklogo2').style.display = 'none';
    }
</script>
<script>
    function deleteHTML() {
        document.getElementById('html').style.display = 'block';
        document.getElementById('productLinkHtml').style.display = 'none';

    }
</script>

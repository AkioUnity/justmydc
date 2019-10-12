<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/fastselect.min.css">
<script src="<?php echo base_url(); ?>assets/dist/js/fastselect.standalone.js"></script>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="market">Market</label>
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
        <label for="profile">Profile</label>
        <select class="form-control" name="profile_name" >
            <option value="">---Select Profile---</option>
            <?php if ($profileLists) {
                foreach ($profileLists as $keys => $profileList):
                    ?>
                    <option value="<?php echo $profileList['profile_id'] ?>" <?php if ($profileList['profile_id'] == (isset($ads)?$ads['profile_id']:'')) {
                        echo "selected";
                    } ?>><?php echo ucfirst($profileList['profile_name']); ?></option>
                <?php
                endforeach;
            } ?>

        </select>
    </div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-6">
    <div class="form-group">
        <label for="InputMarket">Categories</label>
        <select class="form-control multipleSelect" name="categories[]" multiple>
            <option value="">---Select Categories---</option>

            <?php if ($categoryLists) {
                //echo "<pre>"; print_r($categoryLists);die;
                foreach ($categoryLists as $keys => $categoryList):
                    $isSelected = '';
                    foreach ($categoryAddedLists as $categoryAddedList) {
                        if ($categoryAddedList['cat_id'] == $categoryList['id']) {
                            $isSelected = 'selected';
                        }
                    }
                    ?>
                    <option value="<?php echo $categoryList['id'] ?>" <?php echo $isSelected; ?>><?php echo ucfirst($categoryList['cc_title']); ?></option>
                <?php
                endforeach;
            } ?>

        </select>
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ad_url">Ad Campaign Title</label>
        <input type="text" name="ad_campaign_title" id="ad_campaign_title" class="form-control"
               placeholder="Enter campaign title" value="<?php echo isset($ads['ad_campaign_title'])?$ads['ad_campaign_title']:''; ?>" >
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-6">
    <div class="form-group">
        <label for="ad_type">Ad Type</label>
        <select class="form-control" name="ad_type" >
            <option value="">---Select Ad-Type---</option>
            <option value="1" <?php if ($ads['ad_type'] == "site") { ?><?php echo "selected" ?><?php } ?>>Site</option>
            <option value="2" <?php if ($ads['ad_type'] == "channel") { ?><?php echo "selected" ?><?php } ?>>Channel</option>
            <option value="3" <?php if ($ads['ad_type'] == "member") { ?><?php echo "selected" ?><?php } ?>>Member</option>
            <option value="4" <?php if ($ads['ad_type'] == "non-member") { ?><?php echo "selected" ?><?php } ?>>Non-Member</option>
            <option value="5" <?php if ($ads['ad_type'] == "sponsorship") { ?><?php echo "selected" ?><?php } ?>>Sponsorship</option>
            <option value="6" <?php if ($ads['ad_type'] == "Member Content") { ?><?php echo "selected" ?><?php } ?>>Member Content</option>
            <option value="7" <?php if ($ads['ad_type'] == "Event Content") { ?><?php echo "selected" ?><?php } ?>>Event Content</option>
        </select>
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-6">
    <div class="form-group">
        <label for="ad_size">Ad Layout</label>
        <select class="form-control" name="ad_layout" >
            <option value="">---Select Ad Layout---</option>
            '','interactive','banner'
            <option value="1" <?php if ($ads['ad_layout'] == "skyscraper") { ?><?php echo "selected" ?><?php } ?>>skyscraper</option>
            <option value="2" <?php if ($ads['ad_layout'] == "interactive") { ?><?php echo "selected" ?><?php } ?>>interactive</option>
            <option value="3" <?php if ($ads['ad_layout'] == "banner") { ?><?php echo "selected" ?><?php } ?>>banner</option>
        </select>
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ad_url">Ad Url</label>
        <input type="text" name="ad_url" id="ad_url" class="form-control"
               placeholder="Enter Ad Url" value="<?php echo $ads['ad_url']; ?>"
               >
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ad_link">Site Ad URL</label>
        <select class="form-control" name="ad_link_type" >
            <option value="">---Select Site Ad URL---</option>
            <option value="1" <?php if ($ads['ad_link_type'] == "facebook") { ?><?php echo "selected" ?><?php } ?>>facebook</option>
            <option value="2" <?php if ($ads['ad_link_type'] == "instagram") { ?><?php echo "selected" ?><?php } ?>>instagram</option>
            <option value="3" <?php if ($ads['ad_link_type'] == "youtube") { ?><?php echo "selected" ?><?php } ?>>youtube</option>
            <option value="4" <?php if ($ads['ad_link_type'] == "twitter") { ?><?php echo "selected" ?><?php } ?>>twitter</option>
        </select>
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ad_url">Ad Video</label>
        <input type="text" name="ad_video" class="form-control"
               placeholder="Enter Ad Video URL" value="<?php echo $ads['ad_video']; ?>"
               >
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ad_url">Text Title</label>
        <input type="text" name="ad_text_title" class="form-control"
               placeholder="Enter Text Title" value="<?php echo $ads['ad_text_title']; ?>"
        >
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ad_url">Text Sub Title</label>
        <input type="text" name="ad_sub_title" class="form-control"
               placeholder="Enter Text Sub Title" value="<?php echo $ads['ad_sub_title']; ?>"
               >
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ad_url">Link Statement</label>
        <input type="text" name="ad_link_statement" class="form-control"
               placeholder="Enter Link Statement" value="<?php echo $ads['ad_link_statement']; ?>"
               >
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ad_code">Ad Code</label>
        <input type="text" name="ad_code" id="ad_code" class="form-control"
               placeholder="Enter Ad Code" value="<?php echo $ads['ad_code']; ?>">
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ad_code">Ad Background Color</label>
        <input type="text" name="ad_background_color" class="form-control"
               placeholder="Enter Ad Background Color" value="<?php echo $ads['ad_background_color']; ?>">
    </div>
</div>

<!--Images-->

<div class="col-lg-2 col-sm-3 col-xs-4">
    <div class="form-group">
        <label for="ad_banner">Ad Image</label>
        <?php if ($ads['ad_image']) { ?>
            <a href="<?php echo base_url() . 'upload/adsdata/' . $ads['ad_image']; ?>"
               id="link" target="_blank">
                <span class="label label-success" style="font-size:11px;">View</span>
            </a>
        <?php } else {
            echo '<input type="file" name="ad_image" id="ad_image">';
        } ?>
        <?php if ($ads['ad_image']) { ?>
            <a href="#" id="ad_imageedit" style="visibility:visible;" onclick="deleteadbanner()">
                <span class="label label-danger" style="font-size:11px;">Update</span>
            </a>
            <input type="file" name="ad_image" id="ad_image" style="display:none"
                   accept="image/x-png,image/gif,image/jpeg,image/jpg">
        <?php } ?>
    </div>
</div>

<div class="col-lg-2 col-sm-3 col-xs-4">
    <div class="form-group">
        <label for="ad_logo">Ad Logo</label>

        <?php if ($ads['ad_logo']) { ?>
            <a href="<?php echo base_url() . 'upload/adsdata/' . $ads['ad_logo']; ?>" id="link"
               target="_blank">
                <span class="label label-success" style="font-size:11px;">View</span>
            </a>
        <?php } else {
            echo '<input type="file" name="ad_logo" id="ad_logo">';
        } ?>
        <?php if ($ads['ad_logo']) { ?>
            <a href="#" id="ad_logoedit" style="visibility:visible;" onclick="deleteadvideo()">
                <span class="label label-danger" style="font-size:11px;">Update</span>
            </a>
            <input type="file" name="ad_logo" id="ad_logo" style="display:none"
                   accept="video/*">
        <?php } ?>
    </div>
</div>

<div class="col-lg-2 col-sm-3 col-xs-4">
    <div class="form-group">
        <label for="ad_logo">Background Image</label>

        <?php if ($ads['ad_background_image']) { ?>
            <a href="<?php echo base_url() . 'upload/adsdata/' . $ads['ad_background_image']; ?>" id="link"
               target="_blank">
                <span class="label label-success" style="font-size:11px;">View</span>
            </a>
        <?php } else {
            echo '<input type="file" name="ad_background_image" id="ad_background_image">';
        } ?>
        <?php if ($ads['ad_background_image']) { ?>
            <a href="#" id="ad_background_imageedit" style="visibility:visible;" onclick="deleteImage()">
                <span class="label label-danger" style="font-size:11px;">Update</span>
            </a>
            <input type="file" name="ad_background_image" id="ad_background_image" style="display:none"
                   accept="video/*">
        <?php } ?>
    </div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        Use HTML Code?
        <input type="checkbox" data-toggle="toggle" data-onstyle="primary" name="is_html" <?php echo $ads['is_html']=='on'?'checked':''; ?> >
        <textarea class="md-textarea form-control" id="htmlcode" name="html" rows="10" cols="40"><?php echo $ads['html']; ?>
        </textarea>
    </div>
</div>
<script>
    function deleteadbanner() {
        //alert('hi');
        document.getElementById('ad_image').style.display = 'block';
        document.getElementById('ad_imageedit').style.display = 'none';
    }

    function deleteadvideo() {
        //alert('hi');
        document.getElementById('ad_logo').style.display = 'block';
        document.getElementById('ad_logoedit').style.display = 'none';

    }

    function deleteImage() {
        document.getElementById('ad_background_image').style.display = 'block';
        document.getElementById('ad_background_imageedit').style.display = 'none';

    }
</script>
<script>
    $(document).ready(function () {
        $('.dropdown-submenu a.test').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>
<script>
    $('.multipleSelect').fastselect();
</script>

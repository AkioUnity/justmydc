<script>
    var base_url = '<?php echo base_url();?>';
</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>-->
<link href="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<link href="<?php echo theme_url();?>/assets/css/styles/style.css" rel="stylesheet">
<link href="<?php echo theme_url();?>/assets/css/styles/skin-lblue.css" rel="stylesheet">
<link href="<?php echo theme_url();?>/assets/css/custom.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>-->
<script src="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.js"></script>

<script src="<?php echo theme_url();?>/assets/jquery-ui/timepicker.js"></script>
<style>
    dl dd, dl dt {
        font-size: 13px;
        line-height: 13px;
    }

    .alert {
        width: 100%;
    }
</style>
<div class="page-heading-two">
    <div class="container">
        <h2><?php echo $post->title; ?> <span><?php echo 'Put your business detail'; ?></span></h2>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <form action="profile/updatepost" method="post" role="form" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo $post->id; ?>">
        <div class="row">
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="col-md-6 col-sm-6">
                <!-- Shopping items content -->
                <div class="shopping-content">
                    <div class="shopping-checkout">
                        <!-- Heading -->
                        <h4>basic_info</h4>
                        <hr/>
                        <?php include 'components/select_category.php' ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <?php $v = (set_value('phone_no') != '') ? set_value('phone_no') : $post->phone_no; ?>
                                <input id="phone_no" type="text" name="phone_no" placeholder="phone"
                                       value="<?php echo $v; ?>" class="form-control">
                                <?php echo form_error('phone_no'); ?>
                            </div>
                        </div>

                        <!-- added on version 1.6 -->

                        <div class="form-group">
                            <label class="col-md-3 col-sm-3  control-label">&nbsp;</label>
                            <div class="checkbox col-md-8 col-sm-8 col-xs-8">
                                <label>
                                    <?php $chk = (isset($_POST['hide_my_phone']) && $_POST['hide_my_phone'] == '1') ? 'checked="checked"' : ''; ?>
                                    <?php $chk = ($chk == '' && get_post_meta($post->id, 'hide_my_phone', '') == '1') ? 'checked="checked"' : $chk; ?>
                                    <input <?php echo $chk; ?> type="checkbox" class="" value="1" name="hide_my_phone">
                                    hide_my_phone
                                </label>
                            </div>
                        </div>

                        <!-- end -->

                        <div class="form-group">
                            <label class="col-md-3 control-label">email</label>
                            <div class="col-md-8">
                                <?php $v = (set_value('email') != '') ? set_value('email') : $post->email; ?>
                                <input id="email" type="text" name="email" placeholder="email"
                                       value="<?php echo $v; ?>" class="form-control">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>

                        <!-- added on version 1.5 -->

                        <div class="form-group">
                            <label class="col-md-3 col-sm-3  control-label">&nbsp;</label>
                            <div class="checkbox col-md-8 col-sm-8 col-xs-8">
                                <label>
                                    <?php $chk = (isset($_POST['hide_my_email']) && $_POST['hide_my_email'] == '1') ? 'checked="checked"' : ''; ?>
                                    <?php $chk = ($chk == '' && get_post_meta($post->id, 'hide_my_email', '') == '1') ? 'checked="checked"' : $chk; ?>
                                    <input <?php echo $chk; ?> type="checkbox" class="" value="1" name="hide_my_email">
                                    hide_my_email
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 control-label">&nbsp;</label>
                            <div class="checkbox col-md-8 col-sm-8 col-xs-8">
                                <label>
                                    <?php $chk = (isset($_POST['disable_email_contact']) && $_POST['disable_email_contact'] == '1') ? 'checked="checked"' : ''; ?>
                                    <?php $chk = ($chk == '' && get_post_meta($post->id, 'disable_email_contact', '') == '1') ? 'checked="checked"' : $chk; ?>
                                    <input <?php echo $chk; ?> data-day="<?php echo 1; ?>" type="checkbox" class=""
                                                               value="1" name="disable_email_contact">
                                    disable_email_contact
                                </label>
                            </div>
                        </div>

                        <!-- end -->


                        <div class="form-group">
                            <label class="col-md-3 control-label">website</label>
                            <div class="col-md-8">
                                <?php $v = (set_value('website') != '') ? set_value('website') : $post->website; ?>
                                <input id="website" type="text" name="website" placeholder="website"
                                       value="<?php echo $v; ?>" class="form-control">
                                <?php echo form_error('website'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">founded</label>
                            <div class="col-md-8">
                                <?php $v = (set_value('founded') != '') ? set_value('founded') : $post->founded; ?>
                                <input id="founded" type="text" name="founded" placeholder="year"
                                       value="<?php echo $v; ?>" class="form-control">
                                <?php echo form_error('founded'); ?>
                            </div>
                        </div>

                        <div class="form-group price-input-holder">
                            <label class="col-md-3 control-label">price_range</label>
                            <div class="col-md-8">
                                <?php $v = (set_value('price_range') != '') ? set_value('price_range') : $post->price_range; ?>
                                <input type="text" name="price_range" placeholder="price_range"
                                       value="<?php echo $v; ?>" class="form-control">
                                <?php echo form_error('price_range'); ?>
                            </div>
                        </div>


                        <h4>address_info</h4>
                        <hr/>
                        <?php $state_active = 'yes'; ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">state</label>
                            <div class="col-md-8">
                                <select name="state" id="state" class="form-control">

                                </select>
                                <?php echo form_error('state'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">city</label>
                            <div class="col-md-8">
                                <?php $selected_city = (set_value('selected_city') != '') ? set_value('selected_city') : $post->city; ?>
                                <input type="hidden" name="selected_city" id="selected_city"
                                       value="<?php echo $selected_city; ?>">
                                <input type="text" id="city" name="city"
                                       value="<?php echo get_location_name_by_id($selected_city); ?>"
                                       placeholder="city" class="form-control input-sm">
                                <span class="help-inline city-loading">&nbsp;</span>

                                <?php echo form_error('city'); ?>
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

                        <!--div class="form-group">
                                <label class="col-md-3 control-label">address</label>
                                <div class="col-md-8">
                                <?php $v = (set_value('address') != '') ? set_value('address') : $post->address; ?>
                                    <input id="address" type="text" name="address" placeholder="address" value="<?php echo $v; ?>" class="form-control">
                                    <?php echo form_error('address'); ?>
                                </div>
                            </div-->


                        <div class="form-group">
                            <label class="col-md-3 control-label">address</label>
                            <div class="col-md-8">
                                <input type="text" name="address" placeholder="address"
                                       value="<?php echo $post->address; ?>" class="form-control">
                                <?php echo form_error('address'); ?>
                            </div>
                        </div>

<!--                        <div class="form-group">-->
<!--                            <label class="col-md-3 control-label"></label>-->
<!--                            <div class="col-md-8">-->
<!--                                <a href="javascript:void(0)" class="btn btn-danger" onclick="codeAddress()"><i-->
<!--                                            class="fa fa-map-marker"></i> view_on_map</a>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="form-group">
                            <label class="col-md-3 control-label">&nbsp;</label>
                            <div class="col-md-8">
                                <div id="form-map"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">latitude</label>
                            <div class="col-md-8">
                                <?php $v = (set_value('latitude') != '') ? set_value('latitude') : $post->latitude; ?>
                                <input id="latitude" type="text" name="latitude" placeholder="latitude"
                                       value="<?php echo $v; ?>" class="form-control">
                                <?php echo form_error('latitude'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">longitude</label>
                            <div class="col-md-8">
                                <?php $v = (set_value('longitude') != '') ? set_value('longitude') : $post->longitude; ?>
                                <input id="longitude" type="text" name="longitude" placeholder="longitude"
                                       value="<?php echo $v; ?>" class="form-control">
                                <?php echo form_error('longitude'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 control-label">&nbsp;</label>
                            <div class="checkbox col-md-8 col-sm-8 col-xs-8">
                                <label>
                                    <?php $chk = (isset($_POST['disable_google_street_view']) && $_POST['disable_google_street_view'] == '1') ? 'checked="checked"' : ''; ?>
                                    <?php $chk = ($chk == '' && get_post_meta($post->id, 'disable_google_street_view', '') == '1') ? 'checked="checked"' : $chk; ?>
                                    <input <?php echo $chk; ?> type="checkbox" class="" value="1"
                                                               name="disable_google_street_view">
                                    disable_google_street_view
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">camera_spin</label>
                            <div class="col-md-8">
                                <?php $v = (set_value('camera_spin') != '') ? set_value('camera_spin') : get_post_meta($post->id, 'camera_spin', 0); ?>
                                <select name="camera_spin" class="form-control">
                                    <?php
                                    $options = array(0,45,90,135);
                                    foreach ($options as $spin) {
                                        $chk = ($spin == $v) ? 'selected="selected"' : '';
                                        ?>
                                        <option value="<?php echo $spin; ?>" <?php echo $chk; ?> ><?php echo $spin; ?>
                                            degree
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('camera_spin'); ?>
                            </div>
                        </div>

                        <?php include 'components/opening_hours.php' ?>

                        <h4>social_links</h4>
                        <hr/>
                        <div class="form-group">
                            <label class="col-md-3 control-label">facebook</label>
                            <div class="col-md-8">
                                <input type="text" name="facebook_profile"
                                       value="<?php echo get_post_meta($post->id, 'facebook_profile', ''); ?>"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">twitter</label>
                            <div class="col-md-8">
                                <input type="text" name="twitter_profile"
                                       value="<?php echo get_post_meta($post->id, 'twitter_profile', ''); ?>"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">linkedin</label>
                            <div class="col-md-8">
                                <input type="text" name="linkedin_profile"
                                       value="<?php echo get_post_meta($post->id, 'linkedin_profile', ''); ?>"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">pinterest</label>
                            <div class="col-md-8">
                                <input type="text" name="pinterest_profile"
                                       value="<?php echo get_post_meta($post->id, 'pinterest_profile', ''); ?>"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">googleplus</label>
                            <div class="col-md-8">
                                <input type="text" name="googleplus_profile"
                                       value="<?php echo get_post_meta($post->id, 'googleplus_profile', ''); ?>"
                                       class="form-control">
                            </div>
                        </div>
                        <!-- added on version 1.8 -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">instagram</label>
                            <div class="col-md-8">
                                <input type="text" name="instagram_profile"
                                       value="<?php echo get_post_meta($post->id, 'instagram_profile', ''); ?>"
                                       class="form-control">
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">

                <h4>general_info</h4>
                <hr/>

                <div class="form-group">
                    <label class="col-md-3 control-label">title</label>
                    <div class="col-md-8">
                        <input type="text" name="title" placeholder="title"
                               value="<?php echo $post->title; ?>" class="form-control">
                        <?php echo form_error('title'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">description</label>
                    <div class="col-md-8">
                        <textarea rows="15" name="description"
                                  class="form-control rich"><?php echo $post->description; ?></textarea>
                        <?php echo form_error('description'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">tags</label>
                    <div class="col-md-8">
                        <?php $v = (set_value('tags') != '') ? set_value('tags') : $post->tags; ?>
                        <textarea rows="15" name="tags" class="form-control tag-input"><?php echo $v; ?></textarea>
                        <span>put as (,) comma sperated</span>
                        <?php echo form_error('tags'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">featured_image</label>
                    <div class="col-md-8">
                        <div class="featured-img">
                            <?php $v = (set_value('featured_img') != '') ? set_value('featured_img') : $post->featured_img; ?>
                            <input type="hidden" name="featured_img" id="featured-img-input" value="<?php echo $v; ?>">
                            <img id="featured-img" src="<?php echo base_url('uploads/images/no-image.png'); ?>">
                            <div class="upload-button">upload</div>
                            <?php echo form_error('featured_img'); ?>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">logo</label>
                    <div class="col-md-8">
                        <div class="business-logo">
                            <?php $v = (set_value('business_logo') != '') ? set_value('business_logo') : get_post_meta($post->id, 'business_logo', 'no-image.png'); ?>
                            <input type="hidden" name="business_logo" id="business-logo-input"
                                   value="<?php echo $v; ?>">
                            <img id="business-logo" src="<?php echo base_url('uploads/logos/no-image.png'); ?>">
                            <div class="clearfix"></div>
                            <div class="logo-upload-button btn btn-blue">upload</div>
                            <?php echo form_error('business_logo'); ?>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">video_url</label>
                    <div class="col-md-8">
                        <?php $v = (set_value('video_url') != '') ? set_value('video_url') : $post->video_url; ?>
                        <span id="video_preview"></span>
                        <input id="video_url" type="text" name="video_url" placeholder="video_url"
                               value="<?php echo $v; ?>" class="form-control">
                        <span class="help-inline">Youtube or Vimeo url</span>
                        <?php echo form_error('video_url'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">gallery</label>
                    <div class="col-md-8">
                        <?php $tmp_gallery = ($post->gallery != '') ? json_decode($post->gallery) : array(); ?>
                        <?php $gallery = (isset($_POST['gallery'])) ? $_POST['gallery'] : $tmp_gallery; ?>
                        <ul class="multiple-uploads">
                            <?php foreach ($gallery as $item) {
                                ?>
                                <li class="gallery-img-list">
                                    <input type="hidden" name="gallery[]" value="<?php echo $item; ?>"/>
                                    <img src="<?php echo base_url('uploads/gallery/' . $item); ?>"/>
                                    <div class="remove-image" onclick="removeImage(this);" img="<?php echo $item; ?>">
                                        X
                                    </div>
                                </li>
                            <?php } ?>
                            <li class="add-image" id="dragandrophandler">+</li>
                        </ul>
                        <div class="clearfix"></div>
                        <span class="gallery-upload-instruction">You can drag drop to reorder the gallery photos. Photos are not resized.</span>
                        <div class="clearfix clear-top-margin"></div>
                    </div>
                </div>

                <?php if (is_admin()) { ?>
                    <hr/>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputEmail1">assigned_to</label>
                        <div class="col-md-8">
                            <select name="assigned_to" class="form-control">
                                <option value="">select_assigned_to</option>
                                <?php foreach (get_all_users() as $user) {
                                    $v = (set_value('assigned_to') != '') ? set_value('assigned_to') : $post->created_by;
                                    $sel = ($v == $user->id) ? 'selected="selected"' : '';
                                    ?>
                                    <option value="<?php echo $user->id; ?>" <?php echo $sel; ?>><?php echo get_user_fullname_from_user($user); ?></option>
                                    <?php
                                } ?>
                            </select>
                            <?php echo form_error('assigned_to'); ?>
                        </div>
                    </div>
                <?php } ?>


            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="form-group align-centre">
                    <button class="btn btn-color" type="submit">save</button>
                    <button class="btn btn-default" type="reset">reset</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
// added on version 1.6
$map_api_key = get_settings('banner_settings', 'map_api_key', '');
$api_key_text = ($map_api_key != '') ? "&key=$map_api_key" : '';
?>
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places<?php echo $api_key_text; ?>"></script>
<script src="<?php echo theme_url(); ?>/assets/js/markercluster.min.js"></script>
<script src="<?php echo theme_url(); ?>/assets/js/map-icons.min.js"></script>
<script src="<?php echo theme_url(); ?>/assets/js/map_config.js"></script>
<script src="<?php echo theme_url(); ?>/assets/js/jquery.form.js"></script>


<script type="text/javascript">
    jQuery(document).ready(function () {

        // added on version 1.5
        jQuery('.open_24_by_7').click(function () {
            toggleOpeningHour();
        });

        toggleOpeningHour();
        //end

        jQuery('#photoimg').attr('target', '.multiple-uploads');
        jQuery('#photoimg').attr('input', 'gallery');
        var obj = $("#dragandrophandler");
        obj.on('dragenter', function (e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).css('border', '2px solid #0B85A1');
        });

        obj.on('dragover', function (e) {
            e.stopPropagation();
            e.preventDefault();
        });

        obj.on('drop', function (e) {
            // updated on version 1.7
            $(this).css('border', '2px dotted #0B85A1');
            e.preventDefault();
            var files = e.originalEvent.dataTransfer.files;
            //console.log(files);
            //We need to send dropped files to Server
            var curr_photo_count = jQuery('.multiple-uploads').children().length - 1;
            var max = <?php echo get_settings('business_settings', 'gallery_upload_limit', 50);?>;
            if (files.length > (max - curr_photo_count)) {
                var msg = "you_can_upload_max').' '.get_settings('business_settings','gallery_upload_limit',50).' '.lang_key('gallery_photos";
                alert(msg);
            }
            else
                handleFileUpload(files, obj);
            //end
        });

        $(document).on('dragenter', function (e) {
            e.stopPropagation();
            e.preventDefault();
        });

        $(document).on('dragover', function (e) {
            e.stopPropagation();
            e.preventDefault();
            obj.css('border', '2px dotted #0B85A1');
        });

        $(document).on('drop', function (e) {
            e.stopPropagation();
            e.preventDefault();
        });

        jQuery('.multiple-uploads > .add-image').click(function () {
            jQuery('#photoimg').attr('target', '.multiple-uploads');
            jQuery('#photoimg').attr('input', 'gallery');
            jQuery('#photoimg').click();
        });

        // jQuery(".multiple-uploads").sortable();
    });

    // added on version 1.5
    function toggleOpeningHour() {
        var val = jQuery('.open_24_by_7').attr('checked');
        if (val == 'checked') {
            jQuery('.opening-hour-container').hide();
        }
        else {
            jQuery('.opening-hour-container').show();

        }
    }

    //end
</script>

<script type="text/javascript">
    jQuery(document).ready(function () {

        // updated on version 1.5
        var time_format = '24';
        var amName = 'AM';
        var pmName = 'PM';
        for (var i = 1; i <= 7; i++) {
            var startTimeTextBox = $('#start-time-' + i);
            var endTimeTextBox = $('#end-time-' + i);
            // if (time_format == '24') {
            //     $(startTimeTextBox).timepicker({timeFormat: 'HH:mm'});
            //     $(endTimeTextBox).timepicker({timeFormat: 'HH:mm'});
            // }
            // else {
            //     $(startTimeTextBox).timepicker({
            //         timeFormat: 'hh:mm TT',
            //         amNames: [amName, 'A'],
            //         pmNames: [pmName, 'P']
            //     });
            //     $(endTimeTextBox).timepicker({timeFormat: 'hh:mm TT', amNames: [amName, 'A'], pmNames: [pmName, 'P']});
            // }
        }

        jQuery('.time-input').each(function () {
            var val = jQuery(this).attr('value');
            jQuery(this).val(val);
        });

        jQuery('.close-days').click(function () {
            var val = jQuery(this).attr('checked');
            if (val == 'checked') {
                jQuery(this).parent().parent().parent().find('input[type=text]').val('closed');
                jQuery(this).parent().parent().parent().find('input[type=text]').attr('readonly', 'readonly');
            }
            else {
                if (time_format == '24')
                    jQuery(this).parent().parent().parent().find('input[type=text]').val('09:00');
                else
                    jQuery(this).parent().parent().parent().find('input[type=text]').val('09:00 ' + amName);

                jQuery(this).parent().parent().parent().find('input[type=text]').removeAttr("readonly");
            }
        });

        // end

        jQuery('.close-days').each(function () {
            var val = jQuery(this).attr('checked');
            if (val == 'checked') {
                jQuery(this).parent().parent().parent().find('input[type=text]').val('<?php echo "closed"; ?>');
                jQuery(this).parent().parent().parent().find('input[type=text]').attr('readonly', 'readonly');
            }
            else {
                //jQuery(this).parent().parent().parent().find('input[type=text]').val('09:00 AM');
                jQuery(this).parent().parent().parent().find('input[type=text]').removeAttr("readonly");
            }
        });

    });
</script>

<script type="text/javascript">
    function getUrlVars(url) {
        var vars = {};
        var parts = url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
            vars[key] = value;
        });
        return vars;
    }

    function showVideoPreview(url) {
        if (url.search("youtube.com") != -1) {
            var video_id = getUrlVars(url)["v"];
            //https://www.youtube.com/watch?v=jIL0ze6_GIY
            var src = '//www.youtube.com/embed/' + video_id;
            //var src  = url.replace("watch?v=","embed/");
            var code = '<iframe class="thumbnail" width="100%" height="200" src="' + src + '" frameborder="0" allowfullscreen></iframe>';
            jQuery('#video_preview').html(code);
        }
        else if (url.search("vimeo.com") != -1) {
            //http://vimeo.com/64547919
            var segments = url.split("/");
            var length = segments.length;
            length--;
            var video_id = segments[length];
            var src = url.replace("vimeo.com", "player.vimeo.com/video");
            var code = '<iframe class="thumbnail" src="//player.vimeo.com/video/' + video_id + '" width="100%" height="200" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
            jQuery('#video_preview').html(code);
        }
        else {
            //alert("only youtube and video url is valid");
        }
    }

    jQuery(document).ready(function () {

        var city_field_type = '<?php echo get_settings("business_settings", "city_dropdown", "autocomplete"); ?>';

        jQuery('#video_url').change(function () {
            var url = jQuery(this).val();
            showVideoPreview(url);
        }).change();

        jQuery('#contact_for_price').click(function () {
            show_hide_price();
        });
        show_hide_price();

        jQuery('.upload-button').click(function () {
            jQuery('#photoimg_featured').click();
        });

        jQuery('.logo-upload-button').click(function () {
            jQuery('#photoimg_logo').click();
        });

        jQuery('#featured-img-input').change(function () {
            var val = jQuery(this).val();
            if (val == '') {
                val = 'no-image.png';
            }

            var base_url = '<?php echo base_url();?>';
            var image_url = base_url + 'uploads/thumbs/' + val;
            jQuery('#featured-img').attr('src', image_url);

        }).change();

        jQuery('#business-logo-input').change(function () {
            var val = jQuery(this).val();
            if (val == '') {
                val = 'no-image.png';
            }

            var base_url = '<?php echo base_url();?>';
            var image_url = base_url + 'uploads/logos/' + val;
            jQuery('#business-logo').attr('src', image_url);

        }).change();

        var site_url = '<?php echo site_url();?>';
        var val = jQuery('#country').val();
        //var loadUrl = site_url + '/show/get_locations_by_parent_ajax/' + val;
        //jQuery.post(
        //    loadUrl,
        //    {},
        //    function (responseText) {
        //        jQuery('#state').html(responseText);
        //        var sel_country = '<?php //echo (set_value("country") != '') ? set_value("country") : $post->country;?>//';
        //        var sel_state = '<?php //echo (set_value("state") != '') ? set_value("state") : $post->state;?>//';
        //        if (val == sel_country)
        //            jQuery('#state').val(sel_state);
        //        else
        //            jQuery('#state').val('');
        //        jQuery('#state').focus();
        //        jQuery('#state').trigger('change');
        //    }
        //);
        jQuery('#country').change(function () {
            jQuery('#city').val('');
            var val = jQuery(this).val();
            var loadUrl = site_url + '/show/get_locations_by_parent_ajax/' + val;
            jQuery.post(
                loadUrl,
                {},
                function (responseText) {
                    <?php if($state_active == 'yes'){?>
                    jQuery('#state').html(responseText);
                    var sel_country = '<?php echo (set_value("country") != '') ? set_value("country") : $post->country;?>';
                    var sel_state = '<?php echo (set_value("state") != '') ? set_value("state") : $post->state;?>';
                    if (val == sel_country)
                        jQuery('#state').val(sel_state);
                    else
                        jQuery('#state').val('');
                    jQuery('#state').focus();
                    jQuery('#state').trigger('change');
                    <?php }else{?>
                    var sel_country = '<?php echo (set_value("country") != '') ? set_value("country") : $post->country;?>';
                    var sel_city = '<?php echo (set_value("selected_city") != '') ? set_value("selected_city") : $post->city;?>';
                    var city = '<?php echo (set_value("city") != '') ? set_value("city") : get_location_name_by_id($post->city);?>';
                    if (city_field_type == 'dropdown')
                        populate_city(val);
                    if (val == sel_country) {
                        jQuery('#selected_city').val(sel_city);
                        jQuery('#city').val(city);
                    }
                    else {
                        jQuery('#selected_city').val('');
                        jQuery('#city').val('');
                    }
                    <?php }?>
                }
            );
        });

        jQuery('#state').change(function () {
            <?php if($state_active == 'yes'){?>
            var val = jQuery(this).val();
            var sel_state = '<?php echo (set_value("state") != '') ? set_value("state") : $post->state;?>';
            var sel_city = '<?php echo (set_value("selected_city") != '') ? set_value("selected_city") : $post->city;?>';
            var city = '<?php echo (set_value("city") != '') ? set_value("city") : get_location_name_by_id($post->city);?>';

            if (city_field_type == 'dropdown')
                populate_city(val); //populate the city drop down

            if (val == sel_state) {
                jQuery('#selected_city').val(sel_city);
                jQuery('#city').val(city);
            }
            else {
                jQuery('#selected_city').val('');
                jQuery('#city').val('');
            }
            <?php }?>
        });

        <?php if($state_active == 'yes'){ ?>
        if (city_field_type == 'dropdown') {

            var sel_state = '<?php echo (set_value("state") != '') ? set_value("state") : $post->state;?>';
            populate_city(sel_state);
        }
        var parent = '#state';
        <?php } else { ?>
        if (city_field_type == 'dropdown') {

            var sel_country = jQuery('#country').val();
            populate_city(sel_country);
        }
        var parent = '#country';
        <?php } ?>

        if (city_field_type == 'autocomplete') {
            //jQuery("#city").bind("keydown", function (event) {
            //    if (event.keyCode === jQuery.ui.keyCode.TAB &&
            //        jQuery(this).data("ui-autocomplete").menu.active) {
            //        event.preventDefault();
            //    }
            //})
            //    .autocomplete({
            //        source: function (request, response) {
            //            jQuery.post(
            //                "<?php //echo site_url('show/get_cities_ajax/');?>///",
            //                {term: request.term, parent: jQuery(parent).val()},
            //                function (responseText) {
            //                    response(responseText);
            //                    jQuery('#selected_city').val('');
            //                    jQuery('.city-loading').html('');
            //                },
            //                "json"
            //            );
            //        },
            //        search: function () {
            //            // custom minLength
            //            var term = this.value;
            //            if (term.length < 2 || jQuery(parent).val() == '') {
            //                return false;
            //            }
            //            else {
            //                jQuery('.city-loading').html('Loading...');
            //            }
            //        },
            //        focus: function () {
            //            // prevent value inserted on focus
            //            return false;
            //        },
            //        select: function (event, ui) {
            //            this.value = ui.item.value;
            //            jQuery('#selected_city').val(ui.item.id);
            //            jQuery('.city-loading').html('');
            //            return false;
            //        }
            //    });
        }
        else if (city_field_type == 'dropdown') {
            jQuery('#city_dropdown').change(function () {
                var val = jQuery('option:selected', this).attr('city_id');
                jQuery('#selected_city').val(val);
            });
        }

    });

    function show_hide_price() {
        var val = jQuery('#contact_for_price').attr('checked');
        if (val == 'checked') {
            jQuery('.price-input-holder').hide();
        }
        else {
            jQuery('.price-input-holder').show();
        }
    }

    function populate_city(parent) {
        //alert(parent);
        var site_url = '<?php echo site_url();?>';
        var loadUrl = site_url + '/show/get_city_dropdown_by_parent_ajax/' + parent;
        jQuery.post(
            loadUrl,
            {},
            function (responseText) {
                jQuery('#city_dropdown').html(responseText);
                var sel_city = '<?php echo get_location_name_by_id($selected_city);?>';
                //alert(sel_city);
                jQuery('#city_dropdown').val(sel_city);
            }
        );
    }

    // added on version 1.5
    function removeImage(e) {

        var img_e = e;
        var img = jQuery(e).attr('img');
        jQuery.post(
            "<?php echo site_url('admin/business/remove_unused_gallery_img/');?>",
            {name: img},
            function (responseText) {
                jQuery(img_e).parent().remove();
            },
            "html"
        );

    }

    //end

</script>

<script type="text/javascript" src="<?php echo base_url('assets/tinymce/tinymce.min.js'); ?>"></script>

<script type="text/javascript">
    tinymce.init({
        convert_urls: 0,
        selector: ".rich",
        menubar: false,
        toolbar: "styleselect | bold | link | bullist | code | fullscreen",
        plugins: [

            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",

            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

            "save code table contextmenu directionality emoticons template paste textcolor"

        ]
    });
</script>

<script type="text/javascript">
    var markers = [];

    function initialize() {
        geocoder = new google.maps.Geocoder();
        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: MAP_STYLE
        };
        map = new google.maps.Map(document.getElementById("form-map"),
            mapOptions);
//      codeAddress();//call the function
        var ex_latitude = $('#latitude').val();
        var ex_longitude = $('#longitude').val();

        if (ex_latitude != '' && ex_longitude != '') {
            map.setCenter(new google.maps.LatLng(ex_latitude, ex_longitude));//center the map over the result
            var marker = new google.maps.Marker(
                {
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(ex_latitude, ex_longitude)
                });

            markers.push(marker);
            google.maps.event.addListener(marker, 'dragend', function () {
                var marker_positions = marker.getPosition();
                $('#latitude').val(marker_positions.lat());
                $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
            });

        }

    }

    function codeAddress() {
        var lang = 'en';
        var main_address = $('input[name=address_' + lang + ']').val();
        var country = $('#country').find(':selected').data('name');
        var state = $('#state').find(':selected').data('name');
        var city_field_type = '<?php echo get_settings("business_settings", "city_dropdown", "autocomplete"); ?>';
        if (city_field_type == 'dropdown')
            var city = $('#city_dropdown').find(':selected').data('name');
        else
            var city = $('#city').val();

        <?php if($state_active == 'yes'){ ?>

        var address = [main_address, city, state, country].join();
        <?php } else { ?>

        var address = [main_address, city, country].join();
        <?php } ?>
//        console.log(address);
        if (country != '' && city != '') {


            setAllMap(null); //Clears the existing marker

            geocoder.geocode({address: address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
//                    console.log(results[0].geometry.location.lat());
                    $('#latitude').val(results[0].geometry.location.lat());
                    $('#longitude').val(results[0].geometry.location.lng());
                    map.setCenter(results[0].geometry.location);//center the map over the result


                    //place a marker at the location
                    var marker = new google.maps.Marker(
                        {
                            map: map,
                            draggable: true,
                            animation: google.maps.Animation.DROP,
                            position: results[0].geometry.location
                        });

                    markers.push(marker);


                    google.maps.event.addListener(marker, 'dragend', function () {
                        var marker_positions = marker.getPosition();
                        $('#latitude').val(marker_positions.lat());
                        $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

        }
        else {
            alert('You must enter at least country and city');
        }

    }

    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


<?php include 'multiple-uploader.php'; ?>
<?php include 'bulk_uploader_view.php'; ?>

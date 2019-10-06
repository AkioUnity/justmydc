<script>
    var base_url = '<?php echo base_url();?>';
</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>-->
<link href="<?php echo theme_url(); ?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<link href="<?php echo theme_url(); ?>/assets/css/custom.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>-->
<script src="<?php echo theme_url(); ?>/assets/jquery-ui/jquery-ui.js"></script>

<script src="<?php echo theme_url(); ?>/assets/jquery-ui/timepicker.js"></script>
<style>
    dl dd, dl dt {
        font-size: 13px;
        line-height: 13px;
    }

    .alert {
        width: 100%;
    }

    .right_title {
        float: right;
        margin-right: 2vw;
    }

    <?php if ($post->profile_type_id==1){ ?>
    .profile_content h4 {
        display: none;
    }

    <?php }
    else { ?>
    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    }

    <?php }?>

    .active, .accordion:hover {
        background-color: #00375e;
        cursor: pointer;
    }


</style>
<div class="page-heading-two">
    <div class="container">
        <h2><span style="color: #0f6ab4">my profile:</span><?php echo $post->profile_name; ?>
            <span class="right_title">
                <span style="color: #0f6ab4">type:</span><?php echo $post->profile_type; ?>
            </span>
        </h2>
        <div class="clearfix"></div>
    </div>
</div>
<?php $state_active = 'no'; ?>
<div class="container">
    <form action="profile/updateProfile?profileId=<?php echo $post->profile_id; ?>" method="post" role="form"
          class="form-horizontal">
        <input type="hidden" name="link" value="<?php echo $link; ?>">
        <div class="row">
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="col-md-12 profile_content">
                <!-- Shopping items content -->

                <?php include 'components/profile_info_section.php'; ?>
                <?php include 'components/social_links.php'; ?>
                <?php include 'components/about_keywords.php'; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group align-right">
                    <button class="btn btn-primary" type="submit">save</button>
                </div>
                <hr>
            </div>
        </div>
    </form>
    <div class="col-md-12 profile_content">
        <?php include 'components/media.php'; ?>
    </div>


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

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>

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
        //jQuery('#country').change(function () {
        //    jQuery('#city').val('');
        //    var val = jQuery(this).val();
        //    var loadUrl = site_url + '/show/get_locations_by_parent_ajax/' + val;
        //    jQuery.post(
        //        loadUrl,
        //        {},
        //        function (responseText) {
        //            <?php //if($state_active == 'yes'){?>
        //            jQuery('#state').html(responseText);
        //            var sel_country = '<?php //echo (set_value("country") != '') ? set_value("country") : $post->country;?>//';
        //            var sel_state = '<?php //echo (set_value("state") != '') ? set_value("state") : $post->state;?>//';
        //            if (val == sel_country)
        //                jQuery('#state').val(sel_state);
        //            else
        //                jQuery('#state').val('');
        //            jQuery('#state').focus();
        //            jQuery('#state').trigger('change');
        //            <?php //}else{?>
        //            var sel_country = '<?php //echo (set_value("country") != '') ? set_value("country") : $post->country;?>//';
        //            var sel_city = '<?php //echo (set_value("selected_city") != '') ? set_value("selected_city") : $post->city;?>//';
        //            var city = '<?php //echo (set_value("city") != '') ? set_value("city") : get_location_name_by_id($post->city);?>//';
        //            if (city_field_type == 'dropdown')
        //                populate_city(val);
        //            if (val == sel_country) {
        //                jQuery('#selected_city').val(sel_city);
        //                jQuery('#city').val(city);
        //            }
        //            else {
        //                jQuery('#selected_city').val('');
        //                jQuery('#city').val('');
        //            }
        //            <?php //}?>
        //        }
        //    );
        //});

        //jQuery('#state').change(function () {
        //    <?php //if($state_active == 'yes'){?>
        //    var val = jQuery(this).val();
        //    var sel_state = '<?php //echo (set_value("state") != '') ? set_value("state") : $post->state;?>//';
        //    var sel_city = '<?php //echo (set_value("selected_city") != '') ? set_value("selected_city") : $post->city;?>//';
        //    var city = '<?php //echo (set_value("city") != '') ? set_value("city") : get_location_name_by_id($post->city);?>//';
        //
        //    if (city_field_type == 'dropdown')
        //        populate_city(val); //populate the city drop down
        //
        //    if (val == sel_state) {
        //        jQuery('#selected_city').val(sel_city);
        //        jQuery('#city').val(city);
        //    }
        //    else {
        //        jQuery('#selected_city').val('');
        //        jQuery('#city').val('');
        //    }
        //    <?php //}?>
        //});

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


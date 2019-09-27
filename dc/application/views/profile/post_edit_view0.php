
<!-- added on version 1.6 -->

<!--                        <div class="form-group">-->
<!--                            <label class="col-md-3 col-sm-3  control-label">&nbsp;</label>-->
<!--                            <div class="checkbox col-md-8 col-sm-8 col-xs-8">-->
<!--                                <label>-->
<!--                                    --><?php //$chk = (isset($_POST['hide_my_phone']) && $_POST['hide_my_phone'] == '1') ? 'checked="checked"' : ''; ?>
<!--                                    --><?php //$chk = ($chk == '' && get_post_meta($post->id, 'hide_my_phone', '') == '1') ? 'checked="checked"' : $chk; ?>
<!--                                    <input --><?php //echo $chk; ?><!-- type="checkbox" class="" value="1" name="hide_my_phone">-->
<!--                                    hide_my_phone-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->

<!-- end -->

<!--                        <div class="form-group">-->
<!--                            <label class="col-md-3 col-sm-3  control-label">&nbsp;</label>-->
<!--                            <div class="checkbox col-md-8 col-sm-8 col-xs-8">-->
<!--                                <label>-->
<!--                                    --><?php //$chk = (isset($_POST['hide_my_email']) && $_POST['hide_my_email'] == '1') ? 'checked="checked"' : ''; ?>
<!--                                    --><?php //$chk = ($chk == '' && get_post_meta($post->id, 'hide_my_email', '') == '1') ? 'checked="checked"' : $chk; ?>
<!--                                    <input --><?php //echo $chk; ?><!-- type="checkbox" class="" value="1" name="hide_my_email">-->
<!--                                    hide_my_email-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->

<!-- end -->



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
<!--                        <div class="form-group">-->
<!--                            <label class="col-md-3 control-label">state</label>-->
<!--                            <div class="col-md-8">-->
<!--                                <select name="state" id="state" class="form-control">-->
<!---->
<!--                                </select>-->
<!--                                --><?php //echo form_error('state'); ?>
<!--                            </div>-->
<!--                        </div>-->


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

<script>

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


</script>
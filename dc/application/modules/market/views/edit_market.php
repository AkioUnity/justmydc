<style>
    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 500;
    }
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/fastselect.min.css">
<script src="<?php echo base_url(); ?>assets/dist/js/fastselect.standalone.js"></script>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                    <h3 class="box-title">Market Info</h3>
                </div>
                <!--ul class="nav nav-tabs" style="padding-left:37px;">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Edit Market</a></li>
				</ul-->
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <form role="form"
                              action="<?php echo base_url(); ?>market/Market/updateMarketinfo?Id=<?php echo $markets[0]['market_id']; ?>"
                              onsubmit="return ContentValidation();" enctype="multipart/form-data" method="post"/>
                        <input type="hidden" name="market_id" value="<?php echo $markets[0]['market_id']; ?>">
                        <div class="form-group">
                            <label>Market Name</label>
                            <input type="text" name="market_name" value="<?php echo $markets[0]['market_name']; ?>"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="InputName">Channels <span id="InputName1" style="color:red;">*</span></label>
                            <!--input type="text" name="market" value="" class="form-control" id="InputMarket" placeholder="Market"-->
                            <select class="form-control multipleSelect" name="channels[]" multiple>
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
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Site Title</label>
                                    <input type="text" name="market_site_title"
                                           value="<?php echo $markets[0]['market_site_title']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Site Url</label>
                                    <input type="text" name="market_site"
                                           value="<?php echo $markets[0]['market_site']; ?>" class="form-control"
                                           pattern="https?://.+">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Site Description</label>
                            <textarea id="" name="market_description"
                                      class="form-control"><?php echo $markets[0]['market_description']; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="market_facebook" class="form-control"
                                           value="<?php echo $markets[0]['market_facebook']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" name="market_twitter"
                                           value="<?php echo $markets[0]['market_twitter']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" name="market_youtube"
                                           value="<?php echo $markets[0]['market_youtube']; ?>"
                                           class="form-control"></textarea>
                                </div>
                                <?php include 'market_detail.php' ?>
                                <div class="form-group">
                                    <label for="inputlogoimage">Logo</label>

                                    <?php if ($markets[0]['market_logo']) { ?>
                                        <a href="<?php echo base_url() . 'upload/images/' . $markets[0]['market_logo']; ?>"
                                           id="link" target="_blank">
                                            <span class="label label-success" style="font-size:11px;">View</span>
                                        </a>
                                    <?php } else {
                                        echo '<input type="file" name="market_logo" id="inputlogoimage">';
                                    } ?>
                                    <?php if ($markets[0]['market_logo']) { ?>
                                        <a href="#" id="productLinklogo" style="visibility:visible;"
                                           onclick="deletelogoimage()">
                                            <span class="label label-danger" style="font-size:11px;">Update</span>

                                        </a>
                                        <input type="file" name="market_logo" id="inputlogoimage" style="display:none"
                                               accept="image/x-png,image/gif,image/jpeg,image/jpg">


                                    <?php } ?>

                                </div>

                                <div class="form-group">
                                    <label for="inputfacebookimage">Facebook Image</label>

                                    <?php if ($markets[0]['market_facebook_image']) { ?>
                                        <a href="<?php echo base_url() . 'upload/images/' . $markets[0]['market_facebook_image']; ?>"
                                           id="link" target="_blank">
                                            <span class="label label-success" style="font-size:11px;">View</span>
                                        </a>
                                    <?php } else {
                                        echo '<input type="file" name="market_facebook_image" id="inputfacebookimage">';
                                    } ?>
                                    <?php if ($markets[0]['market_facebook_image']) { ?>
                                        <a href="#" id="productLinkfb" style="visibility:visible;"
                                           onclick="deletefacebookimage()">
                                            <span class="label label-danger" style="font-size:11px;">Update</span>

                                        </a>
                                        <input type="file" name="market_facebook_image" id="inputfacebookimage"
                                               style="display:none" accept="image/x-png,image/gif,image/jpeg,image/jpg">


                                    <?php } ?>

                                </div>
                                <div class="form-group">
                                    <label for="inputheaderimage">Header Image</label>

                                    <?php if ($markets[0]['market_header_image']) { ?>
                                        <a href="<?php echo base_url() . 'upload/images/' . $markets[0]['market_header_image']; ?>"
                                           id="link" target="_blank">
                                            <span class="label label-success" style="font-size:11px;">View</span>
                                        </a>
                                    <?php } else {
                                        echo '<input type="file" name="market_header_image" id="inputheaderimage">';
                                    } ?>
                                    <?php if ($markets[0]['market_header_image']) { ?>
                                        <a href="#" id="productLinkheader" style="visibility:visible;"
                                           onclick="deleteheaderimage()">
                                            <span class="label label-danger" style="font-size:11px;">Update</span>

                                        </a>
                                        <input type="file" name="market_header_image" id="inputheaderimage"
                                               style="display:none" accept="image/x-png,image/gif,image/jpeg,image/jpg">


                                    <?php } ?>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" name="market_instagram"
                                           value="<?php echo $markets[0]['market_instagram']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Snapchat</label>
                                    <input type="text" name="market_snapchat"
                                           value="<?php echo $markets[0]['market_snapchat']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>CBSA Code</label>
                                    <input type="text" name="cbsa_code" value="<?php echo $markets[0]['cbsa_code']; ?>"
                                           class="form-control">
                                </div>

                            </div>
                        </div>

                        <center><input class="btn btn-info" type="submit" value="Submit"></center>


                        </form>
                    </div><!-- /.tab-pane -->


                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </div><!--/.row -->

</section><!-- /.content -->
<script>

    $('.multipleSelect').fastselect();

</script>
<script>
    function deletelogoimage() {
        //alert('hi');
        document.getElementById('inputlogoimage').style.display = 'block';
        document.getElementById('productLinklogo').style.display = 'none';

    }

    function deletefacebookimage() {
        //alert('hi');
        document.getElementById('inputfacebookimage').style.display = 'block';
        document.getElementById('productLinkfb').style.display = 'none';

    }

    function deleteheaderimage() {
        //alert('hi');
        document.getElementById('inputheaderimage').style.display = 'block';
        document.getElementById('productLinkheader').style.display = 'none';

    }
</script>
<script>

    function ContentValidation() {
        var CityName = $("#inputCityName").val();
        var CityContent = $("#inputCityContent").val();
        var ContentPhoto = $("#inputContentPhoto").val();

        if (CityName == "") {
            $("#concity").html('Please Select Your City');
            $("#inputCityName").focus();
            $("#concity").fadeOut(10000);
            return false;
        }
        if (CityContent == "") {
            $("#citycontent").html('Enter Your Content');
            $("#CityContent").focus();
            $("#citycontent").fadeOut(10000);
            return false;
        }
        /*   if(ContentPhoto == "")
         {
         $("#ContentPhoto").html('Please Select Your Content Photo');
         $("#ContentPhoto").focus();
          $("#ContentPhoto").fadeOut(10000);
         return false;
         }
        */

    }

</script>

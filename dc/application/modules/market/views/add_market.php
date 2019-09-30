<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                    <h3 class="box-title">Market Info</h3>
                </div><!-- /.box-header -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <form role="form" action="<?php echo base_url() . "market/Market/addMarketinfo" ?>"
                              onsubmit="return ContentValidation();" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Market Name</label> <span style="color:red;"
                                                                                          id="BlogCategory1"></span>
                                <input type="text" name="market_name" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Site Title</label>
                                        <input type="text" name="market_site_title" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Site Url</label>
                                        <input type="text" name="market_site" class="form-control"
                                               pattern="https?://.+">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Site Description</label>
                                <textarea id="" name="market_description" class="form-control"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <?php include 'market_detail.php'?>
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="market_facebook" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>YouTube</label>
                                        <input type="text" name="market_youtube" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" name="market_twitter" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProductPhoto">Logo</label><span id="ProductPhoto"
                                                                                         style="color:red;"></span>
                                        <input type="file" name="market_logo" id="inputProductPhoto"
                                               accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProductPhoto">Facebook Image</label><span id="ProductPhoto"
                                                                                                   style="color:red;"></span>
                                        <input type="file" name="market_facebook_image" id="inputProductPhoto"
                                               accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProductPhoto">Header Image</label><span id="ProductPhoto"
                                                                                                 style="color:red;"></span>
                                        <input type="file" name="market_header_image" id="inputProductPhoto"
                                               accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" name="market_instagram" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Snapchat</label>
                                        <input type="text" name="market_snapchat" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>CBSA Code</label>
                                        <input type="text" name="cbsa_code" class="form-control"></textarea>
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
         } */


    }

</script>

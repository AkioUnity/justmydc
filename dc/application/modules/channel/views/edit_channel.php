<!-- Main content -->
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
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                    <h3 class="box-title">Edit Channel</h3>

                </div><!-- /.box-header -->

                <!-- form start -->
                <div class="box-body">

                    <?php //echo "<pre>";print_r($categories); die; ?>
                    <?php $i = 1;
                    foreach ($channel as $channel):$i++; ?>
                        <form id="" role="form"
                              action="<?php echo base_url(); ?>channel/updateChannel?Id=<?php echo $channel['channel_id']; ?>"
                              enctype="multipart/form-data" method="post" class="attireCodeToggleBlock"/>
                        <input type="hidden" name="channel_id" value="<?php echo $channel['channel_id']; ?>">
                        <div class="form-group">
                            <label for="InputName">Categories <span id="InputName1" style="color:red;">*</span></label>
                            <!--input type="text" name="market" value="" class="form-control" id="InputMarket" placeholder="Market"-->
                            <select class="form-control multipleSelect" name="categories[]" multiple>
                                <option value="">---Select Categories---</option>

                                <?php if ($categoryLists) {
                                    //echo "<pre>"; print_r($categoryLists);die;
                                    foreach ($categoryLists as $keys => $categoryList):
                                        $isSelected = '';
                                        foreach ($categoryAddedLists as $categoryAddedList) {
                                            if ($categoryAddedList['category_id'] == $categoryList['id']) {
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

                        <div class="form-group">
                            <label for="categoryKeywords">Name</label>
                            <input type="text" name="channel_name" class="form-control" id="categoryKeywords"
                                   value="<?php echo $channel['channel_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="categoryKeywords">Keywords</label>
                            <input type="text" name="channel_keywords" class="form-control" id="categoryKeywords"
                                   value="<?php echo $channel['channel_keywords']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="categoriesName">Description</label>
                            <textarea id="" name="channel_description"
                                      class="form-control"><?php echo $channel['channel_description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoryTitle">Title</label>
                            <input type="text" name="channel_title" class="form-control" id="categoryTitle"
                                   value="<?php echo $channel['channel_title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputfacebookimage">Facebook Image</label>

                            <?php if ($channel['channel_facebook_image']) { ?>
                                <a href="<?php echo base_url() . 'upload/images/' . $channel['channel_facebook_image']; ?>"
                                   id="link" target="_blank">
                                    <span class="label label-success" style="font-size:11px;">View</span>
                                </a>
                            <?php } else {
                                echo '<input type="file" name="channel_facebook_image" id="inputfacebookimage">';
                            } ?>
                            <?php if ($channel['channel_facebook_image']) { ?>
                                <a href="#" id="productLinkfb" style="visibility:visible;"
                                   onclick="deletefacebookimage()">
                                    <span class="label label-danger" style="font-size:11px;">Update</span>
                                </a>
                                <input type="file" name="channel_facebook_image" id="inputfacebookimage"
                                       style="display:none" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                            <?php } ?>
                        </div>
                        <?php include 'channel_detail.php'; ?>
                        <center>
                            <button class="btn btn-info" style="margin:10px;">Update</button>
                        </center>

                        </form>
                    <?php endforeach; ?>
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
        //alert('hi');
        document.getElementById('inputlogoimage').style.display = 'block';
        document.getElementById('productLinklogo').style.display = 'none';

    }

    function deletefacebookimage() {
        //alert('hi');
        document.getElementById('inputfacebookimage').style.display = 'block';
        document.getElementById('productLinkfb').style.display = 'none';

    }
</script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/datepickar/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/datepickar/jquery.datetimepicker.full.js"></script>


<script src="<?php echo base_url(); ?>assets/datepickar/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/datepickar/jquery.datetimepicker.full.js"></script>
	
	
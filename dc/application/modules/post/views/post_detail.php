<div class="col-lg-6 col-sm-6 col-xs-6">
    <div class="form-group">
        <label for="PostUser">User</label>
        <select class="form-control" name="post_user">
            <?php if ($UserLists) {
                foreach ($UserLists as $keys => $UserList):
                    ?>
                    <option value="<?php echo $UserList->id; ?>" <?php if ($UserList->id == $posts['c_user_id']) {
                        echo "selected";
                    } ?>><?php echo ucfirst($UserList->first_name); ?></option>
                <?php
                endforeach;
            } ?>
        </select>
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="PostType">Type</label>
        <select class="form-control" name="post_type" onchange="onChangePostType()" id="PostTypeSelect">
            <option value="0">---Type---</option>
            <?php
            foreach ($typeList as $type): ?>
            <option value="<?php echo $type['post_id']; ?>" <?php echo ($type['post_id'] == $posts['cp_type'])? "selected":"";?> >
              <?php echo($type['cp_title']); ?>
            </option>
            <?php endforeach;?>
        </select>
        <input type="hidden" name="isChangedPostType" id="isChangedPostType" value="false">
    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label>Post Featured Image</label>
        <input type="file" id="file_upload">
        <input type="hidden" id="post_featured_image" name="post_featured_image" value="<?php echo $posts['cp_post_image']; ?>"">
        <div id="upload-demo-i" style="background:#e1e1e1;width:200px;height:200px;margin-top:10px">
            <img id="image-preview" src="<?php echo base_url() . 'upload/images/' . $posts['cp_post_image']; ?>" width="200" height="200" alt="preview">
        </div>
        <?php if ($posts['cp_post_image']) { ?>
<!--            <a href="--><?php //echo base_url() . 'upload/images/' . $posts['cp_post_image']; ?><!--"-->
<!--               id="link" target="_blank"> <span class="label label-success"-->
<!--                                                style="font-size:11px;">View</span>-->
<!--            </a>-->
            <a href="#" id="productLinklogo1" style="visibility:visible;"
               onclick="deletelogoimage1()"> <span class="label label-danger"
                                                   style="font-size:11px;">Remove</span>
            </a>
        <?php } ?>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog" style="padding-top: 70px;" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" style="width: 80%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crop and Save Image</h4>
            </div>
            <div class="modal-body">
                <div id="div-crop" ></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary upload-result" data-dismiss="modal">Save Image</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="myModal1" role="dialog" style="padding-top: 70px;" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" style="width: 95%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crop and Save Image</h4>
            </div>
            <div class="modal-body">
                <div id="div-crop1" ></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary upload-result1" data-dismiss="modal">Save Image</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <div class="box box-warning box-solid collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Spotlight Section</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: none;">

                    <label>Link Text</label>
                    <input type="text" name="link_text" value="<?php echo $spotlight['link_text']; ?> " class="form-control" >

                <label>Spotlight Image</label>
                <input type="file" id="file_upload1">
                <input type="hidden" id="post_featured_image1" name="spotlight_image" value="<?php echo $spotlight['spotlight_image']; ?>"">
                <div id="upload-demo-i" style="background:#e1e1e1;width:600px;height:230px;margin-top:10px">
                    <img id="image-preview1" src="<?php echo base_url() . 'upload/images/' . $spotlight['spotlight_image']; ?>" width="600" height="230" alt="preview">
                </div>
                <?php if ($spotlight['spotlight_image']) { ?>
                    <a href="#" id="deleteImage" style="visibility:visible;"
                       onclick="deletespotlightimage()"> <span class="label label-danger"
                                                           style="font-size:11px;">Remove</span>
                    </a>
                <?php } ?>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<script>
    $uploadCrop = $('#div-crop').croppie({
        enableExif: true,
        viewport: {
            width: 400,
            height: 400,
        },
        boundary: {
            width: 500,
            height: 500
        }
    });

    $uploadCrop1 = $('#div-crop1').croppie({
        enableExif: true,
        viewport: {
            width: 600,
            height: 230,
        },
        boundary: {
            width: 700,
            height: 500
        }
    });

    $('#file_upload').on('change', function () {
        $("#myModal").modal('show');

        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });

        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#file_upload1').on('change', function () {  //spotlight
        $("#myModal1").modal('show');

        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop1.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });

        }
        reader.readAsDataURL(this.files[0]);
    });


    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: { width: 700, height: 700 }
        }).then(function (resp) {
            $.ajax({
                url: "/api/upload_image",
                type: "POST",
                data: {"image":resp,"name":"post_featured"},
                success: function (data) {
                    console.log("filename:"+data);
                    $("#image-preview").attr("src","<?php echo base_url() . 'upload/images/'; ?>"+data);
                    $('#file_upload').val("");
                    $('#post_featured_image').val(data);  //filename
                }
            });
        });
    });

    $('.upload-result1').on('click', function (ev) {
        $uploadCrop1.croppie('result', {
            type: 'canvas',
            size: { width: 1200, height: 460 }
        }).then(function (resp) {
            $.ajax({
                url: "/api/upload_image",
                type: "POST",
                data: {"image":resp,"name":"spotlight"},
                success: function (data) {
                    console.log("filename:"+data);
                    $("#image-preview1").attr("src","<?php echo base_url() . 'upload/images/'; ?>"+data);
                    $('#file_upload1').val("");
                    $('#post_featured_image1').val(data);  //filename
                }
            });
        });
    });


    function deletelogoimage1() {
        $('#post_featured_image').val('');  //filename
        document.getElementById('productLinklogo1').style.display = 'none';
        $("#image-preview").attr("src","");
    }

    function deletespotlightimage() {
        $('#post_featured_image1').val('');  //filename
        document.getElementById('deleteImage').style.display = 'none';
        $("#image-preview1").attr("src","");
    }


    function onChangePostType() {
        let select=$('#PostTypeSelect');
        if (select.val()==0)
            return;
        if (confirm("Do you really change Post Type? \nCurrent Post Contents will be removed.")) {
            $('#isChangedPostType').val("true");
            document.getElementById("post_form").submit();
            //window.location = "/post/<?php //echo $posts['post_id']?'updatePost':'insertPost'; ?>//";
        } else {
            select.val(<?php echo $posts['cp_type']?$posts['cp_type']:0; ?>)
            // txt = "You pressed Cancel!";
        }
        // document.getElementById("demo").innerHTML = "You selected: " + x;
    }


</script>
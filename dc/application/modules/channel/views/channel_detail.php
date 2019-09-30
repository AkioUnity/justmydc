<div class="col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        <label>Featured Image</label>
        <input type="file" id="file_upload">
        <input type="hidden" id="featured_image" name="featured_image" value="<?php echo $channel['featured_image']; ?>"">
        <div id="upload-demo-i" style="background:#e1e1e1;width:200px;height:200px;margin-top:10px">
            <img id="image-preview" src="<?php echo base_url() . 'upload/images/' . $channel['featured_image']; ?>" width="200" height="200" alt="preview">
        </div>
        <?php if ($channel['featured_image']) { ?>
            <a href="#" id="deleteImage" style="visibility:visible;"
               onclick="deleteImage()"> <span class="label label-danger"
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
<div class="col-lg-9 col-sm-9 col-xs-12">
    <div class="form-group">
        <div>
        <label>Html Code</label>
        </div>
        <textarea class="md-textarea form-control" id="htmlcode" name="html" rows="10" cols="40"><?php echo $channel['html']; ?>
        </textarea>
    </div>
</div>

<div>

<!--    --><?php //include 'codemirror.php'; ?>
</div>
<script>
    $uploadCrop = $('#div-crop').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 300,
        },
        boundary: {
            width: 400,
            height: 400
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

    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: { width: 700, height: 700 }
        }).then(function (resp) {
            // console.log(resp);
            $.ajax({
                url: "/api/upload_image",
                type: "POST",
                data: {"image":resp,"name":"channel_featured"},
                success: function (data) {
                    console.log("filename:"+data);
                    $("#image-preview").attr("src","<?php echo base_url() . 'upload/images/'; ?>"+data);
                    $('#file_upload').val("");
                    $('#featured_image').val(data);  //filename
                }
            });
        });
    });

    function deleteImage() {
        $('#featured_image').val('');  //filename
        document.getElementById('deleteImage').style.display = 'none';
        $("#image-preview").attr("src","");
    }
</script>
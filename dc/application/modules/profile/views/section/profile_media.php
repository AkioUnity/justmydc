<div class="panel">
    <div class="box-body">
        <form action="<?php echo base_url(); ?>profile/insertProfileMedia?profileId=<?php echo $post->profile_id ?>"
              method="post" enctype="multipart/form-data">
            <input type="hidden" name="link" value="<?php echo $link; ?>">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label>Logo</label>
                        <?php if ($post->logo) { ?>
                            <a href="<?php echo base_url() . 'upload/profile/' . $post->logo; ?>"
                               id="link" target="_blank">
                                                        <span class="label label-success"
                                                              style="font-size:11px;">View</span>
                            </a>
                            <span class="label label-danger" onclick="deletelogoimage()"
                                                              style="font-size:11px;cursor: pointer">Update</span>

                            <input type="file" name="logo" id="inputlogoimage"
                                   style="display:none"
                                   accept="image/x-png,image/jpeg,image/jpg">

                        <?php } else {
                            echo '<input type="file" name="logo" id="inputlogoimage">';
                        } ?>

                    </div>
                </div>
            </div>
            <?php include "profile_media_explain.php"?>
            <div class="row">
                <div class="table-responsive" name="add_media" id="add_media">
                    <table class="table table-bordered" id="media_field">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="MediaFile">Enter File</label>
                                            <input type="file" name="media_file[]">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="MediaFile">Image / Video</label>
                                            <select class="form-control" name="media_type[]">
                                                <option value="">---Type---</option>
                                                <option value="image">image</option>
                                                <option value="video">video</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="MediaUrl">Url</label>
                                            <input type="text" name="media_url[]"
                                                   class="form-control name_list"
                                                   placeholder="Enter Url"
                                                   onkeyup="getYoutubeData(this.value)"
                                                   onclick="getYoutubeData(this.value)">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="MediaTitle">Title</label>
                                            <input type="text" name="media_title[]" value=""
                                                   class="form-control" id="MediaTitle"
                                                   placeholder="Enter Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="Address">Description</label>
                                            <textarea type="text" name="content[]"
                                                      class="form-control textbox" id="content"
                                                      placeholder="Within 500 characters"
                                                      value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <center>
                                    <button type="button" name="addMedia" id="addMedia"
                                            class="btn btn-info">Add Media
                                    </button>
                                </center>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <center><input class="btn btn-info" type="submit" value="Submit"></center>
        </form>
    </div><!-- /.box -->
    <table id="example3" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S No.</th>
            <th>Type</th>
            <th>Uploaded FileName</th>
            <th>External Url</th><!--            <th>Title</th>-->
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($profileMedia) { ?>
            <?php $i = 1;
            foreach ($profileMedia as $profileMedia): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $profileMedia['pm_type'];; ?></td>
                    <td><?php echo $profileMedia['pm_file_path']; ?></td>
                    <td><?php echo $profileMedia['pm_url']; ?></td>
<!--                    <td>--><?php //echo $profileMedia['title']; ?><!--</td>-->
                    <td>
                        <a href="<?php echo base_url(); ?>profile/editProfileMedia?id=<?php echo $profileMedia['id'] ?>&&profileId=<?php echo $post->profile_id.'&link='.$link ?>">
                            <span class="fa fa-pencil-square-o" id="res"></span>
                        </a><span> | </span>
                        <a href="<?php echo base_url(); ?>profile/deleteProfileMedia?id=<?php echo $profileMedia['id'] ?>&&profileId=<?php echo $post->profile_id.'&link='.$link ?>"
                           class="delete">
                            <span class="fa fa-trash" id="res"></span>
                        </a>
                    </td>
                </tr>
                <?php $i++; endforeach;
        } else { ?>
            <tr>
                <td><h3>Result Not Found </h3></td>
            </tr>
        <?php } ?>


        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        let i = 1;
        $('#addMedia').click(function () {
            i++;
            $("#media_field").append('<tr id="row' + i + '"><td><div class="row"><div class="col-lg-6 col-sm-6 col-xs-6"><div class="form-group"><label for="MediaFile">Enter File</label><input type="file" name="media_file[]"></div></div><div class="col-lg-6 col-sm-6 col-xs-6"><div class="form-group"><label for="MediaFile">Image / Video</label><select class="form-control" name="media_type[]"><option value="">---Type---</option><option value="image">Image</option><option value="video">Video</option></select></div></div></div><div class="row"><div class="col-lg-6 col-sm-6 col-xs-6"><div class="form-group"><label for="MediaUrl">Url</label><input type="text" name="media_url[]" class="form-control name_list" placeholder="Enter Url"></div></div><div class="col-lg-6 col-sm-6 col-xs-6"><div class="form-group"><label for="MediaTitle">Title</label><input type="text" name="media_title[]" value="" class="form-control" id="MediaTitle" placeholder="Enter Title" required></div></div></div><div class="row"><div class="col-lg-12 col-sm-12 col-xs-12"><div class="form-group"><label for="Address">Content</label><textarea type="text" name="content[]" class="form-control textbox" id="content" placeholder="Within 500 characters" value="" required></textarea></div></div></div></td><td><center><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></center></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });

    function getYoutubeData(url) {
        return;
        if (url.trim()) {
            var y = false;
            if (y = validateYouTubeUrl()) {
                $.post("<?php echo base_url(); ?>profile/getYoutubeData?url=" + url, function (data) {
                    //console.log(data);
                    var obj = JSON.parse(data);
                    console.log(obj);
                    console.log(obj.items);
                    if (obj.items.length > 0) {
                        $('#MediaTitle').val(obj.items[0]['snippet']['localized']['title']);
                        $('#content').val(obj.items[0]['snippet']['localized']['description']);
                    } else {
                        alert('No record found or enter valid youtube url!');
                    }
                });
            } else {
                alert('Invalid url');
            }
        }
    }

    function validateYouTubeUrl() {
        return true;
        var url = $('#youTubeUrl').val();
        var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
        return (url.match(p)) ? RegExp.$1 : false;

    }
</script>

<script>
    function deletelogoimage() {
        document.getElementById('inputlogoimage').style.display = 'block';
        document.getElementById('productLinklogo').style.display = 'none';

    }
</script>

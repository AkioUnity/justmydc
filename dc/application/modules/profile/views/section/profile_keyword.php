    <h5>Keywords </h5>
    <div class="box-body">
        <div class="container">
            <div class="form-group">
                <form action="<?php echo base_url(); ?>profile/insertProfileFeatures?profileId=<?php echo $post->profile_id ?>"
                      method="post" enctype="multipart/form-data">
                    <input type="hidden" name="link" value="<?php echo $link; ?>">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="features_products">
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Keyword</label>
                                                <input type="text" name="FeatureTitle[]"
                                                       class="form-control" id="FeatureTitle"
                                                       placeholder="Enter Keyword" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="UrlName">Url</label>
                                                <input type="text" name="UrlName[]" value=""
                                                       class="form-control" id="UrlName"
                                                       placeholder="Enter Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="FeatureDetails">Keyword Description</label>
                                                <textarea type="text" name="FeatureDetails[]" value=""
                                                          class="form-control textbox" id="UserName"
                                                          placeholder="Enter Details"
                                                          required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <center>
                                        <button type="button" name="addmore" id="addmore"
                                                class="btn btn-success">Add More
                                        </button>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                </form>
            </div>
        </div>
    </div><!-- /.box -->
    <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S No.</th>
            <th>Keyword</th>
            <th>Url</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($profileFeatures) { ?>
            <?php $i = 1;
            foreach ($profileFeatures as $profileFeatures): ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $profileFeatures['feature_title']; ?></td>
                    <td><?php echo $profileFeatures['name_url']; ?></td>
                    <!--                    <td>--><?php //echo $profileFeatures['learn_url']; ?><!--</td>-->
                    <td>
                        <a href="<?php echo base_url(); ?>profile/editProfileFeatures?id=<?php echo $profileFeatures['id'] ?>&&profileId=<?php echo $post->profile_id.'&link='.$link ?>">
                            <span class="fa fa-pencil-square-o" id="res"></span>
                        </a><span> | </span>
                        <a href="<?php echo base_url(); ?>profile/deleteProfileFeatures?id=<?php echo $profileFeatures['id'] ?>&&profileId=<?php echo $post->profile_id.'&link='.$link ?>"
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

<script>
    $(document).ready(function () {
        var i = 1;
        $('#addmore').click(function () {
            i++;
            $('#features_products').append('<tr id="row' + i + '"><td><div class="row"><div class="col-lg-6 col-sm-6 col-xs-6"><div class="form-group"><label>Keyword</label><input type="text" name="FeatureTitle[]" class="form-control" id="FeatureTitle" placeholder="Enter Keyword" value="" required></div></div><div class="col-lg-6 col-sm-6 col-xs-6"><div class="form-group"><label>Url </label><input type="text" name="UrlName[]" value="" class="form-control" id="UrlName" placeholder="Enter Url"></div></div></div>' +
                '<div class="row"><div class="col-lg-12 col-sm-12 col-xs-12"><div class="form-group"><label>Keyword Description</label><textarea type="text" name="FeatureDetails[]" value="" class="form-control textbox" id="UserName" placeholder="Enter Details" required></textarea></div></div></div></td><td><center><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></center></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>
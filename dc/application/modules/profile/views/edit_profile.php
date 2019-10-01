<?php //echo "<pre>";  print_r($profileFeatures); die;?>
<style>
    span.constraint {
        font-size: 10px;
        color: #676565;
    }

    .conditions {
        display: inline-block !important;
        font-size: 14px;
        font-weight: 500;
    }

    .accordion {
        background-color: #ecececb8;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        border-bottom: 1px solid #b3b0b03d;
    }

    .active, .accordion:hover {
        background-color: #cccccc85;
    }

    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    }

    i.fa.fa-angle-double-down {
        float: right;
    }

    .panel {
        margin-bottom: 5px;
        background-color: #fff;
        border: 1px solid #6d6c6c1f !important;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0px 7px 10px rgba(0, 0, 0, .05) !important;

    }

    .fixed-panel {
        height: 500px;
    }

    .box {
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.28) !important;
    }

    .submit-button {
        margin-top: 40px;
    }
</style>
<style>
    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 500;
    }

    textarea.form-control.about {
        height: 200px;
    }

    textarea.form-control.textbox {
        height: 150px;
    }

    .fstToggleBtn {
        font-size: 1em !important;
        display: block;
        position: relative;
        box-sizing: border-box;
        padding: .71429em 1.42857em .71429em .71429em;
        min-width: 14.28571em;
        cursor: pointer;
    }

    .fstResultItem {
        font-size: 1em !important;
        display: block;
        padding: .5em .71429em;
        margin: 0;
        cursor: pointer;
        border-top: 1px solid #fff;
    }

    .fstMultipleMode .fstQueryInput {
        font-size: 1em !important;
        float: left;
        padding: .28571em 0;
        margin: 0 0 .35714em 0;
        width: 2em;
        color: #999;
    }

    .fstSingleMode .fstQueryInput {
        font-size: 1em !important;
        display: block;
        width: 100%;
        padding: .5em .35714em;
        color: #999;
        border: 1px solid #D7D7D7;
    }
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/fastselect.min.css">
<script src="<?php echo base_url(); ?>assets/dist/js/fastselect.standalone.js"></script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                    <h3 class="box-title">Edit Profile</h3>

                </div><!-- /.box-header -->

                <!-- form start -->
                <button class="accordion">Slogan<i class="fa fa-angle-double-down"></i></button>
                <div class="panel">
                    <div class="box-body">
                        <?php if ($profileSlogan) { ?>
                            <?php $i = 1;
                            foreach ($profileSlogan as $profileSlogan): ?>
                                <form action="<?php echo base_url(); ?>profile/updateProfileSlogan?profileId=<?php echo $this->input->get('id') ?>"
                                      method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-2 col-xs-2">
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-xs-8">
                                            <div class="form-group">
                                                <label for="Tagline">Tagline</label>
                                                <textarea id="" name="tagline" class="form-control"
                                                          required><?php echo $profileSlogan['slogan']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-2 col-xs-2">
                                        </div>
                                    </div>
                                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                                </form>
                                <?php $i++; endforeach;
                        } else { ?>
                            <form action="<?php echo base_url(); ?>profile/updateProfileSlogan?profileId=<?php echo $this->input->get('id') ?>"
                                  method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-2 col-xs-2">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-xs-8">
                                        <div class="form-group">
                                            <label for="Tagline">Tagline</label>
                                            <textarea id="" name="tagline" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-xs-2">
                                    </div>
                                </div>
                                <center><input class="btn btn-info" type="submit" value="Submit"></center>
                            </form>
                        <?php } ?>
                    </div><!-- /.box -->
                </div>
                <button class="accordion">Logo<i class="fa fa-angle-double-down"></i></button>
                <div class="panel">
                    <div class="box-body">
                        <?php if ($profileLogo) { ?>
                            <?php $i = 1;
                            foreach ($profileLogo as $profileLogo): ?>
                                <form action="<?php echo base_url(); ?>profile/updateProfileImage?profileId=<?php echo $this->input->get('id') ?>"
                                      method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="inputlogoimage">Logo</label>

                                                <?php if ($profileLogo['pi_image']) { ?>
                                                    <a href="<?php echo base_url() . 'upload/profile/' . $profileLogo['pi_image']; ?>"
                                                       id="link" target="_blank">
                                                        <span class="label label-success"
                                                              style="font-size:11px;">View</span>
                                                    </a>
                                                <?php } else {
                                                    echo '<input type="file" name="pi_image" id="inputlogoimage">';
                                                } ?>
                                                <?php if ($profileLogo['pi_image']) { ?>
                                                    <a href="#" id="productLinklogo" style="visibility:visible;"
                                                       onclick="deletelogoimage()">
                                                        <span class="label label-danger"
                                                              style="font-size:11px;">Update</span>

                                                    </a>
                                                    <input type="file" name="pi_image" id="inputlogoimage"
                                                           style="display:none"
                                                           accept="image/x-png,image/jpeg,image/jpg">


                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="inputProductPhoto">Image Type</label>
                                                <select class="form-control" name="image_type" required>
                                                    <option value="">---Select---</option>
                                                    <option value="1" <?php if ($profileLogo['pi_type'] == "logo") { ?><?php echo "selected" ?><?php } ?>>Logo</option>
                                                    <option value="2" <?php if ($profileLogo['pi_type'] == "icon") { ?><?php echo "selected" ?><?php } ?>>Icon</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                                </form>
                                <?php $i++; endforeach;
                        } else { ?>
                            <form action="<?php echo base_url(); ?>profile/updateProfileImage?profileId=<?php echo $this->input->get('id') ?>"
                                  method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="inputlogoimage">Logo</label>
                                            <input type="file" name="pi_image" id="inputlogoimage"
                                                   accept="image/x-png,image/jpeg,image/jpg">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="inputProductPhoto">Image Type</label>
                                            <select class="form-control" name="image_type" required>
                                                <option value="">---Select---</option>
                                                <option value="1">Logo</option>
                                                <option value="2">Icon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <center><input class="btn btn-info" type="submit" value="Submit"></center>
                            </form>
                        <?php } ?>
                    </div><!-- /.box -->
                </div>
                <button class="accordion">About<i class="fa fa-angle-double-down"></i></button>
                <div class="panel">
                    <div class="box-body">
                        <?php if (count($profileAbout) > 0) { ?>
                            <?php $i = 1;
                            foreach ($profileAbout as $profileAbout): ?>
                                <form action="<?php echo base_url(); ?>profile/updateProfileAbout?profileId=<?php echo $this->input->get('id') ?>"
                                      method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-1 col-sm-1 col-xs-1">
                                        </div>
                                        <div class="col-lg-10 col-sm-10 col-xs-10">
                                            <div class="form-group">
                                                <label for="About">About</label>
                                                <textarea id="" name="about" class="form-control about"
                                                          required><?php echo $profileAbout['about']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-1 col-xs-1">
                                        </div>
                                    </div>
                                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                                </form>
                                <?php $i++; endforeach;
                        } else { ?>

                            <form action="<?php echo base_url(); ?>profile/updateProfileAbout?profileId=<?php echo $this->input->get('id') ?>"
                                  method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-1 col-sm-1 col-xs-1">
                                    </div>
                                    <div class="col-lg-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <label for="About">About</label>
                                            <textarea id="" name="about" class="form-control about" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-xs-2">
                                    </div>
                                </div>
                                <center><input class="btn btn-info" type="submit" value="Submit"></center>
                            </form>
                        <?php } ?>
                    </div><!-- /.box -->
                </div>
                <button class="accordion">Social Media Details <i class="fa fa-angle-double-down"></i></button>
                <div class="panel">
                    <div class="box-body">
                        <div class="container">
                            <div class="form-group">
                                <form action="<?php echo base_url(); ?>profile/updateProfileSocial?profileId=<?php echo $this->input->get('id') ?>"
                                      method="post" enctype="multipart/form-data">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dynamic_field">
                                            <tr>
                                                <td><select class="form-control" name="name[]">
                                                        <option value="">---Social Media---</option>
                                                        <option value="1">Twitter</option>
                                                        <option value="2">Facebook</option>
                                                        <option value="3">Instagram</option>
                                                        <option value="4">LinkedIn</option>
                                                        <option value="5">Youtube</option>
                                                        <option value="5">Vimeo</option>
                                                        <option value="5">SC</option>
                                                    </select></td>
                                                <td><input type="text" name="url[]" placeholder="Enter Url"
                                                           class="form-control name_list"/></td>
                                                <td>
                                                    <button type="button" name="add" id="add" class="btn btn-info">Add
                                                        More
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.box -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Social Media</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($profileSocial) { ?>
                            <?php $i = 1;
                            foreach ($profileSocial as $profileSocial): ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $profileSocial['ps_name'];; ?></td>
                                    <td><?php echo $profileSocial['ps_url']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>profile/deleteProfileSocialMedia?id=<?php echo $profileSocial['id'] ?>&&profileId=<?php echo $this->input->get('id') ?>"
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
                <button class="accordion">Features <i class="fa fa-angle-double-down"></i></button>
                <div class="panel">
                    <div class="box-body">
                        <div class="container">
                            <div class="form-group">
                                <form action="<?php echo base_url(); ?>profile/insertProfileFeatures?profileId=<?php echo $this->input->get('id') ?>"
                                      method="post" enctype="multipart/form-data">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="features_products">
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-4 col-xs-4">
                                                            <div class="form-group">
                                                                <label for="FeatureTitle">Feature Title</label>
                                                                <input type="text" name="FeatureTitle[]"
                                                                       class="form-control" id="FeatureTitle"
                                                                       placeholder="EnterTitle" value="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-4 col-xs-4">
                                                            <div class="form-group">
                                                                <label for="UrlName">Url Name</label>
                                                                <input type="text" name="UrlName[]" value=""
                                                                       class="form-control" id="UrlName"
                                                                       placeholder="Enter Url name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-4 col-xs-4">
                                                            <div class="form-group">
                                                                <label for="Url">Learn More</label>
                                                                <input type="text" name="url[]" value=""
                                                                       class="form-control" id="Url"
                                                                       placeholder="Enter Url">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="FeatureDetails">Feature Details</label>
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
                            <th>Title</th>
                            <th>Url Name</th>
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
                                    <td><?php echo $profileFeatures['learn_url']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>profile/editProfileFeatures?id=<?php echo $profileFeatures['id'] ?>&&profileId=<?php echo $this->input->get('id') ?>">
                                            <span class="fa fa-pencil-square-o" id="res"></span>
                                        </a><span> | </span>
                                        <a href="<?php echo base_url(); ?>profile/deleteProfileFeatures?id=<?php echo $profileFeatures['id'] ?>&&profileId=<?php echo $this->input->get('id') ?>"
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
                <?php include 'section/profile_media.php' ?>
                <?php include 'section/profile_map.php' ?>
                <button class="accordion">Reviews<i class="fa fa-angle-double-down"></i></button>
                <div class="panel">
                    <div class="box-body">
                        <?php if ($profileReview) { ?>
                            <?php $i = 1;
                            foreach ($profileReview as $profileReview): ?>
                                <form action="<?php echo base_url(); ?>profile/updateProfileReviews?profileId=<?php echo $this->input->get('id') ?>"
                                      method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="Tagline">Reviewer</label>
                                                <select class="form-control" name="reviewer">
                                                    <option value="">---Select Reviewer---</option>

                                                    <?php if ($profileLists) {
                                                        foreach ($profileLists as $keys => $profileList):
                                                            ?>
                                                            <option value="<?php echo $profileList['profile_id'] ?>" <?php if ($profileList['profile_id'] == $profileReview['profile_id']) {
                                                                echo "selected";
                                                            } ?>><?php echo ucfirst($profileList['profile_name']); ?></option>
                                                        <?php
                                                        endforeach;
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="Tagline">Replier</label>
                                                <select class="form-control" name="replier">
                                                    <option value="">---Select Replier---</option>

                                                    <?php if ($profileLists) {
                                                        foreach ($profileLists as $keys => $profileList):
                                                            ?>
                                                            <option value="<?php echo $profileList['profile_id'] ?>" <?php if ($profileList['profile_id'] == $profileReview['profile_id']) {
                                                                echo "selected";
                                                            } ?>><?php echo ucfirst($profileList['profile_name']); ?></option>
                                                        <?php
                                                        endforeach;
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="Tagline">Stars</label>
                                                <select class="form-control" name="stars">
                                                    <option value="">---Stars---</option>
                                                    <option value="1" <?php if ($profileReview['pr_stars'] == "1") { ?><?php echo "selected" ?><?php } ?>>1 Star</option>
                                                    <option value="2" <?php if ($profileReview['pr_stars'] == "2") { ?><?php echo "selected" ?><?php } ?>>2 Star</option>
                                                    <option value="3" <?php if ($profileReview['pr_stars'] == "3") { ?><?php echo "selected" ?><?php } ?>>3 Star</option>
                                                    <option value="4" <?php if ($profileReview['pr_stars'] == "4") { ?><?php echo "selected" ?><?php } ?>>4 Star</option>
                                                    <option value="5" <?php if ($profileReview['pr_stars'] == "5") { ?><?php echo "selected" ?><?php } ?>>5 Star</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="Tagline">Review Date</label>
                                                <input type="datetime-local" name="review_date" id=""
                                                       class="form-control" placeholder="Review Date"
                                                       value="<?php echo $profileReview['pr_reviewdate']; ?>"
                                                       required><br/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="Tagline">Text</label>
                                                <textarea id="" name="text" class="form-control"
                                                          required><?php echo $profileReview['pr_text']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="Tagline">Reply</label>
                                                <textarea id="" name="reply" class="form-control"
                                                          required><?php echo $profileReview['pr_reply']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                                </form>
                                <?php $i++; endforeach;
                        } else { ?>
                            <form action="<?php echo base_url(); ?>profile/updateProfileReviews?profileId=<?php echo $this->input->get('id') ?>"
                                  method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="Tagline">Reviewer</label>
                                            <select class="form-control" name="reviewer">
                                                <option value="">---Select Reviewer---</option>

                                                <?php if ($profileLists) {
                                                    foreach ($profileLists as $keys => $profileList):
                                                        ?>
                                                        <option value="<?php echo $profileList['profile_id'] ?>"><?php echo ucfirst($profileList['profile_name']); ?></option>
                                                    <?php
                                                    endforeach;
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="Tagline">Replier</label>
                                            <select class="form-control" name="replier">
                                                <option value="">---Select Replier---</option>

                                                <?php if ($profileLists) {
                                                    foreach ($profileLists as $keys => $profileList):
                                                        ?>
                                                        <option value="<?php echo $profileList['profile_id'] ?>"><?php echo ucfirst($profileList['profile_name']); ?></option>
                                                    <?php
                                                    endforeach;
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="Tagline">Stars</label>
                                            <select class="form-control" name="stars">
                                                <option value="">---Stars---</option>
                                                <option value="1">1 Star</option>
                                                <option value="2">2 Star</option>
                                                <option value="3">3 Star</option>
                                                <option value="4">4 Star</option>
                                                <option value="5">5 Star</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="Tagline">Review Date</label>
                                            <input type="datetime-local" name="review_date" id="" class="form-control"
                                                   placeholder="Review Date" required autocomplete="off"/><br/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="Tagline">Text</label>
                                            <textarea id="" name="text" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="Tagline">Reply</label>
                                            <textarea id="" name="reply" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <center><input class="btn btn-info" type="submit" value="Submit"></center>
                            </form>
                        <?php } ?>
                    </div><!-- /.box -->
                </div>
                <?php include "section/profile_market.php" ?>
                <button class="accordion">Profile Category<i class="fa fa-angle-double-down"></i></button>
                <div class="panel fixed-panel">
                    <div class="box-body">
                        <form action="<?php echo base_url(); ?>profile/updateProfileCategory?profileId=<?php echo $this->input->get('id') ?>"
                              method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-2 col-sm-2 col-xs-2">
                                </div>
                                <div class="col-lg-7 col-sm-7 col-xs-7">
                                    <div class="form-group">
                                        <label for="InputMarket">Category</label>
                                        <select class="form-control multipleSelectCat" name="categories[]" multiple>
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
                                </div>
                                <div class="col-lg-3 col-sm-3 col-xs-3 submit-button">
                                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
                <button class="accordion">Profile Channel<i class="fa fa-angle-double-down"></i></button>
                <div class="panel fixed-panel">
                    <div class="box-body">
                        <form action="<?php echo base_url(); ?>profile/updateProfileChannel?profileId=<?php echo $this->input->get('id') ?>"
                              method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-2 col-sm-2 col-xs-2">
                                </div>
                                <div class="col-lg-7 col-sm-7 col-xs-7">
                                    <div class="form-group profileChMultiSelect">
                                        <label for="InputProfile">Profile Channel</label>
                                        <select class="form-control multipleSelectch" name="channel[]" multiple>
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
                                </div>
                                <div class="col-lg-3 col-sm-3 col-xs-3 submit-button">
                                    <center><input class="btn btn-info" type="submit" value="Submit"></center>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
                <?php  include 'section/profile_type.php'; ?>
                <button class="accordion">Profile Tools<i class="fa fa-angle-double-down"></i></button>
                <div class="panel">
                    <div class="box-body pdb23">
                        <form action="<?php echo base_url(); ?>profile/updateProfileTool?profileId=<?php echo $this->input->get('id') ?>"
                              method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-3 col-sm-3 col-xs-3">
                                </div>
                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="InputProfile">Profile Tool</label>
                                        <select class="form-control multipleSelect" name="channel[]" multiple>
                                            <option value="">---Select Tools---</option>

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
                                </div>
                                <div class="col-lg-3 col-sm-3 col-xs-3">
                                </div>
                            </div>
                            <center><input class="btn btn-info" type="submit" value="Submit"></center>
                        </form>
                    </div><!-- /.box -->
                </div>
                <button class="accordion">Admin<i class="fa fa-angle-double-down"></i></button>
                <div class="panel">
                    <div class="box-body">
                        <form action="<?php echo base_url(); ?>profile/updateProfileAdmin?profileId=<?php echo $this->input->get('id') ?>"
                              method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="table-responsive" name="add_admin" id="add_admin">
                                    <table class="table table-bordered" id="admin_field">
                                        <tr>
                                            <td><select class="form-control" name="admin[]">
                                                    <option value="">---Select Admin---</option>

                                                    <?php if ($UserLists) {
                                                        foreach ($UserLists as $keys => $UserList):
                                                            ?>
                                                            <option value="<?php echo $UserList->user_id; ?>"><?php echo ucfirst($UserList->first_name); ?></option>
                                                        <?php
                                                        endforeach;
                                                    } ?>

                                                </select></td>
                                            <td><select class="form-control" name="profile_type[]" required>
                                                    <option value="">---Access Type---</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Editor</option>
                                                </select></td>
                                            <td>
                                                <button type="button" name="addAdmin" id="addAdmin"
                                                        class="btn btn-info">Add More
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <center><input class="btn btn-info" type="submit" value="Submit"></center>
                        </form>
                    </div><!-- /.box -->
                    <table id="example4" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Name</th>
                            <th>Admin Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($profileAdmins) { ?>
                            <?php $i = 1;
                            foreach ($profileAdmins as $profileAdmins): ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $profileAdmins['first_name'];; ?></td>
                                    <td><?php echo $profileAdmins['admin_type']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>profile/deleteProfileAdmin?id=<?php echo $profileAdmins['id'] ?>&&profileId=<?php echo $this->input->get('id') ?>"
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
                <?php  include 'section/profile_detail.php'?>
            </div>
        </div>
    </div>
    </div>
</section>
<!--script src="//code.jquery.com/jquery-1.10.2.js"></script-->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
    //jQuery.noConflict();
    $('.multipleSelect').fastselect();
    $('.multipleSelectmk').fastselect();
    $('.multipleSelectch').fastselect();
    $('.multipleSelectCat').fastselect();

</script>

<script>
    $(document).ready(function () {
        $('.dropdown-submenu a.test').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });


</script>
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
<script>
    $(document).ready(function () {
        var i = 1;
        var profileId = '<?php echo $this->input->get('id') ?>';
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><select class="form-control" name="name[]"><option value="">---Social Media---</option><option value="1">Twitter</option><option value="2">Facebook</option><option value="3">Instagram</option><option value="4">LinkedIn</option><option value="5">Youtube</option><option value="5">Vimeo</option><option value="5">SC</option></select></td> <td><input type="text" name="url[]" placeholder="Enter Url" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>
<script>
    $(document).ready(function () {
        var i = 1;
        $('#addmore').click(function () {
            i++;
            $('#features_products').append('<tr id="row' + i + '"><td><div class="row"><div class="col-lg-4 col-sm-4 col-xs-4"><div class="form-group"><label for="FeatureTitle">Feature Title</label><input type="text" name="FeatureTitle[]" class="form-control" id="FeatureTitle" placeholder="EnterTitle" value="" required></div></div><div class="col-lg-4 col-sm-4 col-xs-4"><div class="form-group"><label for="UrlName">Url Name</label><input type="text" name="UrlName[]" value="" class="form-control" id="UrlName" placeholder="Enter Url name"></div></div><div class="col-lg-4 col-sm-4 col-xs-4"><div class="form-group"><label for="Url">Learn More</label><input type="text" name="url[]" value="" class="form-control" id="Url" placeholder="Enter Url"></div></div></div><div class="row"><div class="col-lg-12 col-sm-12 col-xs-12"><div class="form-group"><label for="FeatureDetails">Feature Details</label><textarea type="text" name="FeatureDetails[]" value="" class="form-control textbox" id="UserName" placeholder="Enter Details" required></textarea></div></div></div></td><td><center><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></center></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        var i = 1;
        $('#addAdmin').click(function () {
            i++;
            $('#admin_field').append('<tr id="row' + i + '"><td> <select class="form-control" name="admin[]"><option value="">---Select Admin---</option> <?php if($UserLists){foreach($UserLists as $keys=>$UserList){ ?> <option value="<?php echo $UserList->user_id; ?> "><?php echo ucfirst($UserList->first_name); ?></option> <?php } } ?>   </select></td><td><select class="form-control" name="profile_type[]" required><option value="">---Access Type---</option><option value="1">Admin</option><option value="2">Editor</option> <td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>
<script>
    function deletelogoimage() {
        document.getElementById('inputlogoimage').style.display = 'block';
        document.getElementById('productLinklogo').style.display = 'none';

    }
</script>
<script type="text/javascript">
    function checkSpcialChar(event) {
        if (!((event.keyCode >= 65) && (event.keyCode <= 90) || (event.keyCode >= 97) && (event.keyCode <= 122) || (event.keyCode >= 48) && (event.keyCode <= 57))) {
            event.returnValue = false;
            return;
        }
        event.returnValue = true;
    }
</script>
<script type="text/javascript">
    $("select.multipleSelectch").change(function () {
        if ($("select.multipleSelectch option:selected").length > 2) {
            $('.fstResults').hide();
            $(this).removeAttr("selected");
            alert('You can select upto 3 options only');
        }
        else {
            $('.fstResults').show();
        }
    });

</script>
<script type="text/javascript">
    $("select.multipleSelectCat").change(function () {
        if ($("select.multipleSelectCat option:selected").length > 2) {
            $('.fstResults').hide();
            $(this).removeAttr("selected");
            alert('You can select upto 3 options only');
        }
        else {
            $('.fstResults').show();
        }
    });

</script>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $("a.delete").click(function (e) {
            if (!confirm('Do you want to delete it?')) {
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
</script>
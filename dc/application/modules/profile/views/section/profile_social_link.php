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
                    <td><?php echo $profileSocial['ps_name']; ?></td>
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
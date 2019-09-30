<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                    <h3 class="box-title">Add Section </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <form action="<?php echo base_url(); ?>section/insertSection" method="post"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="section_name">Name</label>
                                    <input type="text" name="section_name" id="section_name" class="form-control"
                                           placeholder="Enter Section name" required>
                                </div>
                            </div>
                        </div>
                        <?php include 'section_parameter.php';?>
                        <div>
                            <?php include 'codemirror.php'; ?>
                        </div>
                        <div class="row hidden">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="section_input">Section Description</label>
                                    <textarea type="text" rows="15" name="section_form" id="section_form"
                                              class="form-control" placeholder="Enter form elements"
                                              required></textarea>
                                </div>
                            </div>
                        </div>
                        <center><input class="btn btn-info" type="submit" value="Submit"></center>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </div>
</section>


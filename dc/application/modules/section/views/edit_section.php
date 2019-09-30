<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                    <h3 class="box-title">Edit Section </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php if ($section_list) { ?>
                <?php $i = 1;
                foreach ($section_list

                as $section_lists): ?>
                <div class="box-body">
                    <form action="<?php echo base_url(); ?>section/updateSection?Id=<?php echo $section_lists['section_id']; ?>"
                          method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $section_lists['section_id']; ?>">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="section_name">Name</label>
                                    <input type="text" name="section_name" id="section_name" class="form-control"
                                           placeholder="Enter Section name"
                                           value="<?php echo $section_lists['section_name']; ?>">
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
                                    <textarea type="text" name="section_form" id="section_form" class="form-control"
                                              placeholder="Enter form elements" rows="15"
                                              required> <?php echo $section_lists['section_form']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <!--                            --><?php //echo $section_lists['section_form']; ?>
                        </div>
                        <center>
                            <?php if ($section_lists['is_active']==2) { ?>
                                <a href="javascript:window.history.go(-1);" class="btn btn-info">Go back List</a>
                            <?php } else {?>
                                <input class="btn btn-info" type="submit" value="Submit">
                            <?php } ?>
                        </center>
                    </form>
                    <?php $i++;
                    endforeach;
                    } else { ?>
                    <?php } ?>
                </div><!-- /.box -->
            </div>
        </div>
    </div>
</section>
<script>
    function deleteicon() {
        //alert('hi');
        document.getElementById('inputicon').style.display = 'block';
        document.getElementById('sectionicon').style.display = 'none';

    }
</script>
<script>
    // When the user clicks on div, open the popup
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>				

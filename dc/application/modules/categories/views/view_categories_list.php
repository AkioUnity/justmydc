<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Primary Category List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <form action="<?php echo base_url() . "Categories" ?>" name="" method="POST">
                        <div class="row">


                            <div class="col-sm-12">
                                <div class="dataTables_length" id="example1_length">

                                    <button type="button" class="btn btn-info" style="float:right;"
                                            onclick="window.location.href='<?php echo base_url(); ?>categories/addPrimeryCategory'"/>
                                    Add Category</button>
                                </div>
                            </div>
                    </form>
                </div>
                <hr/>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S No.</th>

                        <th>Title</th>
                        <th>Description</th>
                        <th>Keywords</th>
                        <th>Spotlight</th>
                        <th>Facebook Image</th>
                        <th>Featured Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($c_categories) {
                        //echo "<pre>"; print_r($categories); die;?>
                        <?php $i = 1;
                        foreach ($c_categories as $c_categories): ?>

                            <tr>
                                <td><?php echo $i; ?></td>

                                <td><?php echo $c_categories['cc_title']; ?></td>
                                <td><?php echo $c_categories['cc_description']; ?></td>
                                <td><?php echo $c_categories['cc_keywords']; ?></td>
                                <td><?php echo $c_categories['spotlight_name']?$c_categories['spotlight_name']:''; ?></td>
                                <td><?php if ($c_categories['cc_fbimage']) { ?>
                                        <a href="<?php echo base_url() . 'upload/images/' . $c_categories['cc_fbimage']; ?>"
                                           id="link" target="_blank">
                                            <span class="label label-info" style="font-size:11px;">View</span>
                                        </a>
                                    <?php } ?>
                                </td>
                                <td><?php if ($c_categories['cc_featuredimage']) { ?>
                                        <a href="<?php echo base_url() . 'upload/images/' . $c_categories['cc_featuredimage']; ?>"
                                           id="link" target="_blank">
                                            <span class="label label-info" style="font-size:11px;">View</span>
                                        </a>
                                    <?php } ?>
                                </td>

                                <td>
                                    <a href="<?php echo base_url(); ?>categories/editcategories?id=<?php echo $c_categories['id'] ?>">
                                        <span class="fa fa-pencil-square-o" id="res"></span>
                                    </a><span>|</span>
                                    <a href="<?php echo base_url(); ?>categories/secondaryCategoryList?id=<?php echo $c_categories['id'] ?>&&name=<?php echo $c_categories['cc_title'] ?>">
                                        <span id="viewDet">Subcategory</span>
                                    </a><span>|</span>
                                    <a href="<?php echo base_url(); ?>categories/deleteCategories?id=<?php echo $c_categories['id'] ?>"
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
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $("a.delete").click(function (e) {
            if (!confirm('Deleting it, you will delete all its Secondary and Tertiary categories!')) {
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
</script>
		   
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Sections</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php if ($this->session->flashdata('alert')) { ?>
                        <div class="col-md-12 alert alert-info">
                            <?php echo $this->session->flashdata('alert'); ?>
                        </div>
                    <?php } ?>

                    <form action="<?php echo base_url() . "section" ?>" name="" method="POST">
                        <div class="row">


                            <div class="col-sm-12">
                                <div class="dataTables_length" id="example1_length">
                                    <button type="button" class="btn btn-info" style="float:right;"
                                            onclick="window.location.href='<?php echo base_url(); ?>section/addSection'"/>
                                    Add Section</button>
                                </div>
                            </div>
                    </form>
                </div>
                <hr/>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S No.</th>
                        <th>Section Name</th>
                        <!--th>Section Form</th>
                        <th>Section Input</th-->
<!--                        <th>Section Icon</th>-->
                        <th>Section Creation Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($section_list) {?>
                        <?php $i = 1;
                        foreach ($section_list as $section_lists):
//                            echo  print_r($section_lists);?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $section_lists['section_name'];; ?></td>
                                <td><?php echo $section_lists['section_creation_date']; ?></td>
                                <td>
                                    <a onclick="activeEnactive(<?php echo $section_lists['section_id'] . ', ' . $section_lists['is_active']; ?>)">
                                        <?php echo ($section_lists['is_active'] == 1) ? '<span class="label label-success" style="font-size:12px;">Active</span>'
                                            :(($section_lists['is_active'] == 2) ?'<span class="label label-info" style="font-size:12px;">Lock</span>': '<span class="label label-danger" style="font-size:12px;">Inactive</span>'); ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>section/editSection?id=<?php echo $section_lists['section_id'] ?>">
                                        <span class="fa fa-pencil-square-o" id="res"></span>
                                    </a> <span> | </span>
                                    <a href="<?php echo base_url(); ?>section/deleteSection?id=<?php echo $section_lists['section_id'] ?>"
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
            if (!confirm('Are you sure? If you delete it, all connections will be deleted!')) {
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
</script>

<script>
    function activeEnactive(id, value) {
        value++;
        if (value >2) {
            value = 0;
        }
        var r = confirm("Do you want to change status ?");
        if (r == true) {
            window.location.assign("<?php echo base_url(); ?>section/ActiveStatus?inactiveStatusId=" + id + "&&statusValue=" + value);
        }
    }
</script>
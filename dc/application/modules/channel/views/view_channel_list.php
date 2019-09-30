<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Channel List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php if ($this->session->flashdata('alert')) { ?>
                        <div class="col-md-12 alert alert-info">
                            <?php echo $this->session->flashdata('alert'); ?>
                        </div>
                    <?php } ?>

                    <form action="<?php echo base_url() . "channel" ?>" name="" method="POST">
                        <div class="row">


                            <div class="col-sm-12">
                                <div class="dataTables_length" id="example1_length">

                                    <button type="button" class="btn btn-info" style="float:right;"
                                            onclick="window.location.href='<?php echo base_url(); ?>channel/addChannel'"/>
                                    Add Channel</button>
                                </div>
                            </div>
                    </form>
                </div>
                <hr/>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S No.</th>
                        <th>Channel Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Keywords</th>
                        <th>Status</th>
                        <!--th>Category</th-->
                        <!--th>Facebook_image</th-->
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($channel) {
                        //echo "<pre>"; print_r($channel); die;?>
                        <?php $i = 1;
                        foreach ($channel as $channel): ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $channel['channel_name'];; ?></td>
                                <td><?php echo $channel['channel_title']; ?></td>
                                <td><?php echo $channel['channel_description']; ?></td>
                                <td><?php echo $channel['channel_keywords']; ?></td>
                                <td>
                                    <a onclick="activeEnactive(<?php echo $channel['channel_id'] . ', ' . $channel['is_active']; ?>)">
                                        <?php echo ($channel['is_active'] == 1) ? '<span class="label label-success" style="font-size:12px;">Active</span>'
                                            : '<span class="label label-danger" style="font-size:12px;">Inactive</span>'; ?>
                                    </a>
                                </td>
                                <!--td><?php echo $channel['channel_category']; ?></td-->
                                <!--td><?php if ($channel['channel_facebook_image']) { ?>
							  <a href="<?php echo base_url() . 'upload/images/' . $channel['channel_facebook_image']; ?>" id="link" target="_blank">
									<span class="label label-success" style="font-size:11px;">View</span>
							  </a>
							<?php } ?>
						</td-->

                                <td>
                                    <a href="<?php echo base_url(); ?>channel/editChannel?id=<?php echo $channel['channel_id'] ?>">
                                        <span class="fa fa-pencil-square-o" id="res"></span>
                                    </a>
                                    <span>|</span> <a
                                            href="<?php echo base_url(); ?>channel/deleteChannel?id=<?php echo $channel['channel_id'] ?>"
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

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $("a.delete").click(function (e) {
            if (!confirm('Are you sure? If you delete it, related channel categories will be deleted!')) {
                e.preventDefault();
                return false;
            }
            return true;
        });
    });

    function activeEnactive(id, value) {
        value=1-value;
        var r = confirm("Do you want to change status ?");
        if (r == true) {
            window.location.assign("<?php echo base_url(); ?>channel/ActiveStatus?inactiveStatusId=" + id + "&&statusValue=" + value);
        }
    }
</script>

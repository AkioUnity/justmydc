<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ads List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php if ($this->session->flashdata('alert')) { ?>
                        <div class="col-md-12 alert alert-info">
                            <?php echo $this->session->flashdata('alert'); ?>
                        </div>
                    <?php } ?>

                    <form action="<?php echo base_url() . "ads" ?>" name="" method="POST">
                        <div class="row">
                            <div class="col-sm-11">
                                <button type="button" class="btn btn-success" style="float:right;"
                                        onclick="window.location.href='<?php echo base_url(); ?>ads/images'">
                                    Image Uploader
                                </button>
                            </div>
                            <div class="col-sm-1">
                                <div class="dataTables_length" id="example1_length">
                                    <button type="button" class="btn btn-info" style="float:right;"
                                            onclick="window.location.href='<?php echo base_url(); ?>ads/addAds'">
                                        Add Ads
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
                <hr/>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S No.</th>
                        <th>Text Title</th>
                        <th>Profile Name</th>
                        <th>Ad Type</th>
                        <th>Ad Layout</th>
                        <th>Ad Site URL</th>
                        <th>Ad Code</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($ads) {
                        //echo "<pre>"; print_r($channel); die;?>
                        <?php $i = 1;
                        foreach ($ads as $ads): ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $ads['ad_text_title'];; ?></td>
                                <td><?php echo $ads['profile_name']; ?></td>
                                <td><?php echo $ads['ad_type']; ?></td>
                                <td><?php echo $ads['ad_layout']; ?></td>
                                <td><?php echo $ads['ad_site_url']; ?></td>
                                <td><?php echo $ads['ad_code']; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>ads/editAd?id=<?php echo $ads['id'] ?>">
                                        <span class="fa fa-pencil-square-o" id="res"></span>
                                    </a> <span> | </span>
                                    <a href="<?php echo base_url(); ?>ads/deleteAd?id=<?php echo $ads['id'] ?>"
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
<style>
    .status-group {
        padding-left: 0px !important;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Profile List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="col-sm-8 status-group">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info"
                                    onclick="window.location.href='<?php echo base_url(); ?>profile?statusall=All'">All
                            </button>
                            <button type="button" class="btn btn-info"
                                    onclick="window.location.href='<?php echo base_url(); ?>profile?status=Pending'">
                                Pending
                            </button>
                            <button type="button" class="btn btn-info"
                                    onclick="window.location.href='<?php echo base_url(); ?>profile?status=Live'">Live
                            </button>
                            <button type="button" class="btn btn-info"
                                    onclick="window.location.href='<?php echo base_url(); ?>profile?status=Issue Review'">
                                Issue Review
                            </button>
                            <button type="button" class="btn btn-info"
                                    onclick="window.location.href='<?php echo base_url(); ?>profile?status=Billing'">
                                Billing
                            </button>
                            <button type="button" class="btn btn-info"
                                    onclick="window.location.href='<?php echo base_url(); ?>profile?status=Delete Pending'">
                                Delete Pending
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="<?php echo base_url() . "profile" ?>" name="" method="POST">
                            <div class="row">
                                <div class="dataTables_length" id="example1_length">

                                    <button type="button" class="btn btn-info" style="float:right;"
                                            onclick="window.location.href='<?php echo base_url(); ?>profile/searchInfogroup_id'"/>
                                    Add profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr/>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Business Name</th>
                            <th>Market</th>
                            <th>Infogroup_id</th>
                            <th>Profile Type</th>
                            <th>Edit Page</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($profile) {
                            //echo "<pre>"; print_r($profile); die;?>
                            <?php $i = 1;
                            foreach ($profile as $profile): ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $profile['profile_name'];; ?></td>
                                    <td><?php echo $profile['market_name']; ?></td>
                                    <td><?php echo $profile['infogroup_id']; ?></td>
                                    <!--                                    <td>-->
                                    <?php //echo $profile['profile_status']; ?><!--</td>-->
                                    <!--                                    <td>-->
                                    <?php //echo $profile['profile_zip']; ?><!--</td>-->
                                    <!--                                    <td>-->
                                    <?php //echo $profile['profile_city']; ?><!--</td>-->
                                    <!--                                    <td>-->
                                    <?php //echo $profile['profile_st']; ?><!--</td>-->
                                    <td><?php echo $profile['profile_type']; ?></td>
                                    <td>
                                        <a target="_blank" href="<?php echo $profile['market_site']; ?>/mytoolbox/myprofile/<?php echo $profile['profile_id'] ?>">
                                            Edit Profile
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>profile/editProfile?id=<?php echo $profile['profile_id'] ?>">
                                            <span class="fa fa-pencil-square-o" id="res"></span>
                                        </a> <span> | </span>
                                        <a href="<?php echo base_url(); ?>profile/deleteProfile?id=<?php echo $profile['profile_id'] ?>"
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
            if (!confirm('Are you sure? If you delete it, it will put profile to Delete Pending!')) {
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
</script>		   
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="<?php echo base_url(); ?>user/User" name="" method="POST">
                        <!--div class="row">
						<!--div class="col-sm-3">
							<div class="dataTables_length" id="example1_length">
								<label>Status</label>
								
								<select name="status" aria-controls="example1" value="<?php //echo base_url(); ?>" class="form-control input-sm" style="width:50%;">
								<option value="">All Status</option>
								
									<option value="0">Inactive</option>
									<option value="1">Active</option>
									
									
									
								</select> 
							</div>
						</div-->

                        <div class="col-sm-12">
                            <div class="dataTables_length" id="example1_length">
                                <!--button type="submit" class="btn btn-primary">Filter</button-->
                                <button type="button" class="btn btn-info" style="float:right;"
                                        onclick="window.location.href='<?php echo base_url(); ?>user/User/addUser'"/>
                                Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr/>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:30px;">S.No.</th>
                        <th>User Id</th>
                        <th>Market</th>
                        <th>User Type</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    </thead><?php //echo"<pre>";print_r($user);die;?>
                    <tbody><?php if ($user) { ?>
                        <?php $i = 1;
                        foreach ($user as $userDetails): ?>
                            <tr>
                                <td style="width:30px;"><?php echo $i; ?></td>
                                <td><?php echo $userDetails->id; ?></td>
                                <td><?php echo $userDetails->market_name; ?></td>
                                <td>
                                    <?php echo $userDetails->user_type; ?>
                                </td>
                                <td><?php echo $userDetails->first_name; ?></td>
                                <td><?php echo $userDetails->last_name; ?></td>
                                <td><?php echo ucfirst($userDetails->username); ?></td>
                                <td>

                                    <a href="<?php echo base_url() . "user/User/editUser?UserId=" . $userDetails->id ?>">
                                        <span class="fa fa-pencil-square-o" id="res"></span>
                                    </a> |
                                    <a href="<?php echo base_url() . "user/User/deleteUser?UserId=" . $userDetails->id ?>">
                                        <span class="fa fa-trash" id=""></span>
                                    </a>


                                </td>

                            </tr>
                            <?php $i++; endforeach;
                    } else { ?>
                        <center>
                            <tr>
                                <td colspan="5"><h2> Result Not found </h2></td>
                            </tr>
                        </center>
                    <?php } ?>
                    </tbody>
                    <!--tfoot>
                      <tr>
						<th style="width:30px;">S.No.</th>
                        <th>Market</th>
                        <th>User Type</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <!--th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot-->
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script>

    function activeEnactive(id, value) {
        if (value == 1) {
            value = 0;
        }
        else {
            value = 1;
        }
        var r = confirm("Do you want to change status ?");
        if (r == true) {
            window.location.assign("<?php echo base_url(); ?>user/User/userActiveStatus?inactiveStatusId=" + id + "&&statusValue=" + value);
        }

    }
</script>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Markets</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <center>
                        <h4><span style="color:red;"><?php if ($this->session->flashdata('alert')) { ?>
                                    <div class="col-md-12 " style="color:red;">
							<?php echo $this->session->flashdata('alert'); ?>
						</div>
                                <?php } ?></span></h4>
                    </center>
                    <form action="#" name="productsForm" method="POST">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="dataTables_length" id="example1_length">
                                    <button type="button" class="btn btn-info" style="float:right;"
                                            onclick="window.location.href='<?php echo base_url(); ?>market/market/addmarket'"/>
                                    Add Market</button>
                                </div>
                            </div>
                    </form>
                </div>
                <hr/>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:30px;">S.No.</th>
                        <th style="min-width: 10px;">Market Name</th>
                        <th>Site</th>
                        <th>Site Title</th>
                        <th>CBSA Code</th>
                        <th style="min-width: 75px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php if ($markets){ ?>
                        <?php $i = 0;
                        foreach ($markets

                        as $productList):
                        $i++; ?>
                        <td style="width:30px;"><?php echo $i; ?></td>
                        <td><?php echo lcfirst($productList['market_name']); ?></td>
                        <td>
                            <a href="<?php echo $productList['market_site']; ?>"><?php echo($productList['market_site']); ?></a>
                        </td>
                        <td><?php echo ucfirst($productList['market_site_title']); ?></td>
                        <td><?php echo ucfirst($productList['cbsa_code']); ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>market/editmarket?Id=<?php echo $productList['market_id']; ?>">
                                <span class="fa fa-pencil-square-o" id="res"></span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;
                    } else { ?>
                        <th style="min-width: 75px;" colspan="4">No record found</th>
                    <?php } ?>

                    </tbody>
                    <!--tfoot>
                      <tr>
						<th style="min-width: 10px;">S.No.</th>
                        <th>Market Name</th>
						<th>Site</th>
                        <th>Site Title</th>
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
    function deleteProductDetails(id) {
        var r = confirm("Do you want to Delete Product information ?");
        if (r == true) {
            window.location.assign("<?php echo base_url(); ?>blog/deleteProductInfo/" + id);
        }
    }

    function activeEnactive(id, value) {
        if (value == 1) {
            value = 0;
        }
        else {
            value = 1;
        }
        var r = confirm("Do you want to change status ?");
        if (r == true) {
            window.location.assign("<?php echo base_url(); ?>market/Market/categoryActiveStatus?inactiveStatusId=" + id + "&&statusValue=" + value);
        }

    }
</script>

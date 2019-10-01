<link rel="stylesheet" type="text/css" href="<?php echo css_url('channel.css') ?>"/>
<?php //echo $this->input->get('id'); ?>
<!-- Main content -->
<?php //include 'sections/like_us_facebook.php'; ?>
<?php include 'sections/category_section.php'; ?>
<style>
    .dataTables_wrapper .row{
        width: 95%;
    }
    .dataTables_wrapper table thead{
        display:none;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div>
                <div class="box-header">
                    <h3 class="box-title"><?php echo $_GET['name'];
                        echo isset($_GET['sub_name']) ? ' | ' . $_GET['sub_name'] : '' ?></h3>
                </div><!-- /.box-header -->
                <hr/>

                <?php if (isset($profile_list)) { ?>
                    <table id="dataTable" class="table borderless" cellspacing="20" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">1</th>
                            <th class="th-sm">2</th>
                            <th class="th-sm">3</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $cn = 0;
                        foreach ($profile_list as $c_categories) {
                            $cn++;
                            if ($cn == 1)
                                echo "<tr>";
                            include 'sections/category_td.php';
                            if ($cn == 3) {
                                $cn = 0;
                                echo "</tr>";
                            }
                        }
                        if ($cn>0){
                            for ($ii=0;$ii<3-$cn;$ii++){
                                echo "<td></td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box-header">
                <h3 class="box-title">Related Categories</h3>

            </div><!-- /.box-header -->
            <table class="table borderless">
                <tbody>
                <?php if ($sub_categories) {
                    //echo "<pre>"; print_r($categories); die;?>
                    <?php
                    foreach ($sub_categories as $c_categories): ?>
                        <tr>
                            <td>
                                <a href="<?php echo base_url(); ?>business/sub?id=<?php echo $this->input->get('id'); ?>&&name=<?php echo $_GET['name'] ?>&&sub_id=<?php echo $c_categories['id'] ?>&&sub_name=<?php echo $c_categories['cc_title'] ?>">
                                    <span id="viewDet"><?php echo $c_categories['cc_title']; ?></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</section><!-- /.content -->
<?php $ad_id = -1; ?>
<?php include 'sections/interactive_ad.php'; ?>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "pageLength": 5,
            "oLanguage": {
                "sLengthMenu": "Display _MENU_ rows",
            }
        });
// $('.dataTables_length').addClass('bs-select');
    });

</script>


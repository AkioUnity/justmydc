<link rel="stylesheet" type="text/css" href="<?php echo css_url('channel.css') ?>"/>
<?php //echo $this->input->get('id'); ?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="arrange arrange--6 arrange--middle arrange--stack">
            <div class="arrange_unit arrange_unit--fill">
                <p class="h2 alternate u-space-b0">
                    Your business is not on Here?
                </p>
            </div>
            <div class="arrange_unit nowrap">
                <a href="profile/add" class="ybtn ybtn--primary ybtn-full-responsive-small">Add Your Business</a>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if (isset($profile_list)) { ?>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="th-sm">Name</th>
                <th class="th-sm">Street</th>
                <th class="th-sm">City</th>
                <th class="th-sm">State</th>
                <th class="th-sm">Zip</th>
                <th class="th-sm">View</th>
                <th class="th-sm">Claim</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($profile_list as $c_categories): ?>
                <tr>
                    <td><?php echo $c_categories['name']; ?></td>
                    <td><?php echo $c_categories['street']; ?></td>
                    <td><?php echo $c_categories['city']; ?></td>
                    <td><?php echo $c_categories['state']; ?></td>
                    <td><?php echo $c_categories['zip']; ?></td>
                    <td>
                        <a href="categories/unclaimed/<?php echo $c_categories['infogroup_id']; ?>"
                           class="btn btn-block btn-success">
                            View
                        </a>
                    </td>
                    <td><a href="profile/claim/<?php echo $c_categories['infogroup_id']; ?>"
                           class="btn btn-block btn-danger">
                            Claim This Business
                        </a>
                    </td>
                </tr>
            <?php endforeach;
            } ?>
            </tbody>
        </table>
    </div>

</section><!-- /.content -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
// $('.dataTables_length').addClass('bs-select');
    });

</script>

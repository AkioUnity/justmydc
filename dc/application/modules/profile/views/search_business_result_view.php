<!-- Main content -->
<section class="container">
    <h1 class="slim-headline">Find Infogroup_id</h1>
    </p>
    <form role="form" method="post" action="/profile/searchInfogroup_id">
        <div class="form-group">
            <label>Business Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Business Name..." required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <div class="row">
        <div class="arrange arrange--6 arrange--middle arrange--stack">
            <div class="arrange_unit arrange_unit--fill">
                <p class="h2 alternate u-space-b0">
                    Can't find infogroup_id?
                    <a href="/profile/addProfile" class="ybtn ybtn--primary ybtn-full-responsive-small">Add New
                        Profile</a>
                </p>
            </div>

        </div>
    </div>
    <div class="row">
        <?php if (isset($profile_list)) {
        ?>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="th-sm">Name</th>
                <th class="th-sm">Street</th>
                <th class="th-sm">City</th>
                <th class="th-sm">State</th>
                <th class="th-sm">Zip</th>
                <th class="th-sm">Infogroup_id</th>
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
                    <td><?php echo $c_categories['infogroup_id']; ?></td>
                    <td>
                        <a target="_blank" href="https://dc.justmy.com/categories/unclaimed/<?php echo $c_categories['infogroup_id']; ?>"
                           class="btn btn-block btn-primary">
                            View
                        </a>
                    </td>
                    <td><a href="/profile/claim/<?php echo $c_categories['infogroup_id']; ?>"
                           class="btn btn-block btn-success">
                            Add This Profile
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

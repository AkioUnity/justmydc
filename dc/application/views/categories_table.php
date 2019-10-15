<style>
    .dataTables_wrapper .row {
        width: 95%;
    }

    .dataTables_wrapper table thead {
        display: none;
    }
</style>
<?php include 'categories_bread_crumb.php';
if (isset($exclusiveResult)) {  //Category mode
    ?>
    <div style="padding-left: 20px;padding-right: 40px;">
        <h3>#TeamLOCAL Exclusive Members! </h3>
        <table class="table borderless" cellspacing="40" width="100%">
            <tbody>
            <?php
            $cn = 0;
            foreach ($exclusiveResult as $profile) {
                $cn++;
                if ($cn == 1)
                    echo "<tr>";
                include 'sections/exclusive_td.php';
                if ($cn == 3) {
                    $cn = 0;
                    echo "</tr>";
                }
            }
            if ($cn > 0) {
                for ($ii = 0; $ii < 3 - $cn; $ii++) {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <h3>A to Z Listing </h3>
    </div>
<?php } ?>
<div>
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
            if ($cn > 0) {
                for ($ii = 0; $ii < 3 - $cn; $ii++) {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    <?php } ?>
</div>

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

<style>
    span.constraint {
        font-size: 10px;
        color: #676565;
    }

    .urlpost {
        display: inline-block;
        width: 60%;
    }

    .urlfont {
        font-weight: 100;
        display: inline-block !important;
    }

    .web {
        display: block !important;
    }
</style>
<?php //echo "<pre>"; print_r($profile);die;  ?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
                    <h3 class="box-title">Add Profile </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <form action="<?php echo base_url(); ?>profile/insertProfile" method="post"
                          enctype="multipart/form-data">
                        <?php include "section/profile_parameters.php";  ?>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('.dropdown-submenu a.test').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>
<script type="text/javascript">
    function checkSpcialChar(event) {
        if (!((event.keyCode >= 65) && (event.keyCode <= 90) || (event.keyCode >= 97) && (event.keyCode <= 122) || (event.keyCode >= 48) && (event.keyCode <= 57))) {
            event.returnValue = false;
            return;
        }
        event.returnValue = true;
    }
</script>
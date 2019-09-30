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
                    <h3 class="box-title"><?php echo $title . " List"; ?></h3>
                </div><!-- /.box-header -->
                <div class="col-sm-11 status-group">
                    <?php if ($title == "Post") { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info" style="margin: 2px;border-radius: 7px;"
                                    onclick="window.location.href='<?php echo base_url(); ?>post'">All
                            </button>
                            <?php foreach ($channelLists as $channelList) { ?>
                                <button type="button" class="btn btn-success" style="margin: 2px;border-radius: 7px;"
                                        onclick="window.location.href='<?php echo base_url(); ?>post?channel=<?php echo $channelList['channel_id'] ?> '"><?php echo $channelList['channel_name'] ?>
                                </button>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-sm-1">
                    <form action="<?php echo base_url() . "post" ?>" name="" method="POST">
                        <div class="row">
                            <div class="dataTables_length" id="example1_length">
                                <button type="button" class="btn btn-info" style="float:right;"
                                        onclick="window.location.href='<?php echo base_url(); ?>post/addPost/<?php echo $title; ?>'">
                                    Add <?php echo $title; ?>
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
                        <th>Title</th>
<!--                        <th>Title2</th>-->
                        <?php if ($title == "Post") { ?>
                            <th>Author Name</th>
                            <th>Created date</th>
                            <!--                            <th>Type</th>-->
                            <th>Url</th>
                        <?php } ?>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if ($posts) {
                        //echo "<pre>"; print_r($channel); die;?>
                        <?php $i = 1;
                        foreach ($posts as $posts): ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $posts['cp_title']; ?></td>
<!--                                <td>--><?php //echo $posts['cp_title2']; ?><!--</td>-->
                                <?php if ($title == "Post") { ?>
                                    <td><?php echo $posts['cp_author_name']; ?></td>
                                    <td><?php echo $posts['post_date']; ?></td>
                                    <!--                                    <td>--><?php //echo $posts['cp_type']; ?><!--</td>-->
                                    <td>
                                        <a target="_blank" href="<?php echo $posts['cp_url']; ?>">
                                            <span class="fa fa-eye"> View</span>
                                        </a>
                                        <!--                                        <a target="_blank" href="-->
                                        <?php //echo str_replace('http://2019fun.justmy.com','https://dc.justmy.com',$posts['cp_url']); ?><!--">-->
                                        <!--                                            <span class="fa fa-map-marker"> washington DC</span>-->
                                        <!--                                        </a>-->
                                    </td>


                                <?php } ?>
                                <td>
                                    <a href="<?php echo base_url(); ?>post/editPost/<?php echo $posts['post_id'] ?>">
                                        <span class="fa fa-pencil-square-o" id="res"></span>
                                    </a> <span> | </span>
                                    <a href="<?php echo base_url(); ?>post/deletePost?id=<?php echo $posts['post_id'] ?>"
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
            if (!confirm('Are you sure? If you delete post, it will go to Trash!')) {
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
</script>		   
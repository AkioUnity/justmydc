<style>
	.status-group{
		padding-left: 0px !important;
	}
</style>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
     
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Post List</h3>
                </div><!-- /.box-header -->
                <div class="col-sm-8 status-group">
  							<div class="btn-group">
  							  <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url(); ?>post?statusall=All'">All</button>
							  <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url(); ?>post?status=Draft'">Draft</button>
							  <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url(); ?>post?status=Pending'">Pending</button>
							  <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url(); ?>post?status=Live'">Live</button>
							  <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url(); ?>post?status=Issue Review'">Issue Review</button>
							  <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url(); ?>post?status=Issue Hold Review'">Issue Hold Review</button>
							  <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url(); ?>post?status=Trash'">Trash</button>
							</div>
  						</div>
  						<div class="col-sm-4">
	  						<form action="<?php echo base_url()."post"?>" name="" method="POST">
	  							<div class="row">
		  							<div class="dataTables_length" id="example1_length">
		  								 <button  type="button" class="btn btn-info" style="float:right;" onclick="window.location.href='<?php echo base_url(); ?>post/addPost'" />Add Post</button>
		  							</div>
	  							</div>
							</form>
						</div>
					<hr/>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					    <th>S No.</th>
					    <th>Author Name</th>
                        <th>User</th>
						<th>Type</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Action</th> 
                      </tr>
                    </thead>
                    <tbody>
                    <?php print_r($posts); ?>
					<?php if ($posts) { 
					//echo "<pre>"; print_r($channel); die;?>
					<?php $i=1; foreach($posts as $posts): ?>
					
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $posts['cp_author_name'];?></td>
                        <td><?php echo $posts['first_name']; ?></td>
                        <td><?php echo $posts['cp_type']; ?></td>
                        <td><?php echo $posts['cp_title']; ?></td>
                        <td><?php echo $posts['cp_url']; ?></td>
                       
						<td>
							<a href="<?php echo base_url(); ?>post/editPost?id=<?php echo $posts['post_id'] ?>">
							 <span class="fa fa-pencil-square-o" id="res"></span>
							</a> <span> | </span>
							<a href="<?php echo base_url(); ?>post/deletePost?id=<?php echo $posts['post_id'] ?>" class="delete">
							 <span class="fa fa-trash" id="res"></span>
							</a>
						</td>
					  </tr>
					<?php $i++; endforeach; } else { ?>
						<tr> 
						<td> <h3>Result Not Found </h3></td>
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
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure? If you delete post, it will go to Trash!')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>		   
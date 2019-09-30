<!-- Main content -->
<section class="content">
	<div class="row">
            <!-- left column -->
		<div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header" style="background-color: rgba(19, 17, 17, 0.21);">
					<h3 class="box-title">Post Status</h3>
                </div><!-- /.box-header -->
					
                <!-- form start -->
                <div class="box-body">
					<form id="" role="form" action="<?php echo base_url(); ?>post/addPostStatus?Id=<?php echo $this->input->get('id') ?>" enctype="multipart/form-data" method="post"  class="attireCodeToggleBlock"/>
                    <input type="hidden" name="post_id" value="" >
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-xs-6">
							<div class="form-group">					
							  <label for="PostStatus">Status</label>
							  <select class="form-control" name="post_status">
									<option value="">---Type---</option>
									<option value="1">Draft</option>
									<option value="2">Pending</option>
									<option value="3">Live</option>
									<option value="4">Issue Review</option>
									<option value="5">Issue Hold Review</option>
									<option value="6">Trash</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 col-xs-6">
							<div class="form-group">					
							  <label for="PostNotes">Notes</label>
							  <input type="text" id="PostNotes" name="post_notes" class="form-control" value="" placeholder="Enter Notes">
							</div>
						</div>
					</div>
							<center><button class="btn btn-info" style="margin:10px;">Update</button></center>
						
					</form>
				</div>
				<table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					    <th>S No.</th>
					    <th>Status</th>
                        <th>Post</th>
                        <th>Action</th> 
                      </tr>
                    </thead>
                    <tbody>
					<?php if($statusLists){ ?>
				<?php $i=1; foreach($statusLists as $statusList): ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $statusList['ps_status'];?></td>
                        <td><?php echo $statusList['ps_notes']; ?></td>
						<td>
							<!--a href="<?php echo base_url(); ?>post/postStatus?id=<?php echo $statusList['id'] ?>">
							 <span class="fa fa-pencil-square-o" id="res"></span>
							</a> <span> | </span-->
							<a href="<?php echo base_url(); ?>post/deleteStatus?id=<?php echo $statusList['id'] ?>&&postId=<?php echo $this->input->get('id')?>" class="delete">
							 <span class="fa fa-trash" id="res"></span>
							</a>
						</td>
					  </tr>
					<?php $i++; endforeach; } else {?>
						<tr> 
						<td> <h3>Result Not Found </h3></td>
						</tr>
					<?php } ?>
                    </tbody>
                  </table>
			</div>
		</div>
	</div>	
</section>

<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
	
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo asset_url('dist/admin/adminlte.min.css')?><!--"/>-->
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo asset_url('dist/admin/adminlte.min.js')?><!--"/>-->

<div class="wrapper">
	<?php  // Left side column. contains the logo and sidebar ?>
	<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel" style="height:65px">
				<div class="pull-left info" style="left:5px">
					<p style="font-weight: bold;font-size: 3rem">my TOOLbox</p>
<!--					<a href="panel/account"><i class="fa fa-circle text-success"></i> Online</a>-->
				</div>
			</div>
			<?php $this->load->view('profile/toolbox_sidemenu'); ?>
		</section>
	</aside>

	<?php // Right side column. Contains the navbar and content of the page ?>
	<div class="content-wrapper">
		<section class="content">
			<?php $this->load->view('profile/'.$view_file); ?>
		</section>
	</div>
</div>
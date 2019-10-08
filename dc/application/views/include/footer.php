


    </div><!-- ./wrapper -->
	<!-- jQuery 2.1.4 -->
<!--    <script src="--><?php //echo base_url(); ?><!--assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.2 JS -->
    <?php
    if (!isset($stylesheets)) {
        echo "<script src=\"".base_url()."assets/bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>";
    } ?>

    <!-- FastClick -->
    <script src='<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
<style>
.nav-tabs li {
    float: none !important;
    background: #00c0ef;
    border-radius: 4px;
    color: #FFFFFF;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    border-left: 4px solid #00c0ef;
    transform: scale(1.1);
}
.nav-tabs li a:hover {
    border-left: 4px solid #00c0ef;
    transform: scale(1.1);
}
</style>	
	
	<!---  ################## Table JS --->
	<!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $("#example2").dataTable();
        $("#example3").dataTable();
        $("#example4").dataTable();
		$.fn.dataTable.ext.errMode = 'none';
      });
	  $.fn.dataTable.ext.errMode = 'none';
    </script>
	<!---  ################## End Table JS --->

	
	<!---  ################## Form JS --->
	<!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script-->
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

	<script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
      });
    </script>
	
	
<script>
var x = '<?php if(isset($project->product_unit_type)){echo $project->product_unit_type;}?>';
	if(x){
		getUnits(x);
	}
</script>

<link href="<?php echo   base_url();?>assets/multiselect/jquery.multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo  base_url();?>assets/multiselect/jquery.multiselect.js"></script>

    <?php
    if (isset($scripts)) {
        foreach ($scripts as $file) {
            $url = starts_with($file, 'http') ? $file : base_url($file);
            echo "<script src='$url'></script>" . PHP_EOL;
        }
    }
    ?>

<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	$.fn.dataTable.ext.errMode = 'none';
	$('.addPost #PostTitle').on('blur',function(e){
	  var key = $.trim($(this).val()).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '_');
	  key = key.toLowerCase();
	  $.ajax({

           url: 'post/ajaxrequestPost',
           type: 'POST',
           data: {title: key},
           error: function() {
              //alert('Something is wrong');
           },
           success: function(data) {
			   if(data!=''){
                $('.addPost #PostUrl').val(data);
			   }else{
			   	 $('.addPost #PostUrl').val(key);
			   }
           }

        });
  	
  });
});
</script>
	
  </body>
</html>
	
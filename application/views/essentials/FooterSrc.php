<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- Manually kong dinownload tonga mga .js files na to -->
<script src="<?php echo base_url();?>assets/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/extensions/Buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/extensions/Generator/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/extensions/Generator/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/extensions/Generator/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/extensions/Buttons/js/buttons.print.min.js"></script>


<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.min.js"></script>



<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>

<div class="jvectormap-label"></div>
 <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<!-- Webpage ready function script -->
<script>
  // bakit ready(function) kase everytime na inaaccess mo yung document or yung webpage na yun ito na agad yung gagawin nya
  $(document).ready(function () {

  // ALL ABOUT ROGUES
    // start of rogue-a (BFP Personnel Profile Table)
     
      // start ng gngwang datatable yung tbl_roguea
        var table = $('#inventory').DataTable();

//start ng paggawa sa table n maging clickable
      $('#inventory tbody').on('click','tr',function(){
            if ( $(this).hasClass('active') ) {
                $(this).removeClass('active');
                }
                else {
                  table.$('tr.active').removeClass('active');
                    $(this).addClass('active');
                    tracctid=$(this).closest('tr').attr('id');
                    tracctname=$(this).closest('tr').attr('name');
                   $('#modal_inventory').modal('show');
 }
      });
    //end ng paggawa sa table ng pagging clickable

        
      });
</script>

<!-- Webpage ready function script -->
<script>
  // bakit ready(function) kase everytime na inaaccess mo yung document or yung webpage na yun ito na agad yung gagawin nya
  $(document).ready(function () {

  // ALL ABOUT ROGUES
    // start of rogue-a (BFP Personnel Profile Table)
     
      // start ng gngwang datatable yung tbl_roguea
        var table = $('#order').DataTable();

//start ng paggawa sa table n maging clickable
      $('#order tbody').on('click','tr',function(){
            if ( $(this).hasClass('active') ) {
                $(this).removeClass('active');
                }
                else {
                  table.$('tr.active').removeClass('active');
                    $(this).addClass('active');
                    tracctid=$(this).closest('tr').attr('id');
                    tracctname=$(this).closest('tr').attr('name');
                   $('#modal_order').modal('show');
 }
      });
    //end ng paggawa sa table ng pagging clickable

    $('#view_btn').on('click',function(){
        $('#view_order').modal('show');
        
      });

      $('#view_sum').on('click',function(){
        $('#view_order').modal('hide');
        $('#order_summary').modal('show');
      });  

      $('#close_summary').on('click',function(){
        $('#view_order').modal('show');
        $('#order_summary').modal('hide');
      });  
      

      });
</script>




<script>
// Start ng logic para mahighlight yung sa sidebar
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
      return this.href == url;
    }).closest('.treeview').addClass('active');
    
  // End ng logic para sa sidebar
</script>
	
</body>
</html>

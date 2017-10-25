<?php
$this->load->view('essentials/headerSrc.php');
$this->load->view('essentials/headerMenu.php');
$this->load->view('essentials/Sidebar.php');
?>
<div class="wrapper">

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-area-chart"></i>Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Order Status</th>
                    <th>Table</th>
                    <th>Change Status</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    foreach ($order_res as $order) {
                      ?>
                      <tr id="entry_<?=$order['order_id']?>">
                        <td><?=$order['order_id']?></td>
                        <td><?=$order['customer_nickname']?></td>
                        <td><span id="orderStatus_<?=$order['order_id']?>" class="label label-default"><?=$order['order_status']?></span></td>
                        <td><?=$order['table_name']?></td>
                        <td>
                          <button type="button" id="btnChangeOrderStatus" class="btn btn-primary" onclick="changeOrderStatus('<?=$order['order_id']?>');">Change Status</button>
                        </td>     
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        

</div>
<!-- ./wrapper -->
<?php
$this->load->view('essentials/footer.php');
$this->load->view('essentials/footerSrc.php');
?>
<script type="text/javascript">
  function changeOrderStatus(orderId){
    $.ajax({
      url: '<?php echo base_url();?>contOrders/changeOrderStatus',
      type: 'POST',
      dataType: 'json',
      data: {order_id: orderId},
    })
    .done(function(result) {
      console.log("success");
      console.log(result);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }

  $.ajax({
    url: '<?php echo base_url();?>contOrders/addOrder',
    type: 'POST',
    dataType: 'json',
  })
  .done(function(result) {
    console.log("success");
    console.log(result);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

</script>
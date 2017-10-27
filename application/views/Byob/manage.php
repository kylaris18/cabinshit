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
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">All BYOBs</a></li>
          <li><a href="#tab_2" data-toggle="tab">Manage BYOB Options</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table id="tableByob" class="table no-margin">
              <thead>
              <tr>
                <th>BYOB ID</th>
                <th>Name</th>
                <th>Creator</th>
                <th>Action</th>
              </tr>
              </thead>

              <tbody>
                <?php
                foreach ($byob_res as $byob) {
                  ?>
                  <tr id="byob_<?=$byob['byob_id']?>">
                    <td><?=$byob['byob_id']?></td>
                    <td>
                      <a onclick="getByobSpecIngrd(<?=$byob['byob_id']?>)" data-toggle="modal" data-target="#modalShowByobIngrd" ><?=$byob['byob_name']?></a>
                    </td>
                    <td><?=$byob['byob_creator']?></td>
                    <td>
                      <button type="button" class="btn btn-danger btn-sm" onclick="deleteByob(<?=$byob['byob_id']?>);">Delete Byob</button>
                    </td>     
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">BYOB Ingredients List</h3>
                <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modalAddByobOpt">Add BYOB Ingredient!</button>
              </div>
              <div class="box-body">
                <table id="tableByobOpt" class="table no-margin">
                  <thead>
                  <tr>
                    <th>BYOB ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    foreach ($byobOpts_res as $byobOpts) {
                      if ($byobOpts['byobOpt_type'] === '1') {
                        $byobOptsType = 'Buns';
                      } else if ($byobOpts['byobOpt_type'] === '2') {
                        $byobOptsType = 'Patty';
                      } else if ($byobOpts['byobOpt_type'] === '3') {
                        $byobOptsType = 'Ingredients';
                      } else if ($byobOpts['byobOpt_type'] === '4') {
                        $byobOptsType = 'Sauce';
                      } else if ($byobOpts['byobOpt_type'] === '5') {
                        $byobOptsType = 'Sides';
                      }
                      ?>
                      <tr id="byob_<?=$byobOpts['byobOpt_id']?>">
                        <td><?=$byobOpts['byobOpt_id']?></td>
                        <td><?=$byobOpts['byobOpt_name']?></td>
                        <td><?=$byobOpts['byobOpt_price']?></td>
                        <td><?=$byobOptsType?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" data-toggle="modal" data-target="#modalEditByobOpt" onclick="fillEditIngrds(<?=$byobOpts['byobOpt_id']?>, '<?=$byobOpts['byobOpt_name']?>', <?=$byobOpts['byobOpt_price']?>, <?=$byobOpts['byobOpt_type']?>)" class="btn btn-default">Modify Ingredient</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a onclick="deleteByobIngredient(<?=$byobOpts['byobOpt_id']?>)">Delete Ingredient</a></li>
                            </ul>
                          </div>
                          <!-- <button type="button" class="btn btn-default" onclick="getByobDetails(<?=$byobOpts['byobOpt_id']?>);" data-toggle="modal" data-target="#modalModifyByob">Delete Byob</button> -->
                        </td>     
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
    </section>
  </div>
    <!-- /.col -->
</div>

<!-- Modals -->
<!-- Add ingredients modal -->
<div class="modal fade" id="modalAddByobOpt" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Add B.Y.O.B Ingredient</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="addByobIngrdName">BYOB Ingredient Name</label>
              <input type="text" class="form-control" id="addByobIngrdName" placeholder="Enter BYOB Ingredient Name">
            </div>
            <div class="form-group">
              <label for="addByobIngrdPrice">BYOB Ingredient Price</label>
              <input type="number" class="form-control" id="addByobIngrdPrice" placeholder="Enter BYOB Ingredient Price">
            </div>
            <div class="form-group">
              <label>Select</label>
              <select id="addByobIngrdType" class="form-control">
                <option value="1">Buns</option>
                <option value="2">Patty</option>
                <option value="3">Ingredients</option>
                <option value="4">Sauce</option>
                <option value="5">Sides</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" onclick="addByobIngrds();" class="btn btn-primary">Add</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- edit ingredients modal -->
<div class="modal fade" id="modalEditByobOpt" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Edit B.Y.O.B Ingredient</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <input type="hidden" id="editByobIngrdId">
              <label for="editByobIngrdName">BYOB Ingredient Name</label>
              <input type="text" class="form-control" id="editByobIngrdName" placeholder="Enter BYOB Ingredient Name">
            </div>
            <div class="form-group">
              <label for="editByobIngrdPrice">BYOB Ingredient Price</label>
              <input type="number" class="form-control" id="editByobIngrdPrice" placeholder="Enter BYOB Ingredient Price">
            </div>
            <div class="form-group">
              <label>Ingredient Category</label>
              <select id="editByobIngrdType" class="form-control">
                <option value="1">Buns</option>
                <option value="2">Patty</option>
                <option value="3">Ingredients</option>
                <option value="4">Sauce</option>
                <option value="5">Sides</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" onclick="editByobIngrds();" class="btn btn-primary">Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- show byob ingredients modal -->
<div class="modal fade" id="modalShowByobIngrd" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">B.Y.O.B. Ingredients</h4>
      </div>
      <div class="modal-body">
        <center>
          <h3>Buns</h3>
          <div id="buns"></div>
          <h3>Patty</h3>
          <div id="patty"></div>
          <h3>Ingredients</h3>
          <div id="ingredients"></div>
          <h3>Sauce</h3>
          <div id="sauce"></div>
          <h3>Sides</h3>
          <div id="sides"></div>
        </center>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End of Modals -->
<!-- ./wrapper -->
<?php
$this->load->view('essentials/footer.php');
$this->load->view('essentials/footerSrc.php');
?>
<script type="text/javascript">
  $("#tableByob").DataTable();
  $("#tableByobOpt").DataTable();
  function getByobDetails(iByobId) {
    $.ajax({
      url: '<?=base_url();?>contByob/getByobDetails',
      type: 'POST',
      dataType: 'json',
      data: {iByobId: iByobId},
    })
    .done(function(oResult) {
      console.log("success");
      $('#modifyByobId').val(oResult.byob_id);
      $('#modifyByobName').val(oResult.byob_name);
      $('#modifyByobCreator').val(oResult.byob_creator);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }

  function fillEditIngrds(id, name, price, type) {
    $('#editByobIngrdId').val(id);
    $('#editByobIngrdName').val(name);
    $('#editByobIngrdPrice').val(price);
    $('#editByobIngrdType').val(type);
  }

  function deleteByob(iByobId) {
    var r = confirm("Delete this BYOB?");
    if (r == true) {
        $.ajax({
          url: '<?=base_url();?>contByob/deleteByob',
          type: 'POST',
          data: {iByobId: iByobId},
        })
        .done(function(oResult) {
          console.log("success");
          console.log(oResult);
          location.reload();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    } else {
        alert("You pressed Cancel!");
    }
  }

  function deleteByobIngredient(iByobId) {
    var r = confirm("Delete this BYOB?");
    if (r == true) {
        $.ajax({
          url: '<?=base_url();?>contByob/deleteByobIngrd',
          type: 'POST',
          data: {iByobId: iByobId},
        })
        .done(function(oResult) {
          console.log("success");
          console.log(oResult);
          location.reload();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    } else {
        alert("You pressed Cancel!");
    }
  }

  function addByobIngrds() {
    var sByobIngrdName = $('#addByobIngrdName').val().trim();
    var dByobIngrdPrice = $('#addByobIngrdPrice').val().trim();
    var iByobIngrdType = $('#addByobIngrdType').val().trim();
    $.ajax({
      url: '<?=base_url();?>contByob/addByobIngrds',
      type: 'POST',
      dataType: 'json',
      data: {sByobIngrdName: sByobIngrdName, dByobIngrdPrice: dByobIngrdPrice, iByobIngrdType: iByobIngrdType},
    })
    .done(function(oResult) {
      console.log(oResult);
      if ((typeof oResult) === 'boolean') {
        alert('Adding failed');
      } else {
        alert('Adding Success!');
        location.reload();
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }

  function editByobIngrds() {
    var iByobId = $('#editByobIngrdId').val().trim();
    var sByobIngrdName = $('#editByobIngrdName').val().trim();
    var dByobIngrdPrice = $('#editByobIngrdPrice').val().trim();
    var iByobIngrdType = $('#editByobIngrdType').val().trim();
    var r = confirm("Delete this BYOB?");
    if (r == true) {
      $.ajax({
        url: '<?=base_url();?>contByob/updateByobIngrds',
        type: 'POST',
        dataType: 'json',
        data: {iByobId: iByobId, sByobIngrdName: sByobIngrdName, dByobIngrdPrice: dByobIngrdPrice, iByobIngrdType: iByobIngrdType},
      })
      .done(function(oResult) {
        if (oResult === false) {
          alert('Edit failed');
        } else {
          alert('Edit Success!');
          location.reload();
        }
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    } else {
      alert("You pressed Cancel!");
    }
    
  }
  // function modifyByob() {
  //   var iByobId = $('#modifyByobId').val().trim();
  //   var sByobName = $('#modifyByobName').val().trim();
  //   var sByobCreator = $('#modifyByobCreator').val().trim();
  //   $.ajax({
  //     url: '<?=base_url();?>contByob/updateByob',
  //     type: 'POST',
  //     dataType: 'json',
  //     data: {iByobId: iByobId, sByobName: sByobName, sByobCreator: sByobCreator},
  //   })
  //   .done(function(oResult) {
  //     var $aDataCol = $('#byob_' + iByobId);
  //     $('#byob_' + iByobId + ' td:nth-child(2)').text(oResult.byob_name);
  //     $('#byob_' + iByobId + ' td:nth-child(3)').text(oResult.byob_creator);
  //     $('#modalModifyByob').modal('toggle');
  //   })
  //   .fail(function() {
  //     console.log("error");
  //   })
  //   .always(function() {
  //     console.log("complete");
  //   });
  // }

  function getByobSpecIngrd(iByobId) {
    $.ajax({
      url: '<?=base_url();?>contByob/getByobSpecIngrd',
      type: 'POST',
      dataType: 'json',
      data: {iByobId: iByobId},
    })
    .done(function(oResult) {
      console.log("success");
      console.log(oResult);
      var bun = oResult[0].byobOpt_name;
      var patty = oResult[1].byobOpt_name;
      var ingredients = '';
      var sauce = '';
      var sides = '';

      for (var iCounter = 0; iCounter < oResult.length; iCounter++) {
        if (oResult[iCounter].byobOpt_type === '3') {
          if (ingredients === '') {
            ingredients = oResult[iCounter].byobOpt_name;
          } else {
            ingredients = ingredients + ', ' + oResult[iCounter].byobOpt_name;
          }
        } else if (oResult[iCounter].byobOpt_type === '4') {
          if (sauce === '') {
            sauce = oResult[iCounter].byobOpt_name;
          } else {
            sauce = sauce + ', ' + oResult[iCounter].byobOpt_name;
          }
        } else if (oResult[iCounter].byobOpt_type === '5') {
          if (sides === '') {
            sides = oResult[iCounter].byobOpt_name;
          } else {
            sides = sides + ', ' + oResult[iCounter].byobOpt_name;
          }
        }
      }
      console.log(ingredients);
      console.log(sauce);
      console.log(sides);
      $('#buns').text(bun);
      $('#patty').text(patty);
      $('#ingredients').text(ingredients);
      $('#sauce').text(sauce);
      $('#sides').text(sides);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }


</script>
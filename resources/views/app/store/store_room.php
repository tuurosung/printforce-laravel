<?php require_once '../navigation/header.php'; ?>
<?php require_once '../navigation/admin_nav.php'; ?>
<?php require_once '../serverscripts/Classes/Consumables.php'; ?>

<?php
    $c=new Consumable();
    $item_id=clean_string($_GET['item_id']);
    $c->item_id=$item_id;
    $c->ItemInfo();
 ?>

<!--Main layout-->
<main class="pt-3 mx-lg-5">
  <div class="container-fluid mt-2">



    <div class="row mb-5">
      <div class="col-md-6">
          <h4 class="titles montserrat">Consumables</h4>
      </div>
      <div class="col-md-6 text-right">
        <button type="button" class="btn btn-primary  m-0 btn-rounded"  data-toggle="modal" data-target="#addstock_modal"><i class="fas fa-plus mr-2"></i>
          Add Stock
        </button>
        <button type="button" class="btn elegant-color-dark m-0 btn-rounded"  data-toggle="modal" data-target="#issuestock_modal"><i class="fas fa-plus mr-2"></i>
          Issue Stock
        </button>
      </div>
    </div>

    <div class="card my-5 <?php if($s->days_remaining_negpo >=0){ echo 'd-none'; } ?>">
      <div class="card-body">
        <blockquote class="blockquote bq-danger">
          <p class="bq-title montserrat font-weight-bold">Sorry, Subscription Expired</p>
          <p class="m-0">
            Your subscription has expired. Please renew your subscription to continue enjoying PrintForce.
          </p>
        </blockquote>

      </div>
    </div>

    <?php if($s->days_remaining_negpo <0){ die(); } ?>

    <!-- <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body pt-2 pb-2">
            Total Registered Customers
            <p class="m-0 montserrat font-weight-bold" style="font-size:18px"><?php //echo mycustomers(); ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body pt-2 pb-2">
            New Customers This Month
            <p class="m-0 montserrat font-weight-bold" style="font-size:18px"><?php //echo this_month_customers(); ?></p>
          </div>
        </div>
      </div>
    </div> -->

    <div class="row mb-4">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body py-2">
            <div class="row">
              <div class="col-md-9">
                <p class="m-0">Available Quantity</p>
              </div>
              <div class="col-md-3">
                  <p class="m-0 font-weight-bold" style=""><?php echo $c->remaining_qty; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body py-2">
            <div class="row">
              <div class="col-md-9">
                <p class="m-0">Total Added</p>
              </div>
              <div class="col-md-3">
                  <p class="m-0 font-weight-bold" style=""><?php echo $c->total_added; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body py-2">
            <div class="row">
              <div class="col-md-9">
                <p class="m-0">Total Issued</p>
              </div>
              <div class="col-md-3">
                  <p class="m-0 font-weight-bold" style=""><?php echo $c->total_issued; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pills navs -->
      <ul class="nav nav-pills mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active"  id="ex1-tab-1"   data-toggle="pill" href="#ex1-pills-1" role="tab"  aria-controls="ex1-pills-1"  aria-selected="true">
            Stocking History
            </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link"  id="ex1-tab-2"  data-toggle="pill"  href="#ex1-pills-2"   role="tab"   aria-controls="ex1-pills-2"  aria-selected="false">
            Issuance History
            </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link"  id="ex1-tab-3"  data-toggle="pill"  href="#ex1-pills-3" role="tab"  aria-controls="ex1-pills-3" aria-selected="false" >
            Usage Report
          </a>
        </li>
      </ul>
      <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content" id="ex1-content">
      <div  class="tab-pane fade show active"   id="ex1-pills-1"    role="tabpanel"    aria-labelledby="ex1-tab-1">

          <h6 class="montserrat mt-5 mb-3">Stocking History</h6>

          <table class="table datatables">
            <thead class="elegant-color-dark white-text">
              <tr>
                <th>#</th>
                <th>Date</th>
                <th>Qty</th>
                <th>Notes</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $i=1;
                  $query=mysqli_query($db,"SELECT * FROM consumables_addstock WHERE subscriber_id='".$active_subscriber."' AND item_id='".$item_id."' AND status='active'") or die(mysqli_error($db));
                  while ($rows=mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $rows['date']; ?></td>
                      <td><?php echo $rows['qty_added']; ?></td>
                      <td><?php echo $rows['notes']; ?></td>
                      <td class="text-right">
                          <button type="button" class="btn btn-primary btn-sm">Delete</button>
                      </td>
                    </tr>
                    <?php
                  }
               ?>

            </tbody>
          </table>

      </div>
      <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">

        <h6 class="montserrat mt-5 mb-2">Stocking Issuance</h6>

        <table class="table datatables">
          <thead class="elegant-color-dark white-text">
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Qty</th>
              <th>Notes</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
                $i=1;
                $query=mysqli_query($db,"SELECT * FROM consumables_issuestock WHERE subscriber_id='".$active_subscriber."' AND item_id='".$item_id."' AND status='active'") or die(mysqli_error($db));
                while ($rows=mysqli_fetch_array($query)) {
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $rows['date']; ?></td>
                    <td><?php echo $rows['qty_issued']; ?></td>
                    <td><?php echo $rows['notes']; ?></td>
                    <td class="text-right">
                        <button type="button" class="btn btn-primary btn-sm">Delete</button>
                    </td>
                  </tr>
                  <?php
                }
             ?>

          </tbody>
        </table>

      </div>
      <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">


      </div>
    </div>
    <!-- Pills content -->






    <div class="modal fade" id="addstock_modal">
      <div class="modal-dialog modal-side modal-top-right" role="document">
        <div class="modal-content">
          <form id="addstock_frm" autocomplete="off">
          <div class="modal-body">
              <h6 class="font-weight-bold">Add New Stock</h6>
              <hr class="hr">

              <div class="form-group d-none">
                <label for="">Item ID</label>
                <input type="text" class="form-control" name="item_id" id="item_id" value="<?php echo $item_id; ?>" readonly>
              </div>

              <div class="form-group">
                <label for="">Quantity Added</label>
                <input type="text" class="form-control" name="qty_added" id="qty_added" required>
              </div>

              <div class="form-group">
                <label for="">Date</label>
                <input type="text" class="form-control datepicker" name="date" id="date" value="<?php echo $today; ?>" required>
              </div>

              <div class="form-group">
                <label for="">Notes</label>
                <input type="text" class="form-control" name="notes" id="notes" value="">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-black">Add Stock</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="issuestock_modal">
      <div class="modal-dialog modal-side modal-top-right" role="document">
        <div class="modal-content">
          <form id="issuestock_frm" autocomplete="off">
          <div class="modal-body">
              <h6 class="font-weight-bold">Issue Stock</h6>
              <hr class="hr">

              <div class="form-group d-none">
                <label for="">Item ID</label>
                <input type="text" class="form-control" name="item_id" id="item_id" value="<?php echo $item_id; ?>" readonly>
              </div>

              <div class="form-group">
                <label for="">Quantity Issued</label>
                <input type="text" class="form-control" name="qty_issued" id="qty_issued" required>
              </div>

              <div class="form-group">
                <label for="">To whom Issued</label>
                <input type="text" class="form-control" name="to_whom" id="to_whom" required>
              </div>

              <div class="form-group">
                <label for="">Date</label>
                <input type="text" class="form-control datepicker" name="date" id="date" value="<?php echo $today; ?>" required>
              </div>

              <div class="form-group">
                <label for="">Notes</label>
                <input type="text" class="form-control" name="notes" id="notes" value="">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-black">Issue Stock</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <?php require_once ('../navigation/admin_footer.php'); ?>
    <script type="text/javascript">
        $('#addstock_frm').on('submit', function(event) {
          event.preventDefault();
          $.ajax({
            url: '../serverscripts/admin/Consumables/addstock_frm.php',
            type: 'GET',
            data:$('#addstock_frm').serialize(),
            success:function(msg){
                if(msg==='save_successful'){
                  bootbox.alert("Stock  added successfully",function(){
                    window.location.reload()
                  })
                }
                else {
                  bootbox.alert(msg)
                }
            }
          })
        });

        $('#issuestock_frm').on('submit', function(event) {
          event.preventDefault();
          $.ajax({
            url: '../serverscripts/admin/Consumables/issuestock_frm.php',
            type: 'GET',
            data:$('#issuestock_frm').serialize(),
            success:function(msg){
                if(msg==='save_successful'){
                  bootbox.alert("Stock  issued successfully",function(){
                    window.location.reload()
                  })
                }
                else {
                  bootbox.alert(msg)
                }
            }
          })
        });
    </script>
</body>
</html>

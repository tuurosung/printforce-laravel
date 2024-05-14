<?php require_once '../navigation/header.php'; ?>
<?php require_once '../navigation/admin_nav.php'; ?>
  <style media="screen">
  .table td, .table th {
    padding: 0.3rem !important;
  }
  </style>
<!--Main layout-->
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <?php
      $account_number=clean_string($_GET['account_number']);
      $account_info=account_info($account_number);

     ?>


    <div class="card mt-5">
      <div class="card-body">
        <div class="row mb-2">
          <div class="col-md-6">
            <h6 class="montserrat font-weight-bold"><?php echo $account_info['account_name']; ?> Account History</h6>
          </div>
          <div class="col-md-6 text-right">
            <button type="button" class="btn btn-sm btn-elegant" data-toggle="modal" data-target="#new_fund_transfer_modal"><i class="fas fa-plus mr-3"></i>Add Funds</button>
          </div>
        </div>
        <!-- <hr class="hr mt-1"> -->
        <table class="table table-condensed">
          <thead class="font-weight-bold">
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Trans. ID</th>
              <th>Description</th>
              <th class="text-right">Credit</th>
              <th class="text-right">Debit</th>
              <th class="text-right">Balance</th>
              <th>Narration</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=1;
            $balance=0;
            $get_opening_balances=mysqli_query($db,"SELECT * FROM add_funds WHERE transaction_type='opening' && subscriber_id='".$active_subscriber."' && account_number='".$account_number."'") or die(mysqli_error($db));
            while ($opening=mysqli_fetch_array($get_opening_balances)) {
              $balance=$balance+$opening['amount'];
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $opening['date']; ?></td>
                <td><?php echo $opening['transaction_id']; ?></td>
                <td>Opening Balance</td>
                <td class="text-right"><?php echo number_format($opening['amount'],2); ?></td>
                <td class="text-right"><?php echo number_format($history['debit'],2); ?></td>
                <td class="text-right font-weight-bold"><?php echo number_format($balance,2); ?></td>
                <td class="pl-3">Balance Before Transactions</td>
              </tr>
              <?php
            }
             ?>

            <?php


              $query=mysqli_query($db,"
              SELECT * FROM (
                  SELECT payment_date as date, payment_id as trans_id,'Income' as type,'Job Payments' as notes, amount_paid as credit,'-' as debit, timestamp FROM payments WHERE account_number='".$account_number."' && subscriber_id='".$active_subscriber."'
                  UNION ALL
                  SELECT date as date, expenditure_id as trans_id,'Expenditure' as type,description as notes, '' as credit,amount as debit, timestamp FROM expenditure WHERE account_number='".$account_number."' && subscriber_id='".$active_subscriber."' && status='active'
                  UNION ALL
                  SELECT date as date, payment_id as trans_id,'Creditor Payment' as type,'Payment To Supplier For Purchase' as notes, '' as credit,amount_paid as debit, timestamp FROM purchase_payments WHERE account_number='".$account_number."' && subscriber_id='".$active_subscriber."'
                  UNION ALL
                  SELECT date as date, transfer_id as trans_id,'Transfer-In' as type,notes as notes, amount as credit,'-' as debit, timestamp FROM fund_transfers WHERE destination_account='".$account_number."' && subscriber_id='".$active_subscriber."'
                  UNION ALL
                  SELECT date as date, transfer_id as trans_id,'Transfer-Out' as type,notes as notes, '-' as credit,amount as debit, timestamp FROM fund_transfers WHERE source_account='".$account_number."' && subscriber_id='".$active_subscriber."'
                ) r ORDER BY timestamp

              ") or die(mysqli_error($db));
              while ($history=mysqli_fetch_array($query)) {
                if($history['type']=='Income' || $history['type']=='Transfer-In'){
                    $balance=$balance+$history['credit'];
                }
                elseif ($history['type']=='Expenditure' || $history['type']=='Transfer-Out' || $history['type']=='Creditor Payment') {
                  $balance=$balance-$history['debit'];
                }

                // $source=account_info($transfers['source_account']);
                // $destination=account_info($transfers['destination_account']);
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $history['date']; ?></td>
                  <td><?php echo $history['trans_id']; ?></td>
                  <td><?php echo $history['type']; ?></td>
                  <td class="text-right"><?php echo number_format($history['credit'],2); ?></td>
                  <td class="text-right"><?php echo number_format($history['debit'],2); ?></td>
                  <td class="text-right font-weight-bold"><?php echo number_format($balance,2); ?></td>
                  <td class="pl-3"><?php echo $history['notes']; ?></td>
                </tr>
                <?php
              }
             ?>

          </tbody>
        </table>
      </div>
    </div>





    <div class="modal fade" id="new_fund_transfer_modal">
      <div class="modal-dialog modal-side modal-top-right" role="document">
        <div class="modal-content">

          <form id="add_funds_frm" autocomplete="off">
          <div class="modal-body">
              <h6 class="font-weight-bold">Add Funds</h6>
              <hr class="hr">


              <div class="form-group d-none">
                <label for="">Transaction ID</label>
                <input type="text" class="form-control" name="transaction_id" id="transaction_id" value=" <?php echo time(); ?>" readonly>
              </div>

              <div class="form-group d-none">
                <label for="">Account Number</label>
                <input type="text" class="form-control" name="account_number" id="account_number" value=" <?php echo $account_info['account_number']; ?>" readonly>
              </div>

              <div class="form-group">
                <label for="">Transaction Type</label>
                <select class="custom-select browser-default" name="transaction_type">
                  <option value="opening">Opening Balance</option>
                  <option value="cash_in">Cash In</option>
                </select>
              </div>

              <div class="form-group">
                <label for="">Narration (Opening Balance, Arrears Paid From NGO)</label>
                <input type="text" class="form-control" name="notes" id="notes" value="" required>
              </div>

              <div class="form-group">
                <label for="">Amount</label>
                <input type="text" class="form-control" name="amount" id="amount" value="" required>
              </div>



              <div class="form-group">
                <label for="">Date</label>
                <input type="text" class="form-control" name="date" id="date" value="<?php echo $today; ?>" required>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-black">Move Funds</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php require_once ('../navigation/admin_footer.php'); ?>
    <script type="text/javascript">
        $('#new_fund_transfer_modal').on('shown.bs.modal', function(event) {
          event.preventDefault();
          $('#date').datepicker()
        });


        $('#add_funds_frm').on('submit', function(event) {
          event.preventDefault();
          $.ajax({
            url: '../serverscripts/admin/add_funds_frm.php',
            type: 'GET',
            data:$('#add_funds_frm').serialize(),
            success:function(msg){
                if(msg==='FundingSuccessful'){
                  bootbox.alert("Fund Transfer Successful",function(){
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

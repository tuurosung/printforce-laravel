<?php require_once '../navigation/header.php'; ?>
<?php require_once '../navigation/admin_nav.php'; ?>

<!--Main layout-->
<main class="pt-3 mx-lg-5">
  <div class="container-fluid mt-2">

    <div class="row mb-5">
      <div class="col-md-6">
          <h4 class="titles">Trial Balance</h4>
      </div>
      <div class="col-md-6 text-right">
        <button type="button" class="btn btn-primary btn-rounded" id="print_btn">
          <i class="fas fa-print mr-3"></i>
          Print
        </button>
      </div>
    </div>


    <div class="card mb-3">
      <div class="card-body pb-2">
        <h6 class="font-weight-bold montserrat">Trial Balance</h6>
        <hr class="hr mb-1 ">

        <div class="row font-weight-bold">
          <div class="col-6">
            ACCOUNT NAME
          </div>
          <div class="col-3 text-right">
            DEBIT
          </div>
          <div class="col-3 text-right">
            CREDIT
          </div>
        </div>
        <hr class="hr my-1">
        <?php
          $credit=0;
          $debit=0;
          $get_acccounts=mysqli_query($db,"SELECT * FROM accounts WHERE subscriber_id='".$active_subscriber."'") or die('failed');
          while ($accounts=mysqli_fetch_array($get_acccounts)) {
            ?>
            <div class="row my-2">
              <div class="col-6">
                <?php echo $accounts['account_name']; ?>
              </div>
              <div class="col-3 text-right">
                <?php echo $accounts['balance']; ?>
              </div>
              <div class="col-3 text-right">
                -
              </div>
            </div>
            <!-- <hr class="hr my-1"> -->
            <?php
            $debit=$debit+$accounts['balance'];
          }
         ?>

         <!-- Purchases -->
         <div class="row my-2 text-uppercase">
           <div class="col-6">
             Equipment & Supplies
           </div>
           <div class="col-3 text-right">
             <?php echo number_format(equipment_and_supplies($year_start,$year_end),2); ?>
             <?php $debit=$debit+equipment_and_supplies($year_start,$year_end); ?>
           </div>
           <div class="col-3 text-right">
             -
           </div>
         </div>


         <!-- Payments -->
         <?php
          $payment=payments_period($year_start,$year_end);
          $credit_sales=abs(debt_stock());
          ?>
          <?php
            $get_opening_balances=mysqli_query($db,"SELECT SUM(amount) as opening_balances FROM add_funds WHERE subscriber_id='".$active_subscriber."' AND status='active'") or die('failed');
            $get_opening_balances=mysqli_fetch_assoc($get_opening_balances);
           ?>
          <div class="row my-2 text-uppercase">
            <div class="col-6">
              Opening Balances
            </div>
            <div class="col-3 text-right">
              -
            </div>
            <div class="col-3 text-right">
              <?php echo number_format($get_opening_balances['opening_balances'],2); ?>
              <?php $credit=$credit+$get_opening_balances['opening_balances']; ?>
            </div>
          </div>

          <div class="row my-2">
            <div class="col-6">
              SALES
            </div>
            <div class="col-3 text-right">
              -
            </div>
            <div class="col-3 text-right">
              <?php echo number_format($payment+abs(debt_stock()),2); ?>
              <?php $credit=$credit+$payment+$credit_sales; ?>
            </div>
          </div>

          <div class="row my-2 text-uppercase">
            <div class="col-6">
              Account Payables
            </div>
            <div class="col-3 text-right">
              -
            </div>
            <div class="col-3 text-right">
              <?php echo number_format(liabilities(),2); ?>
              <?php $credit=$credit+liabilities(); ?>
            </div>
          </div>

          <div class="row my-2">
            <div class="col-6">
              RECEIVABLES
            </div>
            <div class="col-3 text-right">
              <?php echo number_format(abs(debt_stock()),2); ?>
              <?php $debit=$debit+abs(debt_stock()); ?>
            </div>
            <div class="col-3 text-right">

            </div>
          </div>



          <?php
            $get_expenses=mysqli_query($db,"SELECT * FROM expenditure WHERE subscriber_id='".$active_subscriber."' && status='active' GROUP BY header_id") or die('failed');
            while ($expenses=mysqli_fetch_array($get_expenses)) {
              $header_info=header_info($expenses['header_id']);
              $expenditure_by_header=expenditure_by_header($expenses['header_id']);
              ?>
              <div class="row my-2">
                <div class="col-6">
                  <?php echo $header_info['header_name']; ?>
                </div>
                <div class="col-3 text-right">
                  <?php echo $expenditure_by_header; ?>
                </div>
                <div class="col-3 text-right">
                  -
                  <?php $debit=$debit+$expenditure_by_header; ?>
                </div>
              </div>
              <?php
            }
           ?>

          <div class="row my-2">
            <div class="col-6">

            </div>
            <div class="col-3 text-right" >
              <div class="" style="border-bottom:double #000 3px; border-top:double 3px #000">
                <?php echo number_format($debit,2); ?>
              </div>
            </div>
            <div class="col-3 text-right" >
              <div class="" style="border-bottom:double #000 3px; border-top:double 3px #000">
                <?php echo number_format($credit,2); ?>
              </div>

            </div>
          </div>


      </div>
    </div>



    <?php require_once ('../navigation/admin_footer.php'); ?>
    <script type="text/javascript">
        $('#new_customer_frm').on('submit', function(event) {
          event.preventDefault();
          var customer_id=$('#customer_id').val();
          $.ajax({
            url: '../serverscripts/admin/new_customer_frm.php',
            type: 'GET',
            data:$('#new_customer_frm').serialize(),
            success:function(msg){
                if(msg==='save_successful'){
                  bootbox.alert("Customer registration successful",function(){
                    window.location='customer_portal.php?customer_id='+customer_id
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

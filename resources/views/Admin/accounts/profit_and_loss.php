<?php require_once '../navigation/header.php'; ?>
<?php require_once '../navigation/admin_nav.php'; ?>

<!--Main layout-->
<main class="pt-3 mx-lg-5">
  <div class="container-fluid mt-2">

    <div class="row mb-5">
      <div class="col-md-6">
          <h4 class="titles">Profit And Loss</h4>
      </div>
      <div class="col-md-6 text-right">
        <button type="button" class="btn btn-primary btn-rounded" id="print_btn">
          <i class="fas fa-print mr-3"></i>
          Print
        </button>
      </div>
    </div>


    <div class="card mb-3">
      <div class="card-body pb-3">
        <h6 class="font-weight-bold montserrat">Profit And Loss Account Statement</h6>
        <hr class="hr">

        <!-- income +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="row font-weight-bold text-uppercase">
          <div class="col-md-6">
            Income
          </div>
          <div class="col-md-3 text-right">
            Debit
          </div>
          <div class="col-md-3 text-right">
            Credit
          </div>
        </div>

        <hr class="my-1" style="border-top:solid 1px #000">

        <div class="row mb-1 text-uppercase">
          <div class="col-md-6">
            Print Sales
          </div>
          <div class="col-md-3 text-right">

          </div>
          <div class="col-md-3 text-right">
            <?php echo payments_period($year_start,$year_end); ?>
          </div>
        </div>


        <div class="row mb-1">
          <div class="col-md-6">
            Other Income
          </div>
          <div class="col-md-3">

          </div>
          <div class="col-md-3 text-right">
            0.00
          </div>
        </div>

        <div class="row mb-1">
          <div class="col-md-6">

          </div>
          <div class="col-md-3">

          </div>
          <div class="col-md-3 text-right">
            <div class="" style="border-top:3px double">
                  <?php
                      $total_income=payments_period($year_start,$year_end);
                   ?>
                <?php echo number_format($total_income,2); ?>
            </div>
          </div>
        </div>




        <!-- purchases +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="row mt-3 font-weight-bold">
          <div class="col-md-6">
            Cost Of Goods Sold
          </div>
          <div class="col-md-3">

          </div>
          <div class="col-md-3 text-right">

          </div>
        </div>
        <hr class="mt-1" style="border-top:solid 1px #000">

        <div class="row mt-3 mb-1">
          <div class="col-md-6">
            Opening Stock
          </div>
          <div class="col-md-3 text-right">
            0.00
          </div>
          <div class="col-md-3 text-right">

          </div>
        </div>
        <div class="row mb-1">
          <div class="col-md-6">
            Add Purchases
          </div>
          <div class="col-md-3 text-right">
            <?php echo number_format(purchases_period($year_start,$year_end),2); ?>
          </div>
          <div class="col-md-3 text-right">

          </div>
        </div>
        <div class="row">
          <div class="col-md-6">

          </div>
          <div class="col-md-3 text-right">
            <div class="" style="border-top:3px double; ">
              <?php echo number_format(purchases_period($year_start,$year_end),2); ?>
            </div>
          </div>
          <div class="col-md-3">

          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            Less Closing Stock
          </div>
          <div class="col-md-3 text-right">
            <?php echo number_format(purchases_period($year_start,$year_end),2); ?>
          </div>
          <div class="col-md-3 text-right">

          </div>
        </div>

        <div class="row">
          <div class="col-md-6">

          </div>
          <div class="col-md-3 text-right">
            <div class="" style="border-top:3px double; ">
                <?php
                    $total_purchases=purchases_period($year_start,$year_end);
                 ?>
              <?php echo number_format($total_purchases,2); ?>
            </div>
          </div>
          <div class="col-md-3 text-right">
            <div class="" style="border-top:3px double; ">
                <?php echo number_format($total_income-$total_purchases,2); ?>
            </div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-md-6  font-weight-bold">
            GROSS PROFIT
          </div>
          <div class="col-md-3 text-right pt-1">
            ---------------------->
          </div>
          <div class="col-md-3 text-right font-weight-bold">
            <div class="" style="border-bottom:3px double;border-top:double 3px ">
                <?php
                  $gross_profit=$total_income - $total_purchases;
                  ?>
                <?php echo number_format($gross_profit,2); ?>
            </div>
          </div>
        </div>


          <div class="row mt-5 font-weight-bold">
          <div class="col-md-6">
            LESS EXPENSES
          </div>
          <div class="col-3">

          </div>
          <div class="col-3">

          </div>
        </div>


        <hr class="mt-1" style="border-top:solid 1px #000">

        <?php
        $total_expenses=0;

         $get_expenses=mysqli_query($db,"SELECT  header_id,SUM(amount) as total_expenditure
                                                                FROM expenditure
                                                                WHERE date BETWEEN '".$year_start."' AND '".$year_end."' && subscriber_id='".$active_subscriber."' AND status='active'

                                                                GROUP BY
                                                                  header_id
                                                                ORDER BY total_expenditure desc
                                                                ") or die(mysqli_error($db));

         while ($expenses=mysqli_fetch_array($get_expenses)) {
           $header_info=mysqli_query($db,"SELECT * FROM expenditure_headers WHERE header_id='".$expenses['header_id']."'") or die(mysqli_error($db));
           $header_info=mysqli_fetch_array($header_info);

           ?>
           <div class="row mb-1 text-uppercase">
             <div class="col-md-6">
               <?php echo $header_info['header_name']; ?>
             </div>
             <div class="col-md-3 text-right">
               <?php echo number_format($expenses['total_expenditure'],2); ?>
             </div>
             <div class="col-md-3 text-right">

             </div>
           </div>
           <?php
           $total_expenses+=$expenses['total_expenditure'];
         }
         ?>

         <div class="row">
           <div class="col-md-6">

           </div>
           <div class="col-md-3 text-right">
             <div class="" style="border-top:3px double; ">
               <?php echo number_format($total_expenses,2); ?>
             </div>
           </div>
           <div class="col-md-3 text-right">
             <div class="" style="border-top:3px double; ">
                 <?php echo number_format($gross_profit,2); ?>
             </div>
           </div>
         </div>

         <div class="row mt-4">
           <div class="col-md-6 font-weight-bold">
             NET PROFIT
           </div>
           <div class="col-md-3 text-right">
             ---------------------->
           </div>
           <div class="col-md-3 text-right font-weight-bold">
             <div class="" style="border-top:3px double; border-bottom:3px double">
                 <?php echo number_format($gross_profit - $total_expenses,2); ?>
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

<?php require '../navigation/print_header.php'; ?>
<?php require_once '../serverscripts/Classes/Payments.php'; ?>
<?php require_once '../serverscripts/Classes/Customers.php'; ?>
<?php
    $payment_id=clean_string($_GET['payment_id']);
    $p=new Payment($q->db, $q->mysqli);
    $p->payment_id=$payment_id;
    $p->PaymentInfo();

    $c=new Customer($q->db, $q->mysqli);
    $c->customer_id=$p->customer_id;
    $c->CustomerInfo();
 ?>

<div class="container">
  <div class="font-weight-bold montserrat" style="font-weight:bold; margin:1rem 0rem 1rem; font-size:1rem">PAYMENT RECEIPT</div>


  <div class="" style="font-size:12px">
    <div class="d-flex mb-1" style="display:flex;">
        <div style="width:90px">Payment ID:</div>
        <div class="font-weight-bold"><strong><?php echo $p->payment_id; ?></strong></div>
    </div>
    <div class="d-flex mb-1" style="display:flex">
        <div style="width:90px">Customer:</div>
        <div class="text-uppercase montserrat"><strong><?php echo strtoupper($c->name); ?></strong></div>
    </div>
    <div class="d-flex mb-0"  style="display:flex">
        <div style="width:90px">Date:</div>
        <div class="font-weight-bold"><strong><?php echo $p->payment_date; ?></strong></div>
    </div>
  </div>

  <div class="mt-3" style="margin-top:30px">
    <hr class="mb-2" style="border-top:dashed 1px #000">

    <div class="row font-weight-bold" style="font-size:14px; display:flex;">
      <div class="col-1" style="width:10%">
        #
      </div>
      <div class="col-5" style="width:70%">
        Description
      </div>
      <div class="col-4" style="width:20%; text-align:right">
        Amount
      </div>
    </div>

    <hr class="mb-2" style="border-top:dashed 1px #000">

    <div class="row font-weight-bold" style="font-size:14px; display:flex;">
      <div class="col-1" style="width:10%">
        1.
      </div>
      <div class="col-5" style="width:70%">
        Payment on customer account
      </div>
      <div class="col-4" style="width:20%; text-align:right">
        <?php echo $p->amount_paid; ?>
      </div>
    </div>
    <hr class="my-2" style="border-top:dashed 1px #000">
    <div class="row font-weight-bold" style="font-size:14px; display:flex;">
      <div class="col-1" style="width:10%">

      </div>
      <div class="col-5" style="width:70%; text-align:right">
        VAT
      </div>
      <div class="col-4" style="width:20%; text-align:right">
        0.00
      </div>
    </div>
    <hr class="my-2" style="border-top:dashed 1px #000">
    <div class="row font-weight-bold" style="font-size:14px; display:flex;">
      <div class="col-1" style="width:10%">

      </div>
      <div class="col-5" style="width:70%; text-align:right">
        NHIL
      </div>
      <div class="col-4" style="width:20%; text-align:right">
        0.00
      </div>
    </div>
    <hr class="my-2" style="border-top:dashed 1px #000">
    <div class="row font-weight-bold" style="font-size:14px; display:flex;">
      <div class="col-1" style="width:10%">

      </div>
      <div class="col-5" style="width:70%; text-align:right">
        Total
      </div>
      <div class="col-4" style="width:20%; text-align:right; font-weight:bold">
        <?php echo $p->amount_paid; ?>
      </div>
    </div>

    <hr class="my-2" style="border-top:dashed 1px #000">

    <div class="" style="display:flex; margin-top:50px; margin-bottom:30px">
      <!-- <div class="" style="width:33%; border-right:solid 2px #000; margin-right:15px">
        Bill
        <div style="font-weight: bold; font-size:20px; margin-bottom:0px; margin-top:10px"><?php echo $order_details['order_cost']; ?></div>
      </div> -->
      <div class="" style="width:33%; border-right:solid 2px #000; margin-right:15px">
        Paid
        <div style="font-weight: bold; font-size:20px; margin-top:10px"><?php echo $p->amount_paid; ?></div>
      </div>
      <div class="" style="width:33%">
        Bal
        <div style="font-weight: bold; font-size:20px; margin-top:10px"><?php echo $c->balance; ?></div>
      </div>
    </div>


    <hr class="my-2" style="border-top:dashed 1px #000">
    <div class="" style="text-align:center">
      <?php echo $staff_info['full_name']; ?>
    </div>

 </div>

 <div class="montserrat" style="text-align:center; margin-top:20px">
   *** Thank you for your patronage ***
 </div>
 <div class="montserrat" style="text-align:center">
   Powered By PRINTFORCE ERP SYSTEM
 </div>

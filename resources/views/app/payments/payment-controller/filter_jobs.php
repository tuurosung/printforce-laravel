<?php
  require_once '../dbcon.php';
require_once '../../../includes/autoload.php';
  $start_date=clean_string($_GET['start_date']);
  $end_date=clean_string($_GET['end_date']);
 ?>

<div class="infoboxes px-4 pt-4 pb-3 mb-5">
  <div class="row">
    <div class="col-md-4">
      Total Jobs Registered
      <h5 class="big-text"><?php echo count_jobs_period($start_date,$end_date); ?> Jobs</h5>
    </div>
    <div class="col-md-4">
      This Month's Jobs
      <h5 class="big-text"><?php echo count_jobs_period($start_date,$end_date); ?> Jobs</h5>
    </div>
    <div class="col-md-4">
      This Week
      <h5 class="big-text"><?php echo count_jobs_period($start_date,$end_date); ?> Jobs</h5>
    </div>
  </div>
</div>


<h6 class="font-weight-bold montserrat mb-4">1. Summary</h6>

<table class="table table-condensed">
  <thead>
    <tr>
      <th>Service Name</th>
      <th class="text-center">Jobs</th>
      <th class="text-right">Income</th>
    </tr>
  </thead>
  <tbody>

      <?php
          $get_breakdown=mysqli_query($db,"
          SELECT * FROM(
                SELECT service_id, COUNT(service_id) as number_of_jobs, SUM(total) as total  FROM jobs_largeformat  WHERE subscriber_id='".$active_subscriber."' && date BETWEEN '".$start_date."' AND '".$end_date."' GROUP BY service_id
                UNION ALL
                SELECT service_id, COUNT(service_id) as number_of_jobs, SUM(total) as total  FROM jobs_press WHERE subscriber_id='".$active_subscriber."'  && date BETWEEN '".$start_date."' AND '".$end_date."' GROUP BY service_id
                UNION ALL
                SELECT service_id, COUNT(service_id) as number_of_jobs, SUM(total) as total  FROM jobs_embroidery WHERE subscriber_id='".$active_subscriber."'  && date BETWEEN '".$start_date."' AND '".$end_date."' GROUP BY service_id
                UNION ALL
                SELECT service_id, COUNT(service_id) as number_of_jobs, SUM(total) as total  FROM jobs_photography WHERE subscriber_id='".$active_subscriber."'  && date BETWEEN '".$start_date."' AND '".$end_date."' GROUP BY service_id
                UNION ALL
                SELECT service_id, COUNT(service_id) as number_of_jobs, SUM(total) as total  FROM jobs_design WHERE subscriber_id='".$active_subscriber."'  && date BETWEEN '".$start_date."' AND '".$end_date."' GROUP BY service_id
          )r
          ") or die(mysqli_error($db));
          while ($rows=mysqli_fetch_array($get_breakdown)) {
            $service_info=service_info($rows['service_id']);
            ?>
            <tr>
              <td><?php echo $service_info['service_name']; ?></td>
              <td class="text-center"><?php echo $rows['number_of_jobs']; ?></td>
              <td class="text-right"><?php echo number_format($rows['total'],2); ?></td>
            </tr>
            <?php
            $total+=$rows['total'];
            $jobs+=$rows['number_of_jobs'];
          }
       ?>
       <tr class="font-weight-bold">
         <td>Total</td>
         <td class="text-center"><?php echo $jobs; ?></td>
         <td class="text-right"><?php echo number_format($total,2); ?></td>
       </tr>
     </tbody>
   </table>



   <h6 class="mt-5 font-weight-bold mb-3 montserrat">2. Details</h6>

   <table class="table table-condensed">
     <thead>
       <tr>
         <th>#</th>
         <th>Job ID</th>
         <th>Customer</th>
         <th>Service</th>
         <th class="text-right">Total</th>
       </tr>
     </thead>
     <tbody>
       <?php
          $i=1;
          $total=0;
          $get_jobs=mysqli_query($db,"
          SELECT * FROM(
              SELECT subscriber_id,job_id,service_id,customer_id,total FROM jobs_press WHERE subscriber_id='".$active_subscriber."' && date BETWEEN '".$start_date."' AND '".$end_date."'
              UNION ALL
              SELECT subscriber_id,job_id,service_id,customer_id,total FROM jobs_design WHERE subscriber_id='".$active_subscriber."' && date BETWEEN '".$start_date."' AND '".$end_date."'
              UNION ALL
              SELECT subscriber_id,job_id,service_id,customer_id,total FROM jobs_embroidery WHERE subscriber_id='".$active_subscriber."' && date BETWEEN '".$start_date."' AND '".$end_date."'
              UNION ALL
              SELECT subscriber_id,job_id,service_id,customer_id,total FROM jobs_largeformat WHERE subscriber_id='".$active_subscriber."' && date BETWEEN '".$start_date."' AND '".$end_date."'
              UNION ALL
              SELECT subscriber_id,job_id,service_id,customer_id,total FROM jobs_photography WHERE subscriber_id='".$active_subscriber."' && date BETWEEN '".$start_date."' AND '".$end_date."'
            )r
          ") or die(mysqli_error($db));
          while ($rows=mysqli_fetch_array($get_jobs)) {
            $customer_info=customer_info($rows['customer_id']);
            $service_info=service_info($rows['service_id']);
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $rows['job_id']; ?></td>
              <td><?php echo $customer_info['name']; ?></td>
              <td><?php echo $service_info['service_name']; ?></td>
              <td class="text-right"><?php echo number_format($rows['total'],2); ?></td>
            </tr>
            <?php
            $total+=$rows['total'];
          }
        ?>
        <tr class="text-right font-weight-bold" style="font-size:20px">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><?php echo number_format($total,2); ?></td>
        </tr>
     </tbody>
   </table>

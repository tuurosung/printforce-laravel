<?php
require_once '../../_load.php';
require_once $appLink . 'includes/autoload.php';

$q = new DataBase();
$seagate = new SeaGate();
$payment = new Payment($q->db, $q->mysqli);

if (!isset($_POST)) {
    exit;
}

$_POST = array_map([$seagate, 'Clean'], $_POST);

extract($_POST);

$list = $payment->filterByDate($start_date, $end_date, $customer, '');
?>


<table class="table table-secondary">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Account</th>
            <th class="text-right">Amount</th>
            <th class="text-right">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $total = 0;

        if (is_array($list)) :
            foreach ($list as $payments) {


        ?>
                <td><?php echo $i++; ?></td>
                <td><?php echo $payments['payment_date']; ?> | <?php if (!empty($payments['timestamp'])) {
                                                                    echo date('H:i:s', $payments['timestamp']);
                                                                } ?></td>
                <td><?php echo $payments['customer_name']; ?></td>
                <td><?php echo $payments['account_name']; ?></td>
                <td class="text-right"><?php echo number_format($payments['amount_paid'], 2); ?></td>

                <td class="text-right">

                    <a href="#" id="<?php echo $payments['payment_id']; ?>" class="receipt mr-3" style="text-decoration: none;">
                        <i class=" fas fa-print text-primary"></i>
                    </a>

                    <a href="" id="<?php echo $payments['payment_id']; ?>" class="edit_payment" style="text-decoration: none;">
                        <i class=" fas fa-pen text-purple mr-3"></i>
                    </a>

                    <a href="" id="<?php echo $payments['payment_id']; ?>" class="delete_pmt" style="text-decoration: none;" data-url="payment-controller/delete.php?sn=<?php echo $payments['sn']; ?>">
                        <i class=" fas fa-trash-alt text-danger "></i>
                    </a>

                </td>
                </tr>
        <?php
                $total += $payments['amount_paid'];
            }
        endif;
        ?>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right fw-600 Axiforma"><?php echo number_format($total, 2); ?></td>
            <td></td>
        </tr>

    </tbody>
</table>
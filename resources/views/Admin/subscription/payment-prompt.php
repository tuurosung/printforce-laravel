<?php
require_once '_load.php';
require_once $appLink . 'includes/autoload.php';

$seagate = new SeaGate();

if (!isset($_POST)) {
    // header()
    exit;
}

$_POST = array_map([$seagate, 'Clean'], $_POST);

$amount = $_POST['amount'];
$email = $_POST['email'];
$invoice_id = $_POST['invoice_id'];

// $amount = 2;
// $email = 'info@printforcepos.com';

?>
<script src="https://js.paystack.co/v1/inline.js"></script>

<script type="text/javascript">
    payWithPaystack();


    function payWithPaystack() {
        // e.preventDefault();

        const invoice_id = '<?php echo $invoice_id; ?>'
        const email = '<?php echo $email; ?>'
        const amount = '<?php echo $amount; ?>'

        let handler = PaystackPop.setup({
            key: 'pk_test_678b663668dd64a10da3d99963056100cb072e2e', // Replace with your public key
            email: email,
            amount: amount,
            currency : 'GHS',
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function() {
                alert('Window closed.');
            },
            callback: function(response) {
                let message = 'Payment complete! Reference: ' + response.reference;
                // alert(message);
                window.location = 'renew-subscription.php?invoice_id='+invoice_id+'&amount='+amount+'&reference='+response.reference
            }
        });

        handler.openIframe();
    }
</script>
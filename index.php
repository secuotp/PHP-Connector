<?php


include 'SecuOTPService.php';


$service = new SecuOTPService('https://secuotp-test.co.th', '5L44G-7XR1G-V5RAM-JC6KG');
$status = $service->authenticateOneTimePassword('zenology', '1514802');
$object = $status->getData();

if ($status->getStatusId() === 100) {
    echo '<h1>So Good</h1>';
} else {
    echo '<p>' . $status->getStatusText() . '</p>';
}
?>

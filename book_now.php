<?php

include 'db_connect.php';
include 'send_mail.php';
extract($_POST);

$data = ' schedule_id = '.$sid.' ';
$data .= ', name = "'.$name.'" ';
$data .= ', qty = "'.$qty.'" ';
if (!empty($bid)) {
    $data .= ', status = "'.$status.'" ';
    $update = $conn->query("UPDATE booked SET ".$data." WHERE id = ".$bid);
    if ($update) {
        echo json_encode(array('status' => 1));
    } else {
        echo json_encode(array('status' => 0, 'error' => 'Failed to update booking'));
    }
    exit;
}

$i = 1;
$ref = '';
while ($i == 1) {
    $ref = date('Ymd').mt_rand(1, 9999);
    $data .= ', ref_no = "'.$ref.'" ';
    $chk = $conn->query("SELECT * FROM booked WHERE ref_no = '".$ref."'")->num_rows;
    if ($chk <= 0) {
        $i = 0;
    }
}
$insert = $conn->query("INSERT INTO booked set ".$data);
if($insert){
    // Update the availability in the corresponding schedule
    $update = $conn->query("UPDATE schedule_list SET availability = availability - $qty WHERE id = $sid");
    if($update) {
        echo json_encode(array('status'=> 1,'ref'=>$ref));
    } else {
        echo json_encode(array('status'=> 0,'error'=>'Failed to update availability'));
    }
} else {
    echo json_encode(array('status'=> 0,'error'=>'Failed to insert booking'));
}

/*
$insert = $conn->query("INSERT INTO booked SET " . $data);
if ($insert) {
    // Update the availability in the corresponding schedule
    $update = $conn->query("UPDATE schedule_list SET availability = availability - $qty WHERE id = $sid");

    if ($update) {
        // Send email notification
        $emailSent = sendEmail('Booking Confirmation', 'Your booking has been confirmed.', 'tshiamo.g.monageng@gmail.com');

        if ($emailSent) {
            echo json_encode(array('status' => 1, 'ref' => $ref));
        } else {
            echo json_encode(array('status' => 0, 'error' => 'Failed to send email'));
        }
    } else {
        echo json_encode(array('status' => 0, 'error' => 'Failed to update availability'));
    }
} else {
    echo json_encode(array('status' => 0, 'error' => 'Failed to insert booking: ' . $conn->error));
}

function sendEmail($subject, $body, $toEmail) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'reservationbus9@gmail.com'; // Your Gmail address
        $mail->Password = 'p@ssWord140'; // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('reservationbus9@gmail.com', 'Bus Reservation System'); // Must be same as Username
        $mail->addAddress($toEmail);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Email sending failed: {$mail->ErrorInfo}");
        return false;
    }
}
?>
*/
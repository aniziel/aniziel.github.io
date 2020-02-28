<?php
header("content-type: application/json; charset=utf-8");
$nick = isset($_POST['nick']) ? $_POST['nick'] : "";
$pytanko = isset($_POST['pytanko']) ? $_POST['pytanko'] : "";
if ($nick && $pytanko) {
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=utf-8\r\nContent-Transfer--Encoding: 8bit";
	$message_body = "Formularz kontaktowy wysłany ze strony www.example.com\n";
 	$message_body .= "nick: $nick\n";
	$message_body .= $pytanko;

 	if (mail("anita.zielinska12360@gmail.com", "formularz kontaktowy", $message_body, $headers)) {
 		$json = ["status" => 1, "msg" => "<p class='status_ok'>Twoje pytanie pomyślnie wysłane.</p>"];
 	}

	else {
		$json = ["status" => 0, "msg" => "<p class='status_err'>Wystąpił problem z wysłaniem pytania.</p>"];
	}
}
else {
	$json = ["status" => 0, "msg" => "<p class='status_err'>Proszę wypełnić wszystkie pola.</p>"];
}
echo json_encode($json);
exit;
?>
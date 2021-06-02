<?php
require_once __DIR__ . '/Lead.php';

if (!empty($_POST)) {
    if ($_POST['action'] == 'new') {

        if (!isset($_POST["g-recaptcha-response"])) {
            $message = (($_POST['lang'] == "es") ? 'El mensaje no pudo enviarse: CAPTCHA NO V&Aacute;LIDO' : 'The message was not send: CAPTCHA NOT VALID');

            echo jsonResponse(
                false,
                'error',
                'X_x!',
                $message
            );

            exit();
        }


        $recaptcha = $_POST["g-recaptcha-response"];

        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $aPayload = [
            'header'    =>  "Content-Type: application/x-www-form-urlencoded\r\n",
            'secret'    =>  SECRET_KEY_CAPTCHA,
            'response'  =>  $recaptcha,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];

        $aOptions = [
            'http' => [
                'method'    => 'POST',
                'content'   => http_build_query($aPayload)
            ]
        ];

        $context = stream_context_create($aOptions);

        $verify = file_get_contents($url, false, $context);

        $captcha_success = json_decode($verify);

        if (!$captcha_success->success) {
            $message = (($_POST['lang'] == "es") ? 'El mensaje no pudo enviarse: CAPTCHA NO V&Aacute;LIDO' : 'The message was not send: CAPTCHA NOT VALID');

            echo jsonResponse(
                false,
                'error',
                'X_x!',
                $message
            );

            exit();
        }

        $oL = new Lead($_POST);

        $oLC = new LeadsController;
        $oLC($oL);
    }
}


class LeadsController
{
    public function __invoke(Lead $L)
    {

        $json = file_get_contents_utf8(__DIR__ . "/../traducciones.json");
        $data = json_decode($json, true);

        $lang = $L->__get('lang');
        $name2 = htmlentities($L->__get("name"), ENT_QUOTES, 'UTF-8');
        $response = array();

        $_url = "&estatus=thankyou";

        if ($L->store()) {
            $msg = "
          **************************************************<br>
          ******<b>" . str_repeat("&nbsp;", 3) . $data[$lang]["mail"]["header"] . str_repeat("&nbsp;", 2) . "</b>*****<br>
          ******<b>" . str_repeat("&nbsp;", 7) . utf8_decode($data[$lang]["mail"]["body"]["promotion_code"]) . " " . trim($L->__get('code')) . "</b>" . str_repeat("&nbsp;", 10) . "*****<br>
          **************************************************<br>
          <b>" . utf8_decode($data[$lang]["mail"]["body"]["campaign"]) . "</b> " . trim($L->__get('campaign')) . "<br>
          ----------------------------------------------------<br>
          <b>" . $data[$lang]["mail"]["body"]["customer"] . "</b> " . trim($name2) . "<br>
          <b>" . utf8_decode($data[$lang]["mail"]["body"]["telephone"]) . "</b> " . trim($L->__get('phone')) . " <br>
          <b>" . utf8_decode($data[$lang]["mail"]["body"]["email"]) . "</b> " . trim($L->__get('email')) . " <br>
          <b>" . utf8_decode($data[$lang]["mail"]["body"]["city"]) . "</b> " . trim($L->__get('city')) . " <br>
          <b>" . utf8_decode($data[$lang]["mail"]["body"]["company"]) . "</b> " . trim($L->__get('company')) . " <br>
          <b>" . utf8_decode($data[$lang]["mail"]["body"]["job"]) . "</b> " . trim($L->__get('job')) . " <br>
          ----------------------------------------------------<br>
				";
            $subject = $data[$lang]["mail"]["body"]["subject"] . " " . $L->__get('campaing');
            $to = "ventas.corporativas@america-carrental.com";
            $from = trim($L->__get('email'));
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers .= 'From: <' . $from . '>' . "\r\n";
            $return = '-f' . $from;


            $mail = '';

            if (mail($to, $subject, $msg, $headers, $return)) {
                $success = utf8_decode($data[$lang]["message"]["success"]); //htmlentities($data[$lang]["message"]["success"], ENT_QUOTES,'UTF-8');
                $response = jsonResponse(
                    true,
                    'success',
                    'Ok!',
                    $success
                );
            } else {

                $warning = utf8_decode($data[$lang]["message"]["warning"]); //htmlentities($data[$lang]["message"]["warning"], ENT_QUOTES,'UTF-8');

                $response = jsonResponse(
                    true,
                    'warning',
                    'Oh, Oh!',
                    $warning
                );
            }
        } else {
            $fail = utf8_decode($data[$lang]["message"]["fail"]); //htmlentities( $data[$lang]["message"]["fail"], ENT_QUOTES,'UTF-8');
            $response = jsonResponse(
                false,
                'error',
                'Ups!',
                $fail
            );
        }

        echo $response;
        exit();
        //$actual_link = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    }
}

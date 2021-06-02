<?php
require_once(__DIR__ . '/app/Helper.php');
$lang       = ((isset($_GET["idioma"]))         ? $_GET["idioma"] : "en");
$codigo     = ((isset($_GET["cod"]))            ? $_GET["cod"] : "RCORP20");
$source     = ((isset($_GET["utm_source"]))     ? $_GET["utm_source"] : "");
$medium     = ((isset($_GET["utm_medium"]))     ? $_GET['utm_medium'] : "");
$campaign   = ((isset($_GET["utm_campaign"]))   ? $_GET["utm_campaign"] : "");
//Numero para contactar por whatsap
$whatsapp = "529982750775";
$telephone = "9982536112";

$json = file_get_contents_utf8("traducciones.json");
$data = json_decode($json, true);

?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">

    <title>
        <?php
        switch ($codigo) {
            case "CMX2":
                echo ($lang == 'es') ? "Caribex2" : "Caribex2";
                break;
            case "HOT05":
                echo ($lang == 'es') ? "Hot Sale" : "Hot Sale";
                break;
            case "PEC05":
                echo ($lang == 'es') ? "Precio Especial" : "Special Price";
                break;
            case "PROMO20":
                echo ($lang == 'es') ? "Promoci&oacute;n 20%" : "20% Promotion";
                break;
            case "DES50":
                echo ($lang == 'es') ? "Descuento 50%" : "50% Discount";
                break;
            case "PROMOUP0":
                echo ($lang == 'es') ? "D&iacute;a Gratis" : "Free Day";
                break;
            case "PROMO200DEP":
                echo ($lang == 'es') ? "Dep&oacute;sito de Garant&iacute;a" : "Deposit of Guarantee";
                break;
            default:
                echo ($lang == 'es') ? "Lanzamiento" : "Lanzamiento";
                break;
        }
        ?>
    </title>

    <link href="/assets/b4/b4.css" rel="stylesheet">
    <link href="/assets/b4/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/whatsapp.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/assets/css/landing.css" rel="stylesheet">
    <style>
        .bg-image-fondo {
            background-image: url("/assets/img/corporativo/<?= $codigo . "-" . $lang; ?>.jpg");
            background-size: contain;
            background-repeat: no-repeat;
        }

        .bg-image-phone-summer {
            background-image: url("assets/img/corporativo/contacto-<?php echo $lang; ?>.png");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .bg-image-phone-homeland {
            background-image: url("/assets/img/car/img-tel-homeland-<?php echo $lang; ?>.png");
            background-size: contain;
            background-repeat: no-repeat;
        }
    </style>
    <!-- Facebook Pixel Code -->
    <?php if (isset($_REQUEST["estatus"]) && $_REQUEST["estatus"] == "thankyou") {
    ?>
        <script>
            //console.log('Recibio parametro');
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '424709454917585');
            fbq('track', 'PageView');
            fbq('track', 'CompleteRegistration');
        </script>
    <?php
    } else { ?>
        <script>
            //console.log('No Recibio parametro');
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '424709454917585');
            fbq('track', 'PageView');
        </script>
    <?php } ?>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=424709454917585&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-block d-md-flex col-md-4 col-lg-6 bg-image-fondo">
            </div>
            <!-- Visible mobil banner left -->
            <div class="d-block d-sm-block d-lg-none contenedor-flex">
                <!-- Mostramos Imagen llama ahora---->
                <?php
                if ($codigo == "DEA19") {
                ?>
                    <a href="tel:<?= $telephone; ?>">
                        <img height="50" class="img-fluid d-block d-sm-none eye" src="assets/img/car/img-tel-homeland-<?= $lang ?>.png" />
                    </a>
                <?php
                } else {
                ?>
                    <a href="tel:<?= $telephone; ?>" class="eye">
                        <img height="50" class="img-fluid d-block d-sm-block" src="assets/img/corporativo/contacto-<?= $lang ?>.jpg" />
                    </a>
                <?php
                }
                ?>
                <img class="heaven img-fluid" width="100%" src="/assets/img/corporativo/<?php echo $codigo . "-" . $lang; ?>.jpg">
            </div>
            <!-- Banner right  style="margin-top: -50%;"-->
            <div class="col-md-12 col-xs-12 col-lg-6 form-position-device">
                <div class="login py-5">
                    <div class="container">
                        <!-- Image Inicio default -->
                        <div class="row">
                            <div class="img-tel-resp col-md-12 col-xs-12 col-lg-12">
                                <div>
                                    <a href="tel:<?= $telephone; ?>">
                                        <img class="img-fluid img-tel" src="assets/img/corporativo/contacto-<?= $lang; ?>.jpg">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.Image Inicio default -->
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <label class="mb-4 dark-grey-text text-center title-graphik"><?= $data[$lang]["header"]; ?></label>
                                <form method="POST" action="" id="frm-lead">
                                    <input type="hidden" name="action" value="new" />
                                    <input type="hidden" name="lang" value="<?= $lang ?>" />
                                    <input type="hidden" name="code" value="<?= $codigo ?>" />
                                    <input type="hidden" name="source" value="<?= $source ?>" />
                                    <input type="hidden" name="medium" value="<?= $medium ?>" />
                                    <input type="hidden" name="campaign" value="<?= $campaign ?>" />

                                    <div class="form-label-group">
                                        <span class="input-group-addon bg-white"><i class="fa fa-user fases"></i></span>
                                        <input type="text" id="inputName" name="inputName" class="form-control" placeholder="<?= $data[$lang]["name"] ?>" required autofocus required>
                                        <label for="inputName"><?= $data[$lang]["name"] ?></label>
                                    </div>
                                    <div class="form-label-group">
                                        <span class="input-group-addon bg-white"><i class="fa fa-phone fases"></i></span>
                                        <input type="tel" id="inputPhone" name="inputPhone" class="form-control" placeholder="<?= utf8_decode($data[$lang]["telephone"]) ?>" required autofocus required>
                                        <label for="inputPhone"><?= utf8_decode($data[$lang]["telephone"]) ?></label>
                                    </div>
                                    <div class="form-label-group">
                                        <span class="input-group-addon bg-white"><i class="fa fa-envelope fases"></i></span>
                                        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="<?= utf8_decode($data[$lang]["email"]) ?>" required autofocus required pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$">
                                        <label for="inputEmail"><?= utf8_decode($data[$lang]["email"]) ?></label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="inputCity" name="inputCity" class="form-control" placeholder="<?= utf8_decode($data[$lang]["city"]) ?>" required autofocus required>
                                        <label for="inputEmail"><?= utf8_decode($data[$lang]["city"]) ?></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-label-group">
                                                <input type="text" id="inputCompany" name="inputCompany" class="form-control" placeholder="<?= utf8_decode($data[$lang]["company"]) ?>" required autofocus required>
                                                <label for="inputCompany"><?= utf8_decode($data[$lang]["company"]) ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-label-group">
                                                <input type="text" id="inputJob" name="inputJob" class="form-control" placeholder="<?= utf8_decode($data[$lang]["job"]) ?>" required autofocus required>
                                                <label for="inputJob"><?= utf8_decode($data[$lang]["job"]) ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-label-group">
                                        <div class="g-recaptcha" data-sitekey="6LdID7sZAAAAADOUEOQgr3Plkw5y0l77GdEKTGRq"></div>
                                    </div>
                                    <button class="btn btn-lg btn-send btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">
                                        <?= $data[$lang]["submit"] ?>
                                    </button>
                                </form>
                            </div>
                            <!-- Terminos y condiciones -->
                            <div class="col-md-9 col-lg-8 mx-auto pull-left">
                                <?php
                                if (!empty($_REQUEST["cod"])) {
                                    switch ($_REQUEST["cod"]) {
                                        case 'PROMO200DEP':
                                        case 'PROMO20':
                                        case 'PROMOUP0':
                                ?>
                                            <p class="text-justify small"><?= $data[$lang]["condition"][$_REQUEST["cod"]] ?></p>
                                <?php
                                            break;
                                        default:
                                            break;
                                    }
                                }
                                ?>
                            </div>
                            <!-- /.Terminos y condiciones -->
                            <!-- Secci�n whatsapp -->
                            <div class="btn-whatsapp">
                                <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp; ?>&text=<?= $data[$lang]["whatsapp"]["text"] ?>" target="_blank" title="Solicitar Informaci&oacute;n">
                                    <img height="50px" src="/assets/img/whatsapp-icon.svg" class="img-fluid-">
                                </a>
                            </div>
                            <div id="float-cta" style="display: none;">
                                <span>Envianos un whatsapp!</span>
                                <a href="javascript:void(0);">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                <div class="whatsapp-msg-container">
                                    <div class="whatsapp-msg-header">
                                        <h6>WhatsApp Chat</h6>
                                    </div>
                                    <div class="whatsapp-msg-body">
                                        <textarea name="whatsapp-msg" class="whatsapp-msg-textarea" placeholder="Hola, puedes solicitar informaci&oacute;n v&iacute;a whatsapp..."></textarea>
                                    </div>
                                    <div class="whatsapp-msg-footer">
                                        <button type="button" class="btn-whatsapp-send">Enviar</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.Secci�n whatsapp -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.-->
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="/assets/b4/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=<?= $lang ?>" async defer></script>
    <script>
        $(function() {
            const saveLead = function(data) {
                let url = '/app/LeadsController.php'
                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: url,
                        method: 'post',
                        type: 'json',
                        data: data
                    }).done(resolve).fail(reject)
                })
            }

            $('.btn-send').on('click', function(e) {
                e.preventDefault();

                let _form = $('#frm-lead').serialize()

                saveLead(_form).then(response => {

                    let r = JSON.parse(response);

                    if (r.status === true) {
                        Swal.fire({
                            position: 'top-center',
                            type: r.type,
                            title: r.header,
                            html: r.body,
                            showConfirmButton: true,
                            timer: 3000
                        }).then((result) => {
                            var loc = window.location.href + "&estatus=thankyou";
                            location.replace(loc)
                        });
                    } else {
                        Swal.fire({
                            position: 'top-center',
                            type: r.type,
                            title: r.header,
                            html: r.body,
                            timer: 3000,
                            showConfirmButton: false,
                        })
                    }
                }).catch(error => {
                    console.log(error)
                })
            })

        })

        function alerta(msg, type) {
            Swal.fire({
                //position: 'top-end',
                type: type,
                title: msg,
                showConfirmButton: false,
                timer: 1500
            });
        }

        function initWhatsappChat() {
            'use strict';
            var mobileDetect = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            if (mobileDetect) {
                $('#float-cta .whatsapp-msg-container').css('display', 'none');
                $('#float-cta > a').on('click', function() {
                    window.location = 'https://api.whatsapp.com/send?phone=+529983218222';
                });
            } else {
                $('#float-cta > a').click(function() {
                    $(this).toggleClass('open');
                    $('#float-cta .whatsapp-msg-container').toggleClass('open');
                    $('#float-cta').toggleClass('open');
                });
                $('.btn-whatsapp-send').on('click', function(event) {
                    event.stopPropagation();
                });
                $('.btn-whatsapp-send').click(function() {
                    var baseUrl = 'https://web.whatsapp.com/send?phone=+529983218222text=';
                    var textEncode = encodeURIComponent($('#float-cta .whatsapp-msg-body textarea').val());
                    window.open(baseUrl + textEncode, '_blank');
                });
            }
        }
    </script>
</body>

</html>
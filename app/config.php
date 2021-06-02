<?php
require_once(__DIR__ . '/Helper.php');

defined("SECRET_KEY_CAPTCHA") or define("SECRET_KEY_CAPTCHA", '');

defined("DEBBUG") or define("DEBBUG", false);
if (DEBBUG) {
    defined("DB_HOST") or define("DB_HOST", '');
    defined("DB_USER") or define("DB_USER", '');
    defined("DB_PASS") or define("DB_PASS", '');
    defined("DB_NAME") or define("DB_NAME", '');
} else {
    defined("DB_HOST") or define("DB_HOST", '');
    defined("DB_USER") or define("DB_USER", '');
    defined("DB_PASS") or define("DB_PASS", '');
    defined("DB_NAME") or define("DB_NAME", '');
}
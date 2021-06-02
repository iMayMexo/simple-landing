<?php

function ___($xVariable, $bBreakPoint = true, $bDumpMode = false, $type = '000')
{
    echo "<pre style='font-size: 1em; color: #$type; line-height: 18px; font-weight:bold;'>";
    if (!$bDumpMode) {
        print_r($xVariable);
    } else {
        var_dump($xVariable);
    }
    echo '</pre>';

    if ($bBreakPoint) {
        exit();
    }
}

/**
 * Funcion para leer el json archivo de traducciones
 */
function file_get_contents_utf8($fn)
{
    $content = file_get_contents($fn);
    return mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

/**
 * @param false $status
 * @param string $type
 * @param string $title
 * @param string $body
 * @param string $footer
 * @param string $href
 * @param string $function
 * @return array
 */
function jsonResponse(
    $status = false,
    $type = 'error',
    $title = '',
    $message = '',
    $footer = '',
    $href = '',
    $function = ''
) {
    return json_encode([
        'status'      => $status,
        'type'        => $type,
        'title'       => $title,
        'message'     => $message,
        'footer'      => $footer,
        'href'        => $href,
        'function'    => $function //'string'
    ]);
}
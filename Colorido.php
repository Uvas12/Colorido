<?php
$wgExtensionFunctions[] = "wfColoridoSetup";
$wgExtensionCredits['parserhook'][] = array(
    'name' => 'Colorido',
    'url' => 'https://www.mediawiki.org/wiki/Extension:Colorido',
    'author' => 'La pluma azul',
    'version' => '0.3',
    'description' => 'Hace que el texto parezca más divertido',
);
 
function wfColoridoSetup() {
 
    global $wgParser;
    $wgParser->setHook( "colorido", "wfColoridoRender" );
}
 
function wfColoridoRender( $input, $argv, $parser ) { 
 
    // Character styles
    $input = utf8_decode($input);
    $output = ""; // To stop the "Undefined Variable" errors in the webserver logfile
 
    for ($i = 0; $i < strlen($input); $i++)
      {
    $s = rand(0, 9) * 8 + 150;
    $w = rand(5, 9) * 100;
    $r = rand(20, 230);
    $g = rand(20, 230);
    $b = rand(20, 230);
 
    $output .= 
      '<span style="font-size: ' . strval($s) . '%; font-weight:' 
      . strval($w) . ';color: #' . dechex($r) . dechex($g) . dechex($b) 
      . ';">';
 
    $output .= $input[$i];
    $output .= '</span>';
      }
 
    return utf8_encode($output);
}

<?php
#########################################################
/*                   Configuration                     */

// Maximum length of password to try
define('PASSWORD_MAX_LENGTH', 3);
 
// Password character sets - Uncomment to include
$charset = 'abcdefghijklmnopqrstuvwxyz';
$charset .= '0123456789';
$charset .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//$charset .= '~`!@#$%^&*()-_\/\'";:,.+=<>? ';
#########################################################
 
$charset_length = strlen($charset);
$start = microtime(true);
$count = 0;

function puthash($password)
{
        // Place code here to manipulate eahc brute force value
        echo $password."\r\n";
}
 
function recurse($width, $position, $base_string)
{
    global $charset, $charset_length, $count;
     
    for ($i = 0; $i < $charset_length; ++$i) {
        if ($position  < $width - 1) {
            recurse($width, $position + 1, $base_string . $charset[$i]);
        }
        puthash($base_string . $charset[$i]);
        $count++;
    }
}
 
recurse(PASSWORD_MAX_LENGTH, 0, '');

$time_taken = microtime(true) - $start;
echo "Job Complete in ".$time_taken." seconds: ".$count." records.";
?>

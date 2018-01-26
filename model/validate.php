<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
function validColor($color)
{
    global $f3;
    return in_array($color, $f3->get('colors'));
}
function validString($string)
{
    return $string != null && ctype_alpha($string);
}

$errors = array();
if(!validColor())
{
    $errors['color'] = "Please enter a valid color";
}
$success = sizeof($errors) == 0;
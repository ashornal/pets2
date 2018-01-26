<?php
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
    $f3->set($errors['color']);
}
$success = sizeof($errors) == 0;
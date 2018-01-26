<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function validColor($color)
{
    global $f3;
    return in_array($color, $f3->get('colors'));
}

function validString($string){
    if(!empty($string) && is_string($string))
    {
        return true;
    }
    else {
        return false;
    }
}
$errors = array();

$success = false;
if(!validColor($color)) {
    $errors['color'] = "Please enter a valid color";
}
elseif (!validString($name)){
    $errors['name'] = "Please enter a valid name";
}
elseif ((!validString($type))){
    $errors['type'] = "Please enter a valid type";
} else {
    $success = true;
}
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


//require the autoload file
require_once ('vendor/autoload.php');


//create an instance of the Base class
$f3 = Base::instance();

$f3->set('colors', array('pink', 'green', 'blue'));

//set debug level
$f3->set('DEBUG', 3);


//define a default route
$f3->route("GET /", function()
{
    $template = new Template();
    echo $template->render('views/home.html');
}
);
$f3->route("GET /pets/order", function()
{
    $template = new Template();
    echo $template->render('views/form1.html');
}
);
$f3->route("POST /pets/order2", function()
{
    $template = new Template();
    echo $template->render('views/form2.html');
    $_SESSION['animal'] = $_POST['animal'];
}
);
$f3->route("POST /pets/results", function()
{
    $_SESSION['color'] = $_POST['color'];
    echo "<h1>Results Page</h1>";
    echo "Thank you for ordering a ".$_SESSION['color']. " ".$_SESSION['animal'];
}
);

$f3->route("GET|POST /new-pet", function($f3)
{


    if(isset($_POST['submit'])) {

        $color = $_POST['pet-color'];
        $type = $_POST['pet-type'];
        $name = $_POST['pet-name'];


        include ('model/validate.php');

    }
    $f3->set('color', $color);
    $f3->set('type', $type);
    $f3->set('name', $name);
    $f3->set('errors', $errors);
    $f3->set('success', $success);

    $template = new Template();
    echo $template->render('views/new-pet.html');
}
);

//run Fat-Free
$f3->run();
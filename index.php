<?php
session_start();


//require the autoload file
require_once ('vendor/autoload.php');


//create an instance of the Base class
$f3 = Base::instance();




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
    $f3->set('colors', array('pink', 'green', 'blue'));

    if(isset($_POST['submit'])) {
        include ('model/validate.php');
        $color = $_POST['pet-color'];
        $type = $_POST['pet-type'];
        $name = $_POST['pet-name'];

        $errors = $f3->get($errors['color']);

        $f3->set('color', $color);
        $f3->set('type', $type);
        $f3->set('name', $name);
        $f3->set('errors', $errors);

    }

    $template = new Template();
    echo $template->render('views/new-pet.html');
}
);

//run Fat-Free
$f3->run();
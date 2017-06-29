<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tamagotchi.php";

    session_start();
    if (empty($_SESSION['saved_tamagotchis'])) {
        $_SESSION['saved_tamagotchis'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('tamagotchi.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    $app->post("/add_tamagotchi", function() use ($app) {
        $new_tamagotchi = new Tamagotchi($_POST['name'], 1, 1, 0, 1);  // creates new Tamagotchi w/name from form; other values from initial default values
        $new_tamagotchi->save();  // saves new task in $_SESSION variable
        return $app['twig']->render('view_tamagotchi.html.twig', array('newtamagotchi' => $new_tamagotchi));  // renders 'You've created a Tamagotchi!' template w/'newtamagotchi' as twig template variable
    });


    return $app;
?>

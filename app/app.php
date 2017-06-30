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
        $message = "You created a Tamagotchi!";
        return $app['twig']->render('view_tamagotchi.html.twig', array('newtamagotchi' => $new_tamagotchi, 'message' => $message));  // renders 'You've created a Tamagotchi!' template w/'newtamagotchi' as twig template variable
    });

    $app->post("/sleep", function() use ($app) {
        $saved_tamagotchis = Tamagotchi::getAll();
        // echo "Before sleep: " . var_dump($saved_tamagotchis);
        $your_tamagotchi = $saved_tamagotchis[0];
        $message = $your_tamagotchi->setSleep();
        // echo "After sleep: " . var_dump($your_tamagotchi);
        return $app['twig']->render('view_tamagotchi.html.twig', array('newtamagotchi' => $your_tamagotchi, 'message' => $message));
    });

    $app->post("/wake", function() use ($app) {
        $saved_tamagotchis = Tamagotchi::getAll();
        $your_tamagotchi = $saved_tamagotchis[0];
        $message = $your_tamagotchi->wake();
        return $app['twig']->render('view_tamagotchi.html.twig', array('newtamagotchi' => $your_tamagotchi, 'message' => $message));
    });

    $app->post("/feed", function() use ($app) {
        $saved_tamagotchis = Tamagotchi::getAll();
        $your_tamagotchi = $saved_tamagotchis[0];
        $message = $your_tamagotchi->setFood();
        return $app['twig']->render('view_tamagotchi.html.twig', array('newtamagotchi' => $your_tamagotchi, 'message' => $message));
    });


    return $app;
?>

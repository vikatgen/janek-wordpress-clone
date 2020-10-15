<?php require_once 'autoload.php';

$users = User::all();
//$users = (new User())->all();

//print_r($users);
//exit(json_encode($users));

if (!empty($users)) : foreach ($users as $user) {
    echo '<pre>';
    print_r($user->info());
    echo '</pre>';
} endif;

$p = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);

$p = trim($_SERVER['REQUEST_URI'], '/');

var_dump($p);

if (isset($routes[$p])) {
    require_once $routes[$p]['file_location'];
} else {
    $explode = explode("/", $p);

    if (!empty($explode) && count($explode) > 1) {
        $ID = $explode[count($explode)-1];

        unset($explode[count($explode)-1]);

        $p = join("/", $explode);
        if (isset($routes[$p])) {
            require_once $routes[$p]['file_location'];
        }
    } else {
        require_once $routes[404]['file_location'];
    }
}

?>

<pre>

<?php

//id
//email
//password
//
//added_by
//edited
//edited_by

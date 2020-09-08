<?php require_once 'autoload.php'; 

$users = $db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_CLASS, 'User');

if (!empty($users)) : foreach ($users as $user) {
    echo '<pre>';
    print_r($user->info());
    echo '</pre>';
} endif;

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
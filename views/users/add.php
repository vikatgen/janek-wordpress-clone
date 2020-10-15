<?php

$_POST = [
    'email2' => 'heli.kopter@ametikool.ee',
    'password' => '12345',
    'password_again' => '12345',
    'action' => 'save'
];

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$email = 'heli.kopter@ametikool.ee';
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password = '12345';
$passwordAgain = filter_input(INPUT_POST, 'password_again', FILTER_SANITIZE_STRING);
$passwordAgain = '12345';
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
$action = 'save';

if (isset($action) && $action === 'save') {
    $errors = [];

    //kontroll
    if (empty($email)) {
        $errors['email'] = 'error_email_is_empty';
    }

    //password match

    if (empty($errors)) {
        //save new user
        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->added = date("Y-m-d H:i:s");
        $user->added_by = 0;
        $user->edited = date("Y-m-d H:i:s");
        ;
        $user->edited_by = 0;

        User::save($user);
        //redirect
    }
}
echo empty($errors)
    ? ""
    : '<div class="alert alert-danger"><ul><li>' . join("</li><li>", $errors) . '</li></ul></div>';

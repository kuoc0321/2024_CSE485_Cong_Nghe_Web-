<?php
    $users = [
        [
        "username" => "johndoe",
        "password" => password_hash("password123", PASSWORD_DEFAULT), // Store hashed password
        "name" => "John Doe",
        "email" => "johndoe@example.com"
        ],
        [
            "username" => "quocvu",
            "password" => password_hash("123", PASSWORD_DEFAULT), // Store hashed password
            "name" => "Steve Quoc",
            "email" => "LeVanA@gmail.com"
            ]
       ];
    session_start();
    if (!isset($_SESSION["user_id"]) || !isset($_COOKIE['logged_in']))
    {
        header('Location: login.php');
    }

    $username = $_SESSION['user_id'];

    $user = null;
    foreach($users as $u)
    {
    if ($u['username'] == $username)
    {
        $user = $u;
        break;
    }
    }

    if($user)
    {
        echo "Welcome , ". $user["username"] ."!";
        echo "<br>Email: " . $user['email'];
        echo "Having a good day!";
    }

    else
    {
        echo "Error : User not found";
    }
?>
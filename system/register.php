<?php
    include("system_functions.php");
    if (isset($_POST["username"]) && isset($_POST["email"]))
    {
        include("db_connect.php");

        $sqlQuery = "SELECT UserLogin, UserEmail FROM users WHERE UserLogin = '{$_POST["username"]}' OR UserEmail = '{$_POST["email"]}'";
        $output = mysqli_query($db, $sqlQuery);

        if (mysqli_num_rows($output) > 0)
        {
            setPopupInfo("User already existing!", "warning");
            redirect("../index.php");
        }
        else
        {
            $hashedPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $sqlQuery = "INSERT INTO `users` (`UserID`, `UserLogin`, `UserEmail`, `UserPassword`, `UserTier`) VALUES (NULL, '{$_POST["username"]}', '{$_POST["email"]}', '{$hashedPassword}', 'Member')";
            $output = mysqli_query($db, $sqlQuery);
            setPopupInfo("User created successfully!", "success");
            redirect("../index.php");
        }
    }
    else
    {
        setPopupInfo("Please fill all input fields!", "danger");
        redirect("../index.php");
    }
?>
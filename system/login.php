<?php
    if (isset($_SESSION["isLogged"]))
    {
        if ($_SESSION["isLogged"] == '1')
        {
            redirect("../dashboard.php");
        }
    }

    include("system_functions.php");
    if (isset($_POST["username"]) && isset($_POST["password"]))
    {
        include("db_connect.php");

        $sql = "SELECT UserID, UserLogin, UserPassword, UserTier FROM users WHERE UserLogin = '{$_POST["username"]}'";
        $output = mysqli_query($db, $sql);
        $outputData = mysqli_fetch_assoc($output);

        $hashedPassword = $outputData["UserPassword"];

        if (password_verify($_POST["password"], $hashedPassword))
        {
            loginUser($outputData["UserID"], $outputData["UserLogin"], $outputData["UserTier"]);
            setPopupInfo("Logged successfully {$outputData["UserLogin"]}", "success");
            redirect("../dashboard.php");
        }
        else
        {
            setPopupInfo("Username and password match is invalid", "danger");
            redirect("../index.php");
        }
    }
    else
    {
        setPopupInfo("Please fill all input fields!", "danger");
        redirect("../index.php");
    }
?>
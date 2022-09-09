<?php
    session_start();

    function setPopupInfo($message, $type)
    {
        $_SESSION["popupMessage"] = $message;
        $_SESSION["popupType"] = $type;
    }
    function redirect($link)
    {
        header("Location: "."{$link}");
        exit();
    }
    function loginUser($userId, $userLogin, $userTier)
    {
        $_SESSION["isLogged"] = '1';
        $_SESSION["UserID"] = $userId;
        $_SESSION["UserLogin"] = $userLogin;
        $_SESSION["UserTier"] = $userTier;
    }
    function logoutUser()
    {
        unset($_SESSION['isLogged']);
        unset($_SESSION['UserID']);
        unset($_SESSION['UserLogin']);
        unset($_SESSION['UserTier']);
    }
?>
<?php
    include("system_functions.php");
    logoutUser();
    setPopupInfo("Logged out!", "warning");
    redirect("../index.php");
?>
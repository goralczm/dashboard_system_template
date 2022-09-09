<?php
    function showMessage()
    {
        if (isset($_SESSION["popupMessage"]) && isset($_SESSION["popupType"]))
        {
            if ($_SESSION["popupMessage"] != "" && $_SESSION["popupType"] != "")
                return array($_SESSION["popupMessage"], $_SESSION["popupType"]);
            else
                return null;
        }
        else
        {
            setPopupInfo("", "");
        }
    }

    function resetPopup()
    {
        if (isset($_SESSION["popupMessage"]) && isset($_SESSION["popupType"]))
        {
            setPopupInfo("", "");
        }
    }

    if (showMessage() != null)
    {
        $popupInfo = showMessage();
        $message = $popupInfo[0];
        $type = $popupInfo[1];
        ?>
        <div class="alert alert-<?php print($type); ?> alert-dismissible fade show" role="alert">
            <?php print($message); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        resetPopup();
    }
?>
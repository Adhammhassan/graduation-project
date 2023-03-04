
<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['Id'])) {
            return true;
        } else {
            return false;
        }
    }



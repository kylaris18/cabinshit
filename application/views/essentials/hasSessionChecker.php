<?php
    if (isset($_SESSION['bSuccess']) === true) {
        redirect('/dashboard','refresh');
    }
?>
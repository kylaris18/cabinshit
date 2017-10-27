<?php
    if (isset($_SESSION['bSuccess']) === false) {
        redirect('/','refresh');
    }
?>
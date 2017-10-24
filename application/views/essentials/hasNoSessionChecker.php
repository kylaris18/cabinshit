<?php
    if (isset($_SESSION['user_type']) === false) {
        redirect('/','refresh');
    }
?>
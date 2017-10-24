<?php
    if (isset($_SESSION['user_type']) === true) {
        redirect('/dashboard','refresh');
    }
?>
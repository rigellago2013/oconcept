<?php
    session_start();
    require 'library/config.php';
    unset($_SESSION['email']);
       unset($_SESSION['name']);
          unset($_SESSION['user_type']);
             unset($_SESSION['user_id']);
                unset($_SESSION['address']);
    session_destroy();
    header('location: index.php');

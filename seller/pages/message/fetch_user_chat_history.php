<?php

//fetch_user_chat_history.php

include('database_connection.php');

session_start();

echo fetch_user_chat_history($_GET['user_id'], $_GET['user_id'], $connect);

?>

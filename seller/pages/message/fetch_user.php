<?php

//fetch_user.php

include('database_connection.php');


$query = "
SELECT * FROM users WHERE id != ".$_GET['user_id'];

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th width="70%">Username</td>
		<th width="10%">Action</td>
	</tr>
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['id'], $connect);

	$output .= '
	<tr>
		<td>'.$row['name'].' '.count_unseen_message($row['id'], $_GET['user_id'], $connect).' '.fetch_is_type_status($row['id'], $connect).'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['name'].'">Chat</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>

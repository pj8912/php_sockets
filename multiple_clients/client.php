<?php

$host = "127.0.0.1";
$port = 12101;

$random = strval(rand(1, 99999999));
$id = $host.strval($port).$random;
$id = hash('sha256', $id);
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, $host, strval($port));

while(true){	
	socket_send($socket, $id, strlen($id), MSG_EOF); //send id after connected
	echo "You: ";
	$input = fgets(STDIN);
	socket_write($socket, $input);

}
socket_close($socket);



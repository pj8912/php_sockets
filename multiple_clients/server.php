<?php


$host = '127.0.0.1';
$port = 12101;

set_time_limit(0);

$socket = socket_create(AF_INET,SOCK_STREAM ,SOL_TCP);

socket_bind($socket, $host, strval($port));
socket_listen($socket);
socket_set_nonblock($socket);

$client_new = 0;
$clients = [];

while(true){
	while($accept = socket_accept($socket)){
		$client_new += 1;
		echo "\nNew Conenction[$client_new]\n";
				
		
		//read
		$read = socket_read($accept, 512);
		$clients[] = $read;
		print_r($clients);
		//$new_read = socket_read($accept, 1024);		
		//echo "\nfrom $client_new: $new_read\n";
		
		
		//echo "\nNew Connection:[$read] \n";
	}
}



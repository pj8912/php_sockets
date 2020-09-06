<?php

$host = "127.0.0.1";
$port = 20205;

set_time_limit(0);


$sock = socket_create(AF_INET, SOCK_STREAM ,0) or die("Could not create socket\n");
$result = socket_bind($sock, $host, $port) or die("Could not create socket\n");

$result = socket_listen($sock,3 ) or die("Could not setup socket listener");

echo "listening for connections ";


class Chat{
    public function readline(){
        return rtrim(fgets(STDIN));
    }
}

do{
    $accept = socket_accept($sock) or die("could not accept socket\n");
    $msg = socket_read($accept, 1024) or die("not working bro!\n");
    $msg = trim($msg);
    echo "Client says: \t $msg \n\n";
    
    $line = new Chat();
    echo "Enter reply \t";
    $reply = $line->readline();

    socket_write($accept, $reply, strlen($reply)) or die("Cannot write socket\n");
}while(true);
socket_close($accept, $sock);
    

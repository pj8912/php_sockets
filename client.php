<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div align="center"></div>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label>Enter Message</label>
                    <input type="text" name="txtMessage">
                    <input type="submit" name="btnSend" value="Send">
                </td>
            </tr>
            <?php
                $host = "127.0.0.1";
                $port = "20205";
                if(isset($_POST['btnSend'])){
                    $msg = $_REQUEST['txtMessage'];
                    $sock  = socket_create(AF_INET, SOCK_STREAM, 0);

                    socket_connect($sock ,$host, $port);

                    socket_write($sock, $msg, strlen($msg));

                    $reply = socket_read($sock, 1924);
                    $reply = trim($reply);
                    $reply = "Server says \t $reply";

                }
                ?>
                <tr>
                <td><textarea cols="30" rows="10"><?php echo @$reply;?></textarea></td>
                </tr>
        </table>
    </form>
</body>
</html>
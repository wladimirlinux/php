<?php
$username = 'admin';
$password = '13Benedilce..';
$host = 'localhost';

$socket = @fsockopen($host,"5038");

fputs($socket, "Action: Login\r\n");
fputs($socket, "UserName: ".$username."\r\n");
fputs($socket, "Secret: ".$password."\r\n\r\n");

fputs($socket,"Action: Command\r\n");
fputs($socket,"Command: iax2 show peers\r\n\r\n");

fputs($socket, "Action: Logoff\r\n\r\n");
$wrets = 'begin';


while(trim($wrets) != '--END COMMAND--'){
$wrets=trim(fgets($socket));
echo "<pre>$wrets.</pre>";
}

fclose($socket);
?>


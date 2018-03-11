<?php
//Used to generate username hash, and PW salt/Hash to manually create new users.
//The resulting hashes/salt will be manually inserted into the users table by the DB admin.
echo hash('sha256', 'kehoe_user@njit.edu').PHP_EOL;
echo crypt('123456').PHP_EOL;


?>


Try checking to see if the PHP MySQL extension module is being loaded:

<?php phpinfo(); ?>
If it's not there, add the following to the php.ini file:

extension=php_mysql.dll


Find in xamp/php/php.ini:

post_max_size       = 8M
upload_max_filesize = 2M
max_execution_time  = 30
max_input_time      = 60
memory_limit        = 8M
Change to:

change with

post_max_size       = 750M
upload_max_filesize = 750M
max_execution_time  = 5000
max_input_time      = 5000
memory_limit        = 1000M
=================================
Find in xampp\phpMyAdmin\libraries\config.default:
$cfg['ExecTimeLimit']

change with 0

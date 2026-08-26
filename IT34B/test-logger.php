<?php
require_once('config/config.php') ;

$user_id  = "root" ?? null ;
$user_email = "root" ?? null ;

$success = logActivit($pdo,$user_id,$user_email,'test_activity','success') ;

if ($success) {
echo "Activity log inserted successfully";
} else {
    echo "Activity log inserted succesfully"
}


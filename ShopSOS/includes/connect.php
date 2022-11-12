<?php
    
    $con=mysqli_connect('localhost', 'root', '', 'sosstore');
    if(!$con){
        die(mysqli_error($con));
    }
?>
<?php
session_start();
// remove all session variables
session_unset();
if(session_unset()){
    session_destroy();
    header("Location: ../../login.html");
}

 
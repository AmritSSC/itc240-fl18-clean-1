<?php
/*
    config.php
    
    Stores configuration data for application.
*/

//echo $_SERVER['PHP_SELF']; //get current url
//die;
//echo basename($_SERVER['PHP_SELF']); // get current file

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//echo "the content is storing: " . THIS_PAGE;
//die;    //breakpoint

switch(THIS_PAGE)
{
    case 'template.php': 
        $title = 'My Template Page';
        break;
    case 'contact.php': 
        $title = 'My Contact Page';
        break;     
    default:
        $title = THIS_PAGE;
}
    
?>
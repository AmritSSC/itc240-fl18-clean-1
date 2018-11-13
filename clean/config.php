<?php
/*
    config.php
    
    Stores configuration data for application.
*/

ob_start(); // prevents header errors

define('DEBUG',TRUE); #we want to see all errors

include 'credentials.php'; //database credentials

//echo $_SERVER['PHP_SELF']; //get current url
//die;
//echo basename($_SERVER['PHP_SELF']); // get current file

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//echo "the content is storing: " . THIS_PAGE;
//die;    //breakpoint

/*
    Below is an array of images to be used in contact.php in the function named randomized.
*/

$heros[] = '<img src="img/images/coulson.png" />';
$heros[] = '<img src="img/images/fury.png" />';
$heros[] = '<img src="img/images/hulk.png" />';
$heros[] = '<img src="img/images/thor.png" />';
$heros[] = '<img src="img/images/black-widow.png" />';
$heros[] = '<img src="img/images/captain-america.png" />';
$heros[] = '<img src="img/images/machine.png" />';
$heros[] = '<img src="img/images/iron-man.png" />';
$heros[] = '<img src="img/images/loki.png" />';
$heros[] = '<img src="img/images/giant.png" />';
$heros[] = '<img src="img/images/hawkeye.png" />';
////////////////////////////////////////////////////////////////////////////
 

// default page values
$title = THIS_PAGE;
$siteName = 'Site Name';
$slogan = 'Whatever it is you do, we do it better.';
$pageHeader = 'The developer forgot to put a pageheader';
$subHeader = 'The developer forgot to put a subheader';
$sloganIcon = '';// will be replaced in contact.php by hero icons.

switch(THIS_PAGE)
{
    case 'template.php': 
        $title = 'My Template Page';
        $pageHeader = 'Put pageID here';
        $subHeader = 'Put more info about page here';
        break;
    
    case 'db_test.php': 
        $title = 'A Database Test Page';
        $pageHeader = 'Database Test Page';
        $subHeader = 'Check this page to see if your db credentials are correct.';
        break;
        
    case 'daily.php': 
        $title = 'My Daily Page';
        $pageHeader = 'Daily Coffee Specials';
        $subHeader = 'All our coffee is special.';
        break;
        
    case 'contact.php': 
        $title = 'My Contact Page';
        $pageHeader = 'Please contact us';
        $subHeader = 'We appreciate your feedback';
        $sloganIcon = randomize($heros);
        break;     
    
/*   default:
        $title = THIS_PAGE;
*/
        
}
    

/**
 * returns a random item from an array sent to it.
 *
 * Uses count of array to determine highest legal random number.
 *
 * Used to show random HTML segments in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo randomize($arr); #will show one of three random images
 * </code>
 *
 * @param array array of HTML strings to display randomly
 * @return string HTML at random index of array
 * @see rotate() 
 * @todo none
 */
function randomize ($arr)
{//randomize function is called in the right sidebar - an example of random (on page reload)
	if(is_array($arr))
	{//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

/**
 * returns a daily item from an array sent to it.
 *
 * Uses count of array to determine highest legal rotated item.
 *
 * Uses day of month and modulus to rotate through daily items in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo rotate($arr); #will return a different image each day for three days
 * </code>
 * 
 * @param array array of HTML strings to display on a daily rotation
 * @return string HTML at specific index of array based on day of month
 * @see rotate() 
 * @todo none
 */
function rotate ($arr)
{//rotate function is called in the right sidebar - an example of rotation (on day of month)
	if(is_array($arr))
	{//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("j")) % count($arr)];
	}else{
		return $arr;
	}
}#end rotate


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
        echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
        die();
    }
}

?>
<?php
/**
 * Smart Chart Maker 
 * @author		Webuccino
 * @copyright	Copyright (c) 2011 - 2023, Webuccino, Inc.
 * @link		https://mysqlreports.com
 * 
 * 
 */
require_once("shared.php");
require_once("check.php");
//connection parameters
$host = $_SESSION["ks_host"];
$user = $_SESSION["ks_user"];
$pass = $_SESSION["ks_pass"];
$db = $_SESSION["ks_db"];
$debug_mode = false;

function sql($query)
{
	global $host, $user, $pass, $db;
	
	$con = mysqli_connect($host, $user, $pass,$db);
	if(!$con || mysqli_connect_errno())
    {
        echo("<center><B>Couldn't connect to MySQL </B></center>");
        return false;
    }
	
 
	
    if(!$result = mysqli_query($con,$query))
    {
		echo("<center><B>Error in query");
		debug("<center><B>Error in query: Error# " . mysqli_connect_errno() . ": " . mysqli_connect_errno()."</B></center>");
        return false;
    }
  
    return $result;
}

function query($query)
{
    return sql($query);
}

function debug($str)
 { 
    if($debug_mode == True)
	{
	   echo("<br><Font color = 'red'>$str</font>");	 
	}
 }






?>

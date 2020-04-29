<?php

   session_start();   

   if (isset($_POST['csrf_request']))

   	{

   	if ($_POST['csrf_request'] == $_SESSION["loggedIn"]){

   		echo $_SESSION['csrf_token'];

   		} else	{

   		echo "null";

   		}

   	}  

?>
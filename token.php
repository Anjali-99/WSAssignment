<?php

    function generateToken(){
       return $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));

    }
    
	function validate($csrf_token){
		if(isset($_SESSION['csrf_token']) && $csrf_token === $_SESSION['csrf_token']){
            unset($_SESSION['csrf_token']);    
            return true;
        }
    
            else{

            return false;
        }

}



?>
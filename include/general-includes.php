<?php session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	require_once dirname(__FILE__).'/../class/clsconnection.php';
	require_once dirname(__FILE__).'/../class/clsquery.php';
    require_once dirname(__FILE__).'/../class/clscommon.php';
	require_once dirname(__FILE__).'/../class/clsform-validation.php';
	require_once dirname(__FILE__).'/../class/clspaging-sorting.php';
    require_once dirname(__FILE__).'/../class/mail/class.phpmailer.php';
    require_once dirname(__FILE__).'/../class/clsimagefun.php';
    require_once dirname(__FILE__).'/../class/GCM.php';
    require_once dirname(__FILE__).'/global-declarations.php';
	
            
    
	
    connection::open_connection();
	$q=new Query();
    
?>
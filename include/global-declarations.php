<?php

	define('DIRECT_ACCESS', true);
	define('HOST','localhost');
	define('DATABASE','doctors');
	define('USERNAME','root');
	define('PASSWORD','');
    define('DB_PREFIX','');
    //declaration site url
    define('SITE_URL','http://127.0.0.1:80/doctor/');
    //ce url pour l'emulateur android.
    define('SITE_URL1','http://10.0.2.2:80/doctor/');
    define("GOOGLE_API_KEY", "AIzaSyBK4MRLebdOj9-1hkKjzZ0aquqgtGIFGHo");
    
    
    
    define('PRODUCT_IMAGE_URL',SITE_URL."/userfiles/products/");
    define('CONTENT_IMAGE_URL',SITE_URL."/userfiles/contents/");
    
    define('PRODUCT_IMAGE_URL1',SITE_URL1."/userfiles/products/");
    define('CONTENT_IMAGE_URL1',SITE_URL1."/userfiles/contents/");

	/*---------Cofiguration mail--------------*/
    define('SMTP_SERVER','');
    define('SMTP_USER',"");
    define('SMTP_PASSWORD',"");
    /*---------Cofiguration mail--------------*/
    
    /*----------TABLES-----------------*/
    define('TBL_USERS',DB_PREFIX."users");
    define('TBL_Category',DB_PREFIX."categories");
    define('TBL_Reviews',DB_PREFIX."reviews");
    define('TBL_REGISTERS',DB_PREFIX."visitor");
    define('TBL_Tags',DB_PREFIX."tags");
    define('TBL_Doctor',DB_PREFIX."doctors");
    define('TBL_Clinic',DB_PREFIX."clinics");
    define('TBL_Service_charge',DB_PREFIX."services");
    define('TBL_Clinic_photo',DB_PREFIX."clinics_photo");
    define('TBL_Timetable',DB_PREFIX."timetable");
    define('TBL_Appointment',DB_PREFIX."appointment");
    
    /*----------Champs des TABLES-----------------*/
    define('LOGIN_USER_ID','register_user_id');
    define('LOGIN_USER_NAME','register_user_name');
    define('LOGIN_USER_EMAIL','register_user_email');
    
    define('LOGIN_USER_ID_COOKIES','register_user_id_cookies');
    define('LOGIN_USER_NAME_COOKIES','register_user_name_cookies');
    define('LOGIN_USER_EMAIL_COOKIES','register_user_email_cookies');

	define('COMPANY_NAME','Walè & ismail');
    define('COMPANY_EMAIL',"snoopez206@gmail.com");
	define('COPY_RIGHT_SENTENCE', '&copy; 2015-16 Wala Teyeb & Ismail benali');

	define('PAGE_TITLE', 'Bienvenue au site Choisir Ton docteur');

	

	define('REQUIRED','<span class="required">*</span>');

	define('REQUIRED_SENTENCE', '(' . REQUIRED . ' = Mandatory)');

	

	define('DEFAULT_PAGE_SIZE', 6);
    define('REWRITE_URL', false);
	

	define('SESSION_PREFIX','tkawy_session_');

	define('ADMIN_LOGIN_USER_ID','AccessToken');
    define('ADMIN_LOGIN_USER_NAME','UserName');
    define('ADMIN_LOGIN_TYPE','UserType');
    define('ADMIN_KEY',"key");
    define('ADMIN_COMPANY',"company");
    
    define('ADMIN_LOGIN_USER_ID_COOKIE','AccessTokenCookie');
	define('ADMIN_LOGIN_USER_NAME_COOKIE','UserNameCookie');
    define('ADMIN_LOGIN_TYPE_COOKIE','UserTypeCookie');
    
	define('ADMIN_LOGIN_USER_TYPE_ID','admin_login_user_type_id');

	define('USER_ID','user_id');

/*-----SESSION DOCTEUR------*/
	define('DR_LOGIN_USER_ID','DR_AccessToken');
    define('DR_LOGIN_USER_NAME','DR_UserName');
    define('DR_LOGIN_TYPE','DR_UserType');
    define('DR_COMPANY',"DR_company");
    
    define('DR_LOGIN_USER_ID_COOKIE','DR_AccessTokenCookie');
	define('DR_LOGIN_USER_NAME_COOKIE','DR_UserNameCookie');
    define('DR_LOGIN_TYPE_COOKIE','DR_UserTypeCookie');
    
	define('DR_LOGIN_USER_TYPE_ID','admin_login_user_type_id');
/*-----SESSION DOCTEUR------*/

	define('MESSAGE_SESSION', 'message_session');

	

	define('DATE_SEPARATOR','-');

	

	define('NO_OF_DECIMAL_POINT', 2);

	

	define('SEO_ENABLED', true);

	

	define('ADMIN_THEME', 'themes/admin/');
    define('DEFAULT_THEME', 'themes/default/');
	

	define('ADMIN_PATH', 'admin/');
	define('COMPONENTS_DIR', 'components/');
    define('VIEW_DIR', 'views/');
    define('MODEL_DIR', 'models/');
    define('ELEMENT_DIR', 'elements/');
    define('PLUGIN_DIR', 'plugins/');
	define('COMPONENTS_INCLUDE_DIR', 'include/');
	define('MYSQL_DATE_FORMAT', 'Y-m-d');
	define('MYSQL_DATE_FORMAT2', '%M %d, %Y');

	
	

?>
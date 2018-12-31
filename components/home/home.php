<?
    if($_POST['login'])
    {
        form_validation::add_validation('username', 'required', 'Username');
        form_validation::add_validation('password', 'required', 'password');
        form_validation::add_validation('loginas', 'required', 'loginas');
        if(form_validation::validate_fields())
        {
        $username=common::get_control_value("username");
        $password=common::get_control_value("password");
        $loginas = common::get_control_value("loginas");
        $remember = common::get_control_value("remember");
        if($loginas == "admin"){
        $res=common::login_user($username,$password,$remember);
        if($res)
        {
            if(common::get_session(ADMIN_LOGIN_TYPE)=="admin")
                common::redirect_to(common::get_component_link(array('user','dashboard')));
           
        }else
        {
            common::set_message(0,"Utilisateur non trouvé");
        }
        }else if($loginas == "doctor"){
            $q = new Query();
            $q->select()
            ->from(TBL_Doctor)
            ->where_equal_to(array("dr_email"=>$username,"dr_password"=>md5($password)))
            ->limit(1)
            ->run();
            
            $user = $q->get_selected();
            if(empty($user)){
                common::set_message(0,"Utilisateur non trouvé");
            }else{
                common::set_session(DR_LOGIN_USER_ID, common::get_value($user['dr_id']));
                common::set_session(ADMIN_LOGIN_TYPE,"doctor");
                common::set_session(DR_LOGIN_USER_NAME , common::get_value($user['dr_email']));
                        if ($remember) {
                            setcookie(DR_LOGIN_USER_ID_COOKIE , $user['id'] , time() + 9999999);
                            setcookie(DR_LOGIN_USER_NAME_COOKIE, $user['dr_email'], time() + 9999999);
                            
                        }
                common::redirect_to(common::get_component_link(array('doctor','dashboard')));
            }
            
        }
        }
    }
    if($_POST['register'])
    {
        validate("register");
        if(form_validation::validate_fields())
        {
            $username=common::get_control_value("username");
            $password=common::get_control_value("password");
            $email=common::get_control_value("email");
            
            $q = new Query();
            $q->insert_into("user",array("username"=>$username,"password"=>md5($password),"email"=>$email,"active"=>0,"type"=>"user"))
            ->run();
            common::set_message(3);
            common::redirect_to(common::get_component_link(array("home","home")));
             
        }
            
    }
   if($_POST['reg_dr'])
   {
      common::redirect_to(common::get_component_link(array('home','add')));
   }
    

?>    
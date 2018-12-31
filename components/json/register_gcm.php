<? //header('Content-type: text/json');
form_validation::add_validation('email', 'required', 'email');
form_validation::add_validation('regId', 'required', 'regid');
$output = array();
        
if(form_validation::validate_fields())
{
  
    $email = common::get_control_value("email");
    $regid = common::get_control_value("regId");
    
    $date = date('Y-m-d H:i:s');
    
    $q = new Query();
    $q->update("register",array(
    "gcm_code"=>$regid
    ))
    ->where_equal_to(array("email"=>$email))
    ->run();
    
}else{
    $output["responce"] = "erreur";
    $output["data"] = "non aboutie";
}

?>
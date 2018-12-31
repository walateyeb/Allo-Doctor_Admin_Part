<? header('Content-type: text/json');
form_validation::add_validation('imei', 'required', 'Device Tocken');
form_validation::add_validation('email', 'required', 'email');

form_validation::add_validation('password', 'required', 'password');
$output = array();
        
if(form_validation::validate_fields())
{
  
    $imei = common::get_control_value("imei");
    $name = common::get_control_value("name");
    $password = md5(common::get_control_value("password"));
    $email = common::get_control_value("email");
    $phone = common::get_control_value("phone");
    $city = common::get_control_value("city");
    $pincode = common::get_control_value("pincode");
    
    $date = date('Y-m-d H:i:s');
    
    $q = new Query();
    $q->insert_into("register",array(
    "name"=>$name,
    "password"=>$password,
    "email"=>$email,
    "phone"=>$phone,
    "city"=>$city,
    "imei"=>$imei
    ),array("name"=>$name,
    "password"=>$password,
    "email"=>$email,
    "phone"=>$phone,
    "city"=>$city,
    "imei"=>$imei
    ))
    ->run();
    
    $id = $q->get_inserted_id();
    
    $q = new Query();
    $q->select()
    ->from("register")
    ->where_equal_to(array("email"=>$email))
    ->limit(1)
    ->run();
    $user = $q->get_selected();
    $output["responce"] = "succès";
    $output["data"] =$user;
   
   
    
}else{
    $output["responce"] = "erreur";
    $output["data"] = "Invalide";
}
echo json_encode($output);
?>
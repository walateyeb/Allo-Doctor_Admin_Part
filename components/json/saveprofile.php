<? header('Content-type: text/json');
form_validation::add_validation('user_id', 'required', 'User Id');
form_validation::add_validation('name', 'required', 'Name');
$output = array();
        
if(form_validation::validate_fields())
{

    $userid = common::get_control_value("user_id");
    $name = common::get_control_value("name");
    $phone = common::get_control_value("phone");
    $city = common::get_control_value("city");
    $zip = common::get_control_value("zip");
    $uniqecode = common::get_unique_code("",6);
    
    $q = new Query();
    $q->update("register",array(
    "unique_code"=>$uniqecode,
    "name"=>$name,
    "phone"=>$phone,
    "city"=>$city,
    "zip"=>$zip
    ))
    ->where_equal_to(array("id"=>$userid))
    ->run();
    
    
    $q = new Query();
    $q->select()
    ->from("register")
    ->where_equal_to(array("id"=>$userid))
    ->limit(1)
    ->run();

    $output["responce"] = "succés";
    $output["data"] = $q->get_selected() ;
   
   
    
}else{
    $output["responce"] = "erreur";
    $output["data"] = "champs invalid";
}
echo json_encode($output);
?>
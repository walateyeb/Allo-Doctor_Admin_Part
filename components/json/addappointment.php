<? header('Content-type: text/json');
form_validation::add_validation('user_id', 'required', 'User Id');
form_validation::add_validation('clinic_id', 'required', 'Clinic Id');
form_validation::add_validation('dr_id', 'required', 'Doctor Id');
form_validation::add_validation('phone', 'required', 'phone');
form_validation::add_validation('day', 'required', 'Day');
form_validation::add_validation('time', 'required', 'Time');
form_validation::add_validation('app_date', 'required', 'Date');
$output = array();
        
if(form_validation::validate_fields())
{
  
    $userid = common::get_control_value("user_id");
    $clinicid = common::get_control_value("clinic_id");
    $drid = common::get_control_value("dr_id");
    $email = common::get_control_value("email");
    $phone = common::get_control_value("phone");
    $day = common::get_control_value("day");
    $time = common::get_control_value("time");
    $app_date = common::get_control_value("app_date");
    $description = common::get_control_value("description");
    
    $reg_id = common::get_unique_code("",6);
    
    $date = date(MYSQL_DATE_FORMAT,strtotime($app_date));
    
    $q = new Query();
    $q->insert_into("appointment",array(
    "dr_id"=>$drid,
    "cl_id"=>$clinicid,
    "code"=>$reg_id,
    "day"=>$day,
    "time"=>$time,
    "app_date"=>$app_date,
    "user_id"=>$userid,
    "phone"=>$phone,
    "description"=>$description,
    "confirm"=>0
    ))
    ->run();
    
    $id = $q->get_inserted_id();
    
    
    foreach($_REQUEST["services"] as $service){
        $q = new Query();
        $q->insert_into("appointment_services",array("app_id"=>$id,"service_id"=>$service))
        ->run();
    }
    
    $data = array("app_id"=>$id,"reg_id"=>$reg_id);
    $output["responce"] = "succés";
    $output["data"] =$data;
   
   
    
}else{
    $output["responce"] = "erreur";
    $output["data"] = "champs requis";
}
echo json_encode($output);
?>
<? header('Content-type: text/json');
form_validation::add_validation('user_id', 'required', 'User Id');
form_validation::add_validation('app_id', 'required', 'App Id');
form_validation::add_validation('dr_id', 'required', 'Doctor Id');
$output = array();
        
if(form_validation::validate_fields())
{
  
    $userid = common::get_control_value("user_id");
    $appid = common::get_control_value("app_id");
    $drid = common::get_control_value("dr_id");
    
    mysql_query("insert into ".TBL_Appointment."_draft (select * from ".TBL_Appointment." where id='$appid' and user_id='$userid' and dr_id='$drid')");
    
    $q = new Query();
    $q->delete("appointment")
    ->where_equal_to(array("user_id"=>$userid,"id"=>$appid,"dr_id"=>$drid))
    ->run();
    
    $output["responce"] = "succés";
    $output["data"] =$q->get_deleted();
      
}else{
    $output["responce"] = "erreur";
    $output["data"] = "champs requis";
}
echo json_encode($output);
?>
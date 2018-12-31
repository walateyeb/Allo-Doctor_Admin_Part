<? header('Content-type: text/json');
form_validation::add_validation('reg_id', 'required', 'User Id');
form_validation::add_validation('app_id', 'required', 'Clinic Id');
$output = array();
        
if(form_validation::validate_fields())
{
  
    $app_id = common::get_control_value("app_id");
    $reg_id = common::get_control_value("reg_id");
    
    $date = date('Y-m-d H:i:s');
    
    $q = new Query();
    $q->update("appointment",array(
    "confirm"=>1
    ))
    ->where_equal_or(array("`code`"=>$reg_id,"id"=>$app_id))
    ->run();
    
    $q = new Query();
    $q->select("`app`.*,`doctors`.`dr_phone`,`doctors`.`dr_name`,`register`.`name`,`register`.`email`,`doctors`.`dr_email`")
    ->from("appointment as `app` inner join `doctors` on `doctors`.`dr_id` = `app`.`dr_id` 
    inner join `register` on `register`.`id` = `app`.`user_id`
    ")
    ->where_equal_to(array("`app`.`code`"=>$reg_id,"`app`.`id`"=>$app_id))
    ->limit(1)
    ->run();
    
    
    
    $output["responce"] = "succés";
    $output["data"] =$q->get_selected();
   
   
    
}else{
    $output["responce"] = "erreur";
    $output["data"] = "champs requis";
}
echo json_encode($output);
?>
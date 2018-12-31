<? header('Content-type: text/json');
form_validation::add_validation('user_id', 'required', 'User Id');
form_validation::add_validation('notification', 'required', 'Notification');
form_validation::add_validation('newslatter', 'required', 'phone');
$output = array();
        
if(form_validation::validate_fields())
{

    $userid = common::get_control_value("user_id");
    $notification = common::get_control_value("notification");
    $newslatter = common::get_control_value("newslatter");
    
    $q = new Query();
    $q->update("register",array(
    "notification"=>$notification,
    "newslater"=>$newslatter
    ))
    ->where_equal_to(array("id"=>$userid))
    ->run();
    
   


    $output["responce"] = "succès";
    $output["data"] =$q->get_updated();
   
   
    
}else{
    $output["responce"] = "erreur";
    $output["data"] = "champs invalides";
}
echo json_encode($output);
?>
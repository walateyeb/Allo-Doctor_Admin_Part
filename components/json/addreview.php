<? header('Content-type: text/json');
form_validation::add_validation('user_id', 'required', 'User Id');
form_validation::add_validation('cl_id', 'required', 'Clinic Id');
form_validation::add_validation('dr_id', 'required', 'Doctor Id');
form_validation::add_validation('rating', 'required', 'Rating');
form_validation::add_validation('review', 'required', 'Review');
$output = array();
        
if(form_validation::validate_fields())
{
  
    $userid = common::get_control_value("user_id");
    $clinicid = common::get_control_value("cl_id");
    $drid = common::get_control_value("dr_id");
    $rating = common::get_control_value("rating");
    $review = common::get_control_value("review");
    
    
    $q = new Query();
    $q->insert_into("reviews",array(
    "dr_id"=>$drid,
    "cl_id"=>$clinicid,
    "user_id"=>$userid,
    "rating"=>$rating,
    "review"=>$review
    ))
    ->run();
    
    $id = $q->get_inserted_id();
    
    $q = new Query();
    $q->select()
    ->from("reviews")
    ->where_equal_to(array("id"=>$id))
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
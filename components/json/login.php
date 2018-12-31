<? header('Content-type: text/json');
form_validation::add_validation('password', 'required', 'Password');
form_validation::add_validation('email', 'required', 'email');
$output = array();
        
if(form_validation::validate_fields())
{
  
  $email = common::get_control_value("email");
  $password = md5(common::get_control_value("password"));

    	$q = new Query();
    $q->select()
    ->from("register where (email = '".$email."' or phone = '".$email."') and password = '".$password."'")
    ->limit(1)
    ->run();
    $res = $q->get_selected();
    if(empty($res)){
    
    $output["responce"] = "erreur";
    $output["data"] ="Utilisateur inconnu";
    }else{
    $output["responce"] = "succès";
    $output["data"] =$res;
    }	
   
    
    
}else{
    $output["responce"] = "erreur";
    $output["data"] ="Valider les champs";
}
echo json_encode($output);
?>
<?  common::user_access_only(array("admin","doctor"));
    common::load_model("db");
    $data = getServiceChargeById(common::get_control_value("id"));
    
    if(isset($_POST['add']))
    {
        form_validation::add_validation('name', 'required', 'Service Name');
        
        if(form_validation::validate_fields())
        {
            $name=common::get_control_value("name");
            $fees=common::get_control_value("fees");
            
           
            
            updateServiceCharge(array("service"=>$name,"charge"=>$fees),array("id"=>common::get_control_value("id")));
            common::redirect_to(common::get_component_link(array("clinic","services"),array("dr_id"=>$data["dr_id"],"cl_id"=>$data["clinic_id"])));
        }
    }
?>
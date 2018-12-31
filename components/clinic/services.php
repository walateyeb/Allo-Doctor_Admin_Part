<?  common::user_access_only(array("admin","doctor"));
    common::load_model("db");
    $data = getServiceCharges(common::get_control_value("cl_id"));
    
    if(isset($_POST['add']))
    {
        form_validation::add_validation('name', 'required', 'Serice Name');
        
        if(form_validation::validate_fields())
        {
            $imgfun=new imagecomponent();
            $name=common::get_control_value("name");
            $fees=common::get_control_value("fees");
            
           
            
            addServiceCharges(array("dr_id"=>common::get_control_value("dr_id"),"service"=>$name,"charge"=>$fees,"clinic_id"=>common::get_control_value("cl_id")));
            common::redirect_to(common::get_component_link(array("clinic","services"),array("dr_id"=>common::get_control_value("dr_id"),"cl_id"=>common::get_control_value("cl_id"))));
        }
    }
?>
<?  common::user_access_only("doctor");
    common::load_model("clinic","db");
    $drid = common::get_session(DR_LOGIN_USER_ID);
    $data = getClinic(common::get_session(DR_LOGIN_USER_ID));
    
    if(isset($_POST['add']))
    {
        form_validation::add_validation('name', 'required', 'Clinic Name');
        form_validation::add_validation('location', 'required', 'Clinic Location');
        
        if(form_validation::validate_fields())
        {
            $imgfun=new imagecomponent();
            $name=common::get_control_value("name");
            $location=common::get_control_value("location");
            $address=common::get_control_value("address");
            $fees=common::get_control_value("fees");
            $latitude=common::get_control_value("latitude");
            $longitude=common::get_control_value("longitude");
            $facility=common::get_control_value("facilities");
            
           
            
            addClinic(array("dr_id"=>common::get_session(DR_LOGIN_USER_ID),"cl_name"=>$name,"cl_location"=>$location,"cl_address"=>$address,"cl_fees"=>$fees,"cl_latitude"=>$latitude,
            "cl_longitude"=>$longitude,"cl_facilities"=>$facility));
            common::redirect_to(common::get_component_link(array("doctor","clinics"),array("dr_id"=>common::get_session(DR_LOGIN_USER_ID))));
        }
    }
?>
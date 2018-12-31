<?  common::user_access_only(array("admin","doctor"));
    common::load_model("db");
    $data = getClinicById(common::get_control_value("id"));
    
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
            $discount = common::get_control_value("discount"); 
           
            
            updateClinic(array("cl_name"=>$name,"cl_location"=>$location,"cl_address"=>$address,"cl_fees"=>$fees,"cl_latitude"=>$latitude,
            "cl_longitude"=>$longitude,"cl_facilities"=>$facility,"cl_discount"=>$discount),array("cl_id"=>common::get_control_value("id")));
            common::redirect_to(common::get_component_link(array("clinic","list"),array("dr_id"=>$data["dr_id"])));
        }
    }
?>
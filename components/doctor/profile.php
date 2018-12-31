<?  common::doctor_accress_only();
    $id = common::get_session(DR_LOGIN_USER_ID);
    common::load_model("category","db");
     $cats = getCategory();
    common::load_model("db");
    $data = getDoctorById($id);
    
    if(isset($_POST['add']))
    {
        form_validation::add_validation('name', 'required', 'Doctor Name');
        form_validation::add_validation('category', 'required', 'Category Name');
        form_validation::add_validation('degree', 'required', 'Doctor Degree');
        form_validation::add_validation('experiance', 'required', 'Doctor Experiance');
        form_validation::add_validation('city', 'required', 'Doctor City');
        form_validation::add_validation('email', 'required', 'Doctor Email');
        form_validation::add_validation('email', 'email', 'Doctor Email');
        form_validation::add_validation('password', 'required', 'Doctor Email');
        
        if(form_validation::validate_fields())
        {
            
            $name=common::get_control_value("name");
            $category=common::get_control_value("category");
            $email=common::get_control_value("email");
            $degree=common::get_control_value("degree");
            $experiance=common::get_control_value("experiance");
            $designation=common::get_control_value("designation");
            $speciality=common::get_control_value("speciality");
            $country=common::get_control_value("country");
            $city=common::get_control_value("city");
            $description = common::get_control_value("content");
            $password = common::get_control_value("password");
            if($password != $data["password"] && $password!=""){
                $password = md5($password);
            }
            $speciality_array = explode(",",$speciality);
            foreach($speciality_array as $sarray){
                if($sarray!=""){
                    $q = new Query();
                    $q->insert_into(TBL_Tags,array("title"=>$sarray,"type"=>"speciality"),array("title"=>$sarray))
                    ->run();
                }
            }
            $imgfun=new imagecomponent();
            $coverimage = $data["dr_cover_image"];
            if($_FILES['image']['size']>0){                
                $image=$imgfun->upload_image_and_thumbnail('image',480,120,'userfiles','contents',true);
                $coverimage = $image["imagename"];
            }
            
            $bannerimage = $data["dr_banner_image"];
            if($_FILES['banner']['size']>0){                
                $image=$imgfun->upload_image_and_thumbnail('banner',590,320,'userfiles','contents',false);
                $bannerimage = $image["imagename"];
            }
            
            updateDoctor(array("dr_name"=>$name,"cat_id"=>$category,"dr_email"=>$email,"dr_password"=>$password,"dr_degree"=>$degree,"dr_designation"=>$designation,"dr_speciality"=>$speciality,
            "dr_experiance"=>$experiance,"dr_city"=>$city,"dr_country"=>$country,"dr_cover_image"=>$coverimage,"dr_banner_image"=>$bannerimage,"dr_description"=>$description),array("dr_id"=>$id));
            
            common::set_message(4);
            common::redirect_to(common::get_component_link(array("doctor","profile")));
            
        }
    }
?>
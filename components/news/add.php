<?  common::user_access_only("admin");
    common::load_model("db");
    if(isset($_POST['add']))
    {
        form_validation::add_validation('title', 'required', 'News Title');
        
        if(form_validation::validate_fields())
        {
            $imgfun=new imagecomponent();
            $title=common::get_control_value("title");
            $description=common::get_control_value("content");
            
            
            addNews(array("title"=>$title,"description"=>$description));
            common::redirect_to(common::get_component_link(array("news","add")));
        }
    }
?>
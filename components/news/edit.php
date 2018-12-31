<?  common::user_access_only("admin");
    $id = common::get_control_value("id");
    common::load_model("db");
    $data = getNewsById($id);
    if(isset($_POST['add']))
    {
        form_validation::add_validation('title', 'required', 'News Title');
        
        if(form_validation::validate_fields())
        {
            
            $title=common::get_control_value("title");
            $description=common::get_control_value("content");
            
            updateNews(array("name"=>$title,"description"=>$description),array("id"=>$id));
            
            common::set_message(4);
            common::redirect_to(common::get_component_link(array("news","list")));
            
        }
    }
?>
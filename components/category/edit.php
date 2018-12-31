<?  common::user_access_only("admin");
    $id = common::get_control_value("id");
    common::load_model("db");
    $data = getCategoryById($id);
    if(isset($_POST['add']))
    {
        form_validation::add_validation('title', 'required', 'Category Title');
        
        if(form_validation::validate_fields())
        {
            $imgfun=new imagecomponent();
            $title=common::get_control_value("title");
            $iconimage = $data["icon"];
            if($_FILES['icon']['size']>0){                
                $image=$imgfun->upload_image_and_thumbnail('icon',128,90,'userfiles','contents',false);
                $iconimage = $image["imagename"];
            }
            
            updateCategory(array("title"=>$title,"icon"=>$iconimage),array("id"=>$id));
            
            common::set_message(4);
            common::redirect_to(common::get_component_link(array("category","list")));
            
        }
    }
?>
<?  common::user_access_only("admin");
    common::load_model("db");
    if(isset($_POST['add']))
    {
        form_validation::add_validation('title', 'required', 'Category Title');
        
        if(form_validation::validate_fields())
        {
            $imgfun=new imagecomponent();
            $title=common::get_control_value("title");
           
            $iconimage = "";
            if($_FILES['icon']['size']>0){                
                $image=$imgfun->upload_image_and_thumbnail('icon',128,90,'userfiles','contents',false);
                $iconimage = $image["imagename"];
            }
            
            addCategory(array("title"=>$title,"icon"=>$iconimage));
            common::redirect_to(common::get_component_link(array("category","add")));
        }
    }
?>
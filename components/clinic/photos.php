<?  common::user_access_only(array("admin","doctor"));
    common::load_model("db");
    $photos = getPhotos(common::get_control_value("cl_id"));
    if(isset($_REQUEST["delete"])){
        if(common::get_control_value("cl_id")!=""){
            $photo = getPhotosById(common::get_control_value("delete"));
            if(!empty($photo)){
             unlink("userfiles/contents/icon/".$photo["image"]);
                unlink("userfiles/contents/big/".$photo["image"]);
                unlink("userfiles/contents/small/".$photo["image"]);
            $q = new Query();
            $q->delete(TBL_Clinic_photo)
            ->where_equal_to(array("cl_id"=>common::get_control_value("cl_id"),"id"=>common::get_control_value("delete")))
            ->run();
            }
            common::redirect_to(common::get_component_link(array("clinic","photos"),array("cl_id"=>common::get_control_value("cl_id"))));
        }
    }
    if(isset($_POST['add']))
    {
        //form_validation::add_validation('title', 'required', 'Category Title');
        
        if(form_validation::validate_fields())
        {
            $imgfun=new imagecomponent();
            $title=common::get_control_value("name");
           
            $iconimage = "";
            if($_FILES['image']['size']>0){                
                $image=$imgfun->upload_image_and_thumbnail('image',480,120,'userfiles','contents',true);
                $iconimage = $image["imagename"];
            }
            
            addPhoto(array("cl_id"=>common::get_control_value("cl_id"),"title"=>$title,"image"=>$iconimage));
            common::redirect_to(common::get_component_link(array("clinic","photos"),array("cl_id"=>common::get_control_value("cl_id"))));
        }
    }
?>
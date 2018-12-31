<?  common::user_access_only("admin");

    function get_setting_value($setting){
    $q = new Query();
    echo $q->ge_value("select `value` from `settings` where `setting`='".$setting."'");
    }
    if(isset($_POST['add']))
    {
        $sql = "Insert into settings(`setting`,`value`) values";
        $i =0;
        foreach($_REQUEST['setting'] as $key=>$val){
            $sql.="($key,'".trim($val)."')";
            if($i<count($_REQUEST["setting"])-1)
            {
                $sql.=",";
            }
            $i++;
        }
        
        $sql.=" ON DUPLICATE KEY UPDATE value=VALUES(value)";
       // echo $sql;
        mysql_query($sql);
        
        common::redirect_to(common::get_component_link(array("settings","add")));
    }
    
?>
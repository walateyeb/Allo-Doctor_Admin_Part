<?  common::user_access_only(array("admin","doctor"));
    common::load_model("db");
    if(isset($_POST['add']))
    {
        $q = new Query();
        $q->delete(TBL_Timetable)
        ->where_equal_to(array("cl_id"=>common::get_control_value("cl_id"),"dr_id"=>common::get_control_value("dr_id")))
        ->run();
        
        $selectedtimes = $_REQUEST["times"];
        foreach($selectedtimes as $stime){
            $timdedata = explode("_",$stime);
            $q = new Query();
            $q->insert_into(TBL_Timetable,array("dr_id"=>common::get_control_value("dr_id"),"cl_id"=>common::get_control_value("cl_id"),"day"=>$timdedata[0],"during"=>$timdedata[1]))
            ->run();
            
        }
    }
    
    $q = new Query();
    $q->select()
    ->from(TBL_Timetable)
    ->where_equal_to(array("cl_id"=>common::get_control_value("cl_id"),"dr_id"=>common::get_control_value("dr_id")))
    ->run();
    $dr_times = $q->get_selected();
    
?>
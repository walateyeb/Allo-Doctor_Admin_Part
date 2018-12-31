<?php header('Content-type: text/json');
$data = array();
$page=1;
    if(isset($_GET['go']))
        $page=common::get_control_value('go');
$filter = "";
$orderby = "";

if($_REQUEST["id"]!="")
{
    $filter .=" and `doct`.`id`='".trim($_REQUEST["id"])."' ";
}

if($_REQUEST["city"]!="")
{
    $filter .=" and `doct`.`dr_city`='".trim($_REQUEST["city"])."' ";
}
if($_REQUEST["cat_id"]!="")
{
    $filter .=" and `doct`.`cat_id`='".trim($_REQUEST["cat_id"])."' ";
}
if($_REQUEST["experiance"]!="")
{
    $orderby ="`doct`.`dr_experiance` DESC ";
}
if($_REQUEST["search"]!=""){
    $filter .=" and `doct`.`dr_name` like '%".trim(common::get_control_value("search"))."%' ";
}
$q = new Query();
$q->select("`doct`.*,CONCAT('".CONTENT_IMAGE_URL1."/small/',`doct`.`dr_cover_image`) as cover_path,CONCAT('".CONTENT_IMAGE_URL1."/small/',`doct`.`dr_banner_image`) as banner_path,`rats`.avg,`rats`.`count`  ")
->from("`".TBL_Doctor."` as `doct` left outer join (select AVG(rating) as avg, count(id) as `count`, dr_id from `reviews` group by (dr_id)) as `rats` on `rats`.`dr_id` = `doct`.`dr_id` where 1 ".$filter."")
->limit(DEFAULT_PAGE_SIZE)
->page($page)
->run();
$count =  $q->get_selected_count();
$cpage=$q->get_page();
$gpages=$q->get_pages();

$resArray = $q->get_selected();
$output = array();
foreach($resArray as $array){
    $q = new Query();
    $q->select()
    ->from(TBL_Clinic)
    ->where_equal_to(array("dr_id"=>$array["dr_id"]))
    ->run();
    $clinicsarray = $q->get_selected();
    $clinics = array();
    foreach($clinicsarray as $clinic){
        $q = new Query();
        $q->select("`".TBL_Clinic_photo."`.*,CONCAT('".CONTENT_IMAGE_URL1."/small/',`image`) as image_path")
        ->from(TBL_Clinic_photo)
        ->where_equal_to(array("cl_id"=>$clinic["cl_id"]))
        ->run();
        $clinic['photos'] = $q->get_selected();
        
        $q = new Query();
        $q->select()
        ->from(TBL_Timetable)
        ->where_equal_to(array("cl_id"=>$clinic["cl_id"],"dr_id"=>$array["dr_id"]))
        ->run();
        $clinic['times'] = $q->get_selected();
        

        $clinics[] = $clinic;
    }
    
    $array['clinic'] = $clinics ;
    $output[] = $array;
}

$data['count'] = $count;
$data['current_page'] = $cpage;
$data['total_pages'] = $gpages;
$data['data'] = $output;


echo json_encode($data);
?>
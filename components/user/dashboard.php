<? common::user_access_only("admin"); 
$q = new Query();
$q->select()
->from(TBL_REGISTERS)
->where_greater_than_or_equal_to(array("reg_date"=>date(MYSQL_DATE_FORMAT)))
->where_greater_than_or_equal_to(array("reg_date"=>date(MYSQL_DATE_FORMAT)))
->run();
$registers = $q->get_selected();

$q = new Query();
$q->select("app.*,`doct`.`dr_name`,`doct`.`dr_phone`,`doct`.`dr_city`,`cat`.`title` as `category`,`reg`.`email`")
->from(TBL_Appointment." as `app` inner join ".TBL_REGISTERS." as `reg` on `reg`.`id` = `app`.`user_id` 
inner join ".TBL_Doctor." as `doct` on `doct`.`dr_id` = `app`.`dr_id`
inner join ".TBL_Category." as `cat` on `cat`.`id` = `doct`.`cat_id`")
->where_greater_than_or_equal_to(array("app.`app_date`"=>date(MYSQL_DATE_FORMAT)))
->where_greater_than_or_equal_to(array("app.`app_date`"=>date(MYSQL_DATE_FORMAT)))
->run();
$appointments = $q->get_selected();

?>
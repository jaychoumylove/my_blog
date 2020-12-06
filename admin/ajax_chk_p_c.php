<?
	require("Include/mysql_open.php");
	$Id=$_GET["Id"];
	$sql_s="select * from `yg_product_class` as a join `yg_active` as b on a.`parentId`=b.`act_classId` where  a.`Id`=".$Id;
	//exit($sql_s);
	$result_s=mysql_query($sql_s);
	$affected_rows_s=mysql_affected_rows();
	//echo $affected_rows_s;
	echo "<option value=''>选此项不参与活动</option>";
	$sql_sm="select * from `yg_active` where `act_classId`=0 ";
	$result_sm=mysql_query($sql_sm);
	while($result_arr_sm=mysql_fetch_array($result_sm)){
		echo "<option value='".$result_arr_sm['Id']."'>".$result_arr_sm['act_name']."</option>";
	  } 
	if($affected_rows_s){
		while($result_arr_s=mysql_fetch_array($result_s)){
    		echo "<option value='".$result_arr_s['Id']."'>热卖——".$result_arr_s['act_name']."</option>";
          } 
	}else{
		//echo $sql_s;
		exit("<option value=''>请选择产品所属分类</option>");
	}
?>
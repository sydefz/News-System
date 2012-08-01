<?php
include_once ('global.php');


$sql = "SELECT * FROM `p_newsclass` order by id DESC";
$query = $db->query($sql);
$flag = 0;
while ($row_class = $db->fetch_array($query)) {
	if($row_class[id]==$_GET[cid])
		$flag++;
}



if(empty($_GET[cid])||empty($flag)){
echo '<meta http-equiv="refresh" content="0; url=index.php" />';
exit();
}


$sql = "SELECT * FROM `p_newsclass` order by id DESC";
$query = $db->query($sql);
while ($row_class = $db->fetch_array($query)) {
	if($row_class[f_id]!=0 && $row_class[id] == $_GET[cid])
		$se_id = $row_class[f_id];
	if($row_class[f_id]==0 && $row_class[id] == $_GET[cid])
		$se_id = $row_class[id];
}


$sql = "SELECT * FROM `p_newsclass` where f_id = 0 order by id DESC";
$query = $db->query($sql);
	while ($row_class = $db->fetch_array($query)) {

		if($row_class[id] == $se_id){
		$selected_tab = "class ='selected'";
		$remark = $row_class[remark];
		$sub_name = $row_class[name]." | ";
		}

		$sm_class[] = array (
		"name" => $row_class[name],
		"id" => $row_class[id],
		"tab" => $selected_tab,
		"remark" =>  $remark);

		$selected_tab = "";
		$remark = "";

	}


$smarty->assign("sm_class", $sm_class); //导航引入
//==============

$sql = "SELECT * FROM p_config";
$query = $db->query($sql);
while ($row_config = $db->fetch_array($query)) {
	$sm_config[] = $row_config[values];
}

$smarty->assign("sm_config", $sm_config); //配置引入
//==============

$query = $db->findall("p_newsclass");
while ($row = $db->fetch_array($query)) {
	$news_class_arr[$row[id]] = $row[name];
}



$query = $db->findall("p_newsclass where f_id='$se_id'");
while ($row = $db->fetch_array($query)) {
	$news_class_list_arr[] =array("name"=>$row[name],"id"=>$row[id],);
}





$query = $db->findall("p_newsclass where f_id='$_GET[cid]'");
while ($row = $db->fetch_array($query)) {
	$news_class_in.= $row[id].",";
}

$news_class_in=$news_class_in."$_GET[cid]";


$result = mysql_query("select id from p_newsbase where cid in ($news_class_in)");
$total = mysql_num_rows($result);
pageft($total, 15);
if ($firstcount < 0)
	$firstcount = 0;
$query = $db->findall("p_newsbase where cid in ($news_class_in) order by id DESC limit  $firstcount, $displaypg");
while ($row = $db->fetch_array($query)) {
	$sm_list[] = array (
		"cid" => $row[cid],
		"cidname" => $news_class_arr[$row[cid]],
		"title" => $row[title],
		"id" => $row[id],
		"date_time" => date("m/d",$row[date_time]));
}
$smarty->assign("sm_list", $sm_list); //新闻列表
$smarty->assign("pagenav", $pagenav); //新闻分页
$smarty->assign("news_class_list_arr", $news_class_list_arr); //新闻子类
$smarty->assign("sub_name", $sub_name);


$smarty->display("list.htm");
?>

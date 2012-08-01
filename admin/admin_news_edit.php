<?php
include_once ('admin_global.php');

$r=$db->Get_user_shell_check($uid, $shell);


if(isset($_POST[into_news])){
     $db->query("update `p_newsbase` set title='$_POST[title]'  where id='$_GET[id]'");
	$db->Get_admin_msg("admin_news_add.php","添加成功");
}

if(!empty($_GET[id])){
	$sql="select * from p_newsbase as a, p_newscontent as b where a.id=b.nid and a.id='$_GET[id]'";
    $query=mysql_query($sql);
    $row_news=mysql_fetch_array($query);
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content=Alan name=Author><LINK rev=MADE
href="mailto:haowubai@hotmail.com"><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<BODY>
<TABLE class=navi cellSpacing=1 align=center border=0>
  <TBODY>
  <TR>
    <TH>后台 >> 修改新闻</TH></TR></TBODY></TABLE><BR>

	<table border=0 cellspacing=1 align=center class=form>
	<tr>
		<th colspan="2">添加分类</th>
	</tr>
	<form action="" method="post" onsubmit="syncTextarea()" >
    <tr>
   <td width=80>新闻分类</td>
  <td>
  <select name="cid">
    <option value="0">选择分类</option>
    <?php
    $query=mysql_query("select * from p_newsclass where f_id=0");
    while ($row=mysql_fetch_array($query)) {
    	$selected= $row[id]==$row_news[cid] ? "selected" : NULL;
      echo "<option value=\"$row[id]\" $selected>$row[name]</option>";
        $query_son=mysql_query("select * from p_newsclass where f_id='$row[id]'");
		while ($row_son=mysql_fetch_array($query_son)) {
		$selected= $row_son[id]==$row_news[cid] ? "selected" : NULL;
    	echo "<option value=\"$row_son[id]\" $selected>&nbsp;&nbsp;&nbsp;┗$row_son[name]</option>";
    	}
	}
    ?>
  </select>
    </td></tr>
   <tr>
   <td width=80>新闻标题</td>
  <td>
  <input type="text" name="title" size=50 value="<?php echo $row_news[title]?>">
  </select>
    </td>
    </tr>
       <tr>
   <td width=80>新闻作者</td>
  <td>
  <input type="text" name="author" size=20 value="<?php echo $row_news[author]?>">
    </td>
    </tr>
       <tr>
   <td width=80>新闻关键字</td>
  <td>
  <input type="text" name="keywrod" size=80 value="<?php echo $row_news[keywrod]?>">
    </td>
    </tr>
       <tr>
   <td width=80>新闻内容</td>
  <td>
  <textarea id="edited" name="content" style="width:95%;height:280px;"><?php echo $row_news[content]?></textarea>
	<script language="javascript" type="text/javascript" src="edit/whizzywig.js"></script>
	<script type="text/javascript">buttonPath = "edit/images/";makeWhizzyWig("edited", "all");</script>
    </td>
    </tr>
    <tr>
   <td width=80></td>
  <td>
  <input type="submit" name="into_news" style="height:30px;" value="修改新闻">
    </td>
    </tr>
     </form>
	</table>
<br>

	</BODY></HTML>

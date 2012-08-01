<?php
include_once ('admin_global.php');
$r=$db->Get_user_shell_check($uid, $shell);



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>sydefz_news_left</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK
href="images/private.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript>
<!--
function menu_tree(meval)
{
  var left_n=eval(meval);
  if (left_n.style.display=="none")
  { eval(meval+".style.display='';"); }
  else
  { eval(meval+".style.display='none';"); }
}
-->
</SCRIPT>

<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<BODY>
<CENTER>

<TABLE class=Menu cellSpacing=0>
  <TBODY>
  <TR>
    <TH onClick="javascript:menu_tree('left_1');" align=middle>≡ 基础操作 ≡</TH></TR>
  <TR id=left_1>
    <TD>
      <TABLE width="100%">
        <TBODY>
        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="admin_main.php" target=main>配置信息</A></TD>
		</TR>
        <TR>
          <TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A onClick="return confirm('提示：您确定要退出系统吗？')" href="admin_main.php?action=logout"  target=_parent>退出后台</A>
		  </TD>
		</TR>
	 </TBODY></TABLE>
	 </TD></TR></TBODY></TABLE>

<TABLE class=Menu cellSpacing=0 style="margin-top:5px">
  <TBODY>
  <TR>
    <TH onClick="javascript:menu_tree('left_2');" align=middle>≡ 新闻内容 ≡</TH></TR>
  <TR id=left_2>
    <TD>
      <TABLE width="100%">
        <TBODY>
        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="admin_news_class.php" target=main>新闻分类</A></TD>
		</TR>
		        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="admin_news_list.php" target=main>新闻列表</A></TD>
		</TR>
		        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="admin_news_add.php" target=main>添加新闻</A></TD>
		</TR>
	 </TBODY></TABLE>
	 </TD></TR></TBODY></TABLE>

<TABLE class=Menu cellSpacing=0 style="margin-top:5px">
  <TBODY>
  <TR>
    <TH align=middle>〓 版本信息 〓</TH></TR>
  <TR>
    <TD align=middle><a href="http://www.sydefz.com/news" target="_blank">sdefz news 1.0</a></TD></TR>
  <TR>
    <TD align=middle>sydefz.com</TD></TR></TBODY></TABLE></CENTER></BODY></HTML>

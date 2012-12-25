
<table border="0" width="566" height="87">
	<tr>
		<td height="87" width="249" align="left" valign="top">

<DIV style="background-color:#efefef; "><b>Possible Spammer IP?</b></DIV> <iframe style="vertical-align:top;" src="http://www.stopforumspam.com/api?ip={$userdata[nr].user_ip}" name="frameIP" scrolling="no" frameborder="no" align="center" height = "27px" width = "350px">
</iframe> <a class="colorbox_iframe2" title="IP details for {$userdata[nr].user_ip}" href="http://www.stopforumspam.com/ipcheck/{$userdata[nr].user_ip}">View the details SFS has for this IP?</a>
<br />

<br />
<DIV style="background-color:#efefef; "><b>Possible Spammer Email?</b></DIV><iframe style="vertical-align:top;" src="http://www.stopforumspam.com/api?email={$userdata[nr].user_email}" name="frameMail" scrolling="no" frameborder="no" align="center" height = "27px" width = "350px">
</iframe> <a class="colorbox_iframe2" title="Email details for {$userdata[nr].user_email} " href="http://www.stopforumspam.com/search?q={$userdata[nr].user_email}">View the details SFS has for this email address?</a>
<br />

<br />
<img src='../modules/sfs_antispam/images/exclamation.gif' border='0'>&nbsp;

{literal}<a class="colorbox_iframe2" title="Adding user information to the global database " href="http://www.stopforumspam.com/add.php?username={$userdata[nr].user_login}&ip_addr={$userdata[nr].user_ip}&email={$userdata[nr].user_email}&api_key=APIKEYHERE" target="_blank">Add this users information to SFS Global Spammer Database?</a>
<br /> 

</tr>
 </table>
<br />
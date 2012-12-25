<fieldset><legend><img src="{$my_pligg_base}/templates/admin/images/page.gif" align="absmiddle" /> {#PLIGG_Visual_AdminPanel_Manage_Pages#}</legend>
	<table class="stripes">
		<thead>
			<tr>
				<th>{#PLIGG_Visual_AdminPanel_Page_Submit_Title#}</th>
				<th width="80px">{#PLIGG_Visual_AdminPanel_Page_Edit#}</th>
				<th width="80px">{#PLIGG_Visual_AdminPanel_Page_Delete#}</th>
			</tr>
		</thead>
		<tbody>
		{$page_title}
		</tbody>
	</table>

{$page_text}

<br />
<br />

{literal}
<script language="javascript">
<!--
function NewPage() {
  document.location.href= "{/literal}{$my_base_url}{$my_pligg_base}/admin/submit_page.php{literal}"
}
//-->
</script>
{/literal}

<input type="button" class="bigbutton" value="{#PLIGG_Visual_AdminPanel_Page_Submit_New#}" onClick="NewPage()">

</fieldset>
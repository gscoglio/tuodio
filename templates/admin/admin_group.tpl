<fieldset><legend><img src="{$my_pligg_base}/templates/admin/images/page.gif" align="absmiddle" /> {#PLIGG_Visual_AdminPanel_Manage_Groups#}</legend>
<a href="../submit_groups.php" rel="width:800,height:700" class="mb" title="Create Group" id="create">{#PLIGG_Visual_AdminPanel_New_Group#}</a>
<br /><br />
	<table class="stripes">
		<thead>
			<tr>
				<th>{#PLIGG_Visual_AdminPanel_Group_Name#}</th>
				<th>{#PLIGG_Visual_AdminPanel_Group_Author#}</th>
				<th width="120px">{#PLIGG_Visual_AdminPanel_Group_Date#}</th>
				<th width="70px">{#PLIGG_Visual_AdminPanel_Group_Privacy#}</th>
				<th width="40px">{#PLIGG_Visual_AdminPanel_Group_Edit#}</th>
				<th width="80px">{#PLIGG_Visual_AdminPanel_Group_Approve#}</th>
				<th width="50px">{#PLIGG_Visual_AdminPanel_Group_Delete#}</th>
			</tr>
		</thead>
		<tbody>
		{foreach from=$groups item=group}
			<tr>
				<td>{$group.group_name}</td>
				<td>{$group.user_login}</td>
				<td>{$group.group_date}</td>
				<td>{$group.group_privacy}</td>
				<td><a href='../editgroup.php?id={$group.group_id}' rel="width:800,height:700" class="mb" title="Edit Group">{#PLIGG_Visual_AdminPanel_Group_Edit#}</a></td>
				<td>{if $group.group_status!='Enable'}<a href='?mode=approve&group_id={$group.group_id}'>{#PLIGG_Visual_AdminPanel_Group_Approve#}</a>{/if}</td>
				<td><a onclick='return confirm("{#PLIGG_Visual_Group_Delete_Confirm#}");' href='?mode=delete&group_id={$group.group_id}'>{#PLIGG_Visual_AdminPanel_Group_Delete#}</a></td>
			</tr>
		{/foreach}
		</tbody>
	</table>

<br />

</fieldset>
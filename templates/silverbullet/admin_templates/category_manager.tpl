{literal}
	<style type="text/css">
		.eip_editable { background-color: #ff9; padding: 3px; }
		.eip_savebutton { background-color: #36f; color: #fff; }
		.eip_cancelbutton { background-color: #000; color: #fff; }
		.eip_saving { background-color: #903; color: #fff; padding: 3px; }
		.eip_empty { color: #afafaf; }
			
	</style>
{/literal}

<div id = "catmanager" >
<fieldset><legend><img src="{$my_pligg_base}/templates/{$the_template}/images/manage_cat.png" align="absmiddle" /> {#PLIGG_Visual_Header_AdminPanel_2#}</legend>
<br />
<table style="border:none; width:auto;">
	{section name=thecat loop=$cat_array start=1}

		{* show the grey box above the category *}
		{if $cat_array[thecat].auto_id neq 0}
			<tr style="border:none">	
				{$cat_array[thecat].spacercount|repeat_count:'<td></td>'}
				<td style="border:1px solid #ccc; background:#eee">
					<div id = "above_{$cat_array[thecat].auto_id}">
						&nbsp;
					</div>
				</td>
			</tr>
		{/if}
		{* show the grey box above the category *}

		<tr style="border:none;">	
			{$cat_array[thecat].spacercount|repeat_count:'<td></td>'}
			<td>
				<div id = "cat_drop_{$cat_array[thecat].auto_id}">
					{if $cat_array[thecat].auto_id neq 0}<div id = "cat_drag_{$cat_array[thecat].auto_id}">{/if}
					{*$cat_array[thecat].name*}
						
					<a href = "javascript://" onclick="
					var replydisplay=document.getElementById('{$cat_array[thecat].auto_id}').style.display ? '' : 'none';
					document.getElementById('{$cat_array[thecat].auto_id}').style.display = replydisplay;
					">
					{#PLIGG_Visual_View_Category_Name#}
					</a>: <span id="catname_{$cat_array[thecat].auto_id}" style="color: #{$cat_array[thecat].color}"><b>{eipItem item="qeip_CatName" unique=$cat_array[thecat].auto_id ShowJS=TRUE}</b></span>
						
					<div id="{$cat_array[thecat].auto_id}" style="display:none">
						ID: {$cat_array[thecat].auto_id}<br />
						{*
							Parent: {eipItem item=qeip_CatParent unique=$cat_array[thecat].auto_id ShowJS=TRUE} -- {$cat_array[thecat].parent_name}<br />
							Sort Order: {eipItem item=qeip_CatOrder unique=$cat_array[thecat].auto_id ShowJS=TRUE}<br />
							Items in this category: -coming soon- <br />
						*}
						{if $cat_array[thecat].auto_id != 0}
						<a href = "admin_categories.php?action=remove&id={$cat_array[thecat].auto_id}"  onclick="return confirm('{#PLIGG_Visual_View_User_Reset_Pass_Confirm#}')">{#PLIGG_Visual_View_Category_Delete#}</a><br />
						{/if}
					</div>
					{if $cat_array[thecat].auto_id neq 0}</div>{/if}
				</div>
			</td>
		</tr>

		{* show the grey box below the category *}
		{if $cat_array[thecat].auto_id neq 0}
			<tr>	
				{$cat_array[thecat].spacercount|repeat_count:'<td></td>'}
				<td style="border:1px solid #ccc; background:#eee">
					<div id = "below_{$cat_array[thecat].auto_id}">
						&nbsp;
					</div>
				</td>
			</tr>
		{/if}
		{* show the grey box below the category *}

		{* setup the drag/drop *}
		<script language="javascript" type="text/javascript">
			{if $cat_array[thecat].auto_id neq 0}
				var drag_{$cat_array[thecat].auto_id} = new Draggable('cat_drag_{$cat_array[thecat].auto_id}',{ldelim}revert:true{rdelim});
			{/if}

			Droppables.add('cat_drop_{$cat_array[thecat].auto_id}', {ldelim}
	   		onDrop: function(element, droppableElement) 
		     		{ldelim} document.getElementById('catmanager').innerHTML = '<br />Please Wait...'; window.location='admin_categories.php?action=changeparent&id=' + element.id + '&parent=' + droppableElement.id; {rdelim}{rdelim});			

			{if $cat_array[thecat].auto_id neq 0}
				Droppables.add('above_{$cat_array[thecat].auto_id}', {ldelim}
		   		onDrop: function(element, droppableElement) 
			     		{ldelim} document.getElementById('catmanager').innerHTML = '<br />Please Wait...'; window.location='admin_categories.php?action=move_above&moveabove_id=' + droppableElement.id + '&id_to_move=' + element.id; {rdelim}{rdelim});			

				Droppables.add('below_{$cat_array[thecat].auto_id}', {ldelim}
		   		onDrop: function(element, droppableElement) 
			     		{ldelim} document.getElementById('catmanager').innerHTML = '<br />Please Wait...'; window.location='admin_categories.php?action=move_below&movebelow_id=' + droppableElement.id + '&id_to_move=' + element.id; {rdelim}{rdelim});			
			{/if}
		</script>
		{* setup the drag/drop *}
	{/section}
</table>

<br /><br />
<img src="{$my_pligg_base}/templates/{$the_template}/images/new_cat.png" align="absmiddle" /> <a href = "?action=add">{#PLIGG_Visual_View_Category_Add#}</a>
<hr/>
<em>If you're using <a href="{$my_pligg_base}/admin_config.php?page=UrlMethod">URLMethod 2</a>, you'll want to use these lines in your .htaccess file (replacing the existing code). <br /><b>Note: Refresh this page to make sure the following code is correct.</b><br /><br/>
RewriteRule ^({section name=thecat loop=$cat_array}{$cat_array[thecat].safename}{if $templatelite.section.thecat.iteration neq $cat_count}|{/if}{/section})/([^/]+)/?$ story.php?title=$2 [L]<br />
RewriteRule ^({section name=thecat loop=$cat_array}{$cat_array[thecat].safename}{if $templatelite.section.thecat.iteration neq $cat_count}|{/if}{/section})/?$ ?category=$1 [L]</em>
<br/><br />

{php}echo "<span><a onclick=\"new Effect.toggle('help','appear', {queue: 'end'}); \"><img src=\"".my_pligg_base."/templates/".The_Template."/images/help.png\" align=\"absmiddle\" /> </a></span>";{/php}
	<div id="help" style="display:none;border:1px solid #ccc;background:#eee;padding:4px 4px 4px 4px">	
		<strong>To add a new category</strong>, clik on the "Add A New Category" link.<hr/>
		<strong>To create a sub-category</strong>, click on the "Category" link next to a category and drag in on top of the parent category.<hr/>
		<strong>To place a category above or below another category</strong>, click the "Category" link next to a category and drag it in the grey box above or below another category.<hr/>
		<strong>To delete a category</strong>, click the "Category" link next to a category and then click on the "Delete" link.<hr/>
		<strong>To rename a category</strong>, single click on the category name.	
	</div>
	
<br />
</fieldset>
</div>

{*
			       drag_{$cat_array[thecat].auto_id}.destroy();
*}
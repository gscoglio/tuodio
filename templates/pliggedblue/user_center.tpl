<h2 style="margin-top:0px;border:none">{$page_header}</h2>

{if $view_href neq ""}
	<a href="{$user_rss, $view_href}" target="_blank"><img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" style="float:left; padding-top:10px; padding-left:13px;"></a>
{else}
	{if $UseAvatars neq "0"}
		<span id="ls_avatar"><img src="{$Avatar_ImgSrc}" style="float:left"/></span>
	{/if}
{/if}
	
<div id="cab">
	<ul>
		<li><a href="{$user_url_personal_data}" class="navbut{$nav_pd}"><span>{#PLIGG_Visual_User_PersonalData#}</span></a></li>
		<li><a href="{$user_url_news_sent}" class="navbut{$nav_ns}"><span>{#PLIGG_Visual_User_NewsSent#}</span></a></li>
		<li><a href="{$user_url_news_published}" class="navbut{$nav_np}"><span>{#PLIGG_Visual_User_NewsPublished#}</span></a></li>
		<li><a href="{$user_url_news_unpublished}" class="navbut{$nav_nu}"><span>{#PLIGG_Visual_User_NewsUnPublished#}</span></a></li>
		<li><a href="{$user_url_commented}" class="navbut{$nav_c}"><span>{#PLIGG_Visual_User_NewsCommented#}</span></a></li>
		<li><a href="{$user_url_news_voted}" class="navbut{$nav_nv}"><span>{#PLIGG_Visual_User_NewsVoted#}</span></a></li>
		<li><a href="{$user_url_saved}" class="navbut{$nav_s}"><span>{#PLIGG_Visual_User_NewsSaved#}</span></a></li>
	</ul>
</div>

{if $view_href neq ""}
	<div id="navbar" style="margin-left:0px;margin-right:0px"></div>
{/if}

{checkActionsTpl location="tpl_user_center_just_below_header"}

{if $user_view eq 'search'}
	<div id="navbar" style="margin-left:0px;margin-right:0px">
		{if $Allow_Friends neq "0"}			
			{if $user_login neq $user_logged_in}
	  			{if $is_friend gt 0}
					<img src="{$my_pligg_base}/templates/{$the_template}/images/user_delete.png" align="absmiddle"/>
					<a href="{$user_url_remove}">{#PLIGG_Visual_User_Profile_Remove_Friend#} {$user_login} {#PLIGG_Visual_User_Profile_Remove_Friend_2#}</a>

		   			{if $user_authenticated eq true}
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						{checkActionsTpl location="tpl_user_center"}
					{/if} 			
				{else}
	  				
	   				{if $user_authenticated eq true}
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
						<img src="{$my_pligg_base}/templates/{$the_template}/images/user_add.png" align="absmiddle"/>
						<a href="{$user_url_add}">	{#PLIGG_Visual_User_Profile_Add_Friend#} {$user_login} {#PLIGG_Visual_User_Profile_Add_Friend_2#}</a>
				    {/if}   
				{/if}      		
			{else}  
				<img src="{$my_pligg_base}/templates/{$the_template}/images/friends.png" align="absmiddle"/>
				<a href="{$user_url_friends}">{#PLIGG_Visual_User_Profile_View_Friends#}</a> 
		  
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  
				<img src="{$my_pligg_base}/templates/{$the_template}/images/friends2.png" align="absmiddle"/>
				<a href="{$user_url_friends2}">{#PLIGG_Visual_User_Profile_View_Friends_2#}</a> 

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			{/if} 
		{/if}
	</div>

	<h2>{#PLIGG_Visual_Search_SearchResults#} {$search}</h2>

	<form action="{$my_pligg_base}/user.php" method="get">
	<input type="hidden" name="view" value="search">
		{if $templatelite.get.keyword neq ""}
			{assign var=searchboxtext value=$templatelite.get.keyword|sanitize:2}
		{else}
			{assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}			
		{/if}
	<input type="text" name="keyword" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}">
	<input type="submit" value="{#PLIGG_Visual_User_Search_Users#}" class="log2">
	</form>

	<table cellpadding="1" border="0">
		<tr><th>{#PLIGG_Visual_Login_Username#}</th><th>{#PLIGG_Visual_User_Profile_Joined#}</th><th>{#PLIGG_Visual_User_Profile_Homepage#}</th><th>Add/Remove</th></tr>
		{section name=nr loop=$userlist}
			<tr>
			<td><img src="{$userlist[nr].Avatar}" align="absmiddle"/> <a href = "{$URL_user, $userlist[nr].user_login}">{$userlist[nr].user_login}</a></td>
			<td>{$userlist[nr].user_date}</td>
			<td>{$userlist[nr].user_url}</td>
			<td>{if $userlist[nr].status eq 0}	
					<center><a href="{$userlist[nr].add_friend}"><img src="{$my_pligg_base}/templates/{$the_template}/images/user_add.png" align="absmiddle"/></a></center>
				{else}
					<center><a href="{$userlist[nr].remove_friend}"><img src="{$my_pligg_base}/templates/{$the_template}/images/user_delete.png" align="absmiddle"/></a></center>
				{/if}
			</td>	
			</tr>
		{/section}
	</table>
{/if}


{if $user_view eq 'viewfriends'}
	<div id="navbar" style="margin-left:0px;margin-right:0px">
		{if $Allow_Friends neq "0"}
			<img src="{$my_pligg_base}/templates/{$the_template}/images/friends2.png" align="absmiddle"/> 
			<a href="{$user_url_friends2}">{#PLIGG_Visual_User_Profile_View_Friends_2#}</a> 

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			{if $user_authenticated eq true} 
				<img src="{$my_pligg_base}/templates/{$the_template}/images/user_search.png" align="absmiddle"/>
				<a onclick="new Effect.toggle('search_users','appear', {ldelim}queue: 'end'{rdelim});">{#PLIGG_Visual_User_Search_Users#}</a>
				<div id="search_users" style="display:none">
					<h2>{#PLIGG_Visual_User_Search_Users#}</h2>
					<form action="{$my_pligg_base}/user.php" method="get">
					<input type="hidden" name="view" value="search">
					<input type="text" name="keyword">
					<input type="submit" value="{#PLIGG_Visual_User_Search_Users#}" class="log2">
					</form>
				</div>
			{/if}
		{/if}
	</div>
{/if}


{if $user_view eq 'viewfriends2'}
	<div id="navbar" style="margin-left:0px;margin-right:0px">
		{if $Allow_Friends neq "0"}	 	
			<img src="{$my_pligg_base}/templates/{$the_template}/images/friends.png" align="absmiddle"/>
			<a href="{$user_url_friends}">{#PLIGG_Visual_User_Profile_View_Friends#}</a>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			{if $user_authenticated eq true} 
				<img src="{$my_pligg_base}/templates/{$the_template}/images/user_search.png" align="absmiddle"/>
				<a onclick="new Effect.toggle('search_users','appear', {ldelim}queue: 'end'{rdelim});">{#PLIGG_Visual_User_Search_Users#}</a>
				<div id="search_users" style="display:none">
					<h2>{#PLIGG_Visual_User_Search_Users#}</h2>
					<form action="{$my_pligg_base}/user.php" method="get">
					<input type="hidden" name="view" value="search">
					<input type="text" name="keyword">
					<input type="submit" value="{#PLIGG_Visual_User_Search_Users#}" class="log2">
					</form>
				</div>
			{/if}		
		{/if}
	</div>
{/if}


{if $user_view eq 'removefriend'}
	<div id="navbar" style="margin-left:0px;margin-right:0px">
		{if $Allow_Friends neq "0"}				
			{if $user_login neq $user_logged_in}	  
				<img src="{$my_pligg_base}/templates/{$the_template}/images/friends.png" align="absmiddle"/>
				<a href="{$user_url_friends}">{#PLIGG_Visual_User_Profile_View_Friends#}</a>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  
				<img src="{$my_pligg_base}/templates/{$the_template}/images/friends2.png" align="absmiddle"/>
				<a href="{$user_url_friends2}">{#PLIGG_Visual_User_Profile_View_Friends_2#}</a>	  
			{/if}

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			{if $user_authenticated eq true} 	
				<img src="{$my_pligg_base}/templates/{$the_template}/images/user_search.png" align="absmiddle"/>
				<a onclick="new Effect.toggle('search_users','appear', {ldelim}queue: 'end'{rdelim});">{#PLIGG_Visual_User_Search_Users#}</a>
				<div id="search_users" style="display:none">
					<h2>{#PLIGG_Visual_User_Search_Users#}</h2>
					<form action="{$my_pligg_base}/user.php" method="get">
					<input type="hidden" name="view" value="search">
					<input type="text" name="keyword">
					<input type="submit" value="{#PLIGG_Visual_User_Search_Users#}" class="log2">
					</form>
				</div>
			{/if}
		{/if}
	</div>
{/if}


{if $user_view eq 'addfriend'}
	<div id="navbar" style="margin-left:0px;margin-right:0px">
		{if $Allow_Friends neq "0"}	 
			<img src="{$my_pligg_base}/templates/{$the_template}/images/friends.png" align="absmiddle"/>
			<a href="{$user_url_friends}">{#PLIGG_Visual_User_Profile_View_Friends#}</a>

		  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  
			<img src="{$my_pligg_base}/templates/{$the_template}/images/friends2.png" align="absmiddle"/>
			<a href="{$user_url_friends2}">{#PLIGG_Visual_User_Profile_View_Friends_2#}</a>

		  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			{if $user_authenticated eq true} 
				<img src="{$my_pligg_base}/templates/{$the_template}/images/user_search.png" align="absmiddle"/>
				<a onclick="new Effect.toggle('search_users','appear', {ldelim}queue: 'end'{rdelim});">{#PLIGG_Visual_User_Search_Users#}</a>
				<div id="search_users" style="display:none">
					<h2>{#PLIGG_Visual_User_Search_Users#}</h2>
					<form action="{$my_pligg_base}/user.php" method="get">
					<input type="hidden" name="view" value="search">
					<input type="text" name="keyword">
					<input type="submit" value="{#PLIGG_Visual_User_Search_Users#}" class="log2">
					</form>
				</div>   
			{/if}		
		{/if}
	</div>
{/if}


{if $user_view eq 'profile'}
	<div id="navbar" style="margin-left:0px;margin-right:0px">
		{if $Allow_Friends neq "0"}	
			{if $user_login neq $user_logged_in}
				{if $is_friend gt 0}
					<img src="{$my_pligg_base}/templates/{$the_template}/images/user_delete.png" align="absmiddle"/>
					<a href="{$user_url_remove}">{#PLIGG_Visual_User_Profile_Remove_Friend#} {$user_login} {#PLIGG_Visual_User_Profile_Remove_Friend_2#}</a>

			   		{if $user_authenticated eq true}
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			
						{checkActionsTpl location="tpl_user_center"}
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					{/if}
		 			
				{else}
		  				
		   			{if $user_authenticated eq true} 					
						<img src="{$my_pligg_base}/templates/{$the_template}/images/user_add.png" align="absmiddle"/>
						<a href="{$user_url_add}">	{#PLIGG_Visual_User_Profile_Add_Friend#} {$user_login} {#PLIGG_Visual_User_Profile_Add_Friend_2#}</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					
					{/if}   
		   
				{/if}   
		   		
			{else}
		  
				<img src="{$my_pligg_base}/templates/{$the_template}/images/friends.png" align="absmiddle"/>
				<a href="{$user_url_friends}">{#PLIGG_Visual_User_Profile_View_Friends#}</a> 
		  
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  
				<img src="{$my_pligg_base}/templates/{$the_template}/images/friends2.png" align="absmiddle"/>
				<a href="{$user_url_friends2}">{#PLIGG_Visual_User_Profile_View_Friends_2#}</a> 

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  
			{/if} 
			
			{if $user_authenticated eq true} 
				<img src="{$my_pligg_base}/templates/{$the_template}/images/user_search.png" align="absmiddle"/>
				<a onclick="new Effect.toggle('search_users','appear', {ldelim}queue: 'end'{rdelim});">{#PLIGG_Visual_User_Search_Users#}</a>
				<div id="search_users" style="display:none">
					<h2>{#PLIGG_Visual_User_Search_Users#}</h2>
					<form action="{$my_pligg_base}/user.php" method="get">
					<input type="hidden" name="view" value="search">
					<input type="text" name="keyword">
					<input type="submit" value="{#PLIGG_Visual_User_Search_Users#}" class="log2">
					</form>
				</div>
			{/if}

		{/if}
	</div>
		
	<br />

	<div id="wrapper">
		<div id="personal_info">
			<fieldset><legend>{#PLIGG_Visual_User_PersonalData#}</legend>
				<table style="border:none">
				<tr>
				<td style="background:none"><strong>{#PLIGG_Visual_Login_Username#}:</strong></td>
				<td style="background:none">{if $UseAvatars neq "0"}<span id="ls_avatar"><img src="{$Avatar_ImgSrc}" alt="Avatar" align="absmiddle"/></span>{/if} {$user_username}</td>
				</tr>
				
				{if $user_names ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_User#}:</strong></td>
				<td>{$user_names}</td>
				</tr>
				{/if}

				{if $user_url ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_Homepage#}:</strong></td>
				<td><a href="{$user_url}" target="_blank">{$user_url}</a></td>
				</tr>
				{/if}

				{if $user_publicemail ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_PublicEmail#}:</strong></td>
				<td>{$user_publicemail}</td>
				</tr>
				{/if}

				{if $user_location ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_Profile_Location#}:</strong></td>
				<td>{$user_location}</td>
				</tr>
				{/if}

				{if $user_occupation ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_Profile_Occupation#}:</strong></td>
				<td>{$user_occupation}</td>
				</tr>
				{/if}

				{if $user_aim ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_AIM#}:</strong></td>
				<td>{$user_aim}</td>
				</tr>
				{/if}

				{if $user_msn ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_MSN#}:</strong></td>
				<td>{$user_msn}</td>
				</tr>
				{/if}

				{if $user_yahoo ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_Yahoo#}:</strong></td>
				<td>{$user_yahoo}</td>
				</tr>
				{/if}

				{if $user_gtalk ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_GTalk#}:</strong></td>
				<td>{$user_gtalk}</td>
				</tr>
				{/if}

				{if $user_skype ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_Skype#}:</strong></td>
				<td>{$user_skype}</td>
				</tr>
				{/if}

				{if $user_irc ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_IRC#}:</strong></td>
				<td><a href="{$user_irc}" target="_blank">{$user_irc}</a></td>
				</tr>
				{/if}

				{if $user_login eq $user_logged_in}
				<tr><td><input type="button" value="{#PLIGG_Visual_User_Profile_Modify#}" class="log2" onclick="location='{$URL_Profile}'"></td></tr>
				{/if}
				</table>
			</fieldset>
		</div>

		<div id="stats">
			<fieldset><legend>{#PLIGG_Visual_User_Profile_User_Stats#}</legend>
				<table style="border:none;">
				<tr>
				<td style="background:none"><strong>{#PLIGG_Visual_User_Profile_Joined#}:</strong></td>
				<td style="background:none">{$user_joined}</td>
				</tr>

				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_Total_Links#}:</strong></td>
				<td>{$user_total_links}</td>
				</tr>

				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_Published_Links#}:</strong></td>
				<td>{$user_published_links}</td>
				</tr>

				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_Total_Comments#}:</strong></td>
				<td>{$user_total_comments}</td>
				</tr>

				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_Total_Votes#}:</strong></td>
				<td>{$user_total_votes}</td>
				</tr>

				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_Published_Votes#}:</strong></td>
				<td>{$user_published_votes}</td>
				</tr>

				{if $user_karma ne ""}
				<tr>
				<td><strong>{#PLIGG_Visual_User_Profile_KarmaPoints#}:</strong></td>
				<td>{$user_karma}</td>
				</tr>
				{/if}

				{if $ShowProfileLastViewers eq true}
					<tr><td><strong>{#PLIGG_Visual_User_Profile_Last_5_Title#}:</strong></td></tr>
						<tr><td>
						{section name=customer loop=$last_viewers_names}
						{if $UseAvatars neq "0"}<img src="{$last_viewers_avatar[customer]}" align="absmiddle">{/if} <a href = "{$last_viewers_profile[customer]}">{$last_viewers_names[customer]}</a>
						{/section}
						</td></tr>		 
				{/if}
				</table>
			</fieldset>
		</div>

		{if $user_login eq $user_logged_in}
			<hr />
			<div id="bookmarklet">
				<fieldset><legend>{#PLIGG_Visual_User_Profile_Bookmarklet_Title#}</legend>
					<br />{#PLIGG_Visual_User_Profile_Bookmarklet_Title_1#} {#PLIGG_Visual_Name#}.{#PLIGG_Visual_User_Profile_Bookmarklet_Title_2#}<br />
					<br /><b>{#PLIGG_Visual_User_Profile_IE#}:</b> {#PLIGG_Visual_User_Profile_IE_1#}
					<br /><b>{#PLIGG_Visual_User_Profile_Firefox#}:</b> {#PLIGG_Visual_User_Profile_Firefox_1#}
					<br /><b>{#PLIGG_Visual_User_Profile_Opera#}:</b> {#PLIGG_Visual_User_Profile_Opera_1#}
					<br /><br /><b>{#PLIGG_Visual_User_Profile_The_Bookmarklet#}: { include file="bookmarklet.tpl" }</b>
				</fieldset>
			</div>
		{/if}
	</div>	
{/if}

{if isset($user_page)}{$user_page}{/if}
{if isset($user_pagination)}{$user_pagination}{/if}

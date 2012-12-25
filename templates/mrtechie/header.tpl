<!-- start header -->
<div id="header_techie">
	<div id="logo">
		<h1><a href="{$my_base_url}{$my_pligg_base}">TuOdio.com.ar</a></h1>
		<p><a href="http://www.tuodio.com.ar/">Todo lo que odias</a></p>
	</div>
	<div id="rss_techie">
    {if $user_authenticated eq true}
    <div id="login_techie">
    {#PLIGG_Visual_Welcome_Back#} {if $UseAvatars neq "0"} <img src="{$Current_User_Avatar_ImgSrc}" alt="Avatar" align="absmiddle"/>{/if} {$user_logged_in}!&nbsp;&nbsp;
    </div>
    {/if}
    <a href="{$my_base_url}{$my_pligg_base}/rss.php">Subscribe to RSS Feed</a>
    </div>
	<div id="search_techie">
    {if isset($templatelite.get.search)}
			{assign var=searchboxtext value=$templatelite.get.search|sanitize:2}
		{else}
			{assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}			
		{/if}
	
		{if $SearchMethod eq 4}
		<!-- Google CSE Search Box Begins -->
			  <form id="searchbox_010213779252248883968:3qxlljo_6tg" action="{$my_pligg_base}/search.php">
			<fieldset>
				<form id="searchbox_010213779252248883968:3qxlljo_6tg" action="{$my_pligg_base}/search.php">
			    <input type="hidden" name="cx" value="010213779252248883968:3qxlljo_6tg" />
			    <input type="hidden" name="cof" value="FORID:10" />
					<input type="hidden" name="sitesearch" value="{$my_pligg_base}" checked="checked" />
			    <input name="q" type="text" size="15" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}" />
			</fieldset>
		</form>
        {else}
			<form action="{$my_pligg_base}/search.php" method="get" name="thisform-search" id="thisform-search">
            
				<input class="s" type="text" size="15" name="search" id="searchsite" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}"/>
			
			</form>
		{/if}
	</div>
</div>
<!-- end header -->
<!-- star menu -->
<div id="menu_techie">
	<ul>
		{if $user_authenticated eq true}
				
				{if $isgod eq 1}
                {if $pagename eq "admin_index"}
                <li class="current_page_item"><a href="{$URL_admin}"> {#PLIGG_Visual_Header_AdminPanel#}</a></li> 
                {else}
                <li><a href="{$URL_admin}"> {#PLIGG_Visual_Header_AdminPanel#}</a></li>
                {/if}
                {/if}
                {if $pagename eq "published"}
                <li class="current_page_item"><a href='{$my_base_url}{$my_pligg_base}'>{#PLIGG_Visual_Home#}</a></li>
                {else}		
				<li><a href='{$my_base_url}{$my_pligg_base}'>{#PLIGG_Visual_Home#}</a></li>
                {/if}
                {if $pagename eq "user"}
                <li class="current_page_item"><a href="{$URL_userNoVar}"> {#PLIGG_Visual_Profile#}</a></li>
                {else}
				<li><a href="{$URL_userNoVar}"> {#PLIGG_Visual_Profile#}</a></li>
                {/if}
				{checkActionsTpl location="tpl_sidebar_logged_in_just_below_profile"}
				{if $Enable_Live eq 'false'} 
                {if $pagename eq "live"}
                <li class="current_page_item"><a href='{$URL_live}'> {#PLIGG_Visual_Live#}</a></li> 
                {else}
                <li><a href='{$URL_live}'> {#PLIGG_Visual_Live#}</a></li> 
                {/if}
                {/if}
                {if $pagename eq "topusers"}
                <li class="current_page_item"><a href='{$URL_topusers}'> {#PLIGG_Visual_Top_Users#}</a></li>
                {else}
                <li><a href='{$URL_topusers}'> {#PLIGG_Visual_Top_Users#}</a></li>
                {/if}
				{if $Enable_Tags eq 'true'}
                {if $pagename eq "cloud"}
                <li class="current_page_item"><a href="{$URL_tagcloud}">{#PLIGG_Visual_Tags#}</a></li>
                {else}
                <li><a href="{$URL_tagcloud}">{#PLIGG_Visual_Tags#}</a></li> 
                {/if}
                {/if}
				<li><a href="{$URL_logout}"> {#PLIGG_Visual_Logout#}</a></li>
			{else}
				{if $pagename eq "published"}
                <li class="current_page_item"><a href='{$my_base_url}{$my_pligg_base}'>{#PLIGG_Visual_Home#}</a></li>
                {else}		
				<li><a href='{$my_base_url}{$my_pligg_base}'>{#PLIGG_Visual_Home#}</a></li>
                {/if}
                {if $pagename eq "login"}
                <li class="current_page_item"><a href='{$URL_login}'>{#PLIGG_Visual_Login_Title#}</a></li>
                {else}
				<li><a href='{$URL_login}'>{#PLIGG_Visual_Login_Title#}</a></li>
                {/if}
                {if $pagename eq "register"}
                <li class="current_page_item"><a href='{$URL_register}'>{#PLIGG_Visual_Register#}</a></li>
                {else}
				<li><a href='{$URL_register}'>{#PLIGG_Visual_Register#}</a></li>
                {/if}
				{if $Enable_Live eq 'false'} 
                {if $pagename eq "live"}
                <li class="current_page_item"><a href='{$URL_live}'> {#PLIGG_Visual_Live#}</a></li>
                {else}
                <li><a href='{$URL_live}'> {#PLIGG_Visual_Live#}</a></li> 
                {/if}
                {/if}
                {if $pagename eq "topusers"}
				<li class="current_page_item"><a href='{$URL_topusers}'> {#PLIGG_Visual_Top_Users#}</a></li>
                {else}
				<li><a href='{$URL_topusers}'> {#PLIGG_Visual_Top_Users#}</a></li>
                {/if}
				{if $Enable_Tags eq 'true'}
                {if $pagename eq "cloud"}
                <li class="current_page_item"><a href="{$URL_tagcloud}">{#PLIGG_Visual_Tags#}</a></li>
                {else}
                <li><a href="{$URL_tagcloud}">{#PLIGG_Visual_Tags#}</a></li>
                {/if}
                {/if}
			{/if}
	</ul>
</div>
<!-- end menu -->

<br/>
{checkActionsTpl location="tpl_banner_location_main"}

<div id="cab">
	<ul>
		{if $pagename eq "upcoming"}
		    <li><a href="{$my_base_url}{$my_pligg_base}" class="navbut3"><span>{#PLIGG_Visual_Published_News#}</span></a></li>
		    <li><a href="{$URL_upcoming}" class="navbut4"><span>{#PLIGG_Visual_Pligg_Queued#}</span></a></li>
		    <li><a href="{$URL_submit}" class="navbut3"><span>{#PLIGG_Visual_Submit_A_New_Story#}</span></a></li>
		{elseif $pagename eq "published"}
		    <li><a href="{$my_base_url}{$my_pligg_base}" class="navbut4"><span>{#PLIGG_Visual_Published_News#}</span></a></li>
		    <li><a href="{$URL_upcoming}" class="navbut3"><span>{#PLIGG_Visual_Pligg_Queued#}</span></a></li>
		    <li><a href="{$URL_submit}" class="navbut3"><span>{#PLIGG_Visual_Submit_A_New_Story#}</span></a></li>
		{elseif $pagename eq "submit"}
		    <li><a href="{$my_base_url}{$my_pligg_base}" class="navbut3"><span>{#PLIGG_Visual_Published_News#}</span></a></li>
		    <li><a href="{$URL_upcoming}" class="navbut3"><span>{#PLIGG_Visual_Pligg_Queued#}</span></a></li>
		    <li><a href="{$URL_submit}" class="navbut4"><span>{#PLIGG_Visual_Submit_A_New_Story#}</span></a></li>
		{else}
	    	<li><a href="{$my_base_url}{$my_pligg_base}" class="navbut3"><span>{#PLIGG_Visual_Published_News#}</span></a></li>
		    <li><a href="{$URL_upcoming}" class="navbut3"><span>{#PLIGG_Visual_Pligg_Queued#}</span></a></li>
		    <li><a href="{$URL_submit}" class="navbut3"><span>{#PLIGG_Visual_Submit_A_New_Story#}</span></a></li>   
		{/if}
	</ul>
</div>

<div id="navbar">
	<ul>
		<li>
			<a href = "{$my_base_url}{$my_pligg_base}">{#PLIGG_Visual_Breadcrumb_SiteName#} {#PLIGG_Visual_Breadcrumb_Home#}</a>
			{if $navbar_where.link1 neq ""} &#187; <a href="{$navbar_where.link1}">{$navbar_where.text1}</a>{elseif $navbar_where.text1 neq ""} &#187; {$navbar_where.text1}{/if}
			{if $navbar_where.link2 neq ""} &#187; <a href="{$navbar_where.link2}">{$navbar_where.text2}</a>{elseif $navbar_where.text2 neq ""} &#187; {$navbar_where.text2}{/if}      	
			{if $navbar_where.link3 neq ""} &#187; <a href="{$navbar_where.link3}">{$navbar_where.text3}</a>{elseif $navbar_where.text3 neq ""} &#187; {$navbar_where.text3}{/if}      	
			{if $navbar_where.link4 neq ""} &#187; <a href="{$navbar_where.link4}">{$navbar_where.text4}</a>{elseif $navbar_where.text4 neq ""} &#187; {$navbar_where.text4}{/if}
		</li>      	
	</ul> 
			 	   
	<ul id="sorts">
		<li>
			{if $pagename eq "upcoming"}
				<strong>
				{if !isset($templatelite.get.category)}
					{#PLIGG_Visual_Pligg_Sort_News_By#}:
				{else}
					{#PLIGG_Visual_Pligg_Queued_Sort#} {$category} {#PLIGG_Visual_Pligg_Queued_Sort_By#}:
				{/if}
				</strong>
				{if !isset($paorder)}
					{ assign var="paorder" value=""" }
				{/if}
				{if $paorder eq "" || $paorder eq "newest"}{#PLIGG_Visual_Pligg_Newest_St#}{else}<a href="{$upcoming_url_newest}">{#PLIGG_Visual_Pligg_Newest_St#}</a>{/if} | 
				{if $paorder eq "oldest"}{#PLIGG_Visual_Pligg_Oldest_St#}{else}<a href="{$upcoming_url_oldest}">{#PLIGG_Visual_Pligg_Oldest_St#}</a>{/if} | 
				{if $paorder eq "mostpopular"}{#PLIGG_Visual_Pligg_Most_Pop#}{else}<a href="{$upcoming_url_mostpopular}">{#PLIGG_Visual_Pligg_Most_Pop#}</a>{/if} | 
				{if $paorder eq "leastpopular"}{#PLIGG_Visual_Pligg_Least_Pop#}{else}<a href="{$upcoming_url_leastpopular}">{#PLIGG_Visual_Pligg_Least_Pop#}</a>{/if} |
				<a href="{$URL_rssqueued}" target="_blank"><img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" align="top" alt="RSS" /></a>
			{elseif $pagename neq "story"}
				{if $Voting_Method eq 1}
				<strong>
				{if !isset($templatelite.get.category)}
					{#PLIGG_Visual_Pligg_Sort_News_By#}:
				{else}
					{#PLIGG_Visual_Pligg_Queued_Sort#} {$category} {#PLIGG_Visual_Pligg_Queued_Sort_By#}:
				{/if}
				</strong>
				{if !isset($setmeka)}
					{ assign var="setmeka" value=""" }
				{/if}
				{if $setmeka eq "" || $setmeka eq "recent"}{#PLIGG_Visual_Recently_Pop#}{else}<a href="{$index_url_recent}">{#PLIGG_Visual_Recently_Pop#}</a>{/if} | 
				{if $setmeka eq "today"}{#PLIGG_Visual_Top_Today#}{else}<a href="{$index_url_today}">{#PLIGG_Visual_Top_Today#}</a>{/if} | 
				{if $setmeka eq "yesterday"}{#PLIGG_Visual_Yesterday#}{else}<a href="{$index_url_yesterday}">{#PLIGG_Visual_Yesterday#}</a>{/if} | 
				{if $setmeka eq "week"}{#PLIGG_Visual_This_Week#}{else}<a href="{$index_url_week}">{#PLIGG_Visual_This_Week#}</a>{/if} | 
				{if $setmeka eq "month"}{#PLIGG_Visual_This_Month#}{else}<a href="{$index_url_month}">{#PLIGG_Visual_This_Month#}</a>{/if} | 
				{if $setmeka eq "year"}{#PLIGG_Visual_This_Year#}{else}<a href="{$index_url_year}">{#PLIGG_Visual_This_Year#}</a>{/if} | 
			{/if}
				<a href="{$URL_rss}" target="_blank"><img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" align="top" alt="RSS" /></a>
			{/if}
		</li>
	</ul>
</div>

<!-- START HEADER.TPL -->
<div id="login">
	{if $user_authenticated eq true}{#PLIGG_Visual_Welcome_Back#} <span style="text-transform:capitalize"><a href="{$URL_userNoVar}">{$user_logged_in}</a></span> | <a href="{$URL_logout}"> {#PLIGG_Visual_Logout#}</a>{/if}
	
	{if $user_authenticated neq true}<a href='{$URL_register}'>{#PLIGG_Visual_Register#}</a> | <a href='{$URL_login}'>{#PLIGG_Visual_Login_Title#}</a>{/if}
</div>

<div id="logo"><a href="http://www.tuodio.com.ar"><img src="http://www.tuodio.com.ar/templates/wistie/images/banner.jpg" border="0" alt="Banner"></a></div>
<!--<div id="logo"><a href="http://www.tuodio.com.ar"><img src="http://i238.photobucket.com/albums/ff285/gns_cab/bannerfans_5342758-2.png" border="0" alt="Tu Odio LOGO 3"></a></div>-->
<!--<div id="logo"><a href="{$my_base_url}{$my_pligg_base}">{#PLIGG_Visual_Name#}</a></div>-->

<!-- START SEARCH -->
<div class="search">
	{if isset($templatelite.get.search)}
		{assign var=searchboxtext value=$templatelite.get.search|sanitize:2}
	{else}
		{assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}			
	{/if}

	<form action="{$my_pligg_base}/search.php" method="get" name="thisform-search" id="thisform-search"
		{php}
		global $URLMethod, $my_base_url, $my_pligg_base;
		if ($URLMethod==2) print "onsubmit='document.location.href=\"{$my_base_url}{$my_pligg_base}/search/\"+this.search.value; return false;'";
		{/php}
		>

		<input type="text" size="20" class="searchfield" name="search" id="searchsite" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}"/>
		<input type="submit" value="{#PLIGG_Visual_Search_Go#}" class="searchbutton" />
	</form>
</div>
<div class="clear"></div>
<!-- END SEARCH -->

<!-- START NAVBAR -->
<ul id="nav">
	{checkActionsTpl location="tpl_pligg_navbar_start"}
	<li {if $pagename eq "published" || $pagename eq "index"}class="current"{/if}><a href='{$my_base_url}{$URL_base}'>{#PLIGG_Visual_Published_News#}</a></li>
	<!--<li {if $pagename eq "upcoming"}class="current"{/if}><a href="{$URL_upcoming}">{#PLIGG_Visual_Pligg_Queued#}</a></li>-->
	<li {if $pagename eq "submit"}class="current"{/if}><a href="{$URL_submit}">{#PLIGG_Visual_Submit_A_New_Story#}</a></li>
	{if $enable_group eq "true"}	
		<li {if $pagename eq "groups" || $pagename eq "submit_groups" || $pagename eq "group_story"}class="current"{/if}><a href="{$URL_groups}"><span>{#PLIGG_Visual_Groups#}</span></a></li>
	{/if}	
	{if $user_authenticated eq true}<li {if $pagename eq "user"}class="current"{/if}><a href="{$URL_userNoVar}"><span>{#PLIGG_Visual_Profile#}</span></a></li>{/if}
	{if isset($isgod) && $isgod eq 1}<li><a href="{$URL_admin}"><span>{#PLIGG_Visual_Header_AdminPanel#}</span></a></li>{/if}
	{checkActionsTpl location="tpl_pligg_navbar_end"}
</ul>
{assign var=sidebar_module value="categories"}{include file=$the_template_sidebar_modules."/wrapper.tpl"}
<!-- END NAVBAR -->

<!-- START RSS -->
<div class="rsslink">
	<label>Seguinos en:  </label>
	<a href="http://www.facebook.com/pages/TuOdiocomar/302150954228" target="_blank"><img src="{$my_pligg_base}/templates/{$the_template}/images/Facebook-icon-small.png" align="top" border="0" alt="Facebook" /></a>
	<a href="http://twitter.com/tuodio" target="_blank"><img src="{$my_pligg_base}/templates/{$the_template}/images/Twitter-icon-small.png" align="top" border="0" alt="Twitter" /></a>
</div>
<!-- END RSS -->

<!-- START BREADCRUMBS -->
{if $pagename eq "submit_groups"}<h1>{#PLIGG_Visual_Submit_A_New_Group#}</h1>{/if}
{if $pagename eq "groups"}<h1>{#PLIGG_Visual_Groups#}</h1>{/if}
{if $pagename eq "group_story" }<h1>{$group_name}</h1>{/if}
{if $pagename eq "login"}<h1>{#PLIGG_Visual_Login#}</h1>{/if}
{if $pagename eq "register"}<h1>{#PLIGG_Visual_Register#}</h1>{/if}
{if $pagename eq "editlink"}<h1>{#PLIGG_Visual_EditStory_Header#}: {$submit_url_title}</h1>{/if}
{if $pagename eq "rssfeeds"}<h1>{#PLIGG_Visual_RSS_Feeds#}</h1>{/if}
{if $pagename eq "topusers"}<h1>{#PLIGG_Visual_TopUsers_Statistics#}</h1>{/if}
{if $pagename eq "cloud"}<h1>{#PLIGG_Visual_Tags_Tags#}</h1>{/if}
{if $pagename eq "live" || $pagename eq "live_unpublished" || $pagename eq "live_published" || $pagename eq "live_comments"}<h1>{#PLIGG_Visual_Live#}</h1>{/if}
{if $pagename eq "advancedsearch"}<h1>{#PLIGG_Visual_Search_Advanced#}</h1>{/if}
{if $pagename eq "profile"}<h1>{#PLIGG_Visual_Profile_ModifyProfile#}</h1>{/if}
{if $pagename eq "user"}<h1><span style="text-transform:capitalize">{$page_header}</span> </h1>{/if}

{if $pagename eq "published" || $pagename eq "index"}<h1>{#PLIGG_Visual_Published_News#}{/if}
{if $pagename eq "upcoming"}<h1>{#PLIGG_Visual_Pligg_Queued#}{/if}
{if isset($templatelite.get.search)}<h1>{#PLIGG_Visual_Search_SearchResults#} {$templatelite.get.search|sanitize:2|stripslashes}{/if}
{if isset($templatelite.get.q)}<h1>{#PLIGG_Visual_Search_SearchResults#} {$templatelite.get.q|sanitize:2|stripslashes}{/if} 
{if $pagename eq "index" || $pagename eq "published" || $pagename eq "upcoming" || isset($templatelite.get.search) || isset($templatelite.get.q)}
	{if isset($navbar_where.link2) && $navbar_where.link2 neq ""} &#187; <a href="{$navbar_where.link2}">{$navbar_where.text2}</a>{elseif isset($navbar_where.text2) && $navbar_where.text2 neq ""} &#187; {$navbar_where.text2}{/if}
	{if isset($navbar_where.link3) && $navbar_where.link3 neq ""} &#187; <a href="{$navbar_where.link3}">{$navbar_where.text3}</a>{elseif isset($navbar_where.text3) && $navbar_where.text3 neq ""} &#187; {$navbar_where.text3}{/if}
	{if isset($navbar_where.link4) && $navbar_where.link4 neq ""} &#187; <a href="{$navbar_where.link4}">{$navbar_where.text4}</a>{elseif isset($navbar_where.text4) && $navbar_where.text4 neq ""} &#187; {$navbar_where.text4}{/if}
	</h1>
{/if}
<!-- END BREADCRUMBS -->

{checkActionsTpl location="tpl_pligg_breadcrumb_end"}
<!-- END HEADER.TPL -->
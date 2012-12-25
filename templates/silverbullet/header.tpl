<div class="head">
<a href="{$my_base_url}{$my_pligg_base}"><img src="{$my_pligg_base}/templates/{$the_template}/images/logo.jpg"  alt="logo"/></a>
<ul class="tabs">
<li {if $pagename eq "published"}class="navbut4"{/if}><a href="{$my_base_url}{$my_pligg_base}"><b>{#PLIGG_Visual_Published_News#}</b></a></li>
<li {if $pagename eq "upcoming"}class="navbut4"{/if}><a href="{$URL_upcoming}"><b>{#PLIGG_Visual_Pligg_Queued#}</b></a></li>
<li {if $pagename eq "submit"}class="navbut4"{/if}><a href="{$URL_submit}"><b>Submit New Story</b></a></li>
</ul>
</div>
<div class="topbar"><ul><li>
	<a href='{$my_base_url}{$my_pligg_base}'>{#PLIGG_Visual_Home#}</a> 
	{if $Enable_Live eq 'false'} <a href='{$URL_live}'> {#PLIGG_Visual_Live#}</a> {/if}
	<a href='{$URL_topusers}'> {#PLIGG_Visual_Top_Users#}</a> 
	{if $Enable_Tags eq 'true'}<a href="{$URL_tagcloud}">{#PLIGG_Visual_Tags#}</a> {/if}
	{if $user_authenticated neq true}
	<a href='{$URL_login}' class="color">{#PLIGG_Visual_Login_Title#}</a> 
	<a href='{$URL_register}' class="color">{#PLIGG_Visual_Register#}</a> 
	{/if}
	{if $user_authenticated eq true}
	{if isset($isgod) && $isgod eq 1} <a href="{$URL_admin}" class="color"> {#PLIGG_Visual_Header_AdminPanel#}</a>{/if}		
	<a href="{$URL_userNoVar}" class="color"> {#PLIGG_Visual_Profile#}</a> 
	<a href="{$URL_logout}" class="color"> {#PLIGG_Visual_Logout#}</a>
	{checkActionsTpl location="tpl_sidebar_logged_in_just_below_profile"} 
	{/if}
	
	{if $pagename eq "upcoming"}
	<a href="{$URL_rssqueued}" target="_blank" class="rss"><img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" alt="RSS" /></a>
	{else}
	<a href="{$URL_rss}" target="_blank" class="rss"><img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" alt="RSS" /></a>
	{/if}</li></ul>
</div>

<div class="topsearch">
<div class="right_float">


{if isset($templatelite.get.search)}
			{assign var=searchboxtext value=$templatelite.get.search|sanitize:2}
		{else}
			{assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}			
		{/if}
	
		{if $SearchMethod eq 4}
			<!-- SiteSearch Google -->
			<form method="get" action="{$my_base_url}{$my_pligg_base}/search.php" target="_top">
				<label for="sbi" style="display: none">"{$searchboxtext}</label>
				<input name="q" class="searchfield" type="text" size="15" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}" />
				<label for="sbb" style="display: none">{#PLIGG_Visual_Search_Go#}</label>
				<input type="submit" class="go" name="sa" value="" />

				<input type="hidden" name="sitesearch" value="{$my_base_url}{$my_pligg_base}" id="ss1"></input>

				<input type="hidden" name="flav" value="0002"></input>
				<input type="hidden" name="client" value="pub-7688534628068296"></input>
				<input type="hidden" name="forid" value="1"></input>
				<input type="hidden" name="ie" value="ISO-8859-1"></input>
				<input type="hidden" name="oe" value="ISO-8859-1"></input>
				<input type="hidden" name="cof" value="GALT:#008000;GL:1;DIV:#336699;VLC:663399;AH:center;BGC:FFFFFF;LBGC:336699;ALC:0000FF;LC:0000FF;T:000000;GFNT:0000FF;GIMP:0000FF;FORID:11"></input>
				<input type="hidden" name="hl" value="en"></input>
			</form>
			<!-- SiteSearch Google -->				
		{else}
			<form action="{$my_pligg_base}/search.php" method="get" name="thisform-search" id="thisform-search">
				<input type="text" size="15" name="search" class="searchfield" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}"/>
				<input type="submit" value="" class="go" />
			</form>
		{/if}

</div>
</div>
{config_load file="/languages/lang_".$pligg_language.".conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		{include file="meta.tpl"}
		<link rel="stylesheet" type="text/css" href="{$my_pligg_base}/templates/{$the_template}/css/s_blue.css" media="screen" />

		{if $Voting_Method eq 2}
		<link rel="stylesheet" type="text/css" href="{$my_pligg_base}/templates/{$the_template}/css/star_rating/star.css" media="screen" />
		{/if}

		{* this is an IE6 specific 'hack' for the png icons mainly admin pages template *}
		<!--[if lte IE 6]>
			<script type="text/javascript">
				if (typeof blankImg == 'undefined') var blankImg = '{$my_pligg_base}/templates/{$the_template}/images/blank.gif';
			</script>
			<style type="text/css" media="screen">
				body {ldelim}behavior:url({$my_pligg_base}/templates/{$the_template}/css/iehfix.htc); {rdelim}
				img {ldelim}behavior:url({$my_pligg_base}/templates/{$the_template}/css/iepngfix.htc); {rdelim}
			</style>	
		<![endif]-->

		{checkActionsTpl location="tpl_pligg_pre_title_thickbox"}
	
		{checkForCss}
		{checkForJs}		
	
		{checkActionsTpl location="tpl_pligg_pre_title_lightbox"}

		{if $pagename neq "published" && $pagename neq "upcoming"}
			{if $Spell_Checker eq 1}			
				<script src="{$my_pligg_base}/3rdparty/speller/spellChecker.js" type="text/javascript"></script>
			{/if}
		{/if}	

		<title>{if isset($pretitle)}{$pretitle}{/if}{#PLIGG_Visual_Name#}{if isset($posttitle)}{$posttitle}{/if}</title>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="{$my_base_url}{$my_pligg_base}/rss.php"/>
		<link rel="icon" href="{$my_pligg_base}/favicon.ico" type="image/x-icon"/>	
	</head>

	<body {$body_args}>
	
		<div id="wrap">
		
				{include file=$tpl_header.".tpl"}
			
			<div id="content-wrap2">  
			
				<div id="contentbox" {if $pagename eq "editor"}style="width:100%"{/if}>			
					
					{if strstr($pagename, 'admin_')}			
			<a href = "{$my_base_url}{$my_pligg_base}">{#PLIGG_Visual_Breadcrumb_SiteName#} {#PLIGG_Visual_Breadcrumb_Home#}</a>
			{if $navbar_where.link1 neq ""} &#187; <a href="{$navbar_where.link1}">{$navbar_where.text1}</a>{elseif $navbar_where.text1 neq ""} &#187; {$navbar_where.text1}{/if}
			{if $navbar_where.link2 neq ""} &#187; <a href="{$navbar_where.link2}">{$navbar_where.text2}</a>{elseif $navbar_where.text2 neq ""} &#187; {$navbar_where.text2}{/if}      	
			{if $navbar_where.link3 neq ""} &#187; <a href="{$navbar_where.link3}">{$navbar_where.text3}</a>{elseif $navbar_where.text3 neq ""} &#187; {$navbar_where.text3}{/if}      	
			{if $navbar_where.link4 neq ""} &#187; <a href="{$navbar_where.link4}">{$navbar_where.text4}</a>{elseif $navbar_where.text4 neq ""} &#187; {$navbar_where.text4}{/if}
					{/if}	
					
					{checkActionsTpl location="tpl_pligg_above_center"}
					{include file=$tpl_center.".tpl"}
					{checkActionsTpl location="tpl_pligg_below_center"}
				</div>
				
				<div id="sidebar">
					{if $pagename neq "editor"}{include file=$tpl_right_sidebar.".tpl"}{/if}
				</div>

			</div>
		       	
		

		{include file=$tpl_footer.".tpl"}
</div>
		<script src="{$my_pligg_base}/js/xmlhttp.php" type="text/javascript"></script> {* this line HAS to be towards the END of pligg.tpl *}
			
	</body>
</html>

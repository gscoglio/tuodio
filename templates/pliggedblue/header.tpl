<div id="header">
<h1><a href="{$my_base_url}{$my_pligg_base}">{#PLIGG_Visual_Name#}</a></h1>
<h2>By Social CMS Buzz</h2>
</div>

<div id="menu">
<ul>
{if $user_authenticated eq true}
        {if isset($isgod) && $isgod eq 1} <li><a href="{$URL_admin}"> {#PLIGG_Visual_Header_AdminPanel#}</a></li>{/if}
        <li><a href='{$my_base_url}{$my_pligg_base}'>{#PLIGG_Visual_Published_News#}</a></li>
        <li><a href='{$URL_upcoming}'>{#PLIGG_Visual_Pligg_Queued#}</a></li>
        <li><a href='{$URL_submit}'>{#PLIGG_Visual_Submit_A_New_Story#}</a></li>
        <li><a href="{$URL_userNoVar}"> {#PLIGG_Visual_Profile#}</a></li>
        {checkActionsTpl location="tpl_sidebar_logged_in_just_below_profile"}
        {if $Enable_Live eq 'false'} <li><a href='{$URL_live}'> {#PLIGG_Visual_Live#}</a></li>{/if}
        <li><a href='{$URL_topusers}'> {#PLIGG_Visual_Top_Users#}</a></li>
        {if $Enable_Tags eq 'true'}<li><a href="{$URL_tagcloud}">{#PLIGG_Visual_Tags#}</a></li>{/if}
        <li><a href="{$URL_logout}"> {#PLIGG_Visual_Logout#}</a></li>
{else}
        <li><a href='{$my_base_url}{$my_pligg_base}'>{#PLIGG_Visual_Published_News#}</a></li>
        <li><a href='{$URL_upcoming}'>{#PLIGG_Visual_Pligg_Queued#}</a></li>
        <li><a href='{$URL_submit}'>{#PLIGG_Visual_Submit_A_New_Story#}</a></li>
        <li><a href='{$URL_login}'>{#PLIGG_Visual_Login_Title#}</a></li>
        <li><a href='{$URL_register}'>{#PLIGG_Visual_Register#}</a></li>
        {if $Enable_Live eq 'false'} <li><a href='{$URL_live}'> {#PLIGG_Visual_Live#}</a></li>{/if}
        <li><a href='{$URL_topusers}'> {#PLIGG_Visual_Top_Users#}</a></li>
        {if $Enable_Tags eq 'true'}<li><a href="{$URL_tagcloud}">{#PLIGG_Visual_Tags#}</a></li>{/if}
{/if}
</ul>
</div>
{if $amIgod eq 1}
 <fieldset><legend>{#PLIGG_Visual_Header_AdminPanel_Main#}</legend>
        <table style="border:none">
                        <tr><th>{#PLIGG_Visual_Header_AdminPanel_Main#}</th><th colspan="2">Statistics</th></tr>
                        <tr><td>
                                <img src="{$my_pligg_base}/templates/{$the_template}/images/manage_user.png" align="absmiddle"/> <a href="{$my_pligg_base}/admin_users.php">{#PLIGG_Visual_Header_AdminPanel_1#}</a><br/>
                                <img src="{$my_pligg_base}/templates/{$the_template}/images/manage_cat.png" align="absmiddle"/> <a href="{$my_pligg_base}/admin_categories.php">{#PLIGG_Visual_Header_AdminPanel_2#}</a><br/>
                                <img src="{$my_pligg_base}/templates/{$the_template}/images/news_manage.png" align="absmiddle"/> <a href="{$my_pligg_base}/admin_links.php">{#PLIGG_Visual_Header_AdminPanel_Links#}</a><br/>
                                <img src="{$my_pligg_base}/templates/{$the_template}/images/user_comments.png" align="absmiddle"/> <a href="{$my_pligg_base}/admin_comments.php">{#PLIGG_Visual_Header_AdminPanel_Comments#}</a><br/>
                                {checkActionsTpl location="tpl_header_admin_main_links"}
                                <img src="{$my_pligg_base}/templates/{$the_template}/images/manage_backup.png" align="absmiddle"/> <a href="{$my_pligg_base}/admin_backup.php">{#PLIGG_Visual_Header_AdminPanel_4#}</a><br/>
                                <img src="{$my_pligg_base}/templates/{$the_template}/images/manage_mods.png" align="absmiddle"/> <a href="{$my_pligg_base}/admin_modules.php">{#PLIGG_Visual_Header_AdminPanel_6#}</a><br/>
                                <img src="{$my_pligg_base}/templates/{$the_template}/images/manage_config.png" align="absmiddle"/> <a href="{$my_pligg_base}/admin_config.php">{#PLIGG_Visual_Header_AdminPanel_5#} {#PLIGG_Visual_Name#}</a><br/>
                                <img src="{$my_pligg_base}/templates/{$the_template}/images/template_edit.png" align="absmiddle"/> <a href="{$my_pligg_base}/admin_editor.php">{#PLIGG_Visual_Header_AdminPanel_Editor#} </a><br/>
                                <img src="{$my_pligg_base}/templates/{$the_template}/images/paypal.gif" align="absmiddle"/> <a href="http://socialcmsbuzz.com/" target="_blank">Support This Template</a>
                        </td>
                        <td>
                                <strong>
                                Pligg version:<br/>
                                Current Members:<br/>
                                Total Links:<br/>
                                Published:<br/>
                                Upcoming:<br/>
                                Votes:<br/>
                                Comments:
                                <hr/>
                                Latest submission: <br/>
                                Latest comment: <br/>
                                Newest Member:
                                </strong>
                        </td>
                        <td>
                                {$version_number}<br/>
                                {$members}<br/>
                                {$total}<br/>
                                {$published}<br/>
                                {$queued}<br/>
                                {$votes}<br/>
                                {$comments}
                                <hr/>
                                <a href="{$URL_story, $link_id}">{$link_date}</a> <br/>
                                <a href="{$URL_story, $link_id}#c{$comment_id}">{if isset($comment_date)}{$comment_date}{/if}</a> <br/>
                                <a href="{$URL_user, $last_user}">{$last_user}</a>
                        </td>
                        </tr>

        </table>
</fieldset>
{else}
        {#PLIGG_Visual_Header_AdminPanel_NoAccess#}
{/if}
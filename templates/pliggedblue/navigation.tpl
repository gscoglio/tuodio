{checkActionsTpl location="tpl_banner_location_main"}

        <div id="navbar2">
                        <a href = "{$my_base_url}{$my_pligg_base}">{#PLIGG_Visual_Breadcrumb_SiteName#} {#PLIGG_Visual_Breadcrumb_Home#}</a>
                        {if $navbar_where.link1 neq ""} &#187; <a href="{$navbar_where.link1}">{$navbar_where.text1}</a>{elseif $navbar_where.text1 neq ""} &#187; {$navbar_where.text1}{/if}
                        {if $navbar_where.link2 neq ""} &#187; <a href="{$navbar_where.link2}">{$navbar_where.text2}</a>{elseif $navbar_where.text2 neq ""} &#187; {$navbar_where.text2}{/if}
                        {if $navbar_where.link3 neq ""} &#187; <a href="{$navbar_where.link3}">{$navbar_where.text3}</a>{elseif $navbar_where.text3 neq ""} &#187; {$navbar_where.text3}{/if}
                        {if $navbar_where.link4 neq ""} &#187; <a href="{$navbar_where.link4}">{$navbar_where.text4}</a>{elseif $navbar_where.text4 neq ""} &#187; {$navbar_where.text4}{/if}
        </div>
{if $pagename eq "published" || $pagename eq "upcoming"}
        <div id="sorts">
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
                                {if $paorder eq "" || $paorder eq "newest"}{#PLIGG_Visual_Pligg_Newest_St#}{else}<a href="{$upcoming_url_newest}"><span>{#PLIGG_Visual_Pligg_Newest_St#}<span></a>{/if} |
                                {if $paorder eq "oldest"}{#PLIGG_Visual_Pligg_Oldest_St#}{else}<a href="{$upcoming_url_oldest}">{#PLIGG_Visual_Pligg_Oldest_St#}</a>{/if} |
                                {if $paorder eq "mostpopular"}{#PLIGG_Visual_Pligg_Most_Pop#}{else}<a href="{$upcoming_url_mostpopular}">{#PLIGG_Visual_Pligg_Most_Pop#}</a>{/if} |
                                {if $paorder eq "leastpopular"}{#PLIGG_Visual_Pligg_Least_Pop#}{else}<a href="{$upcoming_url_leastpopular}">{#PLIGG_Visual_Pligg_Least_Pop#}</a>{/if} |
                                <a href="#" target="_blank"><img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" align="top" alt="RSS" /></a>
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
                                <a href="#" target="_blank"><img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" align="top" alt="RSS" /></a>
                        {elseif $pagename eq "story"}
                         <br />
                        {/if}

        </div>
{/if}
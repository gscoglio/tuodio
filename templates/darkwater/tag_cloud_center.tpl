<h2>{#PLIGG_Visual_Tags_Tags#}</h2>

<div id="cab" style="float:right; margin-top:-38px;">
        <ul>
                {section name=i start=0 loop=$count_range_values step=1}
                        {if $templatelite.section.i.index eq $current_range}
                                <li><a href="#" class="navbut4"><span>{$range_names[i]}</span></a></li>
                        {else}
                                <li><a href="{$URL_tagcloud_range, $templatelite.section.i.index}" class="navbut3"><span>{$range_names[i]}</span></a></li>
                        {/if}
                {/section}
        </ul>
</div>

<div style="margin: 20px 15px 20px 15px; line-height: {$tags_max_pts}pt;">
        {section name=customer loop=$tag_number}
                <span style="font-size: {$tag_size[customer]}pt"><a href="{$tag_url[customer]}">{$tag_name[customer]}</a></span>&nbsp;&nbsp;
        {/section}
</div>
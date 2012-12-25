                <h1 id="logo-text"><a href="{$my_base_url}{$my_pligg_base}">{#PLIGG_Visual_Name#}</a></h1>
                <p id="slogan">by Social CMS Buzz</p>

                <div id="header-links">
                {if $pagename eq "upcoming"}
                    <p>
                    <a href="{$my_base_url}{$my_pligg_base}"><span>{#PLIGG_Visual_Published_News#}</a>&nbsp;|&nbsp;
                    <a href="{$URL_upcoming}">{#PLIGG_Visual_Pligg_Queued#}</a>&nbsp;|&nbsp;
                    <a href="{$URL_submit}">{#PLIGG_Visual_Submit_A_New_Story#}</a>&nbsp;|&nbsp;
                    </p>
                {elseif $pagename eq "published"}
                    <p>
                    <a href="{$my_base_url}{$my_pligg_base}">{#PLIGG_Visual_Published_News#}</a>&nbsp;|&nbsp;
                    <a href="{$URL_upcoming}">{#PLIGG_Visual_Pligg_Queued#}</a>&nbsp;|&nbsp;
                    <a href="{$URL_submit}">{#PLIGG_Visual_Submit_A_New_Story#}</a>&nbsp;|&nbsp;
                    </p>
                {elseif $pagename eq "submit"}
                    <p>
                    <a href="{$my_base_url}{$my_pligg_base}">{#PLIGG_Visual_Published_News#}</a>&nbsp;|&nbsp;
                    <a href="{$URL_upcoming}">{#PLIGG_Visual_Pligg_Queued#}</a>&nbsp;|&nbsp;
                    <a href="{$URL_submit}">{#PLIGG_Visual_Submit_A_New_Story#}</a>&nbsp;|&nbsp;
                    </p>
                {else}
                    <p>
                    <a href="{$my_base_url}{$my_pligg_base}">{#PLIGG_Visual_Published_News#}</a>&nbsp;|&nbsp;
                    <a href="{$URL_upcoming}">{#PLIGG_Visual_Pligg_Queued#}</a>&nbsp;|&nbsp;
                    <a href="{$URL_submit}">{#PLIGG_Visual_Submit_A_New_Story#}</a>&nbsp;|&nbsp;
                    </p>
                {/if}
                </div>
                <ul>
                    {if $user_authenticated eq true}

                    {if $pagename eq "admin"}
                        <li id="current">{if $isgod eq 1} <a href="{$URL_admin}" title="Admin">{#PLIGG_Visual_Header_AdminPanel#}</a>{/if}</li>
                    {else}
                        <li>{if $isgod eq 1} <a href="{$URL_admin}" title="Admin">{#PLIGG_Visual_Header_AdminPanel#}</a>{/if}</li>
                    {/if}

                    {if $pagename eq "published"}
                        <li class="current_page_item"><a href='{$my_base_url}{$my_pligg_base}' title="Home">{#PLIGG_Visual_Home#}</a></li>
                    {else}
                        <li><a href='{$my_base_url}{$my_pligg_base}' title="Home">{#PLIGG_Visual_Home#}</a></li>
                    {/if}

                    {if $pagename eq "user" || $pagename eq "profile"}
                        <li class="current_page_item"><a href="{$URL_userNoVar}" title="Profile">{#PLIGG_Visual_Profile#}</a></li>
                    {else}
                        <li><a href="{$URL_userNoVar}" title="Profile">{#PLIGG_Visual_Profile#}</a></li>
                    {/if}

                    {if $pagename eq "live"}
                        <li id="current">{if $Enable_Live eq 'false'} <a href='{$URL_live}' title="Live">{#PLIGG_Visual_Live#}</a>{/if}</li>
                    {else}

                        <li>{if $Enable_Live eq 'false'} <a href='{$URL_live}' title="Live">{#PLIGG_Visual_Live#}</a>{/if}</li>
                    {/if}

                    {if $pagename eq "topusers"}
                        <li id="current"><a href='{$URL_topusers}' title="Top Users">{#PLIGG_Visual_Top_Users#}</a></li>
                    {else}
                        <li><a href='{$URL_topusers}' title="Top Users">{#PLIGG_Visual_Top_Users#}</a></li>
                    {/if}

                    {if $pagename eq "cloud"}
                        <li id="current">{if $Enable_Tags eq 'true'}<a href="{$URL_tagcloud}" title="Tag Cloud">{#PLIGG_Visual_Tags#}</a>{/if}</li>
                    {else}
                        <li>{if $Enable_Tags eq 'true'}<a href="{$URL_tagcloud}" title="Tag Cloud">{#PLIGG_Visual_Tags#}</a>{/if}</li>
                    {/if}

                        <li><a href="{$URL_logout}" title="Logout">{#PLIGG_Visual_Logout#}</a></li>

                {else}

                    {if $pagename eq "published"}
                        <li id="current"><a href='{$my_base_url}{$my_pligg_base}' title="Home">{#PLIGG_Visual_Home#}</a></li>
                    {else}
                        <li><a href='{$my_base_url}{$my_pligg_base}' title="Home">{#PLIGG_Visual_Home#}</a></li>
                    {/if}

                    {if $pagename eq "login"}
                        <li id="current"><a href="{$URL_login}" title="Login">{#PLIGG_Visual_Login_Title#}</a></li>
                    {else}
                        <li><a href="{$URL_login}" title="Login">{#PLIGG_Visual_Login_Title#}</a></li>
                    {/if}

                    {if $pagename eq "register"}
                        <li id="current"><a href='{$URL_register}' title="Register">{#PLIGG_Visual_Register#}</a></li>
                    {else}
                        <li><a href='{$URL_register}' title="Register">{#PLIGG_Visual_Register#}</a></li>
                    {/if}

                    {if $pagename eq "live"}
                        <li id="current">{if $Enable_Live eq 'false'} <a href='{$URL_live}' title="Live">{#PLIGG_Visual_Live#}</a>{/if}</li>
                    {else}

                        <li>{if $Enable_Live eq 'false'} <a href='{$URL_live}' title="Live">{#PLIGG_Visual_Live#}</a>{/if}</li>
                    {/if}

                    {if $pagename eq "topusers"}
                        <li id="current"><a href='{$URL_topusers}' title="Top Users">{#PLIGG_Visual_Top_Users#}</a></li>
                    {else}
                        <li><a href='{$URL_topusers}' title="Top Users">{#PLIGG_Visual_Top_Users#}</a></li>
                    {/if}

                    {if $pagename eq "cloud"}
                        <li id="current">{if $Enable_Tags eq 'true'}<a href="{$URL_tagcloud}" title="Tag Cloud">{#PLIGG_Visual_Tags#}</a>{/if}</li>
                    {else}
                        <li>{if $Enable_Tags eq 'true'}<a href="{$URL_tagcloud}" title="Tag Cloud">{#PLIGG_Visual_Tags#}</a>{/if}</li>
                    {/if}
                {/if}
                </ul>
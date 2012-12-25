<h2>Search Box</h2>
                {if isset($templatelite.get.search)}
                        {assign var=searchboxtext value=$templatelite.get.search|sanitize:2}
                {else}
                        {assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}
                {/if}

                {if $SearchMethod eq 4}
                        <!-- SiteSearch Google -->
                        <form method="get" action="{$my_base_url}{$my_pligg_base}/search.php" target="_top">
                                <label for="sbi" style="display: none">"{$searchboxtext}</label>
                                <input name="q" type="text" size="15" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}" />
                                <label for="sbb" style="display: none">{#PLIGG_Visual_Search_Go#}</label>
                                <input type="submit" name="sa" value="{#PLIGG_Visual_Search_Go#}" />

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
                        <form action="{$my_pligg_base}/search.php" class="searchform" method="get" name="thisform-search" id="thisform-search">
                                <input type="text" class="textbox" name="search" id="searchsite" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}"/>
                                <input type="submit" value="{#PLIGG_Visual_Search_Go#}" class="button" />
                        </form>
                {/if}
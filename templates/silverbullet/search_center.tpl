{if isset($templatelite.get.search)}
	<h2>{#PLIGG_Visual_Search_SearchResults#} {$templatelite.get.search|sanitize:2|stripslashes}</h2>
{/if}
{if isset($templatelite.get.q)}
	<h2>{#PLIGG_Visual_Search_SearchResults#} {$templatelite.get.q|sanitize:2|stripslashes}</h2>
{/if}

{if $SearchMethod eq 4}

	<!-- Google Search Result Snippet Begins -->
	<div id="googleSearchUnitIframe"></div>
	
	<script type="text/javascript">
	   var googleSearchIframeName = 'googleSearchUnitIframe';
	   var googleSearchFrameWidth = 600;
	   var googleSearchFrameborder = 0 ;
	   var googleSearchDomain = 'www.google.com';
	</script>
	<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
	
	<!-- Google Search Result Snippet Ends -->
	
{else}

	{$link_summary_output}
	<br /><br />
	{$search_pagination}

{/if}

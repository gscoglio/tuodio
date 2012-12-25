<?php
//$tag_url[customer] = str_replace('/story.php?search=','',$tag_url[customer]);
//$tag_url[customer] = str_replace('tag=true','',$tag_url[customer]);
//$tag_url[customer] = '/tag/' . $tag_url[customer] . '.html';
?>

<div class="pagewrap" style="line-height:{$tags_max_pts}pt;">
	{section name=customer loop=$tag_number}
		<span style="font-size: {$tag_size[customer]}pt"><a href="{$tag_url[customer]}">{$tag_name[customer]}</a></span>&nbsp;&nbsp;
	{/section}
</div>

<div class="tlb">
	{php}
		echo "<span><a onclick=\"new Effect.toggle('s1','blind', {queue: 'end'}); \"> <img src=\"".my_pligg_base."/templates/".The_Template."/images/expand.png\" ></a></span>";
	{/php}
	<a href="{$URL_about}">{#PLIGG_Visual_What_Is_Pligg#}</a>
</div>

<div id="s1">
	<div class="tog">{#PLIGG_Visual_What_Is_Pligg_Text#}</div>
	<li class="rmore"><a href="{$URL_about}">{#PLIGG_Visual_What_Is_Pligg_Read_More#}</a></li>
</div>
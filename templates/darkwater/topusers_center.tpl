<h2>{#PLIGG_Visual_TopUsers_Statistics#}</h2><br/>
<table>
	<tr>

		{foreach from=$headers item=header key=number}
			<th>
				{ if $number eq $templatelite.GET.sortby }
					<span>{$header}</span>
				{ else }
					<a href="?sortby={$number}">{$header}</a>
				{ /if }
			</th>
		{/foreach}

		<th>
			{#PLIGG_Visual_TopUsers_TH_Karma#}
		</th>
	</tr>

	{$users_table}

</table>

<br />

{$topusers_pagination}

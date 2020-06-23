<a href="$Link" class="item blog-post $FirstLast left" title="Read more about '{$Title}'...">

	<div class="liner">

		<div class="inner">

			<h3><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></h3>

			<% if $Summary %>
				$Summary
			<% else %>
				<p>$Excerpt</p>
			<% end_if %>

			<% if $Categories.exists %>
				<% loop $Categories %>
					<span class="tag button no-hover" href="$Link" title="$Title">$Title</span>
				<% end_loop %>
			<% end_if %>
			
		</div>

	</div>

	<div class="readmore">Read more &raquo;</div>

</a>
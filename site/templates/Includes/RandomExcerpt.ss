<% if RandomExcerpt %>
	<div class="excerpt typography">
		<div class="inner">
			<% loop RandomExcerpt %>
				<p>$Content</p>
			<% end_loop %>
		</div>
	</div>
<% end_if %>
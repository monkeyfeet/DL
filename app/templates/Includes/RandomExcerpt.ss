<% if RandomExcerpt %>
	<div class="excerpt typography">
		<div class="inner">
			<div class="dots left">
				<span class="dot small"></span>
				<span class="dot med"></span>
				<span class="dot big"></span>
			</div>
			<% loop RandomExcerpt %>
				<p>$Content</p>
			<% end_loop %>
			<div class="dots right">
				<span class="dot bid"></span>
				<span class="dot med"></span>
				<span class="dot small"></span>
			</div>
		</div>
	</div>
<% end_if %>
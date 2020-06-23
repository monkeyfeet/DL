<p class="blog-post-meta">
	<% if $Categories.exists %>
		Categories: 
		<% loop $Categories %>
			<a class="tag button" href="$Link" title="$Title">$Title</a>
		<% end_loop %>
	<% end_if %>

	<% if $Tags.exists %>
		<%t Blog.Tagged "Tagged" %>
		<% loop $Tags %>
			<a href="$Link" title="$Title">$Title</a><% if not Last %>, <% else %>;<% end_if %>
		<% end_loop %>
	<% end_if %>
</p>

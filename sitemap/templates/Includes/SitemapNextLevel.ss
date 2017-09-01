<% if Children %>
<ul>
	<% loop Children %>
		<% if not ExcludeFromSitemap %>
			<li>
				<a href="$Link" title="{$Title}">$MenuTitle.XML</a>
				<% include SitemapNextLevel %>
			</li>
		<% end_if %>
	<% end_loop %>
</ul>
<% end_if %>
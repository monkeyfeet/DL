<div class="main-content sitemap">

	<% cached 'sitemap', $List('SiteTree').max('LastEdited'), $List('SiteTree').count() %>
	
		<% if Menu(1) %>
			<%-- level 1 --%>
			<ul>
			<% loop Menu(1) %>
				<% if not ExcludeFromSitemap %>
					<li>
						<a href="$Link" title="{$Title}">$MenuTitle.XML</a>
						<% if AllChildren %>
							<% include SitemapNextLevel %>
						<% end_if %>
					</li>
				<% end_if %>
			<% end_loop %>
			</ul>
		<% else %>
		
			<p>There are no pages in this site yet.</p>
			$Content
			$Form
		
		<% end_if %>
	
	<% end_cached %>
	
	<div class="clear"></div>

</div>




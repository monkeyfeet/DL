<?xml version="1.0" encoding="UTF-8"?>

<% cached 'sitemap', $List('SiteTree').max('LastEdited'), $List('SiteTree').count() %>

	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<% if Menu(1) %>
	<% loop Menu(1) %>
		<% if not ExcludeFromSitemap %>
			<url>
				<loc>$AbsoluteLink</loc>
				<lastmod>{$LastEdited.Format(Y-m-d)}T{$LastEdited.Format(H:i:s)}+00:00</lastmod>
			</url>
			<% if AllChildren %>
				<% include XMLSitemapNextLevel %>
			<% end_if %>
		<% end_if %>
	<% end_loop %>
	<% end_if %>
	
	</urlset>

<% end_cached %>
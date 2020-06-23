<section class="page blog cf">

	<div class="inner">

		<div class="main typography col">
			<article>
				<header>
					<h1>$Title</h1>



					<% if $Categories.exists %>
						<% loop $Categories %>
							<% if LinkingMode == 'current' %>
								<span class="tag button $LinkingMode">$Title</span>
							<% else %>
								<a class="tag button $LinkingMode" href="$Link" title="$Title">$Title</a>
							<% end_if %>
						<% end_loop %>
						<a class="tag button $CategoriesLinkingMode" href="$Link" title="All Categories">All Categories</a>
					<% end_if %>
					
				</header>

				$Content
				$Form

				<% if $PaginatedList.Exists %>
					<section class="grid">
					<% loop $PaginatedList %>
						<% include PostSummary %>
					<% end_loop %>
					<div class="clear"></div>
					</section>
				<% else %>
					<h4><%t Blog.NoPosts 'Nothing to see here' %></h4>
				<% end_if %>

				<% with $PaginatedList %>
					<% include Pagination %>
				<% end_with %>

			</article>

		</div>

	</div>

</section>
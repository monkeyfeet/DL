<section class="page blog cf">

	<div class="inner">

		<div class="main typography col">
			<article>
				<header>
					<h1>$Title</h1>

					<% if $ArchiveYear %>
						<h2>
							<%t Blog.Archive 'Archive' %>:
							<% if $ArchiveDay %>
								$ArchiveDate.Nice
							<% else_if $ArchiveMonth %>
								$ArchiveDate.format('F, Y')
							<% else %>
								$ArchiveDate.format('Y')
							<% end_if %>
						</h2>
					<% else_if $CurrentTag %>
						<h2><%t Blog.Tag 'Tag' %>: $CurrentTag.Title</h2>
					<% else_if $CurrentCategory %>
						<h2><%t Blog.Category 'Category' %>: $CurrentCategory.Title</h2>
					<% else %>
						<% if $Categories.exists %>
							<h4>View by category</h4>
							<% loop $Categories %>
								<a class="tag button" href="$Link" title="$Title">$Title</a>
							<% end_loop %>
						<% end_if %>
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
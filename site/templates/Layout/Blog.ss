<section class="page blog cf">

	<div class="inner">

		<div class="main typography col">
			<article>
				<header>
					<h1>
						<% if $ArchiveYear %>
							<%t Blog.Archive 'Archive' %>:
							<% if $ArchiveDay %>
								$ArchiveDate.Nice
							<% else_if $ArchiveMonth %>
								$ArchiveDate.format('F, Y')
							<% else %>
								$ArchiveDate.format('Y')
							<% end_if %>
						<% else_if $CurrentTag %>
							<%t Blog.Tag 'Tag' %>: $CurrentTag.Title
						<% else_if $CurrentCategory %>
							<%t Blog.Category 'Category' %>: $CurrentCategory.Title
						<% else %>
							$Title
						<% end_if %>
					</h1>
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
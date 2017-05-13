<section class="page blog-post cf">

	<div class="inner">

		<div class="main typography col has-sidebar">
			<article>
				<header>
					<h1>$Title</h1>
					<% include EntryMeta %>
				</header>

				<% if $FeaturedImage %>
					<p class="post-image">$FeaturedImage.setWidth(795)</p>
				<% end_if %>
				$Content
				$Form
				
			</article>

		</div>

		<% include BlogSideBar %>

	</div>

</section>

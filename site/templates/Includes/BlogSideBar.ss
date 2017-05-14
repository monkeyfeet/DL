<div class="typography col sidebar">

	<% if $Parent.Categories.exists %>

		<nav class="secondarynav">
			<h4>View articles by category</h4>
			<ul class="menu inner">
				<% loop $Parent.Categories %>
					<li class="menu-item grey-bg<% if First %> first<% end_if %>">
						<a class="$LinkingMode" href="$Link">$Title</a>
					</li>
				<% end_loop %>
				<li class="menu-item grey-bg last">
					<a class="" href="$Parent.Link">All categories</a>
				</li>
			</ul>
		</nav>

	<% end_if %>

	<a class="buy-button white-text" href="#">
		<div class="liner">
			<h3>Buy the book</h3>
			<span class="">Purchase on Amazon now</span>
		</div>
	</a>

</div>
<div class="typography col sidebar">

	<% if $Categories.exists %>

		<nav class="secondarynav">
			<ul class="menu inner">
				<li class="menu-item top">
					<a class="section $FirstLast" href="$Level(1).Link">$Level(1).MenuTitle</a>
				</li>
				<% loop $Categories %>
					<li class="menu-item grey-bg $FirstLast">
						<a class="$LinkingMode $FirstLast" href="$Link">$Title</a>
					</li>
				<% end_loop %>
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
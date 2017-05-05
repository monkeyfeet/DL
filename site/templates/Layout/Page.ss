<section class="page cf">

	<div class="inner">

		<div class="main typography<% if Menu(2) %> col has-sidebar<% end_if %>">
			<article>
				<header>
					<h1>$Title</h1>
				</header>
				$Content
				$Form
			</article>

		</div>

		<% if Menu(2) %>
			<div class="typography col sidebar">

				<nav class="secondarynav">
					<ul class="menu inner">
						<li class="menu-item top">
							<a class="section $FirstLast" href="$Level(1).Link">$Level(1).MenuTitle</a>
						</li>
						<% loop Menu(2) %>
							<li class="menu-item grey-bg $FirstLast">
								<a class="$LinkingMode $FirstLast" href="$Link">$MenuTitle</a>
							</li>
						<% end_loop %>
					</ul>
				</nav>

				<a class="buy-button white-text" href="#">
					<div class="liner">
						<h3>Buy the book</h3>
						<span class="">Purchase on Amazon now</span>
					</div>
				</a>

			</div>
		<% end_if %>

	</div>

</section>
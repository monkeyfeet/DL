<section class="page cf">

	<div class="inner">

		<main class="typography<% if Menu(2) %> col has-sidebar<% end_if %>">
			<article>
				<header>
					<h1>$Title</h1>
				</header>
				$Content
				$Form
			</article>

		</main>

		<% if Menu(2) %>
			<aside class="typography col sidebar">

				<h2>Side bar</h2>

				<nav>
					<% loop Menu(1) %>
						<a href="{$Link}">{$MenuTitle.XML}</a>
					<% end_loop %>
				</nav>

			</aside>
		<% end_if %>

	</div>

</section>
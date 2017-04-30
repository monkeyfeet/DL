<section class="page cf">

	<div class="inner">

		<main class="typography">
			<article>
				<header>
					<h1>$Title</h1>
				</header>
				$Content
				$Form
			</article>

		</main>

		<aside class="typography">

			<h2>Side bar</h2>

			<nav>
				<% loop Menu(1) %>
					<a href="{$Link}">{$MenuTitle.XML}</a>
				<% end_loop %>
			</nav>

		</aside>

	</div>

</section>
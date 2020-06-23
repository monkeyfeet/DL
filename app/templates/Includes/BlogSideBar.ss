<div class="typography col sidebar">

	<% if $Parent.Categories.exists %>

		<nav class="secondarynav">
			<ul class="menu inner">
				<li class="menu-item top">
					<a class="section $FirstLast" href="$Parent.Link">$Parent.MenuTitle</a>
				</li>
				<li class="menu-item grey-bg label first">
					View articles by category
				</li>
				<% loop $Parent.Categories %>
					<li class="menu-item grey-bg">
						<a class="$LinkingMode" href="$Link">$Title</a>
					</li>
				<% end_loop %>
				<li class="menu-item grey-bg last">
					<a class="" href="$Parent.Link">All categories</a>
				</li>
			</ul>
		</nav>

	<% end_if %>

	<div class="buy-button white-text">
		<div class="liner">
			<p>Winner of the</p>
			<span>Ashton Wylie Charitable Trust</span>
			<h3>Literary Awards 2017</h3>
			<span class="">Unpublished Manuscript Category</span>
		</div>
	</div>

	<a class="buy-button red-bg white-text" href="https://www.amazon.com/dp/0473426684/ref=sr_1_3?ie=UTF8&qid=1516916313&sr=8-3&keywords=divine+laziness" target="_blank">
		<div class="liner">
			<h3>Buy the book</h3>
			<span class="white-text">Purchase on Amazon now</span>
		</div>
	</a>

</div>
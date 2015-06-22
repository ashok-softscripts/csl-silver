<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro header-home">
			$Content
			<% if $CustomMenu(home-menu) %>
			<div class="arrows-nav">
				<ul class="arrows-nav__list">
				 <% loop $CustomMenu(home-menu) %>
					<li class="arrows-nav__item"><a class="arrows-nav__link" href="$Link">$MenuTitle.XML</a></li>
					<% if $CountMiddle($TotalItems) == $Pos %></ul><ul class="arrows-nav__list"><% end_if %>
				<% end_loop %>
				</ul>
			</div>
			<% end_if %>			
		</div>
	</div>        	
</header>
<% include HomeFeatures %>

<section class="news latest-news">
	<div class="container">
		<% include FeatureNews %>		
		<% include FeatureEvents %>
	</div>
</section>


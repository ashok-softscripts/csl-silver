<nav id="primary-nav" class="nav">
	<div class="nav__badge">
		<a href="#"><span></span>Menu</a>
	</div>
	<% include BreadCrumbs %>
    <% if $CustomMenu(main-menu) %>
    <ul class="nav__list">
		<% loop $CustomMenu(main-menu) %>
			<li class="nav__item $FirstLast">
			    <a class="nav__link is-$LinkingMode" href="$Link" title="Go to the $MenuTitle.XML page">
	            $MenuTitle.XML
              </a>
		    </li>
		<% end_loop %>
	</ul>
	<% end_if %>
	<% if $CustomMenu(secondary-menu) %>
    <ul class="nav__list nav--smaller">
		<% loop $CustomMenu(secondary-menu) %>
			<li class="nav__item $FirstLast">
			    <a class="nav__link is-$LinkingMode" href="$Link" title="Go to the $MenuTitle.XML page">
	            $MenuTitle.XML
              </a>
		    </li>
		<% end_loop %>
	</ul>
	<% end_if %>

</nav>

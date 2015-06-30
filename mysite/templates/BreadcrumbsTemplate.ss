<% if $Pages %>
	<% if $Pages.Count > 2 %>
		<% loop $Pages %>
			<% if First %><% else_if Last %><% else %><a href="$Link" class="breadcrumb-$Pos">$MenuTitle.XML</a><% end_if %>
		<% end_loop %>
	<% else_if $Pages.Count > 1 %>
		<% loop $Pages %>
			<% if Last %><% else %><a href="$Link" class="breadcrumb-$Pos">$MenuTitle.XML</a><% end_if %>
		<% end_loop %>
	<% else_if $URLSegment != 'home' %>
		<a href="{$BaseHref}">Home</a>
	<% end_if %>
<% end_if %>

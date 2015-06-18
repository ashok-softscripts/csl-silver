<div class="indexnav">
	<ul class="indexnav__list">
		<% loop Children %>
			<% if EnableNav %>
				<li class="indexnav__item"><a href="#" data-target="$URLSegment" class="indexnav__link">$MenuTitle.XML</a></li>
			<% end_if %>
		<% end_loop %>
	</ul>
	<% loop Children %>
		<% if ClassName = 'UserDefinedForm' %>
			<a href="$Link" class="button">Apply now</a>
		<% end_if %>
	<% end_loop %>
</div>

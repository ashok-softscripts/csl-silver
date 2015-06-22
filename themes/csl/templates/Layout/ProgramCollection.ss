<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro">
			<h1>$Title</h1>			
		</div>
	</div>        	
</header>
<!-- Program grid -->
<section class="programs">
	<div class="container">
		<% if PaginatedPrograms.Exists %>
			<% loop PaginatedPrograms %>
				<% include ProgramTeaser %>
			<% end_loop %>
		<% end_if %>
		<% with $PaginatedPrograms %>
			<% include Pagination %>
		<% end_with %>
	</div>
</section>

<% include Features %>   

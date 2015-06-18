<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro">
			<h1>$Title</h1>			
		</div>
	</div>        	
</header>
<!-- Alumni grid -->
<section class="alumnies-directory">
	<div class="container">
		<div class="alumni">
			<% if $PaginatedAlumni.Exists %>
				<% loop $PaginatedAlumni %>
					<% include AlumniTeaser %>
				<% end_loop %>
			<% end_if %>
		</div>
		<% with $PaginatedAlumni %>
			<% include Pagination %>
		<% end_with %>	
	</div>
	
</section>

<% include Features %>   

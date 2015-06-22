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
		<div class="alumni-filters">
			<label class="filter-lable">Filter alumni</label>
			<% if AlumniPrograms %>
			<div class="drop-down filter-by-programs">
				<ul>
					<li class="label"><span data-label="All Programs">All Programs</span></li>
					<% loop AlumniPrograms %>
						<% loop Children %>
							<% if ClassName = 'ProgramAlumni' %>
								<li class="filter <% if $Top.FilterProgram == $ID %>active<% end_if %>" data-filter="$ID">$Up.Title</li>
							<% end_if %>
						<% end_loop %>
					<% end_loop %>
				</ul>
			</div>
			<% end_if %>
			<% if AlumniRoles %>
			<div class="drop-down filter-by-role">
				<ul>
					<li class="label"><span data-label="Role">Role</span></li>
					<% loop AlumniRoles %>
					<li class="filter <% if $Top.FilterRole == $role %>active<% end_if %>" data-filter="$role">$role</li>
					<% end_loop %>
				</ul>
			</div>
			<% end_if %>
			<form class="filter-alumni-form" name="alumni-search" method="get">
				<input type="search" name="filter_search" value="$FilterSearch" placeholder="Search by name" />
			</form>
		</div>
		<div class="alumni">
			<% if PaginatedAlumni.Exists %>
				<% loop PaginatedAlumni %>
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

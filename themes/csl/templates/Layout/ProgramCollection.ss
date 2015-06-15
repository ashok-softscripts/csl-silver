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
		<% if Children %>
			<% loop Children %>
				<% include ProgramTeaser %>
			<% end_loop %>
		<% end_if %>
	</div>
</section>

<% include Features %>   

<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro">
			<h1>$Title</h1>	
			$Content		
		</div>
	</div>        	
</header>
<!-- Partners grid -->
<section class="all_partners">
	<div class="container">
		<% if Children %>
		<% loop Children %>
		<div class="all_partners__item">
			<a href="$Website" target="_blank" class="all_partners__logo">$Logo</a>
			<h3>$Title</h3>
			<div class="all_partners__excerpt"><p>$Description</p></div>
		</div>
		<% end_loop %>
		<% end_if %>
	</div>
</section>

<% include Features %>   

<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro header-alumni">
			<h1>$Title</h1>
			<p><a href="$Website" target="_blank">$Website</a></p>
		</div>
	</div>        	
</header>
<section class="general">        
	<div class="container">
		<% if Logo %>
			<div class="alumni-picture">
				<div class="partner_logo_large">$Logo</div>
			</div>
		<% end_if %>
		<div class="alumni-content">			
			$Content
		</div>
		
	</div>
</section>
<% include Features %>   

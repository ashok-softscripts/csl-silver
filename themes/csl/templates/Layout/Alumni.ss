<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro header-alumni">
			<h1>$Title</h1>
			<p><strong class="alumni-designation">$Role</strong><a href="#">$Year</a></p>
		</div>
	</div>        	
</header>
<section class="general">        
	<div class="container">
		<% if HeroImage %>
			<div class="alumni-picture">
				$HeroImage.SetWidth(800)
			</div>
		<% end_if %>
		<div class="alumni-content">
			<blockquote>
				<p>$Quote</p>
			</blockquote>
			$Content
		</div>
		
	</div>
</section>
<!-- Alumni grisd -->
<% if AlumniByYear($Year) %>
	<section class="more-alumnies">
		<div class="container">
			<h2>More alumni from <a href="#">$Year</a></h2>
			<div class="alumni">	
					<% loop AlumniByYear($Year) %>
						<% include AlumniTeaser %>
					<% end_loop %>
			</div>
		</div>
	</section>
<% end_if %>
<% include Features %>   

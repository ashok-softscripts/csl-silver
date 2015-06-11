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
			<% if Children %>
				<% loop Children %>
				<div class="alumni__item">
					<a href="$Link" class="alumni__cover has-background_$BackgroundColour">$Thumbnail.SetSize(368,277)</a>
					<h3><a href="$Link">$Title</a></h3>
					<div class="alumni__excerpt"><p>$ShortDescription</p></div>
					<div class="alumni__type">$Year</div>
				</div>
				<% end_loop %>
			<% end_if %>
		</div>
	</div>
</section>

<% include Features %>   

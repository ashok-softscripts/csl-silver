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
				$HeroImage.SetSize(468,356)
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
<section class="more-alumnies">
	<div class="container">
		<h2>More alumni from 2014 <a href="#">SDLP Illawarra</a></h2>
		<div class="alumni">
			<div class="alumni__item">
				<a href="#" class="alumni__cover has-background_green_light"><img src="images/leisa-shelton.jpg" alt="Leisa Shelton" /></a>
				<h3><a href="#">Leisa Shelton</a></h3>
				<div class="alumni__excerpt"><p>Co-Curator Venice International Performance Art Week, Independent Curator, Artist Maker, Teacher and Mentor of Performance</p></div>
				<div class="alumni__type">2014 MayIntensive</div>
			</div>
			<div class="alumni__item">
				<a href="#" class="alumni__cover  has-background_blue"><img src="images/alana-tweddle-thumb.jpg" alt="Alana Tweddle" /></a>
				<h3><a href="#">Alana Tweddle</a></h3>
				<div class="alumni__excerpt"><p>Alana Tweddle Procurement Specialist, BlueScope</p></div>
				<div class="alumni__type">2014 SDLP Illawarra</div>
			</div>
			<div class="alumni__item">
				<a href="#" class="alumni__cover has-background_orange"></a>
				<h3><a href="#">Tshinta O'Dwyer</a></h3>
				<div class="alumni__excerpt"><p>Wetlands Program Officer, Conservation Volunteers Australia</p></div>
				<div class="alumni__type">2014 RELP Northern Rivers</div>
			</div>
		</div>
	</div>
</section>
<% include Features %>   

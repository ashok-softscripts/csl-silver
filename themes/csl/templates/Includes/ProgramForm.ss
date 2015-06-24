<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro">
			<h1>$Title</h1>
			<p><a href="$Parent.Link">See program overview</a></p>
		</div>
	</div>        	
</header>
<div class="indexnav">
	<ul class="indexnav__list">
		<li class="indexnav__item"><a href="#" data-target="introduction" class="indexnav__link is-active">Introduction</a></li>
		<li class="indexnav__item"><a href="#" data-target="personal-info" class="indexnav__link">Personal information</a></li>
		<li class="indexnav__item"><a href="#" data-target="employment-education" class="indexnav__link">Employment, education and fee type</a></li>
	</ul>						
</div>
<section class="general overview" id="introduction">        
	<div class="container">	
		<div class="program-content">	
			$Content		
		</div>
	</div>
</section>
<section class="general apply-form has-background_blue_ver_light">
	<div class="container">
		$Form
	</div>
</section>

<% include Features %>

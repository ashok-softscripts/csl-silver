<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro header-program">
			<h1>$Title</h1>
			<p><strong class="program-schedule">$DatePeriod, $DateRange</strong><% if IntensiveProgram %><a href="$IntensiveProgram">See the intensive program</a><% end_if %></p>
		</div>	
	</div>        	
</header>

<% include ProgramOverview %> 
<% include ProgramTestimonial %> 
<% if EnableFormat %>
	<% include ProgramFormat %> 
<% end_if %>
<% if EnableInstructors %>
	<% include ProgramInstructors %> 
<% end_if %>
<% if EnableSpeakers %>
	<% include ProgramSpeakers %> 
<% end_if %>
<% if EnableAlumni %>
	<% include ProgramAlumni %> 
<% end_if %>
<% if EnableFees %>
	<% include ProgramFees %> 
<% end_if %>
<% include ProgramApply %>
<% if EnableFAQ %>
	<% include ProgramFAQ %> 
<% end_if %>
<% include Features %>   

<section class="program-applicants has-background_$AlumniBGC" id="program-alumni">
	<div class="container">
		<div class="program-applicants__content">
			<h2>$AlumniTitle</h2>
			$AlumniContent
		</div>
		<h3>What alumni say</h3>
		<% if $ProgramAlumni($Alumnies) %>
		<div class="program-applicants__list">			
			<% control $ProgramAlumni($Alumnies) %>
			<div class="program-applicants__item">
				<div class="program-applicants__cover filter-gray">$Thumbnail.SetWidth(368)</div>							
				<blockquote><p>$Quote</p></blockquote>
				<h4><a href="$Link">$Title</a></h4>
			</div>
			<% end_control %>
		</div>
		<% end_if %>
	</div>					 
	</section>

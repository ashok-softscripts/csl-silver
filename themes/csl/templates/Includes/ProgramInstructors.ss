<section class="instructors has-background_$InstructorsBGC" id="instructors">
	<div class="container">
		<div class="instructors__content">
			<h2>$InstructorsTitle</h2>
			$InstructorsContent
		</div>
		<% if Instructors %>
		<div class="instructors__list">
			<% loop Instructors %>
			<div class="instructors__item">
				<div class="instructors__cover">$Thumbnail.setWidth(368)</div>
				<h3>$Title</h3>
				$Description
			</div>
			<% end_loop %>
		</div>
		<% end_if %>		
	</div>					 
</section>

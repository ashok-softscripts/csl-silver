<section class="speakers has-background_$SpeakersBGC" id="speakers">
	<div class="container">
		<div class="speakers__content">
			<h2>$SpeakersTitle</h2>
			$SpeakersContent
		</div>
		<% if Speakers %>
		<div class="speakers__list">
			<% loop Speakers %>
			<div class="speakers__item">
				<div class="speakers__cover">$Thumbnail.setWidth(270)</div>
				<h3>$Title</h3>
				$Description
			</div>
			<% end_loop %>
		</div>
		<% end_if %>		
	</div>					 
</section>

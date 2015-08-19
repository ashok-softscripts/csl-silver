<div class="programs__item is-<% if $ProgramStatus == 'closed' || $EndDate.InPast %>closed<% else %>open<% end_if %>">
	<a href="$Link" class="programs__cover has-background_$BackgroundColour filter-$ImageStyle">$Thumbnail.CroppedImage(368,277)</a>
	<h3><a href="$Link">$Title</a></h3>
	<div class="programs__excerpt"><p>$ShortDescription</p></div>
	<div class="programs__status">$StatusText</div>
</div>

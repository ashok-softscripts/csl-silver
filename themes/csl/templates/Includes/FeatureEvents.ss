<% if Events %>
	<% loop Events %>
		<% if EventID %>
			<% if Pos < 3 %>			
				<% loop EventData($EventID) %>
					<% if Status == 'live' || Status == 'started' %>
						<div class="news__item">
							<a href="$Link" target="_blank" class="news__cover filter-sepia"><img src="https://maps.googleapis.com/maps/api/staticmap?center=$Address,$City,$Region,$Country&zoom=13&size=270x203&maptype=roadmap&markers=color:blue|label:A|$Latitude,$Longitude" title="$Title" /></a>
								<h3>Event</h3>
								<div class="news__excerpt"><p><a href="$Link" target="_blank">$Title</a></p></div>					
							<div class="news__publish"><span class="icon_date svg-frame"><img src="$ThemeDir/images/icons/icon-date.svg" class="inject-me" alt="16 April, 2015" /></span>$StartDate<span class="icon_time svg-frame"><img src="$ThemeDir/images/icons/icon-time.svg" class="inject-me" alt="5pm" /></span>$StartTime</div>
						</div>
					<% end_if %>
				<% end_loop %>
			<% end_if %>
		<% end_if %>
	<% end_loop %>
<% end_if %>


<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro">
			<h1>$Title</h1>			
		</div>
	</div>        	
</header>
<!-- Events grid -->
<section class="news">
    <div class="container">
		<div class="news__list">
        	<% if Events %>
				<% loop Events %>
					<% if EventID %>
						<% loop EventData($EventID) %>
							<% if Status == 'live' || Status == 'started' %>
								<div class="news__item">
									<a href="$Link" target="_blank" class="news__cover filter-sepia"><img src="https://maps.googleapis.com/maps/api/staticmap?center=$Address,$City,$Region,$Country&zoom=13&size=368x277&maptype=roadmap&markers=color:blue|label:A|$Latitude,$Longitude" title="$Title" /></a>
									<div class="news__content">
										<h3>Event</h3>
										<div class="news__excerpt"><p><a href="$Link" target="_blank">$Title</a></p></div>
									</div>
									<div class="news__publish"><span class="icon_date svg-frame"><img src="$ThemeDir/images/icons/icon-date.svg" class="inject-me" alt="16 April, 2015" /></span>$StartDate<span class="icon_time svg-frame"><img src="$ThemeDir/images/icons/icon-time.svg" class="inject-me" alt="5pm" /></span>$StartTime</div>
								</div>
							<% end_if %>
						<% end_loop %>
					<% end_if %>
				<% end_loop %>
			<% end_if %>
    	</div>
    </div>
</section>

<% include Features %>   
<section class="program-format has-background_$FormatBGC" id="program-format">
	<div class="container is-offset">					
		<div class="program-format__left">
			<h2>$FormatTitle</h2>
			$FormatContent
			<% if ProgramFormats %>
			<ul class="program-format__list">
				<% loop ProgramFormats %>
				<li class="program-format__item">
					<h3>$Title</h3>
					<p>$Description/p>
				</li>
				<% end_loop %>
			</ul>
			<% end_if %>						
		</div>
		<div class="program-format__right">
			<% loop $FormatImages %>
			   <div class="program-format__cover filter-gray<% if $Odd %>-only<% end_if %>">$setWidth(800)</div>
			<% end_loop %>
		</div>
	</div>
</section>	

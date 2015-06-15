<% if ApplyContent %>
<section class="seansonal-section has-background_$ApplyBGC">
	<div class="container">
		<div class="seansonal-section__content">
			$ApplyContent
			<% if ApplyLinkTarget && ApplyLinkText %>
				<a href="$ApplyLinkTarget" class="h2-style arrow-link arrow-white">$ApplyLinkText</a>	
			<% end_if %>
		</div>
	</div>
</section>
<% end_if %>

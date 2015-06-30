<section class="features general-features">        
	<div class="container is-full">
		<div class="features__row">

			<% if SeasonalBlock %>
			<div class="features__block span_$SeasonalBlock.FeatureCol seasonal-message has-background_$SeasonalBlock.BackgroundColour">							
				<div class="block-container">
					$SeasonalBlock.Content
					<% if $SeasonalBlock.LinkTitle && $SeasonalBlock.LinkURL %>
					<a href="$SeasonalBlock.LinkURL" class="$SeasonalBlock.LinkStyle-style arrow-link arrow-white">$SeasonalBlock.LinkTitle</a>
					<% end_if %>
				</div>
			</div>
			<% end_if %>
						
			<div class="features__block span_$SiteConfig.NewsletterCol newsletter has-background_$SiteConfig.NewsletterBGC">
				<div class="block-container">
					<% include Newsletter %>
				</div>
			</div>						
		</div>					
	</div>
</section>

<section class="features general-features">        
	<div class="container is-full">
		<div class="features__row">
			<% if SiteConfig.SeasonalText %>
			<div class="features__block span_$SiteConfig.SeasonalCol seasonal-message has-background_$SiteConfig.SeasonalBGC">							
				<div class="block-container">
					$SiteConfig.SeasonalText
					<% if SiteConfig.SeasonalLinkTarget && SiteConfig.SeasonalLinkText %>
					<a href="$SiteConfig.SeasonalLinkTarget" class="h2-style arrow-link arrow-white">$SiteConfig.SeasonalLinkText</a>
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

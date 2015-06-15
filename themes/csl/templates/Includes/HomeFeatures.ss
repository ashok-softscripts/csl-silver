<section class="features">        
	<div class="container is-full">
		<div class="features__row">
			<% if ApplyContent %>
			<div class="features__block seasonal-message has-background_$ApplyBGC">
				<% if ApplyImage %>
				<div class="image-overlay" style="background-image:url($ApplyImage.URL)"></div>
				<% end_if %>
				<div class="text is-long">
					$ApplyContent
					<a href="$ApplyLinkTarget" class="h2-style arrow-link arrow-white">$ApplyLinkText</a>	
				</div>
			</div>
			<% end_if %>
			<div class="features__block newsletter has-background_blue_mid_light">
				<div class="text is-long">
					<% include Newsletter %>
				</div>
			</div>						
		</div>
		<div class="features__row">
			<% if FeatureQuote %>
			<div class="features__block testimonial has-background_$QuoteBGC">
			 <% with PageById($FeatureQuote) %>
				<div class="alumni-image">$Thumbnail.SetWidth(210)</div>
				<div class="text">
					<h3>What our alumni say</h3>
					<blockquote><p>$Quote</p></blockquote>
					<a href="$Link" class="h3-style arrow-link">Meet $Title</a>
				</div>
			<% end_with %>
			</div>
			<% end_if %>
			<% if SeasonalContent %>
			<div class="features__block org-promo has-background_$SeasonalBGC">
				<div class="text">
					$SeasonalContent
					<% if SeasonalLinkTarget && SeasonalLinkTarget %>
					<a href="$SeasonalLinkTarget" class="h3-style arrow-link arrow-white">$SeasonalLinkText</a>	
					<% end_if %>
				</div>
			</div>	
			<% end_if %>					
		</div>	
	</div>
</section>

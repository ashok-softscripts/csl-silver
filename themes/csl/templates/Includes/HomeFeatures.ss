<section class="features">        
	<div class="container is-full">
		<% loop Children %>
			<div class="features__row">
				<% if Features %>
					<% loop Features %>
						<div class="features__block span_$FeatureCol $FeatureType has-background_$BackgroundColor">
							<% if Image %>								
								<% if FeatureType == 'testimonial' %>
									<div class="alumni-image">$Image.SetWidth(210)</div>
								<% else %>
									<div class="image-overlay" style="background-image:url($Image.URL)"></div>
								<% end_if %>
							<% end_if %>
							<div class="block-container is-$FeatureSize">
								<% if FeatureType == 'seasonal-message' %>
									$Description
									<% if LinkURL %>
										<a href="$LinkURL" class="$LinkStyle-style arrow-link arrow-white">$Name</a>
									<% end_if %>
								<% end_if %>
								<% if FeatureType == 'newsletter' %>
									<% include Newsletter %>
								<% end_if %>
								<% if FeatureType == 'testimonial' %>
										$Description
										<a href="$LinkURL" class="$LinkStyle-style arrow-link">$Name</a>
								<% end_if %>
								<% if FeatureType == 'partners-section' %>
										$Description
										<ul class="partners">
											<% loop FeaturedPartners %>
												<li class="partners__item"><a href="$Website">$Logo</a></li>
											<% end_loop %>
										</ul>
										<% if Name && LinkURL %>
											<div class="view-more"><a href="$LinkURL" class="arrow-link">$Name</a></div>
										<% end_if %>
								<% end_if %>
							</div>
						</div>
					<% end_loop %>
				<% end_if %>
			</div>
		<% end_loop %>
	</div>
</section>

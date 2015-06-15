<% if FeaturedPartners %>
<section class="partners-section">			
	<div class="container has-background_$PartnersBGC">
		<h2>$PartnersTitle</h2>
		<ul class="partners">
			<% loop $FeaturedPartners($PartnersLimit) %>
			<li class="partners__item"><a href="$Website">$Logo</a></li>
			<% end_loop %>
		</ul>
		<% if PartnersLinkText && PartnersLinkTarget %><div class="view-more"><a href="$PartnersLinkTarget" class="arrow-link">$PartnersLinkText</a></div><% end_if %>
	</div>					 
</section>
<% end_if %>

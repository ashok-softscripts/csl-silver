<% if TestimonialTitle && TestimonialContent %>
<section class="testimonial has-background_$TestimonialBGC">
	<div class="container">					
		<div class="testimonial__item">
			<h3>$TestimonialTitle</h3>
			<blockquote><p>$TestimonialContent</p></blockquote>
		</div>
		<div class="testimonial__cover">$TestimonialImage.SetWidth(240)</div>
	</div>
</section>
<% end_if %>

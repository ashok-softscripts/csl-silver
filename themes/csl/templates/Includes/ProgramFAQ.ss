<section class="faq-section has-background_$FAQBGC" id="faq">
	<div class="container">
		<div class="faq-section__content">
			<h2>$FAQTitle</h2>
			$FAQContent
			<% if ProgramFAQs %>
				<% loop ProgramFAQs %>
					<h3>$Name</h3>
					$Answer
				<% end_loop %>
			<% end_if %>					
		</div>
	</div>
</section>

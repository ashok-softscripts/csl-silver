<section class="pre-footer">
	<div class="pre-footer__left">
		<div class="pre-footer__container">
			<h3>Menu</h3>
			<% if $CustomMenu(main-menu) %>
			<ul class="footer-menu">
				<% loop $CustomMenu(main-menu) %>
					<li>
						<a href="$Link" title="Go to the $MenuTitle.XML page">
					    $MenuTitle.XML
				      </a>
					</li>
				<% end_loop %>
			</ul>
			<% end_if %>

			<% if $CustomMenu(secondary-menu) %>
			<ul class="footer-menu">
				<% loop $CustomMenu(secondary-menu) %>
					<li>
						<a href="$Link" title="Go to the $MenuTitle.XML page">
					    $MenuTitle.XML
				      </a>
					</li>
				<% end_loop %>
			</ul>
			<% end_if %>
		</div>
	</div>
	<div class="pre-footer__right">
		<div class="pre-footer__container">
			<h3>Get in touch</h3>
			<div class="get-in-touch">							
				<div class="contact-email"><a href="mailto:info@csl.org.au">info@csl.org.au</a></div>
				<div class="locations">
					<div class="locations__item">
						<strong>Melbourne</strong>
						<p><span>Level 13, 190 Queen St,<br /> Melbourne, VIC 3000</span></p>
						<p><span>03 9078 7378</span></p>
					</div>
					<div class="locations__item">
						<strong>Sydney</strong>
						<p><span>7 Blackfriars Street,<br /> Chippendale NSW 2008</span></p>
						<p><span>04 2381 1219</span></p>
					</div>				
				</div>
			</div>
			<div class="social-networks">
				<a href="#" target="_blank"><img src="$ThemeDir/images/icons/twitter.png" alt="Twitter" /></a>
				<a href="#" target="_blank"><img src="$ThemeDir/images/icons/facebook.svg" alt="Facebook" /></a>
				<a href="#" target="_blank"><img src="$ThemeDir/images/icons/linkedin.svg" alt="Linkedin" /></a>
			</div>			
		</div>
	</div>
</section>

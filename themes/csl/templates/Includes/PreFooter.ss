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
				<% if SiteConfig.Email %>
				<div class="contact-email"><a href="mailto:$SiteConfig.Email">$SiteConfig.Email</a></div>
				<% end_if %>
				<div class="locations">
					<% if SiteConfig.Location1 %>
					<div class="locations__item">
						<strong>$SiteConfig.Location1</strong>
						<p><span>$SiteConfig.Location1Address</span></p>
						<p><span>$SiteConfig.Location1Phone</span></p>
					</div>
					<% end_if %>
					<% if SiteConfig.Location2 %>
					<div class="locations__item">
						<strong>$SiteConfig.Location2</strong>
						<p><span>$SiteConfig.Location2Address</span></p>
						<p><span>$SiteConfig.Location2Phone</span></p>
					</div>	
					<% end_if %>			
				</div>
			</div>
			<div class="social-networks">
				<% if SiteConfig.Twitter %><a href="$SiteConfig.Twitter" target="_blank"><img src="$ThemeDir/images/icons/twitter.png" alt="Twitter" /></a><% end_if %>
				<% if SiteConfig.Facebook %><a href="$SiteConfig.Facebook" target="_blank"><img src="$ThemeDir/images/icons/facebook.png" alt="Facebook" /></a><% end_if %>
				<% if SiteConfig.Linkedin %><a href="$SiteConfig.Linkedin" target="_blank"><img src="$ThemeDir/images/icons/linkedin.png" alt="Linkedin" /></a><% end_if %>
			</div>			
		</div>
	</div>
</section>

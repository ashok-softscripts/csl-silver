<% require themedCSS('blog', 'blog') %>
<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro header-news">
			<h1>$Title</h1>
			<p><strong class="news-author">
		<% if $Credits %>
		Written by 
	<% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %> and <% end_if %><% if $URLSegment %><a href="$URL">$Name.XML</a><% else %>$Name.XML<% end_if %><% end_loop %>
	<% end_if %></strong><span>Published <a href="$MonthlyArchiveLink">$PublishDate.Format(d M Y)</a></span></p>
		</div>
	</div>        	
</header>
<section class="general single-news <% if $FeaturedImage %>has-featured_image<% end_if %>">        
	<div class="container">
		<% if $FeaturedImage %>
			<div class="single-news__image">$FeaturedImage.setWidth(795)</div>
		<% end_if %>
		<div class="single-news__content">
			$Content
		</div>
		
		$Form
		$CommentsForm
	</div>
</section>


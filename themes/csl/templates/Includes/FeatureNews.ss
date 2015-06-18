<% if LatestNews %>
<% loop LatestNews %>
<div class="news__item">
	<a href="$Link" class="news__cover filter-gray">$FeaturedImage.setWidth(368)</a>
	<div class="news__content">
		<h3>$Title</h3>
		<div class="news__excerpt">
			<% if $Summary %>
				$Summary
			<% else %>
				$Excerpt
			<% end_if %>
		</div>
	</div>
	<div class="news__publish">Published $PublishDate.Format(d M Y)</div>
</div>
<% end_loop %>
<% end_if %>

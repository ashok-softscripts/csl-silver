<% if LatestNews %>
<% loop LatestNews %>
<a href="$Link" class="news__item">
	<div class="news__cover filter-gray">$FeaturedImage.CroppedImage(368,277)</div>
	<h3>News</h3>
	<div class="news__excerpt">
		<p><span>$Title</span></p>
	</div>
	<div class="news__publish">Published $PublishDate.Format(d M Y)</div>
</a>
<% end_loop %>
<% end_if %>

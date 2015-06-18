<div class="news__item">
	<a href="$Link" class="news__cover filter-gray" title="<%t Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
		$FeaturedImage.setWidth(368)
	</a>
	<div class="news__content">
		<h3>
			<a href="$Link" title="<%t Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
				<% if $MenuTitle %>$MenuTitle
				<% else %>$Title<% end_if %>
			</a>
		</h3>
		<div class="news__excerpt">
			<% if $Summary %>
				$Summary
			<% else %>
				$Excerpt
			<% end_if %>		
		</div>
	</div>
	<div class="news__publish">
		Published $PublishDate.Format(d M Y)
	</div>
</div>

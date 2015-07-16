<% require themedCSS('blog', 'blog') %>
<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro">
			<% include MemberDetails %>
		</div>
	</div>        	
</header>

<section class="news">
    <div class="container">
		<div class="news__list">
    <% if $PaginatedList.Exists %>
        <% loop $PaginatedList %>
            <% include PostSummary %>
        <% end_loop %>
    <% else %>
            <p><%t Blog.NoPosts "There are no posts" %></p>
        <% end_if %>
    	</div>
    $Form
    $CommentsForm
        
    <% with $PaginatedList %>
		<% include Pagination %>
	<% end_with %>
    </div>
</section>

<% include BlogSideBar %>
<% include Features %>   

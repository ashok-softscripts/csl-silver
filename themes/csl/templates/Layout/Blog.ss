<% require themedCSS('blog', 'blog') %>
<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro">
			<h1>
            <% if $ArchiveYear %>
                <%t Blog.Archive "Archive" %>:
                <% if $ArchiveDay %>
                    $ArchiveDate.Nice
                <% else_if $ArchiveMonth %>
                    $ArchiveDate.format("F, Y")
                <% else %>
                    $ArchiveDate.format("Y")
                <% end_if %>
            <% else_if $CurrentTag %>
                <%t Blog.Tag "Tag" %>: $CurrentTag.Title
            <% else_if $CurrentCategory %>
                <%t Blog.Category "Category" %>: $CurrentCategory.Title
            <% else %>
                $Title
            <% end_if %>
        </h1>		
		$Content
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

<%-- NOTE: Before including this, you will need to wrap the include in a with block  --%>

<% if $MoreThanOnePage %>
	<div class="pagination">
		<ul>
			<% if $NotFirstPage %>
				<li class="prev"><a href="{$PrevLink}">Previous</a></li>
        	<% end_if %>
			<% loop $Pages %>
            <% if $CurrentBool %>
				<li class="current">$PageNum</li>
            <% else %>
                <% if $Link %>
					<li><a href="$Link">$PageNum</a></li>
                <% else %>
                    <li class="more">...</li>
                <% end_if %>
            <% end_if %>
       		<% end_loop %>
			<% if $NotLastPage %>
			<li class="next"><a href="{$NextLink}">Next</a></li>
       		<% end_if %>
		</ul>
	</div>
<% end_if %>

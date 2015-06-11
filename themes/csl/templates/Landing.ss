<!DOCTYPE html>
	<% include Head %>
	<body id ="go-top" class="template-$ClassName.Lowercase url-$URLSegment">
		<% include UnsupportedBrowser %>
		<div id="main">
			<% include Navigation %>
			<div class="content">
				$Layout
				<% include PreFooter %>
				<% include Footer %>
		    </div>
	    </div>
		<% include Scripts %>
	</body>
</html>

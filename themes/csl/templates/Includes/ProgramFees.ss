<section class="program-fees has-background_$FeesBGC" id="fees-and-dates">
	<div class="container">
		<div class="program-fees__content">
			<h2>$FeesTitle</h2>
			$FeesContent
			<% if ProgramFees %>
			<table class="table">
				<tr>
					<th width="60%">Fee Type</th>
					<th>Cost</th>
				</tr>
				<% loop ProgramFees %>
				<tr>
					<td>$Name</td>
					<td class="bold">$Cost</td>
				</tr>
				<% end_loop %>
			</table>
			<% end_if %>

		<% if $DatesTitle %>					
			<h2>$DatesTitle</h2>
			$DatesContent
		<% end_if %>					
		
		<% if ProgramDates %>
			<table class="table">
				<tr>
					<th width="60%">Event</th>
					<th>Date</th>
				</tr>
				<% loop ProgramDates %>
				<tr>
					<td>$Name</td>
					<td class="bold">$Date</td>
				</tr>
				<% end_loop %>
			</table>
		<% end_if %>
					
		</div>
	</div>					 
</section>

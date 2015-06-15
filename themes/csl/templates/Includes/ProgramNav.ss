<div class="indexnav">
	<ul class="indexnav__list">
		<li class="indexnav__item"><a href="#" data-target="overview" class="indexnav__link is-active">Overview</a></li>
		<% if EnableFormat %>
			<li class="indexnav__item"><a href="#" data-target="program-format" class="indexnav__link">Program format</a></li>
		<% end_if %>
		<% if EnableInstructors %>
			<li class="indexnav__item"><a href="#" data-target="instructors" class="indexnav__link">Instructors</a></li>
		<% end_if %>
		<% if EnableAlumni %>
			<li class="indexnav__item"><a href="#" data-target="program-alumni" class="indexnav__link">Who are we looking for?</a></li>
		<% end_if %>
		<% if EnableFees %>	
			<li class="indexnav__item"><a href="#" data-target="fees-and-dates" class="indexnav__link">Fees and dates</a></li>
		<% end_if %>
		<% if EnableFAQ %>
			<li class="indexnav__item"><a href="#" data-target="faq" class="indexnav__link">FAQs</a></li>
		<% end_if %>
	</ul>
	<% if ApplyLinkTarget %>
		<a href="$ApplyLinkTarget" class="button">Apply now</a>
	<% end_if %>
</div>

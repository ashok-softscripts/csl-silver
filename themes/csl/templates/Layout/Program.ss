<header class="header">
	<div class="container">
		<% include Logo %>
		<div class="header-intro header-program">
			<h1>$Title</h1>
			<p><strong class="program-schedule">$DatePeriod, $DateRange</strong><% if IntensiveProgram %><a href="$IntensiveProgram">See the intensive program</a><% end_if %></p>
		</div>	
	</div>        	
</header>

<% include ProgramNav %>

<% loop Children %>
	<% if ClassName = 'ProgramOverview' %>
		<section class="general overview has-background_$BackgroundColour" id="$URLSegment">        
			<div class="container">
				<div class="program-content">
					<h2>$title</h2>
					$Content
				</div>			
			</div>
		</section>
	<% end_if %>

	<% if ClassName = 'ProgramTestimonial' %>
		<section class="testimonial has-background_green" id="$URLSegment">
			<div class="container">					
				<div class="testimonial__item">
					<h3>$Title</h3>
					<blockquote><p>$Description</p></blockquote>
					<a href="&LinkURL" class="$LinkStyle-style arrow-link arrow-white">$Name</a>
				</div>
				<div class="testimonial__cover">$TestimonialImage.SetWidth(240)</div>
			</div>
		</section>
   <% end_if %>

	<% if ClassName = 'ProgramFormats' %>
		<section class="program-format has-background_$BackgroundColour" id="$URLSegment">
			<div class="container is-offset">
				<h2>$Title</h2>					
				<div class="program-format__left">	
					<% if IntroText %><p class="intro">$IntroText</p><% end_if %>
					$Content
					<% if ProgramFormatDatas %>
						<ul class="program-format__list">
							<% loop ProgramFormatDatas %>
								<li class="program-format__item">
									<h3>$Title</h3>
									<p>$Description</p>
								</li>
							<% end_loop %>
						</ul>
					<% end_if %>						
				</div>
				<div class="program-format__right">
					<% loop $FormatImages %>
					   <div class="program-format__cover filter-gray<% if $Odd %>-only<% end_if %>">$setWidth(800)</div>
					<% end_loop %>
				</div>
			</div>
		</section>	
	<% end_if %>

	<% if ClassName = 'ProgramInstructors' %>
		<section class="instructors has-background_$BackgroundColour" id="$URLSegment">
			<div class="container">
				<div class="instructors__content">
					<h2>$Title</h2>
					<% if IntroText %><p class="intro">$IntroText</p><% end_if %>
					$Content
				</div>
				<% if Instructors %>
					<div class="instructors__list">
						<% loop Instructors %>
							<div class="instructors__item">
								<div class="instructors__cover">$Thumbnail.setWidth(368)</div>
								<h3>$Title</h3>
								$Description
							</div>
						<% end_loop %>
					</div>
				<% end_if %>		
			</div>					 
		</section>	
	<% end_if %>

	<% if ClassName = 'ProgramSpeakers' %>
		<section class="speakers has-background_$BackgroundColour" id="$URLSegment">
			<div class="container">
				<div class="speakers__content">
					<h2>$Title</h2>
					<% if IntroText %><p class="intro">$IntroText</p><% end_if %>
					$Content
				</div>
				<% if Speakers %>
					<div class="speakers__list">
						<% loop Speakers %>
							<div class="speakers__item">
								<div class="speakers__cover">$Thumbnail.setWidth(270)</div>
								<h3>$Title</h3>
								$Description
							</div>
						<% end_loop %>
					</div>
				<% end_if %>		
			</div>					 
		</section>
	<% end_if %>

	<% if ClassName = 'ProgramAlumni' %>
		<section class="program-applicants has-background_$BackgroundColour" id="$URLSegment">
			<div class="container">
				<div class="program-applicants__content">
					<h2>$Title</h2>
					<% if IntroText %><p class="intro">$IntroText</p><% end_if %>
					$Content
				</div>
				<h3>What alumni say</h3>
				<% if Alumnis %>
					<div class="program-applicants__list">			
						<% loop Alumnis %>
							<div class="program-applicants__item">
								<a href="$Link" class="program-applicants__cover filter-gray">
									$Thumbnail.SetWidth(368)
								</a>							
								<blockquote><p>$Quote</p></blockquote>
								<h4><a href="$Link">$Title</a></h4>
							</div>
						<% end_loop %>
					</div>
				<% end_if %>
			</div>					 
		</section>
	<% end_if %>

	<% if ClassName = 'ProgramFeesDates' %>
		<section class="program-fees has-background_$BackgroundColour" id="$URLSegment">
			<div class="container">
				<div class="program-fees__content">
					<h2>$Title</h2>
					<% if IntroText %><p class="intro">$IntroText</p><% end_if %>
					$Content
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
					<% if $ProgramDates %>
					<div class="program-dates-section">
					<% if $DatesTitle %>					
						<h2>$DatesTitle</h2>
						$DatesContent
					<% end_if %>					
		
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
					</div>
					<% end_if %>					
				</div>
			</div>					 
		</section>
	<% end_if %>

	<% if ClassName = 'ProgramApplication' %>
		<% if Content %>
			<section class="seansonal-section has-background_$BackgroundColour" id="$URLSegment">
				<div class="container">
					<div class="seansonal-section__content">
						$Content
						<% if ApplyLinkTarget %>
							<a href="$ApplyLinkTarget" class="h2-style arrow-link arrow-white">$Title</a>	
						<% end_if %>
					</div>
				</div>
			</section>
		<% end_if %>
	<% end_if %>

	<% if ClassName = 'ProgramFAQSection' %>
		<section class="faq-section has-background_$BackgroundColour" id="$URLSegment">
			<div class="container">
				<div class="faq-section__content">
					<h2>$Title</h2>
					<% if IntroText %><p class="intro">$IntroText</p><% end_if %>
					$Content
					<% if ProgramFAQs %>
						<% loop ProgramFAQs %>
							<h3>$Name</h3>
							$Answer
						<% end_loop %>
					<% end_if %>					
				</div>
			</div>
		</section>
	<% end_if %>

<% end_loop %>

<% include Features %>   

<?php class CustomSiteConfig extends DataExtension {

    private static $db = array(
		'Email' => 'Varchar(100)',
		'Twitter' => 'Varchar(100)',
		'Facebook' => 'Varchar(100)',
		'Linkedin' => 'Varchar(100)',
		'Location1' => 'Varchar(100)',
		'Location1Address' => 'Text',
		'Location1AddressLink' => 'Text',
		'Location1Phone' => 'Varchar(100)',
		'Location2' => 'Varchar(100)',
		'Location2Address' => 'Text',
		'Location2AddressLink' => 'Text',
		'Location2Phone' => 'Varchar(100)',
		'NewsletterTitle' => 'Varchar(100)',
		'NewsletterText' => 'Text',
		'NewsletterURL' => 'Varchar(200)',
		'NewsletterMessage' => 'Text',
		'NewsletterCol' => "Varchar(100)",
		'NewsletterBGC' => "Varchar(100)",
		'EventOAuthtoken' => 'Varchar(200)',
		'EventCache' => "Int"

    );

    public function updateCMSFields(FieldList $fields) {
		

		$fields->addFieldToTab('Root.Main', new EmailField('Email', 'Email'));

		$fields->addFieldToTab('Root.Social Icons', new TextField('Twitter', 'Twitter'));

		$fields->addFieldToTab('Root.Social Icons', new TextField('Facebook', 'Facebook'));

		$fields->addFieldToTab('Root.Social Icons', new TextField('Linkedin', 'Linkedin'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location1', 'Location 1'));

		$fields->addFieldToTab('Root.Locations', new TextAreaField('Location1Address', 'Address'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location1AddressLink', 'Location Link'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location1Phone', 'Phone No'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location2', 'Location 2'));

		$fields->addFieldToTab('Root.Locations', new TextAreaField('Location2Address', 'Address'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location2AddressLink', 'Location Link'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location2Phone', 'Phone No'));		

		$fields->addFieldToTab('Root.Newsletter', new TextField('NewsletterTitle', 'Title'));

		$fields->addFieldToTab('Root.Newsletter', new TextAreaField('NewsletterText', 'Description'));

		$fields->addFieldToTab('Root.Newsletter', new TextField('NewsletterURL', 'Mailchimp Campaign URL'));

		$fields->addFieldToTab('Root.Newsletter', new TextAreaField('NewsletterMessage', 'Success Message'));


		$fields->addFieldToTab('Root.Newsletter', new DropdownField('NewsletterCol','Select Column',array(
						'12' => '100%',	
						'11' => '91%',
						'10' => '84%',
						'9' => '75%',
						'8' => '66%',
						'7' => '58%',
						'6' => '50%',
						'5' => '41%',
						'4' => '33%',
						'3' => '25%',
						'2' => '16%',
						'1' => '9%'	
				  	)));

		$fields->addFieldToTab('Root.Newsletter', new DropdownField('NewsletterBGC','Background Colour',array(
			'green_light' => 'Green Light',
			'blue' => 'Blue',
			'blue_dark' => 'Blue Dark',
			'blue_light' => 'Blue Light',
			'blue_mid_light' => 'Blue Medium Blue',
			'blue_ver_light' => 'Blue Very Light',
			'orange' => 'Orange',
			'orange_mid' => 'Orange Medium',
			'orange_dark' => 'Orange Dark',
			'green' => 'Green',
			'green_dark' => 'Green Dark',
			'green_forest' => 'Green Forest',
			'green_lime' => 'Green Lime',
			'gray' => 'Gray',
			'gray_light' => 'Gray Light',
			'gray_dark' => 'Gray Dark',
			'black' => 'Black',
			'white' => 'White'
		)));

		$event_field = new TextField('EventOAuthtoken', 'Attentication token');
		$event_field->setDescription('Insert Your personal <strong>OAuth token</strong> of <a href="http://www.eventbrite.com/myaccount/apps/" target="_blank">EventBrite</a>');
		$fields->addFieldToTab('Root.Events', $event_field);

		$event_cache = new TextField('EventCache', 'Event Cache');
		$event_cache->setDescription('Inter event max cache time in seconds (eg: 3600 equals to 1 hour)');
		$fields->addFieldToTab('Root.Events', $event_cache);

    }
}

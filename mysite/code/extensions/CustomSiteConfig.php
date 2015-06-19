<?php class CustomSiteConfig extends DataExtension {

    private static $db = array(
		'Email' => 'Varchar(100)',
		'Twitter' => 'Varchar(100)',
		'Facebook' => 'Varchar(100)',
		'Linkedin' => 'Varchar(100)',
		'Location1' => 'Varchar(100)',
		'Location1Address' => 'Text',
		'Location1Phone' => 'Varchar(100)',
		'Location2' => 'Varchar(100)',
		'Location2Address' => 'Text',
		'Location2Phone' => 'Varchar(100)',
		'SeasonalText' => 'HTMLText',
		'SeasonalLinkText' => 'Varchar(100)',
		'SeasonalLinkTarget' => 'Varchar(100)',
		'SeasonalCol' => "Varchar(100)",
		'SeasonalBGC' => "Varchar(100)",
		'NewsletterTitle' => 'Varchar(100)',
		'NewsletterText' => 'Text',
		'NewsletterCol' => "Varchar(100)",
		'NewsletterBGC' => "Varchar(100)"

    );

    public function updateCMSFields(FieldList $fields) {
		

		$fields->addFieldToTab('Root.Main', new EmailField('Email', 'Email'));

		$fields->addFieldToTab('Root.Social Icons', new TextField('Twitter', 'Twitter'));

		$fields->addFieldToTab('Root.Social Icons', new TextField('Facebook', 'Facebook'));

		$fields->addFieldToTab('Root.Social Icons', new TextField('Linkedin', 'Linkedin'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location1', 'Location 1'));

		$fields->addFieldToTab('Root.Locations', new TextAreaField('Location1Address', 'Address'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location1Phone', 'Phone No'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location2', 'Location 2'));

		$fields->addFieldToTab('Root.Locations', new TextAreaField('Location2Address', 'Address'));

		$fields->addFieldToTab('Root.Locations', new TextField('Location2Phone', 'Phone No'));

		$Content = new HTMLEditorField('SeasonalText', 'Content');
		$Content->setRows(15);
		$fields->addFieldToTab('Root.Seasonal Block', $Content);

		$fields->addFieldToTab('Root.Seasonal Block', new TextField('SeasonalLinkText', 'Link Text'));

		$fields->addFieldToTab('Root.Seasonal Block', new TextField('SeasonalLinkTarget', 'Link URL'));

		$fields->addFieldToTab('Root.Seasonal Block', new DropdownField('SeasonalCol','Select Column',array(
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

		$fields->addFieldToTab('Root.Seasonal Block', new DropdownField('SeasonalBGC','Background Colour',array(
			'green' => 'Green',
			'blue' => 'Blue',
			'blue_dark' => 'Blue Dark',
			'blue_light' => 'Blue Light',
			'blue_mid_light' => 'Blue Medium Blue',
			'blue_ver_light' => 'Blue Very Light',
			'orange' => 'Orange',
			'orange_mid' => 'Orange Medium',
			'orange_dark' => 'Orange Dark',
			'green_light' => 'Green Light',
			'green_dark' => 'Green Dark',
			'green_forest' => 'Green Forest',
			'green_lime' => 'Green Lime',
			'gray' => 'Gray',
			'gray_light' => 'Gray Light',
			'gray_dark' => 'Gray Dark',
			'black' => 'Black',
			'white' => 'White'
		)));


		$fields->addFieldToTab('Root.Newsletter', new TextField('NewsletterTitle', 'Title'));

		$fields->addFieldToTab('Root.Newsletter', new TextAreaField('NewsletterText', 'Description'));

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

		

    }
}

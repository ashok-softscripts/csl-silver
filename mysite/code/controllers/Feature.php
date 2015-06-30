<?php class Feature extends DataObject {
    private static $db = array(
        'FeatureType' => "Varchar(100)",
		'FeatureCol' => "Varchar(100)",
		'FeatureSize' => "Varchar(100)",
		'Description' => 'HTMLText',
		'Name' => 'Varchar',
		'LinkURL' => 'Varchar',
		'LinkStyle' => "Varchar(100)",
		'BackgroundColor' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",
		'MobileBackgroundColor' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",
    );

	private static $has_one = array(	
		'Image' => 'Image'
	);		

	private static $belongs_many_many = array(
		 'FeaturesRows' => 'FeaturesRow'
    );

	private static $summary_fields = array(
  		'Name' => 'Title'
 	);
 
	 public function FeaturedPartners($num=8) {
    	$holder = PartnerCollection::get()->First();
    	return ($holder) ? Partner::get()->filter('ParentID', $holder->ID)->limit($num) : false;
  	}

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();		
		
		$fields->addFieldToTab('Root.Main', new DropdownField('FeatureType','Feature Type',array(
		'seasonal-message' => 'Seasonal Message Block',	
		'newsletter' => 'Newsletter',
		'testimonial' => 'Testimonial',
		'partners-section' => 'Feature Partners'
  	)));
		
		$fields->addFieldToTab('Root.Main', new DropdownField('FeatureCol','Select Column',array(
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
		
		$fields->addFieldToTab('Root.Main', new DropdownField('FeatureSize','Select Size',array(
		'normal' => 'Normal',	
		'long' => 'Long'
  	)));
		
		$Content = new HTMLEditorField('Description', 'Description');
		$Content->setRows(15);
		$fields->addFieldToTab('Root.Main', $Content);

		$fields->addFieldToTab('Root.Main', new TextField('Name', 'Title'));
		
		$fields->addFieldToTab('Root.Main', new TextField('LinkURL', 'Link URL'));
		
		$fields->addFieldToTab('Root.Main', new DropdownField('LinkStyle','Link Style',array(
		'h2' => 'H2',	
		'h3' => 'H3'		
  	)));
		
		$fields->addFieldToTab('Root.Main', new DropdownField('BackgroundColor','Background Colour',$this->dbObject('BackgroundColor')->enumValues()));

		$fields->addFieldToTab('Root.Main', new DropdownField('MobileBackgroundColor','Mobile Background Colour',$this->dbObject('MobileBackgroundColor')->enumValues()));
				
		$fields->addFieldToTab("Root.Main",  $image = new UploadField('Image', 'Image'));
		$image->allowedExtensions = array('jpg', 'png', 'svg');
		$image->setFolderName('heroes');	

		return $fields;
	}
}
?>

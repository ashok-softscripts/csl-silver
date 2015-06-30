<?php class SeasonalBlock extends Page {
	private static $db = array(
		'FeatureCol' => "Varchar(100)",
		'LinkTitle' => 'Varchar',
		'LinkURL' => 'Varchar',
		'LinkStyle' => "Varchar(100)",
		'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",
	);

 	private static $defaults = array(
  		'ShowInSearch' => 0
  	);

  	public function getCMSFields() {
    	$fields = parent::getCMSFields();

		/* Reset Defaults */
		$fields->removeByName("Metadata");
				
		$fields->removeByName("MenuTitle");
		
		$fields->removeByName("URLSegment");
		
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


		$fields->addFieldToTab('Root.Main', new TextField('LinkTitle', 'Title'));
		
		$fields->addFieldToTab('Root.Main', new TextField('LinkURL', 'Link URL'));
		
		$fields->addFieldToTab('Root.Main', new DropdownField('LinkStyle','Link Style',array(
			'h2' => 'H2',	
			'h3' => 'H3'		
  		)));

 		$fields->addFieldToTab('Root.Theme', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()));

		return $fields;
		
  	}
}


class SeasonalBlock_Controller extends Page_Controller {
 	private static $allowed_actions = array (
  	);

  	public function init() {
    	parent::init();
  	}
}
?>
<?php class ProgramApplication extends Page {
	private static $db = array(
		'EnableNav' => "Boolean(1)",
		'ApplyLinkTarget' => "Text",
		'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",
 	);

 	private static $defaults = array(
		'ShowInSearch' => 0
  	);

  	public function getCMSFields() {
    	$fields = parent::getCMSFields();
		/* Reset Defaults */
		$fields->removeByName("Metadata");
		
		$fields->addFieldToTab('Root.Main', new CheckboxField('EnableNav','Show In Navigation'),'Content'); 

		$fields->addFieldToTab('Root.Main', new TextField('ApplyLinkTarget', 'Link URL'),'Content');

		$fields->addFieldToTab('Root.Theme', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()));
		return $fields;
  	}
}

class ProgramApplication_Controller extends Page_Controller {
	private static $allowed_actions = array (
  	);

	public function init() {
		parent::init();
	}
}

?>
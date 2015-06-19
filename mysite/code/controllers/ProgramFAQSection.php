<?php class ProgramFAQSection extends Page {
	private static $db = array(
		'EnableNav' => "Boolean(1)",
		'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')"
	);

	private static $allowed_children = array('ProgramFAQ');

 	private static $defaults = array(
		'ShowInSearch' => 0
  	);
	
	private static $has_many = array(		
		'ProgramFAQs'=> 'ProgramFAQ'
	);

  	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		/* Reset Defaults */
		$fields->removeByName("Metadata");
		
		$fields->addFieldToTab('Root.Main', new CheckboxField('EnableNav','Show In Navigation'),'Content'); 

        $config = GridFieldConfig_RelationEditor::create(10);
		$config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Question'
        ));    
        $FAQField = new GridField(
            'ProgramFAQs',
            'FAQ',
            $this->ProgramFAQs(),
            $config
        );        
        $fields->addFieldToTab('Root.FAQ', $FAQField);

		$fields->addFieldToTab('Root.Theme', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()));

		return $fields;
  	}
}

class ProgramFAQSection_Controller extends Page_Controller {
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
	}
}

?>
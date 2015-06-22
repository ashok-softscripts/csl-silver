<?php class ProgramAlumni extends Page {
	private static $db = array(
		'EnableNav' => "Boolean(1)",
		'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",
	);

 	private static $defaults = array(
  		'ShowInSearch' => 0
  	);

	private static $has_many = array(		
	);
	
	private static $many_many = array(		
		'Alumnis' => 'Alumni',
	);
	
	private static $many_many_extraFields=array(
		'Alumnis' => array(
			'SortAlumni'=>'Int'
		)		
	);
	private static $allowed_children = array('Alumni');

  	public function getCMSFields() {
    	$fields = parent::getCMSFields();

		/* Reset Defaults */
		$fields->removeByName("Metadata");
		
		$fields->addFieldToTab('Root.Main', new CheckboxField('EnableNav','Show In Navigation'),'Content'); 

		$config = GridFieldConfig_RelationEditor::create(10);
		$config->addComponent(new GridFieldSortableRows('SortAlumni'));
       	$config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Alumni'
        ));    
        $AlumnisField = new GridField(
            'Alumnis',
            'Alumni',
            $this->Alumnis(),
            $config
        );        
        $fields->addFieldToTab('Root.Alumni', $AlumnisField);
		

		$fields->addFieldToTab('Root.Theme', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()));

		return $fields;
  	}
	
	public function Alumnis() {
        return $this->getManyManyComponents('Alumnis')->sort('SortAlumni');
    }
}

class ProgramAlumni_Controller extends Page_Controller {
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
	}
		
}
?>
<?php class ProgramFeesDates extends Page {
	private static $db = array(
		'EnableNav' => "Boolean(1)",
		'DatesTitle' => "Text",
		'DatesContent' => 'HTMLText',
		'BackgroundColour' => "Enum('blue,blue_dark,blue_light,blue_mid_light,blue_ver_light,orange,orange_mid,orange_dark,green,green_light,green_dark,green_forest,green_lime,gray,gray_light,gray_dark,black,white,none','none')",

  );

 	private static $defaults = array(
  		'ShowInSearch' => 0
  	);

	private static $has_many = array(		
		'ProgramFees' => 'ProgramFees',
		'ProgramDates' => 'ProgramDates'		
	);
	
	private static $many_many_extraFields=array(
	);
	
	private static $allowed_children = array('ProgramFees','ProgramDates');

	public function getCMSFields() {
    	$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', new CheckboxField('EnableNav','Show In Navigation'),'Content'); 
 
        $config = GridFieldConfig_RelationEditor::create(10);
		$config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Fee Type',
			'Cost' => 'Cost'
        ));    
        $feesField = new GridField(
            'ProgramFees',
            'Program Fees',
            $this->ProgramFees(),
            $config
        );        
        $fields->addFieldToTab('Root.Main', $feesField);

	 
		$fields->addFieldToTab('Root.Dates', new TextField('DatesTitle', 'Dates Title'));

		$datesContent = new HTMLEditorField('DatesContent', 'Dates Content');
		$datesContent->setRows(15);
		$fields->addFieldToTab('Root.Dates', $datesContent);

        $config = GridFieldConfig_RelationEditor::create(10);
		$config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Event',
			'Date' => 'Date'
        ));    
        $datesField = new GridField(
            'ProgramDates',
            'Program Dates',
            $this->ProgramDates(),
            $config
        );        
        $fields->addFieldToTab('Root.Dates', $datesField);


		$fields->addFieldToTab('Root.Theme', new DropdownField('BackgroundColour','Background Colour',$this->dbObject('BackgroundColour')->enumValues()));

		return $fields;
  	}
}

class ProgramFeesDates_Controller extends Page_Controller {
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
	}
}

?>
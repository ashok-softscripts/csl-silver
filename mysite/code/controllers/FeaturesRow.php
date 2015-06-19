<?php class FeaturesRow extends Page {
  private static $description = "Features Row";

  private static $db = array(
 );

 	private static $defaults = array(
		'ShowInSearch' => 0
  	);

	private static $has_many = array(			
	);
	
	private static $many_many = array(		
		'Features' => 'Feature',
	);
	
	private static $many_many_extraFields=array(
		'Features' => array(
			'SortFeature'=>'Int'
		)		
	);

	private static $allowed_children = array('Feature');

  	public function getCMSFields() {
    	$fields = parent::getCMSFields();
		
		/* Reset Defaults */
		$fields->removeByName("Content");
				
		$fields->removeByName("MenuTitle");
		
		$fields->removeByName("URLSegment");
		
		$fields->removeByName("Metadata");
		
        $config = GridFieldConfig_RelationEditor::create(10);
		$config->addComponent(new GridFieldSortableRows('SortFeature'));

        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Name'
        ));    
        $FeaturesField = new GridField(
            'Features',
            'Feature',
            $this->Features(),
            $config
        );        
        $fields->addFieldToTab('Root.Main', $FeaturesField);			

		return $fields;
  	}
	
	public function Features() {
        return $this->getManyManyComponents('Features')->sort('SortFeature');
    }
	
	
		
}

class FeaturesRow_Controller extends Page_Controller {

	private static $allowed_actions = array (
	);
	
	

	public function init() {
		parent::init();
	}	

}
?>
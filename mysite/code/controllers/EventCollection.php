<?php class EventCollection extends Page {
  private static $description = "Events list page";

  private static $db = array(	
  );

  private static $has_one = array(	
  );
	
  private static $many_many = array(		
		'Events' => 'Event',
  );
	
private static $many_many_extraFields=array(
	'Events' => array(
		'SortEvent'=>'Int'
	)		
);	

  private static $allowed_children = array(
	  'Event'
  );

  private static $icon = "cms/images/treeicons/book-openfolder.gif";

  public function getCMSFields() {

		$fields = parent::getCMSFields();

		$config = GridFieldConfig_RelationEditor::create(10);
		$config->addComponent(new GridFieldSortableRows('SortEvent'));

        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Name',
			'EventID' => 'Event ID'
        ));    
        $EventField = new GridField(
            'Events',
            'Event',
            $this->Events(),
            $config
        );        
        $fields->addFieldToTab('Root.Events', $EventField);
	  
	  return $fields;

  }
	
	public function Events() {
        return $this->getManyManyComponents('Events')->sort('SortEvent');
    }
	

}

class EventCollection_Controller extends Page_Controller {

  private static $allowed_actions = array (
  );

  public function init() {
    parent::init();
  }
		
}
?>
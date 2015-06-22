<?php class ProgramCollection extends Page {
  private static $description = "Top level listing for a group of Alumni page.";

  private static $db = array(
  );

  private static $has_one = array(
  );

  private static $allowed_children = array(
    'Program'
  );

  private static $icon = "cms/images/treeicons/page-gold-openfolder.gif";


}

class ProgramCollection_Controller extends Page_Controller {

  private static $allowed_actions = array (
  );

  public function init() {
    parent::init();
  }
	
	public function PaginatedPrograms() {
		/**
		 * @var Blog $dataRecord
		 */
		$programsList = Program::get()->filter('ParentID', $this->ID);

		$programs = new PaginatedList($programsList);

		$programs->setPageLength(12);

		$start = $this->request->getVar($programs->getPaginationGetVar());

		$programs->setPageStart($start);

		return $programs;
	}

}

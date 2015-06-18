<?php class AlumniCollection extends Page {
  private static $description = "Top level listing for a group of Alumni page.";

  private static $db = array(
  );

  private static $has_one = array(
  );

  private static $allowed_children = array(
    'Alumni'
  );

  private static $icon = "cms/images/treeicons/multi-user.gif";


}

class AlumniCollection_Controller extends Page_Controller {

  private static $allowed_actions = array (
  );

  public function init() {
    parent::init();
  }


  public function PaginatedAlumni() {
		/**
		 * @var Blog $dataRecord
		 */
		$alumniesList = Alumni::get()->filter('ParentID', $this->ID);

		$alumnies = new PaginatedList($alumniesList);

		$alumnies->setPageLength(12);

		$start = $this->request->getVar($alumnies->getPaginationGetVar());

		$alumnies->setPageStart($start);

		return $alumnies;
	}


}

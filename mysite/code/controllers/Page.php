<?php

class Page extends SiteTree {
	private static $description = "Stores common fields — do not use on front-end.";

	private static $db = array(
	);

	private static $has_one = array(

	);

	public function getCMSFields() {
			$fields = parent::getCMSFields();

			return $fields;
	}

	public function PageById($id) {
		return DataObject::get_by_id("SiteTree", (int)$id);
	}

	public function NotAwards() {


		$url = Director::protocolAndHost();

		if(stristr($url, 'awards') === FALSE) {
			return true;
		}
		else {
			return false;
		}
	}
}

class Page_Controller extends ContentController {
	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}
}

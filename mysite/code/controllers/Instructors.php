<?php
    class Instructors extends Page {

		private static $description = "Container for Creating Instuctors Records.";

		private static $db = array(
			'ShortDescription' => 'Text'
		);

		private static $has_one = array(
			'Thumbnail' => 'Image',
			'HeroImage' => 'Image'
		);
		
		public function getCMSFields() {
			$fields = parent::getCMSFields();

			$fields->renameField('Title', 'Instructor\'s Name');
			$fields->addFieldToTab('Root.Main', new TextAreaField('ShortDescription', 'Instructor\'s Short Description'),'Content');

			$fields->addFieldToTab('Root.Images', $thumbnail = new UploadField('Thumbnail', 'Thumbnail Image'));
			$thumbnail->allowedExtensions = array('jpg', 'png', 'svg');
			$thumbnail->setFolderName('thumbnails');

			$fields->addFieldToTab('Root.Images', $hero = new UploadField('HeroImage', 'Hero Image'));
			$hero->allowedExtensions = array('jpg', 'png', 'svg');
			$hero->setFolderName('heroes');
			return $fields;
		}

		public function items() {
			$items = Instructors::get()->sort('Name ASC');
			if($items) return $items;
			else return false;
	  	}


    }
    class Instructors_Controller extends Page_Controller {
	
		private static $allowed_actions = array ();
		public function init() {
			parent::init();
		}

    }

?>

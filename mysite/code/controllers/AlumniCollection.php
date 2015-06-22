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
	
	/*public function AlumniPrograms() {
		$YearsData = DataObject::get('AlumniYear');
		if ($YearsData) $YearSource = $YearsData->map('Name', 'Name');	
	}*/

	public function FilterProgram(){
        return $this->getRequest()->getVar('filter_program');
    }
	
	public function FilterRole(){
        return $this->getRequest()->getVar('filter_role');
    }
	
	public function FilterSearch(){
        return $this->getRequest()->getVar('filter_search');
    }
	
	
	public function AlumniPrograms() {
		$holder = ProgramCollection::get()->First();
    	return ($holder) ? Program::get()->filter('ParentID', $holder->ID) : false;
	}

  	public function AlumniRoles() {
		$Roles = ArrayList::create();
		$records = DB::query("SELECT A. * , B.ID AS PID, B.ClassName, C.Role AS role, C.ID AS cid FROM SiteTree A, SiteTree B, Alumni C WHERE C.ID = A.ID AND A.ParentID = B.ID AND B.ClassName = 'AlumniCollection' GROUP BY C.Role");
		if($records) {
			foreach($records as $row) {								
				$Roles->push($row);
			}
		}							
		return $Roles;
	}
	
	public function PaginatedAlumni() {
	
		if(!empty($this->FilterProgram())) {
			
			$ProgramAlumnis = ProgramAlumni::get()->filter(array('ID'=> $this->FilterProgram()));
			if($ProgramAlumnis) {
				foreach($ProgramAlumnis as $ProgramAlumni){
					$alumniesList = $ProgramAlumni->Alumnis();
				}
			}
		}
		else if(!empty($this->FilterRole())) {						
			$alumniesList = Alumni::get()->filter(array('ParentID'=> $this->ID, 'Role' => $this->FilterRole()));
		}
		else if(!empty($this->FilterSearch())) {						
			$alumniesList = Alumni::get()->filter(array('ParentID'=> $this->ID, 'Title:PartialMatch' => $this->FilterSearch()));
		}
	  	else {
			$alumniesList = Alumni::get()->filter(array('ParentID'=> $this->ID));
		}
	  	  	  
		$alumnies = new PaginatedList($alumniesList);

		$alumnies->setPageLength(12);

		$start = $this->request->getVar($alumnies->getPaginationGetVar());

		$alumnies->setPageStart($start);

		return $alumnies;
	}


}

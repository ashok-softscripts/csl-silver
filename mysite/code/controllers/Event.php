<?php class Event extends DataObject {
    private static $db = array(
		'Name' => 'Varchar(100',
        'EventID' => "Varchar(100)"		
    );


	private static $belongs_many_many = array(
		 'HomePages' => 'HomePage'
    );

	private static $summary_fields = array(
  		'Name' => 'Title',
		'EventID' => 'Event ID'
 	);
 
	public function EventData($id = ""){
		$config = SiteConfig::current_site_config(); 
		$oAuthToken = $config->EventOAuthtoken;		
		$EventCache = $config->EventCache;
		if(empty($EventCache)) { $EventCache = 3600; }
		$serviceURL = 'https://www.eventbriteapi.com/v3/events/'.$id.'/?token='.$oAuthToken;
		$service = new RestfulService($serviceURL, $EventCache);
		$response = $service->request();
		$event = array();
		if($response && $response->getStatusCode() == 200 ) {		
			$returnEvent = Convert::json2array($response->getBody());	
			//echo '<pre>';
			//print_r($returnEvent);
			//echo '</pre>';
			$startDate = new Date();
			$startDate->setValue($returnEvent['start']['local']);
			$startDate = $startDate->Format('d F, Y');
			
			$startTime = new Time();
			$startTime->setValue($returnEvent['start']['local']);
			$startTime = $startTime->Format('ga');
			
			
			$endDate = new Date();
			$endDate->setValue($returnEvent['end']['local']);
			$endDate = $endDate->Format('d F, Y');
			
			$endTime = new Time();
			$endTime->setValue($returnEvent['end']['local']);
			$endTime = $endTime->Format('ga');
			
			
			$location = $returnEvent['venue']['address'];
			
			$event[] = new ArrayData(array(
						'Title' => $returnEvent['name']['text'],
						'Description' => $returnEvent['description']['html'],
						'Link' => $returnEvent['url'],
						'StartDate' => $startDate,
						'StartTime' => $startTime,
						'EndDate' => $endDate,
						'EndTime' => $endTime,
						'Status' => $returnEvent['status'],
						'Image' => $returnEvent['logo']['url'],
						'Address' => $location['address_1'],
						'City' => $location['city'],
						'Region' => $location['region'],
						'Zip' => $location['postal_code'],
						'Country' => $location['country']
					));
		}
		return new ArrayList($event);			
	}
}
?>
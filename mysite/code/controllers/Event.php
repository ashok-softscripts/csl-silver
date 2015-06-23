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

			$event_type = $returnEvent['online_event'];

			$venue_id = $returnEvent['venue_id'];

			$venue			= '';
			$address		= '';
			$city			= '';
			$region			= '';
			$postal_code 	= '';
			$country 		= '';
			$latitude		= '';
			$longitude		= '';	

			if($event_type === false && !empty($venue_id)){
				
				$serviceURL = 'https://www.eventbriteapi.com/v3/venues/'.$venue_id.'/?token='.$oAuthToken;
				$service = new RestfulService($serviceURL, $EventCache);
				$venue_response = $service->request();
				if($venue_response && $venue_response->getStatusCode() == 200 ) {		
					$returnVenue = Convert::json2array($venue_response->getBody());
					$venue			= $returnVenue['name'];
					$address		= $returnVenue['address']['address_1'];
					$city			= $returnVenue['address']['city'];
					$region			= $returnVenue['address']['region'];
					$postal_code 	= $returnVenue['address']['postal_code'];
					$country 		= $returnVenue['address']['country'];
					$latitude 		= $returnVenue['address']['latitude'];
					$longitude 		= $returnVenue['address']['longitude'];
				}
			}
			
			
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
						'Venue' => $venue,
						'Address' => $address,
						'City' => $city,
						'Region' => $region,
						'Zip' => $postal_code,
						'Country' => $country,
						'Latitude' => $latitude,
						'Longitude' => $longitude
					));
		}
		return new ArrayList($event);			
	}
}
?>

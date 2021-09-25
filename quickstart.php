<?php
require __DIR__ . '/vendor/autoload.php';
include 'includes/con_db.inc.php';
/*
if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}
*/
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');


    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = __DIR__ . '/token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);

// Print the next 10 events on the user's calendar.
$calendarId = 'primary';
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => true,
  'timeMin' => date('c'),
);
$results = $service->events->listEvents($calendarId, $optParams);
$events = $results->getItems();


// Refer to the PHP quickstart on how to setup the environment:
// https://developers.google.com/calendar/quickstart/php
// Change the scope to Google_Service_Calendar::CALENDAR and delete any stored
// credentials.
if (isset($_GET["Name"]) || isset($_GET["Service"]) || isset($_GET["STime"]) || isset($_GET["ETime"]) || isset($_GET["Date"]) || isset($_GET["Branch"])) {

  $esr = $_GET["Name"];

  #quereie

  $sql = "SELECT * FROM patients WHERE Patient_Id = '$esr'";
  $result = mysqli_query($con, $sql);

  while($row = mysqli_fetch_array($result)){
    $DEmail = $row["Email"];
    $DFname = $row["First_Name"];
    $DLname = $row["Last_Name"];
  }

  $DService = $_GET["Service"];
  $DSTime = $_GET["STime"];
  $DETime = $_GET["ETime"];
  $DDate = $_GET["Date"];
  $DBranch = $_GET["Branch"];


  $event = new Google_Service_Calendar_Event(array(
    'summary' => $DService . "Service",
    'location' => 'J Gonzales Dental Center '.$DBranch.' Branch',
    'description' => 'An appointment at J Gonzales Dental Center. imxaander xd',
    'start' => array(
      'dateTime' => date("c", strtotime($DDate." ".$DSTime)),
      'timeZone' => 'Asia/Manila',
    ),
    'end' => array(
      'dateTime' => date("c", strtotime($DDate." ".$DETime)),
      'timeZone' => 'Asia/Manila',
    ),
    'recurrence' => array(
      'RRULE:FREQ=DAILY;COUNT=1'
    ),
    'attendees' => array(
      array('email' => $DEmail, 'displayName' => "'. $DFname . ' '. $DLname''"),



    ),

  ));

  $calendarId = 'primary';
  $event = $service->events->insert($calendarId, $event);

}else{
  echo "no get method";
}



/*
if (empty($events)) {
    print "No upcoming events found.\n";
} else {
    print "Upcoming events:\n";
    foreach ($events as $event) {
        $start = $event->start->dateTime;
        if (empty($start)) {
            $start = $event->start->date;
        }
        printf("%s (%s)\n", $event->getSummary(), $start);
    }
}
*/

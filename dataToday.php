<?php
$todayGlobalConfirmed = 0;
$todayGlobalDead = 0;
$todayGlobalRecovered = 0;
try {
  $pdo = new PDO("mysql:host=localhost;dbname=covidtracker", "root", "");
} catch (PDOException $e) {
  die("Unable to connect to the database");
}
$sql = "SELECT countries.name, 
last_two_days_data.today_active,
last_two_days_data.today_recovered,
last_two_days_data.today_deaths,
last_two_days_data.today_confirmed,
last_two_days_data.yesterday_active,
last_two_days_data.yesterday_recovered,
last_two_days_data.yesterday_deaths,
last_two_days_data.yesterday_confirmed
FROM (
    SELECT * FROM
    (
      SELECT 
        cases.active as today_active, 
        cases.recovered as today_recovered, 
        cases.deaths as today_deaths, 
        cases.confirmed as today_confirmed, 
        cases.country_id,
        (ROW_NUMBER() OVER (PARTITION BY country_id ORDER BY date DESC)) row_number_today
      FROM cases
    ) AS today_data
    JOIN (
      SELECT 
        cases.active as yesterday_active, 
        cases.recovered as yesterday_recovered, 
        cases.deaths as yesterday_deaths, 
        cases.confirmed as yesterday_confirmed, 
        cases.country_id as c_id,
        (ROW_NUMBER() OVER (PARTITION BY country_id ORDER BY date DESC)) row_number_yesterday
      FROM cases
    ) as yesterday_data

     ON 
        today_data.country_id = yesterday_data.c_id 
        AND yesterday_data.row_number_yesterday = today_data.row_number_today + 1
        AND today_data.row_number_today <> 1 
     GROUP BY today_data.country_id
) as last_two_days_data 
JOIN countries ON last_two_days_data.country_id = countries.id";


// $jqueryCountryName = $_POST['displaySelectedCoutry'];
// echo $jqueryCountryName;

$sqlCountries = "SELECT name FROM countries ";

$stmt = $pdo->query($sql);
$countriesCounter = 0;

while ($country = $stmt->fetch()) {
  $todayConfirmed = $country['today_confirmed'];
  $todayActive = $country['today_active'];
  $todayDeaths = $country['today_deaths'];
  $todayRecovered = $country['today_recovered'];
  $yesterdayConfirmed = $country['yesterday_confirmed'];
  $yesterdayDeaths = $country['yesterday_deaths'];
  $yesterdayRecovered = $country['yesterday_recovered'];

  $todayGlobalConfirmed += ($todayConfirmed - $yesterdayConfirmed);
  $todayGlobalDead += ($todayDeaths - $yesterdayDeaths);
  $todayGlobalRecovered += ($todayRecovered - $yesterdayRecovered);

  $ListTheCountries[$countriesCounter] = $country['name'];
  $countriesCounter++;

  // if ($country['name'] == $jqueryCountryName) {
  //   $todayConfirmed = $country['today_confirmed'];
  //   $todayActive = $country['today_active'];
  //   $todayDeaths = $country['today_deaths'];
  //   $todayRecovered = $country['today_recovered'];
  //   $yesterdayConfirmed = $country['yesterday_confirmed'];
  //   $yesterdayDeaths = $country['yesterday_deaths'];
  //   $yesterdayRecovered = $country['yesterday_recovered'];

  //   $todayGlobalConfirmed += ($todayConfirmed - $yesterdayConfirmed);
  //   $todayGlobalDead += ($todayDeaths - $yesterdayDeaths);
  //   $todayGlobalRecovered += ($todayRecovered - $yesterdayRecovered);
  // }
};


$arr = array($todayGlobalConfirmed, $todayGlobalDead, $todayGlobalRecovered);
echo json_encode($arr);

<?php
$ThreeMonthsGlobalConfirmed = 0;
$ThreeMonthsGlobalDead = 0;
$ThreeMonthsGlobalRecovered = 0;
try {
  $pdo = new PDO("mysql:host=localhost;dbname=covidtracker", "root", "");
} catch (PDOException $e) {
  die("Unable to connect to the database");
}
$sql = "SELECT countries.name, 
three_months_data.today_recovered,
three_months_data.today_deaths,
three_months_data.today_confirmed,
three_months_data.three_months_recovered,
three_months_data.three_months_deaths,
three_months_data.three_months_confirmed
FROM (
    SELECT * FROM
    (
      SELECT 
        cases.recovered as today_recovered, 
        cases.deaths as today_deaths, 
        cases.confirmed as today_confirmed, 
        cases.country_id,
        (ROW_NUMBER() OVER (PARTITION BY country_id ORDER BY date DESC)) row_number_today
      FROM cases
    ) AS today_data
    JOIN (
      SELECT 
        cases.recovered as three_months_recovered, 
        cases.deaths as three_months_deaths, 
        cases.confirmed as three_months_confirmed, 
        cases.country_id as c_id,
        (ROW_NUMBER() OVER (PARTITION BY country_id ORDER BY date DESC)) row_number_three_months
      FROM cases
    ) as three_months_data

     ON 
        today_data.country_id = three_months_data.c_id 
        AND three_months_data.row_number_three_months = today_data.row_number_today + 90
        AND today_data.row_number_today <> 1 
     GROUP BY today_data.country_id
) as three_months_data 
JOIN countries ON three_months_data.country_id = countries.id";
$stmt = $pdo->query($sql);
while ($country = $stmt->fetch()) {
  $todayConfirmed = $country['today_confirmed'];
  $todayDeaths = $country['today_deaths'];
  $todayRecovered = $country['today_recovered'];
  $three_monthsConfirmed = $country['three_months_confirmed'];
  $three_monthsDeaths = $country['three_months_deaths'];
  $three_monthsRecovered = $country['three_months_recovered'];

  $ThreeMonthsGlobalConfirmed += ($todayConfirmed - $three_monthsConfirmed);
  $ThreeMonthsGlobalDead += ($todayDeaths - $three_monthsDeaths);
  $ThreeMonthsGlobalRecovered += ($todayRecovered - $three_monthsRecovered);
};
$arr = array($ThreeMonthsGlobalConfirmed, $ThreeMonthsGlobalDead, $ThreeMonthsGlobalRecovered);
echo json_encode($arr);

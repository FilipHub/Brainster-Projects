<?php
$MonthlyGlobalConfirmed = 0;
$MonthlyGlobalDead = 0;
$MonthlyGlobalRecovered = 0;
try {
  $pdo = new PDO("mysql:host=localhost;dbname=covidtracker", "root", "");
} catch (PDOException $e) {
  die("Unable to connect to the database");
}
$sql = "SELECT countries.name, 
one_month_data.today_recovered,
one_month_data.today_deaths,
one_month_data.today_confirmed,
one_month_data.monthly_recovered,
one_month_data.monthly_deaths,
one_month_data.monthly_confirmed
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
        cases.recovered as monthly_recovered, 
        cases.deaths as monthly_deaths, 
        cases.confirmed as monthly_confirmed, 
        cases.country_id as c_id,
        (ROW_NUMBER() OVER (PARTITION BY country_id ORDER BY date DESC)) row_number_monthly
      FROM cases
    ) as monthly_data

     ON 
        today_data.country_id = monthly_data.c_id 
        AND monthly_data.row_number_monthly = today_data.row_number_today + 30
        AND today_data.row_number_today <> 1 
     GROUP BY today_data.country_id
) as one_month_data 
JOIN countries ON one_month_data.country_id = countries.id";
$stmt = $pdo->query($sql);
while ($country = $stmt->fetch()) {
  $todayConfirmed = $country['today_confirmed'];
  $todayDeaths = $country['today_deaths'];
  $todayRecovered = $country['today_recovered'];
  $monthlyConfirmed = $country['monthly_confirmed'];
  $monthlyDeaths = $country['monthly_deaths'];
  $monthlyRecovered = $country['monthly_recovered'];

  $MonthlyGlobalConfirmed += ($todayConfirmed - $monthlyConfirmed);
  $MonthlyGlobalDead += ($todayDeaths - $monthlyDeaths);
  $MonthlyGlobalRecovered += ($todayRecovered - $monthlyRecovered);
};
$arr = array($MonthlyGlobalConfirmed, $MonthlyGlobalDead, $MonthlyGlobalRecovered);
echo json_encode($arr);

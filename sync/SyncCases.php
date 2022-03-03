<?php

function syncButton()
{
    set_time_limit(0);

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=covidtracker", "root", "");
    } catch (PDOException $e) {
        die("can not connect to db");
    }

    $sql = "SELECT * FROM countries";
    $stmt = $pdo->query($sql);
    $today = date('Y-m-d');

    while ($country = $stmt->fetch()) {
        $data = file_get_contents("https://api.covid19api.com/country/{$country['slug']}?from=2021-01-01T00:00:00Z&to={$today}T00:00:00Z");
        $data = json_decode($data, true);
        $sql = "INSERT INTO cases (country_id, active, deaths, recovered, confirmed, date)
                 VALUES (:country_id, :active, :deaths, :recovered, :confirmed, :date)";



        $stmtInsertCases = $pdo->prepare($sql);

        $stmtInsertCases->bindParam('country_id', $countryId);
        $stmtInsertCases->bindParam('active', $active);
        $stmtInsertCases->bindParam('recovered', $recovered);
        $stmtInsertCases->bindParam('deaths', $deaths);
        $stmtInsertCases->bindParam('confirmed', $confirmed);
        $stmtInsertCases->bindParam('date', $date);

        foreach ($data as $case) {
            $active = $case['Active'];
            $recovered = $case['Recovered'];
            $deaths = $case['Deaths'];
            $confirmed = $case['Confirmed'];
            $date = date("Y-m-d", strtotime($case['Date']));
            $countryId = $country['id'];

            $stmtInsertCases->execute();
        }
    }
}

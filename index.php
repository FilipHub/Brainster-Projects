<?php
include('dataToday.php');
include('dataMonth.php');
include('dataThreeMonths.php');
include('sync/SyncCases.php');
// $value = $_POST['selectCountry'];
// // // echo $value;
if (array_key_exists('syncButton', $_POST)) {
    syncButton();
}

?>
<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="Style/img/favicon1.png" type="image/ico">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">



    <title>COVID-19 Tracker</title>
</head>

<body>
    <nav class="navbar navbar-dark mt-0 fixed-top bg-dark shadow-lg">
        <div class="container-fluid mx-4">
            <a class="navbar-brand text-danger fw-bold" href="#">
                CovidTracker
            </a>
            <form method="post" class="my-1">
                <input type="submit" name="syncButton" class="fw-bold shadow btn btn-outline-danger" value="Sync new data" />
            </form>
    </nav>

    <div class="container-fluid">

        <div class="row mt-5">
            <div class="col-12">
                <div class="text-center btn-group-sm mt-5" role="group" aria-label="Basic radio toggle button group">
                    <form method="post">

                        <input runat="server" type="button" value="Today" class="btn-check" name="btnToday" id="btnToday" autocomplete="off" runat="server">
                        <label class="btn buttonStyle shadow btn-danger  mx-1" for="btnToday">Today</label>

                        <input onclick="function displayOneMonth()" type="button" value="ThisMonth" class="btn-check" name="btnMonth" id="btnMonth" autocomplete="off">
                        <label class="btn btn-danger shadow buttonStyle mx-1" for="btnMonth">One Month</label>

                        <input onclick="function displayThreeMonths()" type="button" value="ThreeMonths" class="btn-check" name="btnThreeMonths" id="btnThreeMonths" autocomplete="off">
                        <label class="btn btn-danger shadow  buttonStyle mx-1" for="btnThreeMonths">Three Months</label>

                    </form>
                </div>
            </div>

            <div class="border border-white shadow bg-data col-4 offset-4 py-3 my-3 mt-3">
                <div class="text-center col-12">
                    <h6 class="text-dark mb-0 mt-4">Total cases</h6>
                    <h1 id="confirmed"></h1>
                </div>
                <div class="col-12 text-center text-danger">
                    <h6 class="text-dark">Deaths</h6>
                    <h1 id="dead"></h1>
                </div>
                <div class="col-12 text-center text-success">
                    <h6 class="text-dark">Recovered</h6>
                    <h1 id="recovered"></h1>
                </div>
            </div>

            <div class="col-12 text-center mt-3">
                <form action="" method="POST">
                    <select class=" bg-data text-dark shadow" name="selectCountry" id="selectCountry">
                        <?php
                        echo "<option value='' selected disabled >Select a country</option>";
                        foreach ($ListTheCountries as $countryName) {
                            echo "<option id='countryNames' value='" . $countryName . "'>$countryName</option>";
                        }
                        ?>
                    </select>
                </form>

            </div>

        </div>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("document").ready(function() {
            setTimeout(function() {
                $("#btnToday").trigger('click');
            }, 1000);
        });
        $(`#selectCountry`).on("change", function() {
            var displaySelectedCoutry = $("#selectCountry option:selected").text();
            console.log(displaySelectedCoutry);
            if ($(displaySelectedCoutry).val() != 0) {
                $.post(
                    "dataToday.php", {
                        variable: displaySelectedCoutry,
                    },
                    function(data) {
                        if (data != "") {
                            console.log('Country selected sent to backend')
                        }
                    }
                );
            }
        });
    </script>


</body>

</html>
// function getCountryData() {
//   $(`#selectCountry`).on("change", function () {
//     var displaySelectedCoutry = $("#selectCountry option:selected").text();
//     $.ajax({
//       url: "dataToday.php",
//       method: "POST",
//       data: {
//         name: displaySelectedCoutry,
//       },
//       success: function (data) {
//         $("#confirmed").html(data);
//         $("#daed").html(data);
//         $("#recovered").html(data);
//       },
//     });
//   });
// }
// getCountryData();

function reqListener() {
  console.log(this.responseText);
}

// getting the todays data
var ajax = new XMLHttpRequest();
ajax.open("get", "dataToday.php", true);
ajax.send();

ajax.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    var data = JSON.parse(this.responseText);
    console.log(data);
    var html = "";

    var $Confirmed = data[0];
    var $Dead = data[1];
    var $Recovered = data[2];

    html += $Confirmed;
    html += $Dead;
    html += $Recovered;

    function displayToday() {
      document.getElementById("confirmed").innerHTML = $Confirmed;
      document.getElementById("dead").innerHTML = $Dead;
      document.getElementById("recovered").innerHTML = $Recovered;
    }
    var btnToday = document.getElementById("btnToday");
    btnToday.addEventListener("click", displayToday);
  }
};

// ajax code for getting one month data
var ajax = new XMLHttpRequest();
ajax.open("get", "dataMonth.php", true);
ajax.send();
ajax.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    var dataOneMonth = JSON.parse(this.responseText);
    console.log(dataOneMonth);

    var html = "";

    var $Confirmed = dataOneMonth[0];
    var $Dead = dataOneMonth[1];
    var $Recovered = dataOneMonth[2];

    html += $Confirmed;
    html += $Dead;
    html += $Recovered;

    function displayOneMonth() {
      document.getElementById("confirmed").innerHTML = $Confirmed;
      document.getElementById("dead").innerHTML = $Dead;
      document.getElementById("recovered").innerHTML = $Recovered;
    }
    var btnOneMonth = document.getElementById("btnMonth");
    btnOneMonth.addEventListener("click", displayOneMonth);
  }
};

// ajax code for getting the data for three months
var ajax = new XMLHttpRequest();
ajax.open("get", "dataThreeMonths.php", true);
ajax.send();
ajax.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    var dataThreeMonths = JSON.parse(this.responseText);
    console.log(dataThreeMonths);

    var html = "";

    var $Confirmed = dataThreeMonths[0];
    var $Dead = dataThreeMonths[1];
    var $Recovered = dataThreeMonths[2];

    html += $Confirmed;
    html += $Dead;
    html += $Recovered;

    function displayThreeMonths() {
      document.getElementById("confirmed").innerHTML = $Confirmed;
      document.getElementById("dead").innerHTML = $Dead;
      document.getElementById("recovered").innerHTML = $Recovered;
    }
    var btnThreeMonths = document.getElementById("btnThreeMonths");
    btnThreeMonths.addEventListener("click", displayThreeMonths);
  }
};

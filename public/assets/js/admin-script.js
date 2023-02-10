const toggleBtn = document.querySelector(".toggleBtn");
const sidebar = document.querySelector(".sidebar");

toggleBtn.addEventListener("click",()=>{
    sidebar.classList.toggle("col-2");
    sidebar.classList.toggle("activeside");
})

// google chart api
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart2);

function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  ['Italy',54.8],
  ['France',48.6],
  ['Spain',44.4],
  ['USA',23.9],
  ['Argentina',14.5]
]);

var options = {
  title:'World Wide Wine Production',
  width: 500,
  height: 300
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}




// second chart

function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Contry', 'Mhl'],
      ['Italy',55],
      ['France',49],
      ['Spain',44],
      ['USA',24],
      ['Argentina',15]
    ]);
    
    var options = {
      title:'World Wide Wine Production',
      width: 500,
      height: 300
    };
    
    var chart = new google.visualization.BarChart(document.getElementById('myChart2'));
      chart.draw(data, options);
    }
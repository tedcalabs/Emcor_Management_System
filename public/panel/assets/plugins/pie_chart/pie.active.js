
$(document).ready(function(){

	// Load google charts
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	// Draw the chart and set the chart values
	function drawChart() {
	  var data = google.visualization.arrayToDataTable([
	  ['Task', 'Competed Services Per Day'],
	  ['Installation', 1],
	  ['Check up', 2],
	  ['Repair', 3],
	  ['Cleaning', 4]
	]);

	  // Optional; add a title and set the width and height of the chart
	  var options = {'title':'Services Completed Today', 'width':500, 'height':340};

	  // Display the chart inside the <div> element with id="piechart"
	  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
	  chart.draw(data, options);
	}


	

	
});

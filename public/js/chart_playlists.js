window.onload = function() {

	var ctx = document.getElementById("graph");
	var myChart = new Chart(ctx, {
	    type: 'line',
	    data: {
	        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
	        datasets: [{
	            label: 'R3HAB Only',
	            data: [12, 19, 3, 5, 2, 3, 6],
	            backgroundColor: "rgba(75,192,192,0.4)",
	            borderColor: "rgba(75,192,192,1)",
	            borderWidth: 1
	        }, {
	        	label: 'R3HAB | Night Playlist',
	            data: [19, 23, 6, 2, 2, 8, 16],
	            backgroundColor: "rgba(75,192,192,0.4)",
	            borderColor: "rgba(75,192,192,1)",
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});

}

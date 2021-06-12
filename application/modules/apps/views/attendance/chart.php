

<html>

<head>
	<title>Pie Chart</title>
	<script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:110%">
		<canvas id="chart-area"></canvas>
	</div> 
	<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						<?php
							$tgl=date_now();
							$absen = $this->db->query("SELECT * FROM attendance WHERE tanggal='$tgl' ")->num_rows();
							$total = $this->db->query("SELECT * FROM employee WHERE division_id='1' AND status='Active' ")->num_rows();
						?>
						<?= $absen; ?>,
						<?= $total-$absen; ?> 
					],
					backgroundColor: [
						window.chartColors.green,
						window.chartColors.red, 
					],
					label: 'Chart Attendance'
				}],
				labels: [
					'Hadir (<?= $absen?>)',
					'Tidak Hadir (<?= $total-$absen ?>)' 
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		 
	</script>
</body>

</html>

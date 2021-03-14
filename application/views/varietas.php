<?php if (!defined('BASEPATH')) exit('No direct script access allowed');	?>

<?php $this->load->view($view3); ?></div>

<div class="block block-rounded">

	<div class="block-content row">
		<div class="col-12 bg-gray-lighter">
			<div id="container" style="height: 200px"></div>
		</div>
	</div>

	<div class="block-content">
		<?php
		foreach ($kode_komoditas as $kat) {
			$kode = $kat->kode;
			$namakode = $kat->nama_kode;
			$idkomo = $kat->IDkomoditas;
			$komoditas = $kat->nmkomoditas;

			echo "<h2 class='content-heading text-center'>Komoditas " . $komoditas . " <small>(" . $total . " varietas)</small></h2>";
		}
		?>
		<div class="row all-50 small-100">
			<?php
			foreach ($list_varietas as $listvar) {
				$idvar = $listvar->IDvarietas;
				$picture = $listvar->photo;
				if ($picture != '' and $picture != 'noimage.jpg') { ?>
					<div class="col-md-6 col-xl-2 border-info">
						<a class="block block-transparent" href="<?php echo base_url(); ?>frontend/varietas/detail_varietas/<?php echo $idvar ?>">

							<div class="block-content block-content-full bg-image rounded" style="background-image: url('<?php echo base_url(); ?>assets/gambar/varietas/<?php echo $picture; ?>');">
								<div class="py-50 text-center"></div>
								<div class="block-content block-content-full block-rounded block-content-sm bg-black-op">
									<div class="font-size-sm font-w700 text-white text-center"><?php echo ucwords($listvar->nmvarietas); ?></div>
								</div>
							</div>
						</a>
					</div>
				<?php } else { ?>
					<div class="col-md-6 col-xl-2">
						<a class="block block-transparent" href="<?php echo base_url(); ?>frontend/varietas/detail_varietas/<?php echo $idvar ?>">
							<div class="block-content block-content-full text-right bg-image" style="background-image: url('<?php echo base_url(); ?>assets/gambar/varietas/noimage.jpg');">
								<div class="py-50 text-center"></div>
								<div class="block-content block-content-full block-rounded block-content-sm bg-black-op">
									<div class="font-size-sm font-w700 text-white text-center"><?php echo ucwords($listvar->nmvarietas); ?></div>
								</div>
							</div>
						</a>
					</div>
			<?php }
			} ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	Highcharts.chart('container', {
		chart: {
			type: 'column',
			backgroundColor: null
		},
		title: {
			text: 'Varietas <?php echo $komoditas; ?> Paling Sering Dipesan'
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Total Pesanan'
			}
		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				BackgroundColor: null,
				borderWidth: 0,
				dataLabels: {
					enabled: false,
					format: '{point.y}'
				}
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
		},

		series: [{
			"name": "<?php echo $komoditas; ?>",
			"colorByPoint": true,
			"data": [<?php
						if ($kode == 201 or $kode == 202 or $kode == 203) {
							$top = $this->db->query("SELECT IDpesanan, IDvarietas, SUM(jml_pesanan) as jml FROM tbl_pesanan_balitsa WHERE substr(IDvarietas, 1, 4) = '$idkomo' GROUP BY IDvarietas ORDER BY jml DESC LIMIT 10");
						}
						if ($kode == 301 or $kode == 302) {
							$top = $this->db->query("SELECT IDpesanan, IDvarietas, SUM(jml_pesanan) as jml FROM tbl_pesanan_balitbu WHERE substr(IDvarietas, 1, 4) = '$idkomo' GROUP BY IDvarietas ORDER BY jml DESC LIMIT 10");
						}
						if ($kode == 101 or $kode == 102) {
							$top = $this->db->query("SELECT IDpesanan, IDvarietas, SUM(jml_pesanan) as jml FROM tbl_pesanan_balithi WHERE substr(IDvarietas, 1, 4) = '$idkomo' GROUP BY IDvarietas ORDER BY jml DESC LIMIT 10");
						}
						if ($kode == 401) {
							$top = $this->db->query("SELECT IDpesanan, IDvarietas, SUM(jml_pesanan) as jml FROM tbl_pesanan_jestro WHERE substr(IDvarietas, 1, 4) = '$idkomo' GROUP BY IDvarietas ORDER BY jml DESC LIMIT 10");
						}
						foreach ($top->result_array() as $row) {
							$idvar = $row['IDvarietas'];
							$varietas = $this->db->query("SELECT * FROM tbl_varietas WHERE IDvarietas = '$idvar'");
							foreach ($varietas->result_array() as $row2) { ?> {
							"name": "<?php echo $row2['nmvarietas']; ?>",
							"y": <?php echo $row['jml']; ?>
						},
				<?php
							}
						} ?>
			]
		}]

	});
</script>

<script>
	$(function() {
		$('#notify_btn_1').on('click', function() {
			$.Notify({
				shadow: true,
				position: 'bottom-left',
				content: "Untuk informasi pemesanan benih, silahkan klik pada PEMESANAN"
			});
		});

	});
</script>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');	?>

<?php $this->load->view($view3); ?></div>


<div class="block block-rounded">
	<div class="block-content">
		<?php $sql_benih = $this->db->query("SELECT IDkomoditas, nmkomoditas, aktif FROM  tbl_komoditas WHERE IDkomoditas='$varietas[IDkomoditas]' AND aktif='1'")->row_array();
		$komod = $sql_benih['nmkomoditas'];
		?>

		<div class="block col-12">
			<div class="row">
				<div class="col-lg-4">
					<?php $idvar = $varietas['IDvarietas'];
					$picture = $varietas['photo'];
					if ($picture != '') { ?>
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/gambar/varietas/<?php echo $picture; ?>" style="width: 100%">
					<?php } else { ?>
						<img class="img-fluid" src="<?php echo base_url(); ?>assets/gambar/varietas/noimage.jpg" style="width: 100%">
					<?php } ?>
				</div>
				<div class="col-lg-8">
					<div class="block-content block-content-full border-b clearfix">
						<div class="btn-group float-right">
							<a class="btn btn-secondary" href="<?php echo base_url(); ?>frontend/varietas/list_varietas/<?php echo $varietas['IDkomoditas'] ?>"><i class="fa fa-th-large text-primary mr-5 "></i>
								Semua Varietas </a>
						</div>
						<h2><small><?php echo $komod; ?> varietas
							</small><?php echo ucwords($varietas['nmvarietas']); ?></h2>
					</div>
					<div class="row">
						<div class="col-lg-8">
							<h4 class="mt-20 mb-10">Deskripsi</h4>
							<table class="table table-borderless">
								<tbody>
									<?php if ($varietas['no_SK'] == '') {
										echo '';
									} else { ?>
										<tr>
											<td style="width:20%"><strong>Nomor
													SK:</strong></td>
											<td><?php echo $varietas['no_SK']; ?>
											</td>
										</tr> <?php } ?>
									<?php if ($varietas['pemulia'] == '') {
										echo '';
									} else { ?>
										<tr>
											<td><strong>Pemulia: </strong></td>
											<td><?php echo $varietas['pemulia']; ?>
											</td>
										</tr> <?php } ?>
									<?php if ($varietas['potensi_hsl'] == '') {
										echo '';
									} else { ?>
										<tr>
											<td><strong>Potensi Hasil:</strong></td>
											<td><?php echo $varietas['potensi_hsl']; ?>
											</td>
										</tr> <?php } ?>
									<?php if ($varietas['rataan_hsl'] == '') {
										echo '';
									} else { ?>
										<tr>
											<td><strong>Rataan Hasil:</strong></td>
											<td><?php echo $varietas['rataan_hsl']; ?>
											</td>
										</tr>
									<?php } ?>
									<tr>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-4">
							<h4 class="mt-20 mb-10">Jenis Benih</h4>
							<table class="table table-striped table-bordered mt-20">
								<tbody>
									<?php
									$sql = $this->db->query("SELECT IDbenih,IDvarietas, IDjnsbenih, IDstatus FROM  tbl_benih WHERE IDvarietas='$idvar'");

									//$n=mysqli_num_rows($result);
									foreach ($sql->result_array() as $row) {
										//while ($row = mysqli_fetch_array($result)){  
										$jenisben = $row['IDjnsbenih'];
										$IDstatus = $row['IDstatus'];

										$sql2 = $this->db->query("SELECT * FROM  tbl_jnsbenih WHERE IDjnsbenih='$jenisben'");
										//$result2 = mysqli_query($sql2);
										//$row2 = mysqli_fetch_array($result2);
										foreach ($sql2->result_array() as $row2) {
											$jenisben2 = $row2['nmjenis'];
											$ket = $row2['keterangan'];
										}

										$sql3 = $this->db->query("SELECT * FROM  tbl_status_benih WHERE IDstatus_ben='$IDstatus'");
										//$result3 = mysqli_query($sql3);
										//$row3 = mysqli_fetch_array($result3);
										foreach ($sql3->result_array() as $row3) {
											$statusben = $row3['status_benih'];
										}
									?> <tr>
											<td class="font-w400">
												<?php echo $ket;
												echo " [" . $jenisben2 . "]"; ?>
											</td>
											<td><?php echo $statusben ?></td>
										</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>
						<div class="col-12 nice-copy">
							<?php if ($varietas['deskripsi'] == '') {
								echo '';
							} else { ?><p>
									<?php $isi = nl2br($varietas['deskripsi']);
									echo "$isi";
								}
								echo ". ";
								if ($varietas['karakter'] == '') {
									echo '';
								} else {
									$isi2 = nl2br($varietas['karakter']);
									echo "$isi2";
									echo ". "; ?><?php } ?>
								</p>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center">
				<a class="btn btn-md btn-primary" href="<?php echo base_url(); ?>frontend/varietas/list_varietas/<?php echo $varietas['IDkomoditas'] ?>">Lihat Varietas Lain
				</a>
			</div>

		</div>
	</div>
</div>
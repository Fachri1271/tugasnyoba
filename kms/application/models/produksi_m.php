<?php
	class Produksi_m extends CI_Model
	{
		private $komoditas = 'tbl_komoditas';	
		
		//Opertaor ======================================================================
		function total($table, $kode_upbs)
		{
			$sql="SELECT * FROM $table WHERE kd_upbs=?";
			return $this->db->query($sql, $kode_upbs)->num_rows();	
		}	
		
		function komoditass($kode_upbs, $offset, $limit)//komoditas buat pagging
		{
			$sql = "SELECT tbl_komoditas.IDkomoditas, tbl_komoditas.kode, tbl_komoditas.nmkomoditas FROM tbl_komoditas 
					WHERE tbl_komoditas.kd_upbs= ? 
					ORDER BY 
						nmkomoditas ASC 
					LIMIT $offset, $limit";
			return $this->db->query($sql, $kode_upbs)->result();
		}
		function daftar_komoditas($kode_upbs)
		{
			$sql = "SELECT tbl_komoditas.IDkomoditas, tbl_komoditas.kode, tbl_komoditas.nmkomoditas FROM tbl_komoditas 
					WHERE tbl_komoditas.kd_upbs= ? 
					ORDER BY nmkomoditas ASC";
			return $this->db->query($sql, $kode_upbs)->result();
		}
		/*
		function varietass($idkomoditas, $offset, $limit)//varietas buat pagging
		{
			$sql="SELECT IDvarietas, nmvarietas 
				  FROM tbl_varietas 
				  WHERE IDkomoditas = ? 
				  ORDER BY nmvarietas ASC
				  LIMIT $offset, $limit";
			return $this->db->query($sql, $idkomoditas);
		}
		*/
		function varietass($idkomoditas, $offset, $limit)//varietas buat pagging
		{
			$sql="SELECT IDvarietas, nmvarietas, photo, deskripsi
				  FROM tbl_varietas 
				  WHERE IDkomoditas = ? 
				  AND akti='1'
				  ORDER BY nmvarietas ASC
				  LIMIT $offset, $limit";
			return $this->db->query($sql, $idkomoditas);
		}
		
		function total_varietas($idkomoditas)
		{
			$sql="SELECT * FROM tbl_varietas WHERE IDkomoditas=?";
			return $this->db->query($sql, $idkomoditas)->num_rows();	
		}	

		function daftar_varietas($idkomoditas)
		{
			$sql="SELECT IDvarietas, nmvarietas FROM tbl_varietas WHERE IDkomoditas = ? AND aktif='1' ORDER BY nmvarietas ASC";
			return $this->db->query($sql, $idkomoditas)->result();
		}
		function detail_komoditas($idkomoditas){
			$sql="SELECT IDkomoditas, nmkomoditas, kd_upbs, kode FROM tbl_komoditas WHERE IDkomoditas = ?";
			return $this->db->query($sql, $idkomoditas);
		}	
		function detail_varietas($IDvarietas)
		{
			$sql="SELECT IDkomoditas, IDvarietas, nmvarietas, photo, var_kategori, no_SK, rilis, tetua, IDsampstat, potensi_hsl, rataan_hsl, karakter, pemulia, deskripsi, aktif, status_sk FROM tbl_varietas WHERE IDvarietas=?";
			return $this->db->query($sql, $IDvarietas);
		}
		
		function mak_varietas($IDkomoditas){
			$sql = "SELECT MAX(IDvarietas) AS maks FROM tbl_varietas WHERE IDkomoditas = ?";	
			return $this->db->query($sql, $IDkomoditas)->row_array();
				//$IDstok_lama = $sql['maks'];
				//$ambilIDstok = (int) substr($IDstok_lama, 5, 3);
				//$ambilIDstok += 1;
				//$newIDstok = $IDkomoditas.sprintf("%03s", $ambilIDstok);
		}
		
		
		
		function tambah_varietas($idkomoditas, $maxs, $IDvarietas, $nmvarietas, $nama_gambar, $kattanaman, $nosk, $thrilis, $aslprslngan, $potensihsl, $rataan, $keunggulan, $pemulia, $tambahan, $tampil, $statvar){
			 $data = array(
						'IDkomoditas' => $idkomoditas,
						'IDvarietas' => $IDvarietas,
						'nmvarietas' => $nmvarietas,
						'photo' => $nama_gambar,
						'var_kategori' => $kattanaman,
						'no_SK' => $nosk,
						'rilis'=> $thrilis,
						'tetua'=> $aslprslngan,
						'potensi_hsl' => $potensihsl,
						'rataan_hsl'=> $rataan,
						'karakter'=> $keunggulan,
						'pemulia'=>$pemulia,
						'deskripsi'=>$tambahan,
                        'aktif' => $tampil,
                        'status_sk' => $statvar
			);	
			$this->db->insert('tbl_varietas', $data);								
		}
        
        
		function edit_varietas($idkomoditas, $IDvarietas, $nmvarietas, $nama_gambar, $kattanaman, $nosk, $thrilis, $aslprslngan, $potensihsl, 
								 $rataan, $keunggulan, $pemulia, $tambahan, $tampil, $statvar){
			 $data = array(
						'nmvarietas' => $nmvarietas,
						'photo' => $nama_gambar,
						'var_kategori' => $kattanaman,
						'no_SK' => $nosk,
						'rilis'=> $thrilis,
						'tetua'=> $aslprslngan,
						'potensi_hsl' => $potensihsl,
						'rataan_hsl'=> $rataan,
						'karakter'=> $keunggulan,
						'pemulia'=>$pemulia,
						'deskripsi'=>$tambahan,
						'aktif' => $tampil,
                        'status_sk' => $statvar
			);	
			$this->db->where('IDkomoditas', $idkomoditas);
			$this->db->where('IDvarietas', $IDvarietas);
			$this->db->update('tbl_varietas', $data);	
		}
		function varietas_delete($IDvarietas){
			$this->db->where('IDvarietas', $IDvarietas);
			$this->db->delete('tbl_varietas');
		}
		//benih
		function benih($IDvarietas, $offset, $limit)//komoditas buat pagging
		{
			$sql = "SELECT * FROM tbl_benih WHERE LEFT(IDvarietas, 4) = ? 
					ORDER BY IDvarietas ASC 
					LIMIT $offset, $limit";
			return $this->db->query($sql, $IDvarietas)->result();
		}
		function total_benih($table, $IDvarietas)
		{
			$sql="SELECT * FROM tbl_benih WHERE LEFT(IDvarietas, 4) = ? ";
			return $this->db->query($sql, $IDvarietas)->num_rows();	
		}	
		function mak_benih($kode_upbs){
			$sql = "SELECT MAX(IDbenih) AS maks FROM tbl_benih WHERE LEFT(IDvarietas, 1) = ?";	
			return $this->db->query($sql, $kode_upbs)->row_array();
		}
		function jenis_benih($kode_upbs)
		{
			$sql="SELECT * FROM tbl_jnsbenih WHERE LEFT(IDjnsbenih,1)=?";
			return $this->db->query($sql, $kode_upbs);	
		}
		//tbl_status_benih	
		function tbl_lokasi($kode_upbs)
		{
			$sql="SELECT * FROM tbl_lokasi WHERE LEFT(IDlokasi, 1)=?";
			return $this->db->query($sql, $kode_upbs);	
		}	
		function satuan($kode_upbs)
		{
			$sql="SELECT * FROM tbl_satuan WHERE LEFT(IDsatuan, 1)=? ORDER BY IDsatuan ASC";
			return $this->db->query($sql, $kode_upbs);	
		}	
		function tbl_status_benih()
		{
			$sql="SELECT * FROM tbl_status_benih";
			return $this->db->query($sql);	
		}
		
		function tambah_benih($newIDbenih, $IDvarietas, $IDjnsbenih, $IDlokasi, $masa_simpan, $IDstatus, $IDsatuan, $harga, $order)
		{
			 $data = array(
						'IDbenih' => $newIDbenih,
						'IDvarietas' => $IDvarietas,
						'IDjnsbenih' => $IDjnsbenih,
						'IDsatuan' => $IDsatuan,
						'IDlokasi' => $IDlokasi,
						'masa_smpn' => $masa_simpan,
						'IDstatus'=> $IDstatus,
						'harga'=> $harga,
						'min_order'=> $order
			);	
			$this->db->insert('tbl_benih', $data);								
		}
		function detail_benih($IDbenih){
			$sql="SELECT * FROM tbl_benih WHERE IDbenih=?";
			return $this->db->query($sql, $IDbenih);				
		}
		function edit_benih($IDbenih, $IDvarietas, $IDjnsbenih, $IDlokasi, $masa_simpan, $IDstatus, $IDsatuan, $harga, $order){
			 $data = array(
						'IDvarietas' => $IDvarietas,
						'IDjnsbenih' => $IDjnsbenih,
						'IDsatuan' => $IDsatuan,
						'IDlokasi' => $IDlokasi,
						'masa_smpn' => $masa_simpan,
						'IDstatus'=> $IDstatus,
						'harga'=> $harga,
						'min_order'=> $order
			);	
			$this->db->where('IDbenih', $IDbenih);
			$this->db->update('tbl_benih', $data);	
			
		}
		
		function benih_delete($IDbenih){
			$this->db->where('IDbenih', $IDbenih);
			$this->db->delete('tbl_benih');
		}

//*********************************** TAMBAH PRODUKSI *************************************************//

		function kategori_komoditas($kode_upbs){
			$sql = "SELECT kode, nama_kode FROM tbl_kat_komoditas WHERE LEFT(kode, 1) = ? ORDER BY nama_kode ASC";
			return $this->db->query($sql, $kode_upbs);
		}
		function data_komoditas($IDKatkomoditas){
			$sql = "SELECT * FROM tbl_komoditas WHERE kode = ?";
			return $this->db->query($sql,array($IDKatkomoditas));
		}
		function produksi_add_pro($tabel_stok, $newIDstok, $IDbenih, $IDjenis_benih, $jml_stok, $last_update, $bulan, $tahun)
		{
			 $data = array(
						'IDstok' => $newIDstok,
						'IDbenih' => $IDbenih,
						'IDjnsbenih' => $IDjenis_benih,
						'jml_stok' => $jml_stok,
						'last_update' => $last_update,
						'bulan' => $bulan,
						'Tahun'=> $tahun
			);	
			$this->db->insert($tabel_stok, $data);								
		}
		function produksi_edit_pro($tabel_stok, $IDstoks, $jml_stok, $last_update){
			 $data = array(
						'jml_stok' => $jml_stok,
						'last_update' => $last_update,
			);	
			$this->db->where('IDstok', $IDstoks);
			$this->db->update($tabel_stok, $data);	
		}
	}
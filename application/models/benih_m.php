<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Benih_m extends CI_Model
{



	function total_varietas($idkomoditas)
	{
		$sql = "SELECT * FROM tbl_varietas WHERE IDkomoditas=? AND aktif = '1'";
		return $this->db->query($sql, $idkomoditas)->num_rows();
	}


	function varietass($idkomoditas, $offset, $limit) //varietas buat pagging
	{
		$sql = "SELECT IDvarietas, nmvarietas, photo, deskripsi, aktif
				  FROM tbl_varietas 
				  WHERE IDkomoditas = ?
				  AND aktif = '1'
				  ORDER BY nmvarietas ASC
				  LIMIT $offset, $limit";
		return $this->db->query($sql, $idkomoditas);
	}

	function tampil_kode()
	{
		$this->db->select('*');
		$this->db->from('tbl_komoditas');
		$this->db->where('IDkomoditas', '3014');
		$this->db->where('aktif', 1);
		$this->db->join('tbl_kat_komoditas', 'tbl_kat_komoditas.kode=tbl_komoditas.kode', 'left');
		$result = $this->db->get();
		return $result;
	}





	function detail_varietas($IDvarietas)
	{
		$sql = "SELECT IDkomoditas, IDvarietas, nmvarietas, photo, var_kategori, no_SK, rilis, tetua, IDsampstat, potensi_hsl, rataan_hsl, karakter, pemulia, deskripsi, aktif FROM tbl_varietas WHERE IDvarietas=? AND aktif='1'";
		return $this->db->query($sql, $IDvarietas);
	}
}

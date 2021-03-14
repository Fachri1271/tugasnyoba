		$(document).ready(function()
		{
			$(".add-kategori-upbs").click(function()
			{
				$(".add_kat_upbs").show();
			});	
			
			//scroolbox
			$("#scrollbox1").scrollbar({
				height: 490,
				axis: 'y'
			});
			$("#scrollbox2").scrollbar({
				height: 490,
				axis: 'x'
			});	
			$("#scrollbox3").scrollbar({
				height: 490
			});			
			
			//validasi	
			// validate signup form on keyup and submit
			$("#signupForm").validate({
				rules: {
					//produksi
					jml_produksi:{
						required:true,
						number: true,
					},
					//pemasaran
					nama:{
						required:true,
						minlength: 3,
					},
					//pemesanan
					no_bon:"required",
					IDpelanggan:"required",
					tgl_pesanan:"required",
					jml_var:{
						required:true,
						number: true,
					},
					//end pesanan
					
					startDate:"required",
					IDkategori:"required",
					
					lembaga:"required",
					nmlembaga:"required",
					//pulau:"required",
					//provinsi:"required",
					//kabupaten:"required",
					//kecamatan:"required",
					//alamat:"required",
					email:{
						required:false,
						email: true
					},
					
					//pelaporan
					komoditas:"required",nmkomoditas:"required", jenis_benih:"required", 
					lokasi:"required", kdjnsbenih:"required",katjnsbenih:"required", satuan:"required", 
					storage:"required",jabatan:"required",status:"required",
					
					//varietas
					nmvarietas:"required",
					nmkategori:"required",
					aslprslngan:"required",
					kattanaman:"required",
					asltanaman:"required",
					potensihsl:"required",
					rataan:"required",
					keunggulan:"required",
					pemulia:"required",
					tambahan:"required",
					nosk:"required",
					thrilis:{
						required: true,
						number: true,
						minlength: 4,
						maxlength: 4
					},
				},
				messages: {	
					//produksi
					jml_produksi:{
						required:"* field ini harus diisi",
						number:"* Harus diisi angka "
					},		
					//pemasaran
					nama:{
						required:"* Silahkan isi dengan nama",
						minlength: "* Minimal 3 karakter"					
					},
					//pemesanan
					no_bon:"* nomor bon harus diisi",
					IDpelanggan:"* silahkan pilih nama pelanggan",
					tgl_pesanan:"* silahkan isi tanggal pemesanan",
					jml_var:{
						required:"* Silahkan isi jumlah varietas",
						number:"* Harus diisi angka "
					},		
					//end pemesanan
					startDate:"* periode harus diisi",
					IDkategori:"* Silahkan pilih kode kategori",
					lembaga:"* Silahkan pilih lembaga",
					nmlembaga:"* Silahkan isi nama lembaga",
					//pulau:"* Silahkan pilih kepulauan",
					//provinsi:"* Silahkan pilih provinsi",
					//kabupaten:"* Silahkan pilih kabupaten",
					//kecamatan:"* Silahkan pilih kecamatan",
					//alamat:"* Silahkan isi alamat",
					email:"* Silahkan isi email yang valid",

					//varietas
					nmvarietas:"* Silahkan isi dengan nama varietas",
					nmkategori:"* Silahkan isi dengan nama kateogri",
					aslprslngan:"* Silahkan masukan Tetua/Asal Persilangan",
					kattanaman:"* Silahkan pilih kategori tanaman",
					asltanaman:"* Silahkan pilih asal tanaman",
					potensihsl:"* Silahkan masukan potensi hasil",
					rataan:"* Jika tidak ada rataan di isi (-)",
					keunggulan:"* Silahkan isi keunggulan",
					pemulia:"* Silahkan isi nama pemulia",
					tambahan:"* Silahkan isi deskripsi tambahan",
					nosk:"* Silahkan masukan Nomor SK",
					thrilis:{
						required:"* Silahkan masukan tahun",
						number:"* Harus diisi angka ex. 2014",
						minlength: "* Minimal 4 digit angka ex..2014",						
						maxlength: "* Maksimal 4 digit angka ex..2014"						
					},
					//pelaporan
					komoditas:"* Silahkan pilih komoditas",
					nmkomoditas:"* Silahkan isi nama komoditas",
					lokasi:"* Silahkan pilih lokasi penyimpanan",
					jenis_benih:"* Silahkan masukan jenis benih",
					kdjnsbenih:"* Silahkan masukan kode jenis benih",
					katjnsbenih:"* Silahkan masukan kategori jenis",
					satuan:"* Silahkan masukan nama satuan",
					storage:"* Silahkan masukan tempat penyimpanan",
					jabatan:"* Silahkan isi jabatan",
					status:"* Silahkan isi status",
					
				}
			});
			
		});//end dokumen		

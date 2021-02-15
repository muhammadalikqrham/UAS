//Provinsi
$(document).ready(function(){
    $('.ubahDataProvinsi').on('click', function(){
        $('#judulModalProvinsi').html('Ubah Data Provinsi');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','apps/prov/edit_prov.php');
        const kdProv = $(this).data('id');

        $.ajax({
            url: 'apps/prov/edit_prov.php',
            data: {kdProv : kdProv},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#kdProv').val(data.kd_provinsi);
                $('#nmProv').val(data.nm_provinsi);

            }      
        });
    });

    $('.btnSimpanProvinsi').on('click', function(){
        $('#judulModalProvinsi').html('Tambah Data Provinsi');
        $('.modal-footer button[type=submit]').html('Tambah Data');
            const kdProvAwal = "oke";

            $.ajax({
    
                url: 'apps/prov/edit_prov.php',
                data: {kdProvAwal : kdProvAwal},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#kdProv').val(parseInt(data.kd_provinsi) + 1);
                    $('#nmProv').val('');
                }
                
            });
    });
    //DELETE PROVINSI
    $('.tombol-hapus').on('click',function(e){
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Anda yakin ingin menghapus data ini ?',
			text: "Data ini tidak akan dikembalikan lagi",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Hapus !'	
			}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.value) {
                document.location.href = href; 
                
			} 
			});
    });
//KABKOTA
    $('.ubahDataKabkota').on('click', function(){
        $('#judulModalKabkot').html('Ubah Data Kabupaten/Kota');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','apps/kabkot/edit_kabkot.php');
        const kdKabkot = $(this).data('id');

        $.ajax({
            url: 'apps/kabkot/edit_kabkot.php',
            data: {kdKabkot: kdKabkot},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#kdKabkot').val(data.kd_kabkota);
                $('#nmKabkot').val(data.nm_kabkota);
                $(".filter-option-inner-inner").html(data.nm_provinsi);
                $("#prov option[value='" + data.kd_provinsi+ "']").attr("selected","selected");


            }      
        });
    });

    $('.btnSimpanKabkot').on('click', function(){
        $('#judulModalKabkot').html('Tambah Data Kabupaten/Kota');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action','apps/kabkot/add_kabkot.php');

            const kdKabkotAwal = "oke";
            const awal = "default";
            $(".filter-option-inner-inner").html('--! Pilih Provinsi !--');
            $("#prov option[value='default']").attr("selected","selected");
            $.ajax({
                url: 'apps/kabkot/edit_kabkot.php',
                data: {kdKabkotAwal : kdKabkotAwal},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#kdKabkot').val(parseInt(data.kd_kabkota) + 1);
                    $('#nmKabkot').val('');
                    
                }
                
            });
    });

    //Kecamatan
    $('.ubahDataKecamatan').on('click', function(){
        $('#judulModalKecamatan').html('Ubah Data Kabupaten/Kota');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','apps/kecamatan/edit_kecamatan.php');
        const kdKecamatan = $(this).data('id');

        $.ajax({
            url: 'apps/kecamatan/fetchKecamatan.php',
            data: {kdKecamatan: kdKecamatan},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#kdKecamatan').val(data.kd_kecamatan);
                $('#nmKecamatan').val(data.nm_kecamatan);
                $(".filter-option-inner-inner").html(data.nm_kabkota);
                $("#kabkota option[value='" + data.kd_kabkota+ "']").attr("selected","selected");

            }      
        });
    });

    $('.btnSimpanKecamatan').on('click', function(){
        $('#judulModalKecamatan').html('Tambah Data Kecamatan');
        $('.modal-footer button[type=submit]').html('Tambah Data');
            const kdKecamatanAwal = "oke";
            $(".filter-option-inner-inner").html('--! Pilih Kabupaten/Kota !--');
            $("#prov option[value='default']").attr("selected","selected");

            $.ajax({
    
                url: 'apps/kecamatan/fetchKecamatan.php',
                data: {kdKecamatanAwal : kdKecamatanAwal},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#kdKecamatan').val(parseInt(data.kd_kecamatan) + 1);
                    $('#nmKecamatan').val('');
                }
                
            });
    });

    //Desa
    $('.ubahDataDesa').on('click', function(){
        $('#judulModalDesa').html('Ubah Data Kabupaten/Kota');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','apps/desa/edit_desa.php');
        const kdDesa = $(this).data('id');
        $.ajax({
            url: 'apps/desa/fetchDesa.php',
            data: {kdDesa: kdDesa},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#kdDesa').val(data.kd_desa);
                $('#nmDesa').val(data.nm_desa);
                $(".filter-option-inner-inner").html(data.nm_kecamatan);
                $("#kecamatan option[value='" + data.kd_kecamatan+ "']").attr("selected","selected");

            }      
        });
    });

    $('.btnSimpanDesa').on('click', function(){
        $('#judulModalDesa').html('Tambah Data Desa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
            const kdDesaAwal = "oke";
            $(".filter-option-inner-inner").html('--! Pilih Kecamatan !--');
            $("#prov option[value='default']").attr("selected","selected");

            $.ajax({
    
                url: 'apps/desa/fetchDesa.php',
                data: {kdDesaAwal : kdDesaAwal},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#kdDesa').val(parseInt(data.kd_desa) + 1);
                    $('#nmDesa').val('');
                }
                
            });
    });

    //PENDUDUK
    $('.ubahDataPenduduk').on('click', function(){
        $('#judulModalPenduduk').html('Ubah Data Penduduk');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','apps/penduduk/edit_penduduk.php');
        const kdPenduduk = $(this).data('id');
        $.ajax({
            url: 'apps/penduduk/fetchPenduduk.php',
            data: {kdPenduduk: kdPenduduk},
            method: 'post',
            dataType: 'json',
            success: function(data){
                // console.log(data.id_penduduk);
                $('#kdPenduduk').val(data.id_penduduk);
                $('#nmPenduduk').val(data.nm_penduduk);
                $('#tgl_lahir').val(data.tgl_lahir);
                $('#agama').val(data.agama);
                $('#alamat').val(data.alamat);
                $("#Provinsi option[value='" + data.kd_provinsi+ "']").attr("selected","selected");
                childProv();
                document.getElementById("samarinda");
                var tes =document.querySelector("#Samarinda");
                console.log( $("#Kabkota").val("Samarinda"))
                childKabkota();
                $("#Kabkota").val("Samarinda").prop("selected","selected");
                document.getElementById("kecamatan").value = data.kd_kecamatan;
                childKecamatan();
                document.getElementById("Desa").value = data.kd_desa;

                // $(".filter-option-inner-inner").(data.nm_provinsi);
                // console.log(document.getElementById("Kabkota"));
                // document.getElementById(data.kd_kabkota).selected=true;
                // $("#kecamatan option[value='" + data.kd_kecamatan+ "']").attr("selected","selected");
                // $("#Desa option[value='" + data.kd_desa+ "']").attr("selected","selected");
                $("#StatusNikah option[value='" + data.status_nikah+ "']").attr("selected","selected");
                $("#Pekerjaan option[value='" + data.status_kerja+ "']").attr("selected","selected");
                // $(".filter-option-inner-inner").html(data.);
                // $(".filter-option-inner-inner").html(data.nm_provinsi);
                // $("#Provinsi option[value='" + data.kd_provinsi+ "']").attr("selected","selected");
            }      
        });
        
    });

    $('.btnSimpanPenduduk').on('click', function(){
        $('#judulModalPenduduk').html('Tambah Data Penduduk');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action','apps/penduduk/add_penduduk.php');
            const kdPendudukAwal = "oke";
            // $(".filter-option-inner-inner").html('--! Pilih Provinsi !--');
            // $("#prov option[value='default']").attr("selected","selected");

            $.ajax({
    
                url: 'apps/penduduk/fetchPenduduk.php',
                data: {kdPendudukAwal : kdPendudukAwal},
                method: 'post',
                dataType: 'json',
                success: function(data){
                    $('#kdPenduduk').val(parseInt(data.id_penduduk) + 1);
                }
                
            });
            $('#nmPenduduk').val('');
            $('#tgl_lahir').val('');
            $('#agama').val('default');
            $('#alamat').val('');
            document.getElementById("Provinsi").value = "false";
            document.getElementById("Kabkota").value = "default";
            document.getElementById("kecamatan").value = "default";
            document.getElementById("Desa").value = "default";
            document.getElementById("StatusNikah").value = "default";
            document.getElementById("Pekerjaan").value = "default";
            $('.prov').remove();

    });

    
})
function childProv(){
    let kdProv = $("#Provinsi").val();
    console.log(kdProv);
    $.ajax({
    
        url: 'apps/penduduk/fetchPenduduk.php',
        data: {kdProv : kdProv},
        method: 'post',
        dataType: 'json',
        success: function(data){
            $('.prov').remove();
            for (let i = 0; i < data.length; i++) {
                $("#Kabkota").append("<option id='"+data[i]['nm_kabkota']+"' value='" + data[i]['kd_kabkota'] + "' class='prov'>" + data[i]['nm_kabkota'] +"</option");
            }
        }
    });  
}
function childKabkota(){
    let kdKabkota = $("#Kabkota").val();
    $.ajax({
    
        url: 'apps/penduduk/fetchPenduduk.php',
        data: {kdKabkota : kdKabkota},
        method: 'post',
        dataType: 'json',
        success: function(data){
            $('.kabkota').remove();
            for (let i = 0; i < data.length; i++) {
                $("#kecamatan").append("<option value='" + data[i]['kd_kecamatan'] + "' class='kabkota'>" + data[i]['nm_kecamatan'] +"</option");
            }
        }
    });  
}
function childKecamatan(){
    let kdKecamatanOps = $("#kecamatan").val();
    $.ajax({
    
        url: 'apps/penduduk/fetchPenduduk.php',
        data: {kdKecamatanOps : kdKecamatanOps},
        method: 'post',
        dataType: 'json',
        success: function(data){
            $('.desa').remove();
            for (let i = 0; i < data.length; i++) {
                $("#Desa").append("<option value='" + data[i]['kd_desa'] + "' class='desa'>" + data[i]['nm_desa'] +"</option");
            }
        }
    });  
}

$(function validateForm(){
    $('input.btn-login').on('click',function(){
     //    e.preventDefault();
        if ($('.username').val() != '' && $('.password').val() == '') {
            $('input.password').addClass('is-invalid');
            $('.invalid-feedback').html("Password harus diisi");
 
            return false;
        }
        else if ($('.username').val() == '' && $('.password').val() != '') {
         $('input.username').addClass('is-invalid');
            $('.invalid-feedback').html("Username harus diisi");
 
            return false;
     } 
     else if ($('.username').val() == '' && $('.password').val() == ''){        
         $('input.username').addClass('is-invalid');
         $('input.password').addClass('is-invalid');
            $('.invalid-feedback').html("Username dan Password harus diisi");
 
            return false;
     }
     else {
         return true;
     }
    })
 });

 $(function validateRegister(){
    $('#daftar').on('click',function(){
     //    e.preventDefault();
        if ($('.firstName').val() == '' || $('.seconName').val() == '' || $('.username').val() == '' || $('.password').val()== '' || $('.confPassword').val() == '')  {
            $('.firstName').addClass('is-invalid');
            $('.secondName').addClass('is-invalid');
            $('.username').addClass('is-invalid');
            $('.password').addClass('is-invalid');
            $('.confPassword').addClass('is-invalid');
            $('.invalid-feedback').html("Semua field harus disi !");
 
            return false;
        }
        else if ($('.password').val() != $('.confPassword').val()) {
         $('.password').addClass('is-invalid');
         $('.confPassword').addClass('is-invalid');
            $('.invalid-feedback').html("Password dan konfirmasi password harus sama !");
 
            return false;
     } 
     else if ($('.password').val().length < 8){        
         $('.password').addClass('is-invalid');
         $('.confpassword').addClass('is-invalid');
            $('.invalid-feedback').html("Password lebih dari 8 karakter");
 
            return false;
     }
     else {
         return true;
     }
    })
 });



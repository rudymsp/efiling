<!DOCTYPE html>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>

<script>
$(document).ready(function(){
// $(".hide_menu").click(function(){
    $('#menu_div').css("display","none");
// });
$(".hide_menu").click(function(){
    // $('#menu_div').css("display","none");
});    
$(".show_menu").click(function(){
    $('#menu_div').css("display","initial");
});
});
</script>
<style>
.show_hide{
   position:fixed;
   margin: 30px 30px;
}
</style>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>Cute file browser</title>

	 <!-- Bootstrap Core CSS -->
    <link href="http://localhost/efiling/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Include our stylesheet -->
	<link href="http://localhost/efiling/assets/css/styles.css" rel="stylesheet"/>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

</head>
<body>

    <input type="hidden" name="" id="url" value="<?= base_url('cute') ?>">
    
	<div class="filemanager">

		<div class="search">
			<input type="search" placeholder="Find a file.." />
		</div>

		<div class="breadcrumbs"></div>

		<ul class="data"></ul>

		<div class="nothingfound">
			<div class="nofiles"></div>
			<span>No files here.</span>
		</div>
	</div>

	<div class="col-sm-2">
          <a href="javascript:void(0)" onclick="create_folder()" class="btn btn-block btn-primary">
                 <span class="glyphicon glyphicon-edit"> Buat Folder</span>
          </a>
    </div>
    <div class="col-sm-2">
          <a href="javascript:void(0)" onclick="rename_folder()" class="btn btn-block btn-primary">
                 <span class="glyphicon glyphicon-edit"> Ganti Nama Folder</span>

          </a>
    </div>
    <div class="col-sm-2">
          <a href="javascript:void(0)" onclick="delete_folder()" class="btn btn-block btn-primary">
                 <span class="glyphicon glyphicon-edit"> Hapus Folder</span>
          </a>
    </div>
    <div class="col-sm-2">
        
        <form action="<?php echo base_url() ?>doku/Dokumentasi/mimin/" method="POST">
            <input id="alamatnya" type="hidden" name="alamat" >
            <button type="submit" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-edit"></span> Management File</button>
            
        </form>
        <form id="karyawan" action="http://localhost/efiling/scan.php" method="POST">
              <input id="id_karyawan" type="hidden" name="id_karyawan" value="<?php echo $this->session->userdata('id_karyawan') ?>">
        </form>
        <script type="text/javascript">
            $(document).ready( function(){
                ambilalamat();
            })

            $(document).click( function(){
                ambilalamat();
            })

            function ambilalamat(){
                var str = subStrAfterChars(window.location.href,'#','b');
                var res = str.replace("%2F","-");

                $('#alamatnya').val(res);
            }
        </script>
          <!-- <a href="javascript:void(0)" onclick="management_file()" class="btn btn-block btn-primary">
                 <span class="glyphicon glyphicon-edit"> Management File</span>
          </a> -->
          <?php echo $this->session->userdata('id_karyawan'); ?>
    </div>
    <?php 
        $hak_akses = $this->session->userdata('hak_akses');
        $pos = strpos($hak_akses,"6");
        if ($pos===false) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman E-Filing');
            // redirect(base_url().'#files','refresh');
        } else {
                echo "
                <div class='col-sm-2'>
                      <a href='javascript:void(0)' onclick='edit_akses()' class='btn btn-block btn-primary'>
                             <span class='glyphicon glyphicon-edit'> Edit Akses Folder</span>
                      </a>
                </div>";
        }
    ?>

	<!--footer>
        <a class="tz" href="http://tutorialzine.com/2014/09/cute-file-browser-jquery-ajax-php/">Cute File Browser with jQuery, AJAX and PHP</a>
        <div id="tzine-actions"></div>
        <span class="close"></span>
    </footer-->

    <!-- Modal Buat Folder -->
    <div class="modal fade" id="modal_tambah_folder" name="modal_tambah_folder" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_tambah_folder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <!--thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kas Masuk</th>
                                        <th>Nama Customer</th>
                                        <th>Tanggal</th>  
                                        <th>Keterangan</th>                                      
                                        <th>Pilih</th>
                                    </tr>
                                </thead-->
                                <tbody>
                                	<form class="form-horizontal" action=<?php echo base_url() ?>Buat method="post">
                                		<div class="row">
                                			<label class="control-label col-sm-3">Nama Folder</label>
                                			<div class="col-sm-4">
                                       	 		<input class="form-control" type="text" name="nama_folder" required>
                                        	</div>
                                    	</div>
                                    	<br>
                                    	<div class="row">
                                			<!-- <label class="control-label col-sm-3">Keterangan</label> -->
                                			<div class="col-sm-6">
                                        		<!-- <input class="form-control" type="text" name="keterangan_folder"> -->
                                        	</div>
                                        	<input class="form-control" type="hidden" name="alamat_folder">
                                    	</div>
                                    	<!-- <input type="submit"> -->
                                        <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" class="btn btn-primary">add</button>
                                        </div>
                                	</form>
                                </tbody>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="refresh()"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ganti Nama Folder -->
    <div class="modal fade" id="modal_ganti_nama_folder" name="modal_ganti_nama_folder" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_tambah_folder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <!--thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kas Masuk</th>
                                        <th>Nama Customer</th>
                                        <th>Tanggal</th>  
                                        <th>Keterangan</th>                                      
                                        <th>Pilih</th>
                                    </tr>
                                </thead-->
                                <tbody>
                                	<form class="form-horizontal" action="<?php echo base_url() ?>Ganti" method="post">
                                		<div class="row">
                                			<label class="control-label col-sm-3">Nama Lama Folder</label>
                                			<div class="col-sm-4">
                                       	 		<input class="form-control" type="text" name="nama_lama_folder" required>
                                        	</div>
                                    	</div>
                                    	<br>
                                    	<div class="row">
                                			<label class="control-label col-sm-3">Nama Baru Folder</label>
                                			<div class="col-sm-4">
                                       	 		<input class="form-control" type="text" name="nama_baru_folder" required>
                                        	</div>
                                    	</div>
                                    	<br>
                                    	<div class="row">
                                			<!-- <label class="control-label col-sm-3">Keterangan</label> -->
                                			<div class="col-sm-6">
                                        		<!-- <input class="form-control" type="text" name="keterangan_folder"> -->
                                        	</div>
                                        	<input class="form-control" type="hidden" name="alamat_folder">
                                    	</div>
                                    	<!-- <input type="submit"> -->
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" class="btn btn-success">change</button>
                                        </div>
                                	</form>
                                </tbody>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="refresh()"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal Hapus Folder -->
    <div class="modal fade" id="modal_hapus_folder" name="modal_hapus_folder" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <table id="dtb_hapus_folder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <!--thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kas Masuk</th>
                                        <th>Nama Customer</th>
                                        <th>Tanggal</th>  
                                        <th>Keterangan</th>                                      
                                        <th>Pilih</th>
                                    </tr>
                                </thead-->
                                <tbody>
                                	<form class="form-horizontal" action=<?php echo base_url() ?>Hapus method="post">
                                		<div class="row">
                                			<label class="control-label col-sm-3">Nama Folder</label>
                                			<div class="col-sm-4">
                                       	 		<input class="form-control" type="text" name="nama_folder" required>
                                        	</div>
                                    	</div>
                                    	<br>
                                    	<div class="row">
                                			<!-- <label class="control-label col-sm-3">Keterangan</label> -->
                                			<div class="col-sm-6">
                                        		<!-- <input class="form-control" type="text" name="keterangan_folder"> -->
                                        	</div>
                                        	<input class="form-control" type="hidden" name="alamat_folder">
                                    	</div>
                                    	<!-- <input type="submit"> -->
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </div>
                                	</form>
                                </tbody>
                            </table>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="refresh()"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal Akses Folder -->
    <div class="modal fade" id="modal_akses_folder" name="modal_akses_folder" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <button type="button" class="btn btn-success show_menu" onclick=""><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
                            <div id="menu_div" class="hide_menu">
                                <table id="dtb_input" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID Karyawan          
                                            </th>
                                            <th>
                                                Nama Karyawan             
                                            </th>
                                            <th>
                                                Folder Forbidden
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="simpan_akses">
                                        <tr>
                                            <td>
                                                <input type=text name="idk">
                                            </td>
                                            <td>
                                                <input type=text name="nmk">
                                            </td>
                                            <td>
                                                <input type=text name="ff">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success hide_menu" onclick="tambah_akses()"><span class="glyphicon glyphicon-ok-circle"></span> Simpan</button>
                            </div>

                            <form id="form_akses_folder" name="form_akses_folder" action="" method="post">
                                    <table id="dtb_akses_folder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Karyawan</th>
                                                <th>Nama Karyawan</th>
                                                <th>Folder Forbidden</th>
                                            </tr>
                                        </thead>
                                        <tbody id=data_akses>

                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="update_akses()"><span class="glyphicon glyphicon-ok-circle"></span> Simpan</button>
                            </form>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="refresh()"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <form id="tes">
        <input type="hidden" name="tes">
    </form>

	<!-- Include our script files -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://localhost/efiling/assets/js/script.js"></script>
     <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/efiling/assets/bootstrap/js/bootstrap.min.js"></script> 

    <script>

        $(document).ready(function(){
        });

        function kirim_id_karyawan(){
                console.log($('#id_karyawan').val());
                var kar = $('#id_karyawan').val();
                $.ajax({
                    url : "http://localhost/efiling/scan.php/?id="+kar,
                    type: "GET",
                    async : false,
                    data : {id:kar},
                    success : function(data)
                    {
                        alert('success');
                    }                
                });
        }

    	function create_folder() {
    		var str = subStrAfterChars(window.location.href,'#','b');
    		var res = str.replace(/%2F/g,"/");
    		$('[name="alamat_folder"]').val(res);
    		$('#modal_tambah_folder').modal('show');
            $('.modal-title').text('Tambah Folder');
    	}

    	function rename_folder() {
    		var str = subStrAfterChars(window.location.href,'#','b');
    		var res = str.replace(/%2F/g,"/");
    		$('[name="alamat_folder"]').val(res);
    		$('#modal_ganti_nama_folder').modal('show');
            $('.modal-title').text('Ganti Nama Folder');
    	}

    	function delete_folder() {
    		var str = subStrAfterChars(window.location.href,'#','b');
    		var res = str.replace(/%2F/g,"/");
    		$('[name="alamat_folder"]').val(res);
    		$('#modal_hapus_folder').modal('show');
            $('.modal-title').text('Hapus Folder');
    	}

        function management_file() {
            // var str = subStrAfterChars(window.location.href,'#','b');
            // var res = str.replace("%2F","-");

            //$('[name="tes"]').val(res);
            //window.location = "<?php echo site_url('doku/Dokumentasi/mimin/')?>"+res;
            //window.open ( "<?php echo site_url('doku/Dokumentasi/mimin')?>",'_blank');
            // $.ajax({
            //     url      : "<?php echo site_url('doku/Dokumentasi/mimin2') ?>",
            //     type : "POST",
            //     data: $('#tes').serialize(),
            //     dataType: "JSON",
            //     //data : {alamat_url:res},
            //     // data : function(data){
            //     //      data.alamat_url = 'tessss';
            //     // },
            //     success : function(data) {
            //         if(data.status)
            //         {
            //             // window.location = '<?php echo site_url() ?>doku/Dokumentasi/mimin';
            //             window.location = "<?php echo site_url('doku/Dokumentasi/mimin/')?>"+data.tes;
            //         }
            //         // console.log("Berhasil");
                    
            //     }

            // });
            //alert(res);
            //$('[name="alamat_folder"]').val(res);
            
            //$('.modal-title').text('Hapus Folder');
        }

        function tambah_akses() {
            $idk = $('[name="idk"]').val();
            $nama = $('[name="nmk"]').val();
            $forbidden = $('[name="ff"]').val();
            $('[name="idk"]').val("");
            $('[name="nmk"]').val("");
            $('[name="ff"]').val("");
            $('#menu_div').css("display","none");
            $.ajax({
                url :  "<?php echo base_url() ?>Akses/simpan/"+$idk+"/"+$nama+"/"+$forbidden,
                type : "POST",
                dataType : "json",
                success : function(data)
                {
                    alert('Data berhasil disimpan!');
                    edit_akses();
                }
            })
        }

        function edit_akses(){
            console.log($('#id_karyawan').val());
            var kar = $('#id_karyawan').val();
            var str = subStrAfterChars(window.location.href,'#','b');
            var res = str.replace(/%2F/g,"/");
            $.ajax({
                url : "<?php echo base_url() ?>Akses",
                type: "GET",
                dataType : "json",
                success : function(data)
                {
                    console.log(data);
                    $('#data_akses').empty();
                    for (var i = 0; i < data.length; i++)
                    {
                      $tr = $('<tr>').append(
                            $('<td>'+(i+1)+'<input type=hidden name="nomor[]" value="'+i+'" readonly><input type=hidden name="ID[]" value='+data[i]["ID"]+' readonly></td>'),
                            $('<td>'+'<input type=text name="ID_KARYAWAN[]" value='+data[i]["ID_KARYAWAN"]+' readonly></td>'),
                            $('<td>'+'<input type=text name="NAMA[]" value='+data[i]["NAMA"]+' readonly></td>'),
                            $('<td>'+'<input type=text name="FOLDER_FORBIDDEN[]" value='+data[i]["FOLDER_FORBIDDEN"]+'></td>'),
                            $('<td>'+'<Button type=Button name="HAPUS[]" class="btn button-block btn-danger" onclick="delete_akses('+data[i]["ID"]+')" ><span class="glyphicon glyphicon-remove-circle"><span></Button></td>')
                            ).appendTo('#data_akses');
                    }
                }                
            });
            $('[name="alamat_folder"]').val(res);
            $('#modal_akses_folder').modal('show');
            $('.modal-title').text('Edit Hak Akses Folder');
        }

        function update_akses() {
            $.ajax({
                url : "<?php echo base_url() ?>Akses_folder",
                type: "POST",
                data : $('#form_akses_folder').serialize(),
                dataType : "json",
                success : function(data)
                {  
                   alert('Data berhasil diupdate!');
                }                
            });    
        }

        function delete_akses($id) {
            $.ajax({
                url : "<?php echo base_url() ?>Akses/hapus/"+$id,
                type: "POST",
                data : $('#form_akses_folder').serialize(),
                dataType : "json",
                success : function(data)
                {  
                   alert('Data berhasil dihapus!');
                   edit_akses();
                }                
            });    
        }

        function subStrAfterChars(str, char, pos) {
            if(pos=='b') //before
                return str.substring(str.indexOf(char) + 1);
            else if(pos=='a') //after
                return str.substring(0, str.indexOf(char));
            else
                return str;  
            }

        function refresh() {
            location.reload(true);
        }
    </script>
</body>
</html>
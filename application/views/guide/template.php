<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dokumentasi</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/evisit/toastr.css">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>assets/doku/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Bungee|Montserrat" rel="stylesheet">

</head>

<body class="bgku">
<div class="fontcontent">
    <?php $this->load->view('guide/nav'); ?>
</div>

<div class="container fontcontent">
    <div id="wrapper">

        
        <?php $this->load->view($content); ?>


    </div>
    <!-- /#wrapper -->
</div>
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/metisMenu/metisMenu.min.js"></script>

    <script src="<?php echo base_url();?>assets/evisit/toastr.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/doku/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/doku/dataTables/dataTables.bootstrap.js"></script>

    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $("[id^='dataTables-example']").dataTable();
    });
    </script>

     <script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>assets/images/loader-1.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal_ajax .modal-body').html(response);

            }
        });
    }
    </script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog" style="width: 50%;">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Title</h4>
                </div>
                <input type="hidden" name="" id="alamat" value="<?php echo ($this->uri->segment(4) ? $this->uri->segment(4) : $alamat_file ) ?>">
                <div class="modal-body" style="height:400px; overflow:auto;">
                
                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <script type="text/javascript">
    function confirm_modal(delete_url)
    {
        jQuery('#modal-4').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
    </script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link">delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SHOW TOASTR NOTIFIVATION -->
    <?php if ($this->session->flashdata('flash_message') != ""):?>

    <script type="text/javascript">
        toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
    </script>

    <?php elseif ($this->session->flashdata('flash_message_error') != "") :?>

    <script type="text/javascript">
        toastr.error('<?php echo $this->session->flashdata("flash_message_error");?>');
    </script>

    <?php endif;?>

   <!--  <?php
    if ($this->uri->segment(4)) {
        echo $this->uri->segment(4);
    }
    ?>

    <?php if(isset($alamat_file)) echo $alamat_file; ?>  -->

    <script type="text/javascript">
      var pathArray = window.location.pathname.split( '/' );
      var segment_4 = pathArray[4];
      var alamat = document.getElementById('alamat').value;
      
      alamat = alamat.replace("%20"," ",alamat);
      // alert(alamat);

      const ala2 = alamat;
      const  target2  = document.querySelector('#targ');
      const  target3  = document.querySelector('#targ2');

      console.log(ala2);
      let path = "<?php echo base_url().'doku/Dokumentasi/category/' ?>";
      let path2 = "<?php echo base_url().'doku/Dokumentasi/mimin/' ?>";

      // create first anchor element
      let el2 = document.createElement('a');
      let teks = document.createTextNode('Manage Kategori');
      // el2.setAttribute('href', path+ala2.replace('-','/'));
      el2.setAttribute('href', path+ala2);
      el2.appendChild(teks);
      console.log(el2);

      // create second anchor element
      let el3 = document.createElement('a');
      let teks2 = document.createTextNode('Manage File');
      // el3.setAttribute('href', path2+ala2.replace('-','/'));
      el3.setAttribute('href', path2+ala2);
      el3.appendChild(teks2);
      console.log(el3);

      if (segment_4 == "mimin") {
        target2.appendChild(el2);
    } else {
        target3.appendChild(el3);
    }
    </script>

</body>

</html>

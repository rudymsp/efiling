<link href="<?php echo base_url();?>assets/doku/style.css" rel="stylesheet">
<style>
	.big-icon {
		font-size: 40px;
	}
	.very-big-icon {
		font-size: 60px;
	}
	.tanggal {
		font-size: 12px;
		color: #bbb;
	}
	.tanggal span {
		*text-transform: uppercase;
		font-weight: bold;
	}
	#interak a {
		margin-right: 20px;
	}
	.u-txt--base {
		margin-bottom: 10px;
		text-align: justify;
	}
</style>

<?php
$tabs_menu = '';
$tabs_content = '';
$i = 0;
foreach ($tab_menu->result_array() as $row) {
	if ($i == 0) {
		$tabs_menu .= '
			<div class="is-active js-guide-tab js-guide-tab-1 o-flag o-flag--tiny u-pad--4" data-href="#js-guide-content-'.$row['id'].'">
	            <div class="o-flag__head">
	                <div class=""><i class="fa fa-folder big-icon"></i></div>
	            </div>
	            <div class="o-flag__body">
	                <div class="u-txt--large">'.$row['nama_doc'].'</div>
	            </div>
	        </div>
		';
		$tabs_content .= '
			<div class="js-guide-content" id="js-guide-content-'.$row['id'].'">
		';
	} else {
		$tabs_menu .= '
			<div class="js-guide-tab js-guide-tab-1 o-flag o-flag--tiny u-pad--4" data-href="#js-guide-content-'.$row['id'].'">
	            <div class="o-flag__head">
	                <div class=""><i class="fa fa-folder big-icon"></i></div>
	            </div>
	            <div class="o-flag__body">
	                <div class="u-txt--large">'.$row['nama_doc'].'</div>
	            </div>
	        </div>
		';
		$tabs_content .= '
			<div class="js-guide-content u-hidden" id="js-guide-content-'.$row['id'].'">
		';
	}
	
	$this->db->where('jenis_file', $row['id']);
	$this->db->order_by('id', 'desc');
    $hasil = $this->db->get('dokumentasi');
    foreach ($hasil->result() as $rowi) {
    	$dateArr = explode(' ', $rowi->updated_at);
		$onlyDate = $dateArr[0];
		if ($rowi->jenis_file == 1) {
			$jenis = '<i class="fa fa-eye"></i> view';
		} else {
			$jenis = ' ';
		}

		$awal = '
		<div id="test-list">
		    <input type="text" class="search" placeholder=" Cari di sini.." style="float: right; border-radius: 5px; border: 1px orange solid; width: 50%; margin-bottom: 20px" />
		    <br>
		    <div class="list">';

		
    	$tabs_content .= '
    	
	    		<div class="o-flag o-flag--huge u-mrgn-bottom--6" style="border-bottom:dotted grey 2px; padding-bottom:10px;">
	                <div class="o-flag__head">
	                    <i class="fa fa-file very-big-icon"></i>
	                </div>
	                <div class="o-flag__body">
	                    <div class="u-txt--medium u-txt--bold u-mrgn-bottom--1">
	                        <p class=" carifile">'.$rowi->nama_dokumen.'</p>
	                    </div>

	                    <div class="u-txt--base">
	                        '.$rowi->deskripsi.'
	                    </div>

	                    <div class="col-md-6" id="interak">
	                    <a href="'.base_url().'doku/Dokumentasi/getFile/'.$rowi->id.'"><i class="fa fa-download"></i> Download</a>
	                    <a href="'.base_url().'dokumentasi/'.$rowi->nama_file.'" target="_blank">'.$jenis.'</a>
	                    </div>
	                    <div class="col-md-6"><div class="pull-right tanggal"><span>Update: </span>'.$onlyDate.', '.$onlyDate.'</div></div>
	                </div>
	            </div>
	    

    	';

    	$akhir = '</div>
			<ul class="pagination" style="float: right;"></ul>
		</div>';
    }
    $tabs_content .= '</div>';
    $i++;
}
?>

<section class="o-container o-container--responsive o-container--guide u-mrgn-bottom--10">
    <h1 class="u-txt--xxlarge u-txt--normal u-mrgn-top--10 u-mrgn-bottom--10 u-align-center" style="text-transform: uppercase; font-family: 'Bungee', cursive;">Dokumentasi Sistem</h1>
    <div class="c-tab-guide">
        <div class="c-tab-guide__head">

            <?php echo $tabs_menu; ?>
            
        </div>
        <div class="c-tab-guide__body">

        <!-- untuk pagination dan search -->
		<!-- <div id="test-list">
		    <input type="text" class="search" placeholder=" Cari di sini.." style="float: right; border-radius: 5px; border: 1px orange solid; width: 50%; margin-bottom: 20px" />
		    <br>
		    <div class="list"> -->
		<!-- untuk pagination dan search -->
        	
			<?php echo $tabs_content; ?>      

		<!-- untuk pagination dan search -->
			<!-- </div>
			<ul class="pagination" style="float: right;"></ul>
		</div> -->
		<!-- untuk pagination dan search -->      
           
        </div>
    </div>
</section>

<script src="<?php echo base_url();?>assets/doku/main.js"></script>        
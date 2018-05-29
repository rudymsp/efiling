<?php 
	$this->db->select('*');
    $this->db->from('dokumentasi');
    $this->db->where('id', $param2);
    $edit_data = $this->db->get();
	foreach ($edit_data->result() as $row):
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled"></i>
            		Edit <?php echo $row->nama_dokumen; ?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open_multipart(base_url() . 'doku/Dokumentasi/mimin/edit/'. $row->id , array('class' => 'form-horizontal form-groups-bordered validate'));?>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Nama Dokumen</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_dokumen" value="<?php echo $row->nama_dokumen;?>" >
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Deskripsi</label>
                        
						<div class="col-sm-5">
							<textarea class="form-control" name="deskripsi"><?php echo $row->deskripsi;?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Jenis File</label>
                        
						<div class="col-sm-5">
							<?php
								$query = $this->db->get('kategori_doc');
						        $kategori = array();
						        foreach ($query->result_array() as $rowi) {
						            $kategori[$rowi['id']] = $rowi['nama_doc'];   
						        }
						        $add_info = 'class="form-control"';
							?>
							<?php echo form_dropdown('jenis_file', $kategori, $row->jenis_file, $add_info); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">File</label>
                        
						<div class="col-sm-5">
							<input type="file" class="form-control" name="nama_file" >
						</div>
					</div>
                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-danger">edit</button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php endforeach;?>
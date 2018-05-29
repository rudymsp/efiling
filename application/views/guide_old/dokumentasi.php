
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dokumentasi
                        <div class="pull-right">
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_add/');" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> tambah</a> 
                        </div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                   
                <?php
                    for ($i=1; $i <= $group; $i++) { 
                ?>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">                            
                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive col-lg-12">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example<?php echo $i;?>">
                        
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Dokumen</th>
                                            <th>Jenis File</th>
                                            <th>File</th>
                                            <th>Date</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                <?php
                                    $no = 1;
                                    
                                    foreach (${'kategoris' . $i}->result_array() as ${'kategori' . $i}) {
                                        $dateArr = explode(' ', ${'kategori' . $i}['updated_at']);
                                        $onlyDate = $dateArr[0];
                                        $type = ${'kategori' . $i}['jenis_file'];
                                        $this->db->where('id', $type);
                                        $query = $this->db->get('kategori_doc');

                                        foreach ($query->result_array() as $row) {
                                            $jenis_file = $row['nama_doc'];
                                        }
                                ?>
                                    <tbody>
                                        <tr class="">
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo ${'kategori' . $i}['nama_dokumen'];?></td>
                                            <td>
                                                <?php echo $jenis_file;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>doku/Dokumentasi/getFile/<?php echo ${'kategori' . $i}['id'];?>"><?php echo ${'kategori' . $i}['nama_file'];?></a>
                                                
                                            </td>
                                            <td class="center"><?php echo $onlyDate.', '.$onlyDate;?></td>
                                            <td>
                                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_edit/<?php echo ${'kategori' . $i}['id'];?>');" class="icon huge" title="edit"><i class="fa fa-pencil"></i> Edit</a>&nbsp;
                                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>doku/Dokumentasi/mimin/delete/<?php echo ${'kategori' . $i}['id'];?>');" class="icon huge" data-toggle="modal" title="remove"><i class="fa fa-trash-o"></i> Hapus</a>&nbsp;
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                <?php } ?>

                                </table>

                            </div>

                            <hr>  
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                    
                <?php } ?>  

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


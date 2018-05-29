

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kategori
                        <div class="pull-right">
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_cat_add/');" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> tambah</a> 
                        </div>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive col-lg-12">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Date</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											//untuk menampilkan data dari table, diambil dari variable table yg ada di controller hubungi
											$no=1;
											foreach($data_kategori->result() as $row){
												$dateArr = explode(' ', $row->date);
												$onlyDate = $dateArr[0];
										?>
	                                        <tr class="">
	                                            <td><?php echo $no++;?></td>
	                                            <td><?php echo $row->nama_doc;?></td>
                            					<td><?php echo nama_hari($onlyDate).', '.tgl_indo($onlyDate);?></td>
	                                            <td>
                                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_cat_edit/<?php echo $row->id;?>');" class="icon huge" title="edit"><i class="fa fa-pencil"></i> Edit</a><!-- &nbsp;
                                                    <a href="#" onclick="confirm_modal('<?php echo base_url();?>doku/Dokumentasi/category/delete/<?php echo $row->id;?>');" class="icon huge" data-toggle="modal" title="remove"><i class="fa fa-trash-o"></i></a>&nbsp; -->
                                                </td>
	                                        </tr>
	                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

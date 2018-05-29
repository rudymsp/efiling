<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>doku/Dokumentasi">Dokumentasi</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="">
          <?php if ($this->uri->segment(3) == 'mimin') {
                    echo '<a href="'.base_url('doku/Dokumentasi/category').'" >Manage Kategori</a>';
                } elseif ($this->uri->segment(3) == 'category') {
                  echo '<a href="'.base_url('doku/Dokumentasi/mimin').'" >Manage Dokumentasi</a>';  
                }  else {
                    echo '';
                }
          ;?>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
<!--         <li><a href="<?php echo base_url(); ?>quiz">Quiz</a></li>
 -->        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username'); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>index">Home E-Match</a></li>
            <?php if ($this->session->userdata('level') == 1): ?>
                <li><a href="<?php echo base_url(); ?>doku/Dokumentasi/mimin">Dashboard</a></li>
            <?php endif ?>
            <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
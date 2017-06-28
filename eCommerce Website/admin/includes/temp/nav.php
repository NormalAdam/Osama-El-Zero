<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-id" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php"><?php echo lang('HOME_ADMIN'); ?></a>
      <a class="navbar-brand" href="Category.php"><?php echo lang('CATEGORIES'); ?></a>
      <a class="navbar-brand" href="#"><?php echo lang('ITEMS'); ?></a>
      <a class="navbar-brand" href="members.php"><?php echo lang('MEMBERS'); ?></a>
      <a class="navbar-brand" href="#"><?php echo lang('STATISTICS'); ?></a>
      <a class="navbar-brand" href="#"><?php echo lang('LOGS'); ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-id">
      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo checkForStatusSession('Username','index.php'); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo "members.php?do=Edit&userid=".$_SESSION['UserID']; ?>"><?php echo lang('EDIET-PROFILE'); ?></a></li>
            <li><a href="#"><?php echo lang('SETTING'); ?></a></li>
            <li><a href="logout.php"><?php echo lang('LOGS'); ?></a></li>
          </ul>
        </li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
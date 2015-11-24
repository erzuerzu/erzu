<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
		<i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
		<i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
		<i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
		<i class="icon-cogs"></i>
            </button>
	</div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
	</div>
    </div><!-- #sidebar-shortcuts -->
    <?php if(empty($_SESSION['yi_q'])){?>
    <ul class="nav nav-list">
        <?php foreach($_SESSION['yi_quan'] as $v){?>
        <!--
	<li class="active">
            <a href="index.php?r=site/index">
		<i class="icon-dashboard"></i>
		<span class="menu-text"> 控制台 </span>
            </a>
	</li>-->
        <li>
            <a href="" class="dropdown-toggle">
		<i class="icon-desktop"></i>
		<span class="menu-text"><?php echo $v[0]['nickname']?> </span>

		<b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                 <?php foreach($_SESSION['er_quan'] as $vv){
                     if($vv[0]['p_id']==$v[0]['_id']){
                     ?>
                    
                <li>
                    <a href="index.php?r=<?php echo $v[0]['n_name']?>/<?php echo $vv[0]['n_name']?>">
                        <i class="icon-double-angle-right"></i>
                           <?php echo $vv[0]['nickname']?>
                    </a>
		</li>
                     <?php }}?>
            </ul>
        </li>
        <?php }?>
    </ul>
     <?php }else{?>
             <ul class="nav nav-list">
        <?php foreach($_SESSION['yi_q'] as $v){?>
        <!--
	<li class="active">
            <a href="index.php?r=site/index">
		<i class="icon-dashboard"></i>
		<span class="menu-text"> 控制台 </span>
            </a>
	</li>-->
        <li>
            <a href="" class="dropdown-toggle">
		<i class="icon-desktop"></i>
		<span class="menu-text"><?php echo $v['nickname']?> </span>

		<b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                 <?php foreach($_SESSION['er_q'] as $vv){
                     if($vv['p_id']==$v['_id']){
                     ?>
                    
                <li>
                    <a href="index.php?r=<?php echo $v['n_name']?>/<?php echo $vv['n_name']?>">
                        <i class="icon-double-angle-right"></i>
                           <?php echo $vv['nickname']?>
                    </a>
		</li>
                     <?php }}?>
            </ul>
        </li>
        <?php }?>
    </ul>
     <?php }?>
    <!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
	<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
	try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>

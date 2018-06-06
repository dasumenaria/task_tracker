<?php 
//pr($this->request->webroot); exit;?>

<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>PHPPOETS</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
	<?php  echo $this->Html->css('/assets/bootstrap/css/bootstrap.min.css'); ?>
	<?php echo $this->Html->css('/assets/plugins/bootstrap-datepicker/css/datepicker3.css'); ?> 
	<?php echo $this->Html->css('/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?> 
	<?php echo $this->Html->css('/assets/plugins/timepicker/bootstrap-timepicker.min.css'); ?> 
	<?php echo $this->Html->css('/assets/plugins/jquery-validation/demo/css/screen.css'); ?> 
	<?php echo $this->Html->css('/assets/plugins/iCheck/all.css'); ?> 
	<?php echo $this->Html->css('/assets/font-awesome/css/font-awesome.min.css'); ?> 
	<?php echo $this->Html->css('/assets/ionicons/css/ionicons.min.css'); ?> 
	<?php echo $this->Html->css('/assets/plugins/select2/select2.min.css'); ?>
	<?php echo $this->Html->css('/assets/plugins/bootstrap-editable/css/bootstrap-editable.css'); ?>
	<?php echo $this->Html->css('/assets/dist/css/AdminLTE.min.css'); ?>
	<?php echo $this->Html->css('/assets/dist/css/skins/_all-skins.min.css'); ?> 
	<?php echo $this->Html->css('/assets/plugins/WYSIWYG/editor.css'); ?>
	<?php echo $this->Html->css('/assets/demo-styles.css'); ?>
	<?php echo $this->Html->css('/assets/loader-1.css'); ?>
	<?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Raleway'); ?>
 	<?php echo $this->Html->css('//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'); ?>
	<?php  echo $this->Html->css('/assets/scroll/jquery/jquery-ui.css'); ?>
	<?php  echo $this->Html->css('/assets/scroll/css/styles.css'); ?>
	<?php  echo $this->Html->css('/assets/scroll/css/fixed_table_rc.css'); ?> 
 	<?php
	echo $this->Html->meta(
    'favicon.ico',
    '/img/favicon.ico',
    ['type' => 'icon']
	);
?> 
<style>
input[type=checkbox],input[type=radio] {
    margin: 0px 0 0;
}
.btn-primary.focus, .btn-primary:focus
{
	color:ins
}
body {
	font-family: 'Raleway', sans-serif !important;
}
#grad1 {
    height: 50px;
    background:  #DA0845; /* For browsers that do not support gradients */    
    background: -webkit-linear-gradient(left,  #DA0845 , #DB7E14); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(right,  #DA0845, #DB7E14); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(right,  #DA0845, #DB7E14); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to right,  #DA0845 , #DB7E14); /* Standard syntax (must be last) */
}
.slimScrollDiv{
	overflow: inherit !important;
}
.box.box-primary {
    border-top-color: #66cad5 !important;
}
sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a {
    color: #fff;
    background: #FB6542;
    border-left-color: #DA3E2E;
}
.required {
	color:#ea3733;
}
 
 textarea {
	resize: none !important;
}
fieldset {
	padding: 10px ;
	border: 1px solid #bfb7b7f7;
	margin: 0px;
}
legend{
	margin-left: 20px;
	 //color:black; 
	//color:#144277c9;
	font-size: 17px;
	margin-bottom: 0px;
	border:none;
	
}
span.select2 {
	width :100% !important;
} 
h1,h2,h3,h4,h5,h6{
	font-family: 'Raleway', sans-serif !important;
}
</style>
<style>
 
.self-table > tbody > tr > td, .self-table > tr > td
{
border-top:none !important;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    vertical-align:middle !important;
}
div.radio div.radio-div:not(:first-child) {
    margin-left: 5px !important;
}
.checkbox, .radio {
margin-bottom: 5px !important;
margin-top: 5px !important;
}

@media print {
	.hide_print{
	   display:none;
   }
}
.nav navbar-nav li {color:#848688 !important;}
 
.user-panel img
{
	border-radius: 100%;
	height:80px; 
	border: 1px solid #1295A2;
}
.sidebar-collapse .user-panel img
{
	height:35px !important; 
	border-radius: 100%;
	border: 1px solid #1295A2 !important;
	width:100% !important;
} 
.notify {
  white-space: unset !important;
}
.slimScrollDiv
{
	height: 330px !important;	
}
.slimScrollBar{
	width:15px !important;
	cursor: pointer !important;
}
.menu
{
	height: 330px !important;	
}
p {
	margin:0px !important;
}
.select2-container--default .select2-search--inline .select2-search__field
{
	width:100% !important;
}
label{
	margin-bottom: 0px!important;
	font-weight:100 !important;
}
fieldset
{
	border-radius: 7px;
	box-shadow: 0 3px 9px rgba(0,0,0,0.25), 0 2px 5px rgba(0,0,0,0.22);
	margin-bottom:10px;
} 
</style>
<!--- Star style ---->
<style>
	div.stars {
	  width: 270px;
	  display: inline-block;
	}
	 
	input.star { display: none; }
	 
	label.star {
	  float: right;
	  padding: 0 5px;
	  font-size: 31px;
	  color: #444;
	  transition: all .2s;
	}
	 input.star:checked ~ label.star:before {
	  content: '\f005';
	  color: #FD4;
	  transition: all .25s;

	}
	a:hover,a:active,a:focus{outline:none !important;}
	button:hover,button:active,button:focus{outline:none !important;}

	input.star-5:checked ~ label.star:before {

	  color: #FE7;

	  text-shadow: 0 0 20px #952;

	}

	input.star-1:checked ~ label.star:before { color: #F62; }
	label.star:hover { transform: rotate(-15deg) scale(1.3); }
	label.star:before {
	  content: '\f006';
	  font-family: FontAwesome;
	}
	.user-panel
	{
		background: #156e92 !important;
	}

	.btn-info
	{
		background-color:#2391c3 !important;
		color:#FFF;
		border-color:#2391c3 !important;
	}
	.btn-danger
	{
		background-color:#FB6542 !important;
		color:#FFF;
		border-color:#FB6542 !important;
	}
	.btn-warning
	{
		background-color:#606062 !important;
		color:#FFF;
		border-color:#606062 !important;
	}
	.btn-success
	{
		background-color:#6FB98F !important;
		color:#FFF;
		border-color:#6FB98F !important;
	}
	.btn-successto
	{
		background-color:#C9A66B !important;
		color:#FFF;
		border-color:#C9A66B !important;
		
	}
	.btn.focus, .btn:focus, .btn:hover
 		color: white !important;
	}
	.btn-successtoNew
	{
		background-color:#66A5AD !important;
		color:#FFF;
		border-color:#66A5AD !important;
	}
	.btn
	{
		border-radius: 6px;
	}
	textarea {
		resize:none !important;
	}
	 
</style>
<style>
.hotelType {	
	color: #0095A1;
    font-weight: 600;
}
.transportType {	
	color: #D7A82F;
    font-weight: 600;
}
.packageType {	
	color: #f87200;
    font-weight: 600;
}
.hotel{
	
}
.package{
	 
}
.contain>p{
	color:#96989A !important;
} 
.details {color:#000 !important; font-weight: 600;}	
.btn-block { width:40% !important;}
.margin {margin-top:5px;}
.shotrs a {margin:5px;;}
.modal-body {padding:0px!important;}
.breakline{
	margin-bottom:0px !important;
	margin-top:0px !important;
}

@media all and (max-width: 520px) {
	/* Logo for Mobile */
	.logo-lg {
		width: 180px;
		height: 55px;
 		background-size: 250px 47px;
	}
}
@media all and (min-width: 520px) {
	/* Logo for Mobile */
	.logo-lg {
		width: 210px;
		height: 55px; 
		background-size: 250px 47px;
	}
}
@media all and (max-width: 770px) {
	.innav{
		display:block !important;
		width:auto !important;
		float: left !important;
		margin-top: -3px !important;
	}
	.content-wrapper{
		padding-top: 50px !important;
	}
	.slimScrollDiv{
	padding-top: 0px !important;
	}
	.outnav{
		display:none !important;
	}
}
@media all and (max-width: 770px) {
	.portalmobile{
		display:none !important;
 	}
}
@media all and (min-width: 770px) {
	.innav{
		display:none !important;
	}
	.outnav{
		display:block !important;
	}
}
@media all and (max-width: 770px) {
	.dropdown-menu{
 		width:auto !important;
 	}
}
@media all and (min-width: 770px) {
	.main-footer{
		display:none !important;
 	}
}
.main-footer {
	padding:1px !important;
} 
@media all and (max-width: 767px) {
	.main-sidebar, .left-side {
		padding-top: 46px !important;
	}
} 
.breakline{
	margin-bottom:0px !important;
	margin-top:0px !important;
}
</style>
</head>
<!--<body class="hold-transition skin-blue fixed sidebar-mini">-->
<body class="hold-transition skin-blue fixed sidebar-mini">
<div id="wrapper">
	<header class="main-header  no-print">
    <!-- Logo background: #1295a2; -->
    <a style="line-height: 56px;" href="<?php echo $this->Url->build(["controller" => "Users",'action'=>'dashboard']); ?>" class="logo outnav" >
      <span class="logo-mini" style="font-size:0px !important;"><?=  $this->Html->image('/img/mini_logo.png', ['style'=>'width:77%;']) ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-size:0px !important;"><?=  $this->Html->image('/img/logo.png', ['style'=>'width:80%;','class'=>'image-responsive']) ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
    <a href="#" style="font-size: 16px;margin-top:0px !important" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
	<a style="line-height: 60px;" href="<?php echo $this->Url->build(["controller" => "Users",'action'=>'dashboard']); ?>" class="logo innav" >
      <span class="logo-mini" style="font-size:0px !important;"><?=  $this->Html->image('/img/mini_logo.png', ['style'=>'width:77%;']) ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-size:0px !important;"><?=  $this->Html->image('/img/main_logo.png', ['style'=>'width:80%;','class'=>'image-responsive']) ?></span>
    </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="padding-top: 2px !important;">
  		<li>
			<a href="<?php echo $this->Url->build(["controller" => "Users",'action'=>'logout']); ?>"><i style="font-size: 20px;" class="fa fa-power-off"></i></a>
		</li>           
        </ul>
      </div>
    </nav>
  </header>
	<aside class="main-sidebar no-print" >
	<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel" align="center" style="margin-top:10px" >
        <div class='imaage' >
          <?php
			if(!empty($profile_pic)){
				if(file_exists('img/admin_profile/'.$profile_pic)>0)
				{
					echo $this->Html->image('admin_profile/'.$profile_pic, ["class"=>"img-responsive","alt"=>"Profile Pic",'style'=>"width: 45%;"]);
				}
				else{
					echo $this->Html->image('no-profile-image.png', ["class"=>"img-responsive","alt"=>"Profile Pic"]);
				}
			}
			else
			{
				echo $this->Html->image('no-profile-image.png', ["class"=>"img-responsive","alt"=>"Profile Pic"]);
			}
		  ?>
        </div>
        <div class="info">
          <?php echo ucwords(strtolower($MemberName));?>
		  </br>
		   Admin
		  <br>
		  <a href="<?php echo $this->Url->build(["controller" => "Users",'action'=>'profileedit']); ?>" class="logo">Edit Profile</a>  
        </div>
    </div>		
	<ul class="sidebar-menu">
		<li class="active"><a href="<?php echo $this->Url->build(["controller" => "Users",'action'=>'dashboard']); ?>"><i class="fa fa-home"></i> <span>Home</span></a></li><hr class="breakline"></hr>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>Master Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(["controller" => "MasterClients",'action'=>'add']); ?>"><i class="fa fa-user"></i> Add</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "MasterClients",'action'=>'index']); ?>"><i class="fa fa-edit"></i> View</a></li> 
          </ul>
        </li>
		<hr class="breakline"></hr>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(["controller" => "Projects",'action'=>'add']); ?>"><i class="fa fa-book"></i> Add</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Projects",'action'=>'index']); ?>"><i class="fa fa-edit"></i> View</a></li> 
          </ul>
        </li>
		<hr class="breakline"></hr>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(["controller" => "Users",'action'=>'add']); ?>"><i class="fa fa-user"></i> Add</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Users",'action'=>'index']); ?>"><i class="fa fa-edit"></i> View</a></li> 
          </ul>
        </li>
		<hr class="breakline"></hr>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Tasks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(["controller" => "Tasks",'action'=>'add']); ?>"><i class="fa fa-user"></i> Add</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Tasks",'action'=>'index']); ?>"><i class="fa fa-edit"></i> View</a></li> 
          </ul>
        </li>
		<hr class="breakline"></hr>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(["controller" => "Leaves",'action'=>'index']); ?>"><i class="fa fa-user"></i> Leave</a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Tasks",'action'=>'index']); ?>"><i class="fa fa-edit"></i> Client Visit</a></li> 
          </ul>
        </li>
		
	 
		
	</ul>
	</section>
	</aside>
  
	<div class="content-wrapper">
		 <section class="content">
			<div class="row">
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		 </section>
	</div>
</div>
<div class="loader-wrapper" style="width: 100%;height: 100%;  display: none;  position: fixed; top: 0px; left: 0px;    background: rgba(0,0,0,0.25); display: none; z-index: 1000;" id="loader-1">
	<div id="loader"></div>
</div>
<footer class="main-footer hide_print">
    2016 &copy; <a href="http://www.phppoets.com" target="_blank"> PHP POETS IT SOLUTION PRIVATE LTD.</a> All Rights Reserved.
</footer>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?>
<?php echo $this->Html->script('/assets/bootstrap/js/bootstrap.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/jquery-validation/lib/jquery.js'); ?>
<?php echo $this->Html->script('/assets/plugins/jquery-validation/dist/jquery.validate.js'); ?>
<?php echo $this->Html->script('/assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>
<?php echo $this->Html->script('/assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>
<?php echo $this->Html->script('/assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/select2/select2.full.min.js'); ?> 
<?php echo $this->Html->script('/assets/plugins/bootstrap-editable/js/bootstrap-editable.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/iCheck/icheck.min.js'); ?>
<?php echo $this->Html->script('/assets/plugins/fastclick/fastclick.js'); ?>
<?php echo $this->Html->script('/assets/dist/js/app.js'); ?>
<?php echo $this->Html->script('/assets/dist/js/demo.js'); ?> 
<?php echo $this->Html->script('/assets/plugins/WYSIWYG/editor.js'); ?>
<?php echo $this->Html->script('/assets/scroll/js/fixed_table_rc.js'); ?>
<script>
	$('.select2').select2();
	var date = new Date();
	date.setDate(date.getDate());
	$('.date-picker').datepicker({
		minDate:0,
		startDate: date,
		autoclose:true
	});
	$('.datepicker').datepicker({
		minDate:0,
		startDate: date,
		autoclose:true
	});
	$('.datepickers').datepicker({autoclose:true});
	 
	 
	$('input[type="text"]'). attr("autocomplete", "off");

	$(".txtEditor").Editor({
		'source':true,
		'togglescreen':false,
		'rm_format':false,
		'insert_img':false,
	}); 
</script> 
</body>
</html>
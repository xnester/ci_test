<html>
<head>
<title><?php echo $title;?></title>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/global.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" />
<style type="text/css">label{display:block;}</style>
</head>
<body>
<div id="nav">
<a href="domain">Domains</a> | <a href="client">Clients</a> | <a href="dealer">SalesPerson</a>
</div>
<h1><?php echo $headline;?></h1>
<?php echo $this->load->view($include);?>
</body>
</html>
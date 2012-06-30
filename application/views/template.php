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
<a href="<?php echo base_url();?>domain">Domains</a> | <a href="<?php echo base_url();?>client">Clients</a> | <a href="<?php echo base_url();?>dealer">SalesPerson</a>
| <a href="<?php echo base_url();?>host">Hosts</a> | <a href="<?php echo base_url();?>product">Products</a>

</div>
<h1><?php echo $headline;?></h1>
<?php echo $this->load->view($include);?>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</body>
</html>
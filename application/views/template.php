<html>
<head>
<title><?php echo $title;?></title>
<style type="text/css">label{display:block;}</style>
</head>
<body>
<h1><?php echo $headline;?></h1>
<?php echo $this->load->view($include);?>
</body>
</html>
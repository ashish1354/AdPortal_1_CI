<html>
<head>
	<title>Going to PayPal.....</title>
	  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
<?php
	echo form_open('https://www.sandbox.paypal.com/cgi-bin/webscr',array('name' => 'frmPayPal1','id'=>'frmPayPal1' ));
	echo form_hidden($hide);
	echo form_close();
?>
</body>
</html>

<script>
$(document).ready(function () {
	
	$("#frmPayPal1").submit();

});
</script>
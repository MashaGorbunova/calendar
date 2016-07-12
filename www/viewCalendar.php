
<?php
require_once $_SERVER['DOCUMENT_ROOT']."/calendar/www/calendar.php";
setlocale(LC_TIME, 'ru');

$c = new CalendarPhp ();

$day_of_week = $c->nameDayOfWeek();

$month = $_GET['month'];
$year = $_GET['year'];

$current = $c->calendar($month, $year);

$month_year = strftime("%B", mktime(0, 0, 0, $month, date("d"), $year)) . " " . strftime("%Y", mktime(0, 0, 0, $month, date("d"), $year));
$month_year = iconv('windows-1251', 'utf-8',  $month_year);

?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>calendar</title>
<link href="css/styles.css" rel="stylesheet">
</head>
	
<body>
<div class="row">
<div class="col-lg-3 calendar">
<table class="table">
<caption class="text-info">
    <a href="../www/viewCalendar.php?month=<?php if ($month == 1) echo 12; else  echo ($month-1); ?>&year=<?php if ($month == 1) echo ($year-1); else echo $year; ?>">
										<span class="glyphicon glyphicon-chevron-left"></span></a>
    <strong> <?php echo $month_year; ?> </strong>
	<a href="../www/viewCalendar.php?month=<?php if ($month == 12) echo 1; else echo ($month+1); ?>&year=<?php if ($month == 12) echo ($year+1); else echo $year; ?>">
										<span class="glyphicon glyphicon-chevron-right"></span></a>
</caption>
<?php 

$i=0; //counter
foreach($current as $base_key => $base_value) {
	if ($base_key==6 || $base_key==7) {
		echo '<tr class="day_off">';
	}
    else echo '<tr>';
	
    if ($day_of_week[$i] == $day_of_week[5] || $day_of_week[$i] == $day_of_week[6]) {
	    echo '<th class="day_off">', $day_of_week[$i++], '</th>'; 
    }
    else echo '<th>', $day_of_week[$i++], '</th>';

    foreach ($base_value as $key => $value) {
	    if ($value == 0) {
		    echo '<td> </td>';
	    }
		
        else {
			if ($value == date('j', time()) && $month == date('n', time())) {
			    echo '<td class="today"><strong>', $value, '</strong></td>';
		    }
			else echo '<td>', $value, '</td>';
		}
    }
    echo '</tr>';
}
?>

</table>
</div>
</div>

</body>
</html>

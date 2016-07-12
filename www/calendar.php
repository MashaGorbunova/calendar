<?php 

class CalendarPhp {

    private $day_of_week; 
    private $month_of_year;
	private $day_of_month;
	
	/**
	* @return array with values number day of week
	*/
	function numberDayOfWeek () {
		$arr = array (1, 2, 3, 4, 5, 6, 7);
		return $arr;
	}
	
	/**
	* @return array with values day of week
	*/
	function nameDayOfWeek () {
		$arr = array("пн", "вт", "ср", "чт", "пт", "сб", "вс"); // name of week in Russian
		return $arr;
	}
	
	/**
	* calendar with current month
	* @return $arr - array with keys "day of week" and values - days that match to day of week
	*/
	function current_month () {
		
		$day_of_week = $this->numberDayOfWeek(); // name of week
		$this->month_of_year = date ('n', time()); // current month
		$this->day_of_month = date ('j', mktime (0,0,0,$this->month_of_year,1,strftime ("%Y"))); //first day of month 
		
		$current_month = array();
		$arr = array();
		
		// add.array where keys are day of week and values - days in month
		for ($i=0; $i<date ('t', time()); $i++) {
			for ($j=0; $j<count($day_of_week); $j++) {
				if ($this->day_of_month <= date ('t', time ())) {
					        $current_month[$j][$i] = $this->day_of_month ++;
				        }
			}
		}

		switch (date ('w', mktime (0,0,0,$this->month_of_year,1,strftime ("%Y")))) {
			        case "1": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							$arr[$day_of_week[$i]] = $current_month[$i];
						}
			            break;
			        }
			        case "2": {
						for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i==6) {
								$arr[$day_of_week[0]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+1]] = $current_month[$i];
						}

			            break;
			        }
			        case "3": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=5) {
								$arr[$day_of_week[$i-5]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+2]] = $current_month[$i];
							
						}
	
			            break;
			        }
			        case "4": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=4) {
								$arr[$day_of_week[$i-4]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+3]] = $current_month[$i];
						}

			            break;
			        }
			        case "5": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=3) {
								$arr[$day_of_week[$i-3]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+4]] = $current_month[$i];
						}

			            break;
			        }
			        case "6": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=2) {
								$arr[$day_of_week[$i-2]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+5]] = $current_month[$i];
						}
			            break;
			        }
			        case "0": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=1) {
								$arr[$day_of_week[$i-1]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+6]] = $current_month[$i];
						}
			            break;
			        }
			        
			        default: break;
		
	    }
		
		$k = key($arr);

		for ($i=1; $i<count($arr); $i++) {
			if ($i < $k) {
				array_unshift($arr[$i], 0);
			}
			
		}
		ksort($arr);
		
		return $arr;
		
	}
	
	/**
	* calendar of any month any year
	* @param $month_of_year - calendar month, number
	* @param $year - calendar year, number
	* @return array with date
	*/
	function calendar (int $month_of_year, int $year) {
		
		$day_of_week = $this->numberDayOfWeek(); // name of week

		$this->day_of_month = date ('j', mktime (0,0,0,$month_of_year,1,$year)); //first day of month 
		
		$current_month = array();
		$arr = array();
		
		// add.array where keys are day of week and values - days in month
		for ($i=0; $i<date ('t', mktime (0,0,0,$month_of_year,1,$year)); $i++) {
			for ($j=0; $j<count($day_of_week); $j++) {
				if ($this->day_of_month <= date ('t', mktime (0,0,0,$month_of_year,1,$year))) {
					        $current_month[$j][$i] = $this->day_of_month ++;
				        }
			}
		}

		switch (date ('w', mktime (0,0,0,$month_of_year,1,$year))) {
			        case "1": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							$arr[$day_of_week[$i]] = $current_month[$i];
						}
			            break;
			        }
			        case "2": {
						for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i==6) {
								$arr[$day_of_week[0]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+1]] = $current_month[$i];
						}

			            break;
			        }
			        case "3": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=5) {
								$arr[$day_of_week[$i-5]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+2]] = $current_month[$i];
							
						}
	
			            break;
			        }
			        case "4": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=4) {
								$arr[$day_of_week[$i-4]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+3]] = $current_month[$i];
						}

			            break;
			        }
			        case "5": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=3) {
								$arr[$day_of_week[$i-3]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+4]] = $current_month[$i];
						}

			            break;
			        }
			        case "6": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=2) {
								$arr[$day_of_week[$i-2]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+5]] = $current_month[$i];
						}
			            break;
			        }
			        case "0": {
				        for ($i=0; $i<count($day_of_week); $i++) {
							
							if ($i>=1) {
								$arr[$day_of_week[$i-1]] = $current_month[$i];
							}
							else $arr[$day_of_week[$i+6]] = $current_month[$i];
						}
			            break;
			        }
			        
			        default: break;
		
	    }
		
		$k = key($arr);

		for ($i=1; $i<count($arr); $i++) {
			if ($i < $k) {
				array_unshift($arr[$i], 0);
			}
			
		}
		ksort($arr);
		
		return $arr;
		
	}
	
	
}   

?>
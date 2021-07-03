<?php

$date = new DateTime('2000-05-26T13:30:20'); /* Friday, May 26, 2000 at 1:30:20 PM */
$date->format("H:i");
/* Returns 13:30 */
$date->format("H i s");
/* Returns 13 30 20 */
$date->format("h:i:s A");
/* Returns 01:30:20 PM */
$date->format("j/m/Y");
/* Returns 26/05/2000 */
$date->format("D, M j 'y - h:i A");
/* Returns Fri, May 26 '00 - 01:30 PM */


Object-Oriented
$date->format($format)

Procedural Equivalent
date_format($date, $format)

// Gets the current date
echo date("m/d/Y", strtotime("now")), "\n"; // prints the current date
echo date("m/d/Y", strtotime("10 September 2000")), "\n"; // prints September 10, 2000 in the
m/d/Y format
echo date("m/d/Y", strtotime("-1 day")), "\n"; // prints yesterday's date
echo date("m/d/Y", strtotime("+1 week")), "\n"; // prints the result of the current date + a
week
echo date("m/d/Y", strtotime("+1 week 2 days 4 hours 2 seconds")), "\n"; // same as the last
example but with extra days, hours, and seconds added to it
echo date("m/d/Y", strtotime("next Thursday")), "\n"; // prints next Thursday's date
echo date("m/d/Y", strtotime("last Monday")), "\n"; // prints last Monday's date
echo date("m/d/Y", strtotime("First day of next month")), "\n"; // prints date of first day of
next month
echo date("m/d/Y", strtotime("Last day of next month")), "\n"; // prints date of last day of
next month
echo date("m/d/Y", strtotime("First day of last month")), "\n"; // prints date of first day of
last month
echo date("m/d/Y", strtotime("Last day of last month")), "\n"; // prints date of last day of
last month

<?php
// Create a date time object, which has the value of ~ two years ago
$twoYearsAgo = new DateTime("2014-01-18 20:05:56");
// Create a date time object, which has the value of ~ now
$now = new DateTime("2016-07-21 02:55:07");
// Calculate the diff
$diff = $now->diff($twoYearsAgo);
// $diff->y contains the
$yearsDiff = $diff->y;
// $diff->m contains the
$monthsDiff = $diff->m;
// $diff->d contains the
$daysDiff = $diff->d;
// $diff->h contains the
$hoursDiff = $diff->h;
// $diff->i contains the
$minsDiff = $diff->i;
// $diff->s contains the
$secondsDiff = $diff->s;
difference in years between the two dates
difference in minutes between the two dates
difference in days between the two dates
difference in hours between the two dates
difference in minutes between the two dates
difference in seconds between the two dates
// Total Days Diff, that is the number of days between the two dates
$totalDaysDiff = $diff->days;
// Dump the diff altogether just to get some details ;)
var_dump($diff);



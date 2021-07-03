<?php
$monthNum = 4;
$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
print $monthName;

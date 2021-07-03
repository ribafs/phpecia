<?php
echo gettype((bool) "")."<br>";        // bool(false)
echo gettype((bool) 1)."<br>";        // bool(true)
echo gettype((bool) -2)."<br>";        // bool(true)
echo gettype((bool) "foo")."<br>";    // bool(true)
echo gettype((bool) 2.3e5)."<br>";    // bool(true)
echo gettype((bool) array(12))."<br>"; // bool(true)
echo gettype((bool) array())."<br>";  // bool(false)
?> 

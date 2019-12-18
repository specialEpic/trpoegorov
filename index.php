<?php
    require __DIR__."/vendor/autoload.php";
use specialepic\Log;
use specialepic\QuadraticEq;
use specialepic\RzekaMansur_Exception;
$eq=new QuadraticEq();
$a=0;
$b=0;
$c=0;
Log::log("Version: ".file_get_contents("version"));
try {
    function entercheck($num,$letter)
    {
        $pattern = '#^[0-9]*[.]?[0-9]+$#';
        for (;;) {
            $num=readline("Enter $letter=");
            echo "\n";
            if(preg_match($pattern,$num))
            {
                return $num;
            }
            else {
                echo "Inappropriate symbols. Can only type numbers and dot\n";
            }
        }
        return $num;
    }
    $a=entercheck($a,'a');
    $b=entercheck($b,'b');
    $c=entercheck($c,'c');
	Log::log("Equation: {$a}*x^2+{$b}x+{$c}\n");
    $eq->solve($a,$b,$c);
} catch (RzekaMansur_Exception $e) {
    Log::log("Error: ".$e->getMessage());
}
Log::write()."\n";
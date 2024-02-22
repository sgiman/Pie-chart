<?php
//header("Content-type: text/html; charset=utf-8");
//error_reporting(-1);
/********************************************************************
 * sgi_functions.php
 * SGI PIE DIAGRAMMA v3.0 - 2023-10 (prototype)
 * ------------------------------------------------------------------
 * JpGraph 4.4.2 (PHP Graph Plotting library - Asial Corporation)
 * https://jpgraph.net
 *
 * Unical Label Generator - Flower 6.8 (js-original)
 * https://uniwyze.com
 ********************************************************************
 * Writing by sgiman @ 2023-10
 */

//-------------------------------
//          D E B U G
//-------------------------------
function debug ($data) {
    echo '<pre>' . print_r($data, true) . '</pre>';
}

//-----------------------------------
// correct_label (%, mg)
// $labels, $data - global massives
//-----------------------------------
/**
 * Корректиктируект текст меток в 1 или 2 строки
 * в зависимости от вличины значений.
 * Определяет единицы измерения в завимости от режима:
 *   - mode1 ("Flower"), mode2 (Concentrate) -  %,
 *   - mode3("Tinctures") - mg
 * @param $cannabinoids object массив введенны кананобиодов
 * @param $name string название каннобиода
 * @param $mode string режим ввода
 * @return string возврат отформатированной текстовой метки
 */
function correct_label ($cannabinoids, $name, $mode)
{
    $limit = 3;

    // Lable format string : %(mode1, mode2) or mg(mode3)
    if ($mode == "mode3")
    {
       $s1 = $s2 = $s3 = $s4 = $name . ": " . $cannabinoids . "mg"; // 1 строка - настойки (tinctures)
    }
    else
    {
            $s1 = $name . "\n%.2f%%";   // 2 строки - дробные
            $s2 = $name . "\n%.0f%%";   // 2 строки - целые
            $s3 = $name . ": %.2f%%";   // 1 строка - дробные
            $s4 = $name . ": %.0f%%";   // 1 строка - целые
    }

    // LABEL
    //echo "<br>SUB: $cannabinoids - " . $cannabinoids - floor($cannabinoids); // *** DEBUG
    if ($cannabinoids >= $limit) {
        if ($cannabinoids - floor($cannabinoids) != 0)
            $label = $s1;   // 2 строки, ecли >= 3% (limit) - дробные
        else
            $label = $s2;   // 2 строки, ecли >= 3% (limit) - целые
    }
    else {
        if ($cannabinoids - floor($cannabinoids) != 0)
            $label = $s3;   // 1 строка, eсли < 3% (limit) - дробные
        else
            $label = $s4;   // 1 строка, eсли < 3% (limit) - целые
    }

    return $label;
}

//---------------------------------------
// POSITION STRING FOR INFO TERPENES
//---------------------------------------
function info_terpenes ($text) {
    $xpos = 0.03;
    $y = 0.13;
    $dy = 0.022;
    static $ns = 0;

    $tx = new Text($text);
    $tx->SetFont(FF_ARIAL, FS_BOLD, 16);
    $ypos = $y + ($dy * $ns++);
    $tx->SetPos($xpos, $ypos, 'left', 'bottom');

    return $tx;
}

//-------------------------------
// Unical Strength Calculation
// Return Strength Calculations
// (description)
//-------------------------------
/**
 * Рассчёт силы препарата в зависимости от диапазона введённых значений
 * @param $mode string 'mode1', 'mode2', 'mode3'
 * @param $cannabinoidsInt int - сумма ненулевых входных cannabinoids
 * @return string[] - массив с параметрами для подходящего диапазона
 */
function UnicalStrengthCalculation ($mode, $cannabinoidsInt)
{
    if($mode == 'mode1') {
        // calculate strength description, "flower" (mode1)
        if($cannabinoidsInt > 0 && $cannabinoidsInt <= 5){          // "LIGHT": 0 - 5 (mode1)
            $arr = [
                'name' => 'LIGHT',
                'color' => 'black',
                'bg' => "#ffff6f",
                'gridInt' => '1'
            ];
        }elseif($cannabinoidsInt > 5 && $cannabinoidsInt <= 15){    // "MODERATO": 5 - 15 (mode1)
            $arr = [
                'name' => 'MODERATE',
                'color' => 'black',
                'bg' => "#ffff6f",
                'gridInt' => '2'
            ];
            //$strDesc = 'MODERATE';
            //gridInt = '2';
        }elseif($cannabinoidsInt > 15 && $cannabinoidsInt <= 25){   // "STRONG": 15 - 25 (mode1)
            $arr = [
                'name' => 'STRONG',
                'color' => 'black',
                'bg' => "#a4d805",
                'gridInt' => '3'
            ];
            //$strDesc = 'STRONG';
            //gridInt = '3';
        }elseif($cannabinoidsInt > 25 && $cannabinoidsInt <= 36){   // "EXTRA STRONG": 25 - 36 (mode1)
            $arr = [
                'name' => 'EXTRA STRONG',
                'color' => 'white',
                'bg' => "#7937aa",
                'gridInt' => '4'
            ];
            //$strDesc = 'EXTRA STRONG';
            //gridInt = '4';
        }else{                                                      // "EXTRA STRONG": > 36 (mode1)
            $arr = [
                'name' => 'EXTRA STRONG',
                'color' => 'white',
                'bg' => "#7937aa",
                'gridInt' => '5'
            ];
            // alert('THC number are not between 0% - 36%');
            //$strDesc = 'EXTRA STRONG';
            //gridInt = '5';
        }
    }elseif($mode == 'mode2'){
        // calculate strength description, "concetrate" (mode2)
        if($cannabinoidsInt > 0 && $cannabinoidsInt <= 40){         // "LIGHT": 0 - 40 (mode2)
            $arr = [
                'name' => 'LIGHT',
                'color' => 'black',
                'bg' => "#ffff6f",
                'gridInt' => '1'
            ];
            //$strDesc = 'LIGHT';
            //gridInt = '1';
        }elseif($cannabinoidsInt > 40 && $cannabinoidsInt <= 60){   // "MODERATO": 40 - 60 (mode2)
            $arr = [
                'name' => 'MODERATE',
                'color' => 'black',
                'bg' => "#ffff6f",
                'gridInt' => '2'
            ];
            //$strDesc = 'MODERATE';
            //gridInt = '2';
        }elseif($cannabinoidsInt > 60 && $cannabinoidsInt <= 80){   // "STRONG": 60 - 80 (mode2)
            $arr = [
                'name' => 'STRONG',
                'color' => 'white',
                'bg' => "#7937aa",
                'gridInt' => '3'
            ];
            //$strDesc = 'STRONG';
            //gridInt = '3';
        }elseif($cannabinoidsInt > 80 && $cannabinoidsInt <= 100){  // "EXTRA STRONG": 80 - 100 (mode2)
            $arr = [
                'name' => 'EXTRA STRONG',
                'color' => 'white',
                'bg' => "#7937aa",
                'gridInt' => '4'
            ];
            //$strDesc = 'EXTRA STRONG';
            //gridInt = '4';
        }else{                                                      // "EXTRA STRONG": > 100 (mode2)
            // alert('THC number are not between 0% - 36%');
            $arr = [
                'name' => 'EXTRA STRONG',
                'color' => 'white',
                'bg' => "#7937aa",
                'gridInt' => '5'
            ];
            //$strDesc = 'EXTRA STRONG';
            //gridInt = '5';
        }
    }

    else    // for mode3 OR mode=NULL                               // "not implemented"

    {
        $arr = [
            'name' => 'not implemented',
            'color' => 'black',
            'bg' => "#ffff6f",
            'gridInt' => '5'
        ];
        //$strDesc = 'not implemented';
        //gridInt = '5';
    }

    return $arr;
}

//-------------------
//  Calculate Ratio
//-------------------
/**
 * Рассчёт эффективности для настоек (tinctures).
 * В завимости от соотношений общих сумм значений для thcTotal & cbdTotal:
 * thcTotal = thc+thca+thcv+thc8+thc10+thco;
 * cbdTotal = cbd+cbda+cbdv+cbg+cbga+cbn+cbc;
 *
 * @param $num_1  $thcTotal = $thcNum+$thcaNum+$thcvNum+$thc8Num+$thc10Num+$thcoNum
 * @param $num_2  $cbdTotal = $cbdNum+$cbdaNum+$cbdvNum+$cbgNum+$cbgaNum+$cbnNum+$cbcNum
 * @return string $ratiotText
 */
function calculateRatio ($num_1, $num_2)
{
    $num_thc = $num_1 = (int)($num_1);
    $num_cbd = $num_2 = (int)($num_2);

    for($num=$num_2; $num>1; $num--) {
        if(($num_1 % $num) == 0 && ($num_2 % $num) == 0) {
            $num_1 = $num_1/$num;
            $num_2 = $num_2/$num;
        }
    }

    //$ratio = $num_1 . ":" . $num_2; // *** DEBUG

    $thcRatio = $num_thc;
    $cbdRatio = $num_cbd;

    $dominantElement = max($thcRatio,$cbdRatio);
    if($dominantElement == $thcRatio){
        if ($cbdRatio != 0)
            $ratio1 = round($thcRatio / $cbdRatio, 2);
        else
            $ratio1 = round($thcRatio, 2);
        $dominantElementThc=true;
    }elseif($dominantElement == $cbdRatio){
        if ($thcRatio != 0)
            $ratio1 = round($cbdRatio / $thcRatio, 2);
        else
            $ratio1 = round($cbdRatio, 2);
        $dominantElementThc=false;
    }

    if($thcRatio == 0 ){
        $ratiotText = "CBD Only";
    }elseif($cbdRatio == 0){
        $ratiotText = "THC Only";
    }else{
        //print('<br>ratio1: ' . $ratio1);             // *** DEBUG
        if($ratio1 <= 1.22){
            $ratiotText = "THC CBD Balanced";
        }else{
            if($ratio1 > 1.22 && $ratio1 <= 10){
                if($dominantElementThc){
                    $ratiotText = "THC Dominant";
                }else{
                    $ratiotText = "CBD Dominant";
                }
            }elseif($ratio1 > 10 && $ratio1 <= 20){
                if($dominantElementThc){
                    $ratiotText = "High THC";
                }else{
                    $ratiotText = "High CBD";
                }
            }elseif($ratio1 > 20){
                if($dominantElementThc){
                    $ratiotText = "Very High THC";
                }else{
                    $ratiotText = "Very High CBD";
                }
            }
        }
    }

    //print('<br>ratio: '. $ratio . "<br>");       // *** DEBUG

    return $ratiotText;
}

//-----------------------------------------------------------------------------
// PHP program to pop an alert
// message box on the screen
// Function definition
// https://www.geeksforgeeks.org/how-to-pop-an-alert-message-box-using-php/
//-----------------------------------------------------------------------------
function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');</script>";
}

//----------------------------------------------------------------------------------------------------
// Swap First And Last (Array)
// https://stackoverflow.com/questions/57154957/swap-first-and-last-array-in-multidimensional-array
//----------------------------------------------------------------------------------------------------
function swapFirstAndLast($array) {
    return array_merge(
        array_slice($array, -1 , 1),                    // Last item
        array_slice($array, 1 , count($array) - 2),     // Second - Second last items
        array_slice($array, 0 , 1)                      // First item
    );
}

/*
// c-variant for files
$fp = fopen('test.html', 'a');
fwrite($fp, '<h1>Test file</h1>');
fclose($fp);
unlink('test.html');
?>
*/

// <EOF>

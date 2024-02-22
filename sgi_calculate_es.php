<?php
/*********************************************************************
 * sgi_calculate_es.php
 * SGI PIE DIAGRAMMA v3.0 - 2023-10 (prototype)
 * ---------------------------------------------------------------------
 * JpGraph 4.4.2 (PHP Graph Plotting library - Asial Corporation)
 * https://jpgraph.net
 *
 * Unical Label Generator - Flower 6.8 (js-original)
 * https://uniwyze.com
 *
 * Converting from "Unical Calculate ES JS library" (calculate_es.js)
 ************************************************************************
 * Writing by sgiman 2023-10
 */
require_once ('sgi_database.php');

global $cannabionids_db, $terpenes_db;        // database.php

//***************************
//  Calculate Cannabionids
//***************************
/**
* Рассчитать каннабиноиды ES:
* Вычисляет баллы ES по переменным.
*
* $cannabinoidsArray - массив введённых каннабиноидов, содержащий входные значения,
* $modeVariable - какой режим ("Flower", "Concantrate", "Tinctures") включен ('mode1', 'mode2', 'mode3')
* $cannabinoids_db - массив каннабиноидов
*
* @param {Array} $cannabinoidsArray массив терпенов
* @param {String} $modeVariable режим вычислений
* @param {Object} $cannabionids_db база данных каннабионоидов
*/
 function calculateCannabionids($cannabinoidsArray, $modeVariable, $cannabionidsDB)
 {
     global $cannabinoids_db;
     $cannabionidsNew = [];
     $cannabionidsThreshold = 0.5;
     $cannabionidsESAdd = 0;
     $cannabionidsName = "";
     $cannabionidsValue = 0;
     $cannabionidsWeight = 0;
     $cannabionidsES = 0;

     $cannabionidsESSum = 0;
     //$cannabinoidsArray = $cannabinoidsArray;
     //$modeVariable = $modeVariable;

     //echo "<br><b class='tred'>modeVariable: </b>" . $modeVariable . "<br>";

     // Если режим "concentrate" или "tincture",
     // [ES multiply * 100/36 = 2.777],
     // иначе остается таким, как будь-то это умножено на 1
     // mode1 - flower
     // mode2 - concentrate
     // mode3 - tinctures
     $cannabinoidsConstant = 1;

     if ($modeVariable == 'mode1') {
         $cannabinoidsConstant = 1;
     } else {
         $cannabinoidsConstant = 100 / 36;
     }

     //echo '<br><b class="tred">cannabinoidsConstant: </b>' . $cannabinoidsConstant; // *** DEBUG

     // проверка порога каннабионидов и создание нового массива
     for ($i = 0; $i < count($cannabinoidsArray); $i++)
     {
         $cannabionidsName = $cannabinoidsArray[$i][1];             // 1 - Name
         $cannabionidsValue = (float)$cannabinoidsArray[$i][0];     // 0 - Value
         $cannabionidsWeight = floatval($cannabinoids_db[$cannabionidsName]['weight']);

         //echo "<br><b class='tblue'> : " . $cannabionidsName . " " . $cannabionidsValue;  // *** DEBUG

         // только если значение каннабиноидов превышает пороговое значение для каннабиоидов
         if ($cannabionidsValue >= $cannabionidsThreshold)  // >= 0.5
         {
             // if THC, THCA, THC8, THC10, THCO
             if ($cannabionidsName == "thc" || $cannabionidsName == "thca" || $cannabionidsName == "thc8" ||
                 $cannabionidsName == "thc10" || $cannabionidsName == "thco")
             {
                 // > или равно 10, или больше и добавляются каждые 10%
                 if ($cannabionidsValue >= round(0.5 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(10.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 1;
                 } elseif ($cannabionidsValue >= round(10.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(20.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 2;
                 } elseif ($cannabionidsValue >= round(20.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(30.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 3;
                 } elseif ($cannabionidsValue >= round(30.056 * $cannabinoidsConstant, 3) && $cannabionidsValue <= round(36 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 4;
                 }

                 $cannabionidsES = $cannabionidsESAdd * $cannabionidsWeight;
                 $cannabionidsES = round($cannabionidsES, 3);
                 //echo "<br><b class='tred'>cannabionidsES (thc, thca, thc8, thc10, thco): </b>" . $cannabionidsES;  // *** DEBUG

             } // ---> END IF: THC, THCA, THC8, THC10, THCO
             // ELSE IF: CBD, CBDA --->
             elseif ($cannabionidsName == "cbd" || $cannabionidsName == "cbda")
             {
                 // > или равно 4, или выше и добавляются каждые 4%
                 if ($cannabionidsValue >= round(0.5 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(4.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 1;
                 } elseif ($cannabionidsValue >= round(4.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(8.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 2;
                 } elseif ($cannabionidsValue >= round(8.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(12.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 3;
                 } elseif ($cannabionidsValue >= round(12.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(16.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 4;
                 } elseif ($cannabionidsValue >= round(16.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(20.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 5;
                 } elseif ($cannabionidsValue >= round(20.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(24.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 6;
                 } elseif ($cannabionidsValue >= round(24.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(28.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 7;
                 } elseif ($cannabionidsValue >= round(28.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(32.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 8;
                 } elseif ($cannabionidsValue >= round(32.056 * $cannabinoidsConstant, 3) && $cannabionidsValue <= round(36 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 9;
                 }

                 $cannabionidsES = $cannabionidsESAdd * $cannabionidsWeight;
                 $cannabionidsES = round($cannabionidsES, 3);
                 //echo "<br><b class='tred'> cannabionidsES (cbd, cbda): </b>" . $cannabionidsES;    // *** DEBUG


             } // ---> ELSE IF: CBD, CBDA
             // if CBG, CBGA --->
             elseif ($cannabionidsName == "cbg" || $cannabionidsName == "cbga") {
                 // > или равно 2, или больше и добавляются каждые 2%
                 if ($cannabionidsValue >= round(0.5 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(2.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 1;
                 } elseif ($cannabionidsValue >= round(2.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(4.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 2;
                 } elseif ($cannabionidsValue >= round(4.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(6.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 3;
                 } elseif ($cannabionidsValue >= round(6.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(8.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 4;
                 } elseif ($cannabionidsValue >= round(8.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(10.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 5;
                 } elseif ($cannabionidsValue >= round(10.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(12.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 6;
                 } elseif ($cannabionidsValue >= round(12.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(14.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 7;
                 } elseif ($cannabionidsValue >= round(14.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(16.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 8;
                 } elseif ($cannabionidsValue >= round(16.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(18.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 9;
                 } elseif ($cannabionidsValue >= round(18.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(20.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 10;
                 } elseif ($cannabionidsValue >= round(20.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(22.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 11;
                 } elseif ($cannabionidsValue >= round(22.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(24.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 12;
                 } elseif ($cannabionidsValue >= round(24.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(26.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 13;
                 } elseif ($cannabionidsValue >= round(26.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(28.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 14;
                 } elseif ($cannabionidsValue >= round(28.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(30.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 15;
                 } elseif ($cannabionidsValue >= round(30.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(32.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 16;
                 } elseif ($cannabionidsValue >= round(32.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(34.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 17;
                 } elseif ($cannabionidsValue >= round(34.056 * $cannabinoidsConstant, 3) && $cannabionidsValue <= round(36 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 18;
                 }

                $cannabionidsES = $cannabionidsESAdd * $cannabionidsWeight;
                $cannabionidsES = round($cannabionidsES, 3);
                //echo "<br><b class='tred'>cannabionidsES (cbg, cbga): </b>" . $cannabionidsES;   // *** DEBUG

            } // ---> END IF: CBG, CBGA
            // if THCV, CBN, CBC, THCV, CBDV --->
            else
            {
                 if ($cannabionidsValue >= round(0.5 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(1.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 1;
                 } elseif ($cannabionidsValue >= round(1.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(2.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 2;
                 } elseif ($cannabionidsValue >= round(2.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(3.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 3;
                 } elseif ($cannabionidsValue >= round(3.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(4.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 4;
                 } elseif ($cannabionidsValue >= round(4.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(5.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 5;
                 } elseif ($cannabionidsValue >= round(5.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(6.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 6;
                 } elseif ($cannabionidsValue >= round(6.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(7.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 7;
                 } elseif ($cannabionidsValue >= round(7.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(8.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 8;
                 } elseif ($cannabionidsValue >= round(8.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(9.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 9;
                 } elseif ($cannabionidsValue >= round(9.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(10.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 10;
                 } elseif ($cannabionidsValue >= round(10.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(11.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 11;
                 } elseif ($cannabionidsValue >= round(11.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(12.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 12;
                 } elseif ($cannabionidsValue >= round(12.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(13.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 13;
                 } elseif ($cannabionidsValue >= round(13.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(14.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 14;
                 } elseif ($cannabionidsValue >= round(14.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(15.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 15;
                 } elseif ($cannabionidsValue >= round(15.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(16.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 16;
                 } elseif ($cannabionidsValue >= round(16.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(17.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 17;
                 } elseif ($cannabionidsValue >= round(17.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(18.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 18;
                 } elseif ($cannabionidsValue >= round(18.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(19.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 19;
                 } elseif ($cannabionidsValue >= round(19.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(20.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 20;
                 } elseif ($cannabionidsValue >= round(20.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(21.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 21;
                 } elseif ($cannabionidsValue >= round(21.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(22.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 22;
                 } elseif ($cannabionidsValue >= round(22.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(23.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 23;
                 } elseif ($cannabionidsValue >= round(23.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(24.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 24;
                 } elseif ($cannabionidsValue >= round(24.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(25.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 25;
                 } elseif ($cannabionidsValue >= round(25.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(26.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 26;
                 } elseif ($cannabionidsValue >= round(26.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(27.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 27;
                 } elseif ($cannabionidsValue >= round(27.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(28.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 28;
                 } elseif ($cannabionidsValue >= round(28.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(29.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 29;
                 } elseif ($cannabionidsValue >= round(29.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(30.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 30;
                 } elseif ($cannabionidsValue >= round(30.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(31.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 31;
                 } elseif ($cannabionidsValue >= round(31.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(32.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 32;
                 } elseif ($cannabionidsValue >= round(32.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(33.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 33;
                 } elseif ($cannabionidsValue >= round(33.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(34.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 34;
                 } elseif ($cannabionidsValue >= round(34.056 * $cannabinoidsConstant, 3) && $cannabionidsValue < round(35.056 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 35;
                 } elseif ($cannabionidsValue >= round(35.056 * $cannabinoidsConstant, 3) && $cannabionidsValue <= round(36 * $cannabinoidsConstant, 3)) {
                     $cannabionidsESAdd = 36;
                 }

                 $cannabionidsES = $cannabionidsESAdd * $cannabionidsWeight;
                 $cannabionidsES = round($cannabionidsES, 3);
                 //echo "<br><b class='tred'>cannabionidsES (THCV, CBN, CBC, THCV,CBDV): </b>" . $cannabionidsES;  // *** DEBUG


            } // --- ELSE ---

            // создать новый массив со всеми значениями и оценкой ES
            array_push ($cannabionidsNew, [$cannabionidsName, $cannabionidsValue, $cannabionidsWeight, $cannabionidsES]);

         } // --- IF (>= 0.5) ---

     } // --- FOR ---

     //echo "<br> <b class='tred' cannabionidsNew (ARRAY): "; // *** DEBUG
     //debug ($cannabionidsNew);                              // *** DEBUG

    // сумма баллов ES всех каннабиноидов = cannabionidsESSum
    for ($i = 0; $i < count($cannabionidsNew); $i++)
    {
         $cannabionidsESSum += $cannabionidsNew[$i][3];
         //echo "<br> <b class='tred'> cannabionidsNew: </b>" . $cannabionidsNew[$i][3];  // *** DEBUG
         //echo  "<br>" . $cannabionidsESSum . " + ";
    }

    //debug($cannabionidsNew);    // *** DEBUG

    $cannabionidsESSum = round($cannabionidsESSum, 3);
    //print('<br><b class="tred">cannabinoids ES (SUM): </b>' . $cannabionidsESSum);    // *** DEBUG

    return $cannabionidsESSum;

} //--- Calculate Cannabionids ---


//***************************
//    Calculate Terpenes
//***************************
/**
 * Рассчитать баллы ES терпенов
 * @param {Float} $terpenesArray ввод массив терпенов
 * @param {String} $obj вся база данных терпенов
 */
function calculateTerpenes ($t_Names, $t_Values, $terpenes_db)
{
    // variables
    $terpenesNew = [];
    $terpenesThreshold = 0.2;
    $terpenesName = "";
    $terpenesValue = 0;
    $terpenesESAdd = 0;
    $terpenesES = 0;
    $terpenesWeight = 0;
    $terpenesESSum = 0;

    //echo "<b class='tgreen'>t_Values = </b><br>";
    //debug ($t_Values);

    //echo "<b class='tgreen'>t_Names = </b><br>";
    //debug ($t_Names);

    // проверить порог терпенов и использовать только эти элементы
    for($i=0; $i < count($t_Values); $i++) {
        $terpenesName = $t_Names[$i];
        $terpenesValue = $t_Values[$i];
        $terpenesWeight = floatval($terpenes_db[$terpenesName]['weight']);

        //echo "<br><span class='tred'>" . $terpenesName . " " . $terpenesValue . " " . $terpenesWeight . "</span>";

        //echo "<br><b >Name = " . $terpenesName;
        //echo "<br> Value = " . $terpenesValue;
        //echo "<br> Weight = " . $terpenesWeight;

        if ($t_Values[$i] >= $terpenesThreshold) {
            if($terpenesValue >= 0.5 && $terpenesValue < 1.056) {
                $terpenesESAdd = 1;
            }elseif($terpenesValue >= 1.056 && $terpenesValue < 2.056){
                $terpenesESAdd = 2;
            }elseif($terpenesValue >= 2.056 && $terpenesValue < 3.056){
                $terpenesESAdd = 3;
            }elseif($terpenesValue >= 3.056 && $terpenesValue < 4.056){
                $terpenesESAdd = 4;
            }elseif($terpenesValue >= 4.056 && $terpenesValue < 5.056){
                $terpenesESAdd = 5;
            }elseif($terpenesValue >= 5.056 && $terpenesValue < 6.056){
                $terpenesESAdd = 6;
            }elseif($terpenesValue >= 6.056 && $terpenesValue < 7.056){
                $terpenesESAdd = 7;
            }elseif($terpenesValue >= 7.056 && $terpenesValue < 8.056){
                $terpenesESAdd = 8;
            }elseif($terpenesValue >= 8.056 && $terpenesValue < 9.056){
                $terpenesESAdd = 9;
            }elseif($terpenesValue >= 9.056 && $terpenesValue < 10.056){
                $terpenesESAdd = 10;
            }elseif($terpenesValue >= 10.056 && $terpenesValue < 11.056){
                $terpenesESAdd = 11;
            }elseif($terpenesValue >= 11.056 && $terpenesValue < 12.056){
                $terpenesESAdd = 12;
            }elseif($terpenesValue >= 12.056 && $terpenesValue < 13.056){
                $terpenesESAdd = 13;
            }elseif($terpenesValue >= 13.056 && $terpenesValue < 14.056){
                $terpenesESAdd = 14;
            }elseif($terpenesValue >= 14.056 && $terpenesValue < 15.056){
                $terpenesESAdd = 15;
            }elseif($terpenesValue >= 15.056 && $terpenesValue < 16.056){
                $terpenesESAdd = 16;
            }elseif($terpenesValue >= 16.056 && $terpenesValue < 17.056){
                $terpenesESAdd = 17;
            }elseif($terpenesValue >= 17.056 && $terpenesValue < 18.056){
                $terpenesESAdd = 18;
            }elseif($terpenesValue >= 18.056 && $terpenesValue < 19.056){
                $terpenesESAdd = 19;
            }elseif($terpenesValue >= 19.056 && $terpenesValue < 20.056){
                $terpenesESAdd = 20;
            }elseif($terpenesValue >= 20.056 && $terpenesValue < 21.056){
                $terpenesESAdd = 21;
            }elseif($terpenesValue >= 21.056 && $terpenesValue < 22.056){
                $terpenesESAdd = 22;
            }elseif($terpenesValue >= 22.056 && $terpenesValue < 23.056){
                $terpenesESAdd = 23;
            }elseif($terpenesValue >= 23.056 && $terpenesValue < 24.056){
                $terpenesESAdd = 24;
            }elseif($terpenesValue >= 24.056 && $terpenesValue < 25.056){
                $terpenesESAdd = 25;
            }elseif($terpenesValue >= 25.056 && $terpenesValue < 26.056){
                $terpenesESAdd = 26;
            }elseif($terpenesValue >= 26.056 && $terpenesValue < 27.056){
                $terpenesESAdd = 27;
            }elseif($terpenesValue >= 27.056 && $terpenesValue < 28.056){
                $terpenesESAdd = 28;
            }elseif($terpenesValue >= 28.056 && $terpenesValue < 29.056){
                $terpenesESAdd = 29;
            }elseif($terpenesValue >= 29.056 && $terpenesValue < 30.056){
                $terpenesESAdd = 30;
            }elseif($terpenesValue >= 30.056 && $terpenesValue < 31.056){
                $terpenesESAdd = 31;
            }elseif($terpenesValue >= 31.056 && $terpenesValue < 32.056){
                $terpenesESAdd = 32;
            }elseif($terpenesValue >= 32.056 && $terpenesValue < 33.056){
                $terpenesESAdd = 33;
            }elseif($terpenesValue >= 33.056 && $terpenesValue < 34.056){
                $terpenesESAdd = 34;
            }elseif($terpenesValue >= 34.056 && $terpenesValue < 35.056){
                $terpenesESAdd = 35;
            }elseif($terpenesValue >= 35.056 && $terpenesValue <= 36){
                $terpenesESAdd = 36;
            }
            //echo "<br>" . '<b class="tgreen">!!!terpenesESAdd =  </b>' . $terpenesESAdd;
            $terpenesES = $terpenesESAdd * $terpenesWeight;
            $terpenesES = round($terpenesES,3);
            array_push($terpenesNew,[$terpenesName, $terpenesValue, $terpenesWeight, $terpenesES]);

            //echo "<br>" . "!!!terpenesESAdd =  " . $terpenesESAdd;                    // ***DEBUG
            //echo "<br>" . "!!!terpenesES =  " . $terpenesES . "<br>";                 // ***DEBUG
            //echo "<br><b class='tblue'>terpenesES = </b>" . $terpenesES . "<br>";     // ***DEBUG

        } // --- IF ---

    } // --- FOR ---

    //echo "<br><b class='tblue'>terpenesNew = </b>>";    // *** DEBUG
    //debug($terpenesNew);                                // *** DEBUG

    // Сумма всех терпенов, конечный ES
    for ($i=0; $i < count($terpenesNew); $i++) {
        $terpenesESSum += $terpenesNew[$i][3];
    }

    $terpenesESSum = round($terpenesESSum, 3);
    //print('<br><b class="tred">terpenesESSum: </b>' . $terpenesESSum);

    return $terpenesESSum;

} // --- Calculate Terpenes --- // <EOF>

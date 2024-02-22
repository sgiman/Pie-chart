<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SGI PIE DIAGRAMMA v3.0</title>
    <!-- <link rel="stylesheet" href="css/test.css">-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h3>SGI PIE DIAGRAMMA v3.0</h3>
    <!-- DIAGRAMM PNG-IMAGE (BROWSER) -->
    <div id="canvas-wrapper">
        <img src="imagefile.png" width="1024"  unselectable="on">
    </div>
</div> <!-- container -->

<h1>HTML:</h1>
<hr>

<!------------------------------ PHP ------------------------------------>

<?php // content="text/plain; charset=utf-8"
/*************************************************************************
 *  sgi_pie.php
 *  SGI PIE DIAGRAMMA v3.0 - 2023-10 (prototype)
 *  ----------------------------------------------------------------------
 *  JpGraph 4.4.2 (PHP Graph Plotting library - Asial Corporation)
 *  https://jpgraph.net
 *
 *  Unical Label Generator - Flower 6.8 (js-original)
 *  https://uniwyze.com
 *  ---------------------------------------------------------------------
 *  КРУГОВАЯ ДИАГРАММА С ВЫНОСКАМИ
 *  по часовой стрелке от 12 часов
 *  ---------------------------------------------------------------------
 * CANNABINOIDS:
 * THC(1) THCA(2) THCV(3) THC8(4) THC10(5) THCO(6)
 * CBD(7) CBDA(8) CBDV(9) CBG(10) CBGA(11) CBN(12) CBC(13)
 *
 * MODES:
 * mode1="Flower", mode2="Concentrate", mode3="Tinctures"
 ************************************************************************
 * Writing by sgiman @ 2023-10
 *
 */
$ver = "3.0";

include ("jpgraph/jpgraph.php");
include ("jpgraph/jpgraph_pie.php");

require_once ('sgi_functions.php');
require_once ('sgi_database.php');
require_once ('sgi_calculate_es.php');

//==============
// GLOBAL DATA
// (for HTML)
//==============
// Arrays
global $samples, $terpenes_db, $cannabinoids_db, $terpenes_name;

// Cannabinoids
global $thc, $thca, $thcv, $thc8, $thc10, $thc0, $cbd, $cbda, $cbdv, $cbg, $cbga, $cbn, $cbc;

// Totall parameters
global $cannabionids_ES_Sum, $terpenes_ES_Sum, $es_total, $tac, $main_terp, $mode, $ext;

//==============
//  MAIN DATA
//==============
$width = 1400;
$height = 1400;

$fileName = "imagefile.png";

$x_pie_center = 0.55;
$y_pie_center = 0.45;
$k1 = 100/36;
$k2 = 1;

//==============
//   COOCKIE
//==============
if (isset($_COOKIE["mode"]))
    $mode = $_COOKIE["mode"];
else
    $mode = 'mode1';
if (isset($_COOKIE["test"]))
    $test = $_COOKIE["test"];
else
    $test = NULL;

// Удалить куки
unset($_COOKIE['mode']);
unset($_COOKIE['test']);

// Удалить PNG
if (file_exists($fileName)) {
    unlink($fileName);
}

//******************************
////////////////////////////////
// C A N N A B I N O I D S: (I)
////////////////////////////////
//******************************
if(isset($_POST['product-name']))
    $product_name = trim($_POST['product-name']);
else
    $product_name = "NONE";

$data_cannabinoids = [
    [0, "thc"],     //0
    [0, "thca"],    //1
    [0, "thcv"],    //2
    [0, "thc8"],    //3
    [0, "thc10"],   //4
    [0, "thco"],    //5
    [0, "cbd"],     //6
    [0, "cbda"],    //7
    [0, "cbdv"],    //8
    [0, "cbg"],     //9
    [0, "cbga"],    //10
    [0, "cbn"],     //11
    [0, "cbc"],     //12
];

// По умолчанию
$hide_bg = false;             // фон разрешён
$hide_guide_line = false;     // выноски разрешены

//--------------------------
//  INPUTS CANNABINOIDS
//--------------------------
//THC (0)
if(isset($_POST['THC-input2'])) {
    $thc = (float)trim($_POST['THC-input2']);
    $data_cannabinoids[0][0] = floatval($thc);
}
//THCA (1)
if(isset($_POST['THCA-input2'])) {
    $thca = (float)trim($_POST['THCA-input2']);
    $data_cannabinoids[1][0] = floatval($thca);
}
//THCV (2)
if(isset($_POST['THCV-input2'])) {
    $thcv = (float)trim($_POST['THCV-input2']);
    $data_cannabinoids[2][0] = floatval($thcv);
}
//THC8 (3)
if(isset($_POST['THC8-input2'])) {
    $thc8 = (float)trim($_POST['THC8-input2']);
    $data_cannabinoids[3][0] = floatval($thc8);
}
//THC10 (4)
if(isset($_POST['THC10-input2'])) {
    $thc10 = (float)trim($_POST['THC10-input2']);
    $data_cannabinoids[4][0] = floatval($thc10);
}
//THCO (5)
if(isset($_POST['THCO-input2'])) {
    $thco = (float)trim($_POST['THCO-input2']);
    $data_cannabinoids[5][0] = floatval($thco);
}
//CBD (6)
if(isset($_POST['CBD-input2'])) {
    $cbd = (float)trim($_POST['CBD-input2']);
    $data_cannabinoids[6][0] = floatval($cbd);
}
//CBDA (7)
if(isset($_POST['CBDA-input2'])) {
    $cbda = (float)trim($_POST['CBDA-input2']);
    $data_cannabinoids[7][0] = floatval($cbda);
}
//CBDV (8)
if(isset($_POST['CBDV-input2'])) {
    $cbdv = (float)trim($_POST['CBDV-input2']);
    $data_cannabinoids[8][0] = floatval($cbdv);
}
//CBG (9)
if(isset($_POST['CBG-input2'])) {
    $cbg = (float)trim($_POST['CBG-input2']);
    $data_cannabinoids[9][0] = floatval($cbg);
}
//CBGA (10)
if(isset($_POST['CBGA-input2'])) {
    $cbga = (float)trim($_POST['CBGA-input2']);
    $data_cannabinoids[10][0] = floatval($cbga);
}
//CBN (11)
if(isset($_POST['CBN-input2'])) {
    $cbn = (float)trim($_POST['CBN-input2']);
    $data_cannabinoids[11][0] = floatval($cbn);
}
//CBC (12)
if(isset($_POST['CBC-input2'])) {
    $cbc = (float)trim($_POST['CBC-input2']);
    $data_cannabinoids[12][0] = floatval($cbc);
}

//--------------------------
//     INPUTS CHECKBOX
//--------------------------
// HIDE BACKGROUND
if(isset($_POST['hide_background']))
    $hide_bg = $_POST['hide_background'];     // фон разрешён
else
    $hide_bg = false;

// HIDE GUIDE LINES
if(isset($_POST['hide_guide_lines']))
    $hide_gline = $_POST['hide_guide_lines'];  // guide line разрешёны
else
    $hide_gline = false;

// HIDE TITLE
if(isset($_POST['hide_title']))
    $hide_title = $_POST['hide_title'];  // guide line разрешёны
else
    $hide_title = false;

// HIDE TOTAL
if(isset($_POST['hide_total']))
    $hide_total = $_POST['hide_total'];  // guide line разрешёны
else
    $hide_total = false;

//echo "<br><b class='tblue'>data_cannabinoids =</b>";  // *** DEBUG
//debug($data_cannabinoids);                            // *** DEBUG

//*****************************
///////////////////////////////
//  Р а с с ч ё т  R A T I O
//  эффективность препарата
//  only for "Tinctures"
///////////////////////////////
//*****************************
$thcTotal = $thc+$thca+$thcv+$thc8+$thc10+$thco;        // Total THC
$cbdTotal = $cbd+$cbda+$cbdv+$cbg+$cbga+$cbn+$cbc;      // Total CBD
$ratioText = calculateRatio ($thcTotal, $cbdTotal);     // Рассчёт эффективности настойки ("Tinctures" - mode3)

// Проверка ввода терпенов
if ($thcTotal + $cbdTotal == 0)
    $is_exist_cannabinoids = false;
else
    $is_exist_cannabinoids = true;

 $total_sum = $thcTotal + $cbdTotal;

//--------------------
// Check Input Limit
//--------------------
if($mode == 'mode1') {
    if ( $total_sum > 36 && $total_sum > 0) {
         echo "<script>alert('The SUM of all the Cannabinoids must be bigger than 0 and smaller than 36 (Flower)!')</script>";
         header('location: index.php');
         exit();
    }
}
if($mode == 'mode2') {
    if ($total_sum > 100 && $total_sum > 0) {
        echo "<script>alert('The SUM of all the Cannabinoids must be bigger than 0 and smaller than 100 (Concentrate)!')</script>";
        header('location: index.php');
        exit();
    }
}

//--------------
//   P O S T
//--------------
//$mode = $samples[$product_name][6];
if ($mode==NULL) $mode = 'mode1';

//echo "<br><b class='tblue'> MODE: </b>" . $mode;                    // *** DEBUG
//echo '<br><b class="tblue"> COOCKIE: </b>' . $mode . ", " . $test;  // *** DEBUG

$new_post = array_diff($_POST, array('', NULL, false));             // Масссив из не пустых POST-элементов

//debug($new_post);                                                 // *** DEBUG

//************************
//////////////////////////
// T E R P E N E S : (II)
//////////////////////////
//************************

// SEARCH MAX TERPENES
$name_arr = [];     // name (key) terpenes
$value_arr = [];    // value terpenes
$terpenes_max = 0;  // max value terpenes

foreach ($_POST as $name => $value) {
    // find terpenes "t_name"
    if (strpos($name, "t_") === 0) {
        array_push($name_arr, $name);
        array_push($value_arr, $value);
    }
}

$new_terpenes = array_combine($name_arr, $value_arr);                   // terpenes new array
$max_terpenes_input = array_search(max($new_terpenes), $new_terpenes);  // max terpenes input !!!
$sum_terpenes = array_sum($value_arr);

// Проверка ввода терпенов
if ($sum_terpenes == 0)
    $is_exist_terpenes = false;
else
    $is_exist_terpenes = true;

// Заполнить пустые нулями
for ($i = 0; $i < count($value_arr); $i++) {
    if (empty($value_arr[$i])) $value_arr[$i] = 0;
}

//echo "<br><b>T E R P E N E S:</b>";   // *** DEBUG
//debug($new_terpenes);                 // *** DEBUG
//debug($value_arr);                    // *** DEBUG

//echo "<br><b class='tblue'>is_exist_terpenes =  " . $is_exist_terpenes . "</b>";                  // *** DEBUG
//echo "<br><b class='tred'>MAX TERPENES NAME: " . $max_terpenes_input . "</b>";                    // *** DEBUG
//echo "<br><b class='tred'>MAX TERPENES VALUE: " . $new_terpenes[$max_terpenes_input] . "</b>";    // *** DEBUG
//echo "<br><b class='tblue'>MAX NAME2: " . $terpenes_db[$max_terpenes_input]['name2'] . "</b>";    // *** DEBUG
//debug($data_terpenes);    // *** DEBUG

//*********************************************
///////////////////////////////////////////////
//     C a l c u l a t e  Cannabionids ES
///////////////////////////////////////////////
//*********************************************
$cannabionids_ES_Sum = calculateCannabionids($data_cannabinoids, $mode, $cannabinoids_db);
//echo "<br> <b class='tblue'>cannabionids_ES_Sum = $cannabionids_ES_Sum </b><br>";    // *** DEBUG

//*********************************************
//////////////////////////////////////////////
//      C a l c u l a t e  Terpenes ES
//////////////////////////////////////////////
//*********************************************
$terpenes_ES_Sum = calculateTerpenes ($name_arr, $value_arr, $terpenes_db);
//echo "<br> <b class='tblue'>terpenes_ES_Sum = $terpenes_ES_Sum </b><br>";    // *** DEBUG

//---------------------------------------------------------
// D A T A
// THC(1) THCA(2) THCV(3) THC8(4) THC10(5) THCO(6)
// CBD(7) CBDA(8) CBDV(9) CBG(10) CBGA(11) CBN(12) CBC(13)
//---------------------------------------------------------
// $no, $thc, $thca, $thcv, $thc8, $thc10, $thco, $cbd, $cbda, $cbdv, $cbg, $cbga, $cbn, $cbc;
// Flower, Concentrate, Tinctures
// [TC] => 600 (mg)
// [TV] => 30 (mg)

if(isset($_POST['TC'])) $tc = (float)trim($_POST['TC']);
if(isset($_POST['TV'])) $tv = (float)trim($_POST['TV']);

// --- EMPTY LAST ELEMENT ---
if ($mode == 'mode3' || ($product_name == "Typical Tincture 1" || $product_name == "Typical Tincture 2" || $product_name == "Typical Hemp Tincture"))
{
    // SUM-EMPTY for "Tinctures"
    $k = 0.003; // 1mg = 0.003% (mode3="Tinctures"), 100% = $tc*$k
    $no = (($tc*$k)*2000)-($thc*$k+$thca*$k+$thcv*$k+$thc8*$k+$thc10*$k+$thco*$k+$cbd*$k+$cbda*$k+$cbdv*$k+$cbg*$k+$cbga*$k+$cbn*$k+$cbc*$k);
}

if ($mode == 'mode1')
{
    // SUM-EMPTY for "Flower"
    $k = 100/36;    // for 36% (mode1="Flower", mode2="Concentrate")
    //$k = 1;
    $no = 100-($thc*$k+$thca*$k+$thcv*$k+$thc8*$k+$thc10*$k+$thco*$k+$cbd*$k+$cbda*$k+$cbdv*$k+$cbg*$k+$cbga*$k+$cbn*$k+$cbc*$k);
}

if ($mode == 'mode2')
{
    // SUM-EMPTY for "Concentrate"
    $k = 1;    // for 100% (mode1="Flower", mode2="Concentrate")
    $no = 100-($thc*$k+$thca*$k+$thcv*$k+$thc8*$k+$thc10*$k+$thco*$k+$cbd*$k+$cbda*$k+$cbdv*$k+$cbg*$k+$cbga*$k+$cbn*$k+$cbc*$k);
}

// WORK ARRAYS
$colors_arc = [];   // Colors for Tinctures
$data       = [];   // Array data value
$labels     = [];   // Array Labels

if ($mode == "mode3")
    $ext = "mg";
else
    $ext = "%";

//----------------------------------------
// D A T A  &  L A B E L S  T E X T
// Перенос на 2 строки (>=limit)
// Цeлыe и Дробные
// Заполнение массивов: data[],labels[]
//----------------------------------------

// THC (1)
if ($thc != 0) {
    $label = correct_label ($thc, "THC", $mode);
    array_push ($labels, $label);
    array_push ($data, $thc);
    array_push ($colors_arc, $cannabinoids_db['thc']['color']);
}

// THCA (2)
if ($thca != 0) {
    $label = correct_label ($thca, "THCA", $mode);
    array_push ($labels, $label);
    array_push ($data, $thca);
    array_push ($colors_arc, $cannabinoids_db['thca']['color']);
}

// THCV (3)
if ($thcv != 0) {
    $label = correct_label ($thcv, "THCV", $mode);
    array_push ($labels, $label);
    array_push ($data, $thcv);
    array_push ($colors_arc, $cannabinoids_db['thcv']['color']);
}

// THC8 (4)
if ($thc8 != 0) {
    $label = correct_label ($thc8, "THC8", $mode);
    array_push ($labels, $label);
    array_push ($data, $thc8);
    array_push ($colors_arc, $cannabinoids_db['thc8']['color']);
}

// THC10 (5)
if ($thc10 != 0) {
    $label = correct_label ($thc10, "THC10", $mode);
    array_push ($labels, $label);
    array_push ($data, $thc10);
    array_push ($colors_arc, $cannabinoids_db['thc10']['color']);
}

// THCO (6)
if ($thco != 0) {
    $label = correct_label ($thco, "THCO", $mode);
    array_push ($labels, $label);
    array_push ($data, $thco);
    array_push ($colors_arc, $cannabinoids_db['thco']['color']);
}

// CBD (7)
if ($cbd != 0) {
    $label = correct_label ($cbd, "CBD", $mode);
    array_push ($labels, $label);
    array_push ($data, $cbd);
    array_push ($colors_arc, $cannabinoids_db['cbd']['color']);
}

// CBDA (8)
if ($cbda != 0) {
    $label = correct_label ($cbda, "CBDA", $mode);
    array_push ($labels, $label);
    array_push ($data, $cbda);
    array_push ($colors_arc, $cannabinoids_db['cbda']['color']);
}

// CBDV (9)
if ($cbdv != 0) {
    $label = correct_label ($cbdv, "CBDV", $mode);
    array_push ($labels, $label);
    array_push ($data, $cbdv);
    array_push ($colors_arc, $cannabinoids_db['cbdv']['color']);
}

// CBG (10)
if ($cbg != 0) {
    $label = correct_label ($cbg, "CBG", $mode);
    array_push ($labels, $label);
    array_push ($data, $cbg);
    array_push ($colors_arc, $cannabinoids_db['cbg']['color']);
}

// CBGA (11)
if ($cbga != 0) {
    $label = correct_label ($cbga, "CBGA", $mode);
    array_push ($labels, $label);
    array_push ($data, $cbga);
    array_push ($colors_arc, $cannabinoids_db['cbga']['color']);
}

// CBN (12)
if ($cbn != 0) {
    $label = correct_label ($cbn, "CBN", $mode);
    array_push ($labels, $label);
    array_push ($data, $cbn);
    array_push ($colors_arc, $cannabinoids_db['cbn']['color']);
}

// CBC (13)
if ($cbc != 0) {
    $label = correct_label ($cbc, "CBC", $mode);
    array_push ($labels, $label);
    array_push ($data, $cbc);
    array_push ($colors_arc, $cannabinoids_db['cbc']['color']);
}

// REVERSE ARRAYS
$data = array_reverse($data);
$labels = array_reverse($labels);
$colors_arc = array_reverse($colors_arc);

//array_unshift
// FIRST EMPTY ELEMENT
array_unshift ($labels, "");
array_unshift ($data, $no);

if ($hide_bg == true)
    array_unshift ($colors_arc, 'white');   // bg white
else
    array_unshift ($colors_arc, $cannabinoids_db['empty']['color']);    // bg light gray

//debug ($colors_arc);                        // *** DEBUG
//echo "<b class='tblue'>LABELS: </b>";       // *** DEBUG
//debug($labels);                             // *** DEBUG
//echo "<b class='tred'>DATA: </b>";          // *** DEBUG
//debug($data);                               // *** DEBUG


//*************************************
///////////////////////////////////////
//          P I E  G R A P H
///////////////////////////////////////
//*************************************
$graph = new PieGraph($width,$height, 'auto');
$graph->clearTheme();
$graph->SetFrame(false);
//$graph->SetShadow();

//*************************************
///////////////////////////////////////
//           P I E  P L O T
///////////////////////////////////////
//*************************************
$p1 = new PiePlotC($data);
$p1->SetCenter($x_pie_center, $y_pie_center);
$p1->SetSize(0.25);                 // 0.32
$p1->SetMidSize(0.52);              // 0.5 - 0.52

$p1 -> SetStartAngle ( 90 );        // START ANGLE FOR SLICES = 0-45-90 ******
$graph->Add($p1);
$p1->SetSliceColors($colors_arc);   // Set the colors !!! ($color_db)

//==========================
//       T I T L E S
//==========================
// Cannabinoids total sum
$sum_cannabinoids = 0;
for ($i=1; $i < count($data); $i++) {
    $sum_cannabinoids += $data[$i];
}
// Terpenes total sum
$sum_terpenes = 0;
for ($i=0; $i < count($value_arr); $i++) {
    $sum_terpenes += $value_arr[$i];
}

//echo "<br><b class='tred'>sum_cannabinoids = " . $sum_cannabinoids . "</b>";    // *** DEBUG
//echo "<br><b class='tred'>sum_terpenes = " . $sum_terpenes . "</b>";            // *** DEBUG
//$graph->title->Set($product_name);    // MAIN TITLE (product name)

$calc_strength = UnicalStrengthCalculation($mode, $sum_cannabinoids);   // рассчёт "силы" (strength) препарата *****

if ($mode == 'mode3')
{
    $center_text1 = $ratioText;    // эффективность препарарта (Ratio Text) - настойки ("Tinctures") *****
    $center_text2 = strtoupper($terpenes_db[$max_terpenes_input]['name2']); // "Terpenes" text (to center circle)
}
else
{
    $center_text1 = $calc_strength['name'];  // cила препарата
    $center_text2 = strtoupper($terpenes_db[$max_terpenes_input]['name2']); // название терпена
}

// Если были введены терпены (for center cicle - colors)
if ($is_exist_terpenes) {
    $center_bgcolor = $terpenes_db[$max_terpenes_input]['color'];       // "Terpenes" bg-color (center circle)
    $center_text_color = $terpenes_db[$max_terpenes_input]['color2'];   // "Terpenes" text-color (center circle)
}
// Если не были введены терпены (for center cicle - "BLACK & WHITE")
else
{
    $center_bgcolor = "white";    // Light gray #efefef"
    $center_text_color = "black";
    $center_text2 = "";
}

// Если не были введены каннобиоды
if (!$is_exist_cannabinoids) {
    $center_text1 = "NONE";
}

// Если не было введено название продукта
//if ($product_name == NULL) $product_name = "NONE";
//echo "<br><b class='tblue'>product_name = </b>" . $product_name;    // *** DEBUG

if($hide_title == false) {
    // --- TITLES ---
    $txt = new Text(strtoupper($product_name));
    $txt->SetFont(FF_TREBUCHE, FS_BOLD, 28);
    $txt->SetPos($x_pie_center, 0.05, 'center', 'bottom');
    $txt->SetColor("black");
    $graph->AddText($txt);
    $p1->SetMidColor($center_bgcolor);
    // --- SUBTITLE ---
    $txt = new Text($center_text1);
    $txt->SetFont(FF_TREBUCHE, FS_NORMAL, 20);
    $txt->SetPos($x_pie_center, 0.07, 'center', 'bottom');
    $txt->SetColor("black");
    $graph->AddText($txt);
    $p1->SetMidColor($center_bgcolor);
}

//-------------------------
//  CENTER CIRCLE & TEXT
//-------------------------
// FONT SIZE FOR CENTER
if ($mode == 'mode3') {
    $font_size1 = 28;
    $font_size2 = 24;
}
else {
    if ($center_text1 == "EXTRA STRONG")
        $font_size1 = 36;
    else
        $font_size1 = 42;

    if (stripos($center_text2, "Caryophyllene") === false)
        $font_size2 = 30;
    else
        $font_size2 = 24;
}

//-----------------
//  Center text
//-----------------
// correction for "EXTRA STRONG"
if ($center_text1 == "EXTRA STRONG") {
    $c_text1 = "EXTRA";
    $c_text2 = "STRONG";
    $c_text3 = $center_text2;

    $txt = new Text($c_text1);
    $txt->SetFont(FF_TREBUCHE,FS_BOLD, 46);
    $txt->SetPos($x_pie_center, 0.435, 'center', 'bottom');
    $txt->SetColor($center_text_color);
    $graph->AddText($txt);
    $p1->SetMidColor($center_bgcolor);

    $txt = new Text($c_text2);
    $txt->SetFont(FF_TREBUCHE,FS_BOLD, 46);
    $txt->SetPos($x_pie_center, 0.475, 'center', 'bottom');
    $txt->SetColor($center_text_color);
    $graph->AddText($txt);
    $p1->SetMidColor($center_bgcolor);

    $txt = new Text($c_text3);
    $txt->SetFont(FF_TREBUCHE,FS_BOLD, 24);
    $txt->SetPos($x_pie_center, 0.508, 'center', 'bottom');
    $txt->SetColor($center_text_color);
    $graph->AddText($txt);
    $p1->SetMidColor($center_bgcolor);
}
else {
    // other
    $p1->midtitle->Set($center_text1);
    $p1->midtitle->SetFont(FF_ARIAL,FS_BOLD,$font_size1);
    $p1->midtitle->SetColor($center_text_color);

    $txt = new Text($center_text2);
    $txt->SetFont(FF_TREBUCHE,FS_BOLD,$font_size2);

    if ($mode == 'mode3')
        $txt->SetPos($x_pie_center, 0.485,'center', 'bottom');
    else
        $txt->SetPos($x_pie_center, 0.492, 'center', 'bottom');

    $txt->SetColor($center_text_color);
    $graph->AddText($txt);
    $p1->SetMidColor($center_bgcolor);
}

//=================================================================================
///////////////////////////////////////////////////////////////////////////////////
// L A B E L S  D R A W
//---------------------------------------------------------------------------------
// SetLabelPos():
// Этот метод регулирует положение меток.
// Это дается в виде дробей радиуса круговой диограммы.
// Значение < 1 поместит центр метки внутри круговой диаграммы
// и значение >= 1 выведет центр метки за пределы круговой диаграммы.
// Круг: по умолчанию метка располагается на отметке 0,5 в середине каждого среза.
///////////////////////////////////////////////////////////////////////////////////
//=================================================================================

// L A B E L S
$p1->SetLabels($labels);
//$p1->value->SetColor('#494949');

// Yстановить метки (labels)
$p1->SetLabelType(PIE_VALUE_ABS);           // absolute value
$p1->value->Show();                         // Показать
$p1->value->SetFont(FF_ARIAL,FS_BOLD,16);   // Шрифт
$p1->value->SetFormat('%2.1f%%');           // Формат

// G U I D E  L I N E S
if ($hide_gline) {
    $p1->SetGuideLines(false, true);        // метки бeз выносок
}
else {
    $p1->SetGuideLines(true, true);         // метки с выносками *****
}
$p1->SetGuideLinesAdjust(2,1);              // настройка выносок по вертикали и горизонтали
$p1->value->SetColor('#494949');            // цвет меток
$p1->SetLabelPos(1);                        // позиция меток за переделами круга = 1

//==========================================================
// L E G E N D  I N F O:
// THC(1) THCA(2) THCV(3) THC8(4) THC10(5) THCO(6)
// CBD(7) CBDA(8) CBDV(9) CBG(10) CBGA(11) CBN(12) CBC(13)
//==========================================================
$color1 = "darkred";
$color2 = "#0588a4";
$color3 = "darkgreen";

if ($mode == 'mode3')
    $ext = "mg";
else
    $ext = "%";

//---------------------------
// T e r p e n e s  i n f o
//---------------------------
// "TERPENES: "
if ($is_exist_terpenes) {
    $t = new Text("T E R P E N E S:");
    $t->SetFont(FF_ARIAL, FS_BOLD, 18);
    $t->SetPos(0.03, 0.10, 'left', 'bottom');
    //$t->SetPos(0.03, 0.44, 'left', 'bottom');
    $t->SetColor('black');
    $graph->AddText($t);
}
// "Bisabolol A" (1)
if(!empty($new_terpenes["t_BisabololA"])) {
    $txt = "Bisabolol A - " . $new_terpenes['t_BisabololA'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Camphene" (2)
if(!empty($new_terpenes["t_Camphene"])) {
    $txt = "Camphene - " . $new_terpenes['t_Camphene'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Carene" (3)
if(!empty($new_terpenes["t_Carene"])) {
    $txt = "Carene - " . $new_terpenes['t_Carene'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Cymene" (4)
if(!empty($new_terpenes["t_Cymene"])) {
    $txt = "Cymene - " . $new_terpenes['t_Cymene'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Caryophyllene B" (5)
if(!empty($new_terpenes["t_CaryophylleneB"])) {
    $txt = "Caryophyllene B - " . $new_terpenes['t_CaryophylleneB'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Caryophyllene O" (6)
if(!empty($new_terpenes['t_CaryophylleneO'])) {
    $txt = "Caryophyllene O - " . $new_terpenes['t_CaryophylleneO'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Eucalyptol" (7)
if(!empty($new_terpenes['t_Eucalyptol'])) {
    $txt = "Eucalyptol - " . $new_terpenes['t_Eucalyptol'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Geraniol" (8)
if(!empty($new_terpenes['t_Geraniol'])) {
    $txt = "Geraniol - " . $new_terpenes['t_Geraniol'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Guaiol" (9)
if(!empty($new_terpenes['t_Guaiol'])) {
    $txt = "Guaiol - " . $new_terpenes['t_Guaiol'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Humulene A" (10)
if(!empty($new_terpenes['t_HumuleneA'])) {
    $txt = "Humulene A - " . $new_terpenes['t_HumuleneA'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Isopulegol" (11)
if(!empty($new_terpenes['t_Isopulegol'])) {
    $txt = "Isopulegol - " . $new_terpenes['t_Isopulegol'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Limonene" (12)
if(!empty($new_terpenes['t_Limonene'])) {
    $txt = "Limonene - " . $new_terpenes['t_Limonene'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Linalool" (13)
if(!empty($new_terpenes['t_Linalool'])) {
    $txt = "Linalool - " . $new_terpenes['t_Linalool'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Myrcene B" (14)
if(!empty($new_terpenes['t_MyrceneB'])) {
    $txt = "Myrcene B - " . $new_terpenes['t_MyrceneB'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Nerolidol1" (15)
if(!empty($new_terpenes['t_Nerolidol1'])) {
    $txt = "Nerolidol1 - " . $new_terpenes['t_Nerolidol1'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Nerolidol2" (16)
if(!empty($new_terpenes['t_Nerolidol2'])) {
    $txt = "Nerolidol2 - " . $new_terpenes['t_Nerolidol2'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Ocimene B" (17)
if(!empty($new_terpenes['t_OcimeneB'])) {
    $txt = "Ocimene B - " . $new_terpenes['t_OcimeneB'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Ocimene" (18)
if(!empty($new_terpenes['t_Ocimene'])) {
    $txt = "Ocimene - " . $new_terpenes['t_Ocimene'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Pinene A" (19)
if(!empty($new_terpenes['t_PineneA'])) {
    $txt = "Pinene A - " . $new_terpenes['t_PineneA'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Pinene B" (20)
if(!empty($new_terpenes['t_PineneB'])) {
    $txt = "Pinene B - " . $new_terpenes['t_PineneB'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Terpinene A" (21)
if(!empty($new_terpenes['t_TerpineneA'])) {
    $txt = "Terpinene A - " . $new_terpenes['t_TerpineneA'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Terpinene Y" (22)
if(!empty($new_terpenes['t_TerpineneY'])) {
    $txt = "Terpinene Y - " . $new_terpenes['t_TerpineneY'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}
// "Terpinolene" (23)
if(!empty($new_terpenes['t_Terpinolene'])) {
    $txt = "Terpinolene - " . $new_terpenes['t_Terpinolene'] . $ext;
    $t = info_terpenes($txt);
    $t->SetColor($color3);
    $graph->AddText($t);
}

//--------------------
//    TOTAL INFO
//--------------------
// Total Balls (header)
//$t = "Cannabinoids" 2.000 ES + Terpenes 1.925 ES = 3.925 ES";
if ($hide_total == false) {
    $es_total = $cannabionids_ES_Sum + $terpenes_ES_Sum;
    $t = "Cannabinoids " . $cannabionids_ES_Sum . " ES + Terpenes " . $terpenes_ES_Sum . " ES = " . $es_total . " ES";
    $txt = new Text($t);
    $txt->SetFont(FF_ARIAL, FS_BOLD, 20);
    $txt->SetPos($x_pie_center, 0.88, 'center', 'bottom');
    $graph->AddText($txt);

    // Total Cannabinoids (footer)
    $t = "Total Available Cannabinoids (TAC): ";
    if ($mode == "mode3") {
        $tac = $t . $sum_cannabinoids . "mg";
        $txt = new Text($tac);                              // Total Tinctures (mg)
    } else {
        $tac = $t . $sum_cannabinoids . "%";
        $txt = new Text($t . $sum_cannabinoids . "%");      // Total Cannabinoids (%)
    }
    $txt->SetFont(FF_ARIAL, FS_BOLD, 20);                   // Font
    $txt->SetPos($x_pie_center, 0.91, 'center', 'bottom');  // Position
    $graph->AddText($txt);                                  // Add Text

    // Main(max) Terpenes
    $main_terp = $center_text2;                             // max terpenes
    $txt = new Text($main_terp);
    $txt->SetFont(FF_ARIAL, FS_NORMAL, 18);
    $txt->SetPos($x_pie_center, 0.94, 'center', 'bottom');
    $graph->AddText($txt);
}

// Version
$t = "Version " . $ver;
$txt = new Text($t);
$txt->SetFont(FF_ARIAL, FS_NORMAL, 16);
$txt->SetPos($x_pie_center, 0.97, 'center', 'bottom');
$graph->AddText($txt);

//--------------
//  ADD & SHOW
//--------------
//$graph->Add($p1);
//$graph->Add($p1);
//$graph->Stroke();

//==========================
// IMAGE TO FILE & BROWSER
//==========================
// По умолчанию используется PNG,
// поэтому используйте суффикс ".png"
// $fileName = "/tmp/imagefile.png";
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);   // Image Handler (дескриптор изображения)
$graph->img->Stream($fileName);                 // Записать img в файл

//------------------------------------------------
// Отправляем его обратно в браузер
// Обновить браузер принудительно:
// <img src="myimagescript.php?dummy=\'.now().">
//------------------------------------------------
//$graph->img->Headers();
//$graph->img->Stream();

// Удалить куки
unset($_COOKIE['mode']);
unset($_COOKIE['test']);
//echo "<b><br>SUMMA = </b>" . $sum_cannabinoids; // **** DEBUG

/*
// OUTPUT TEST-DATA FROM TEST-FROM
echo '<br>';
if(!empty($_POST)) {
    debug($_POST);
}
*/

// <EOF>
?>

<!--////////////////////////////////////////////////// CANVAS //////////////////////////////////////////////////-->

<div class="info">
<!-- Canvas -->
<!--
<div id="canvas-wrapper">
<canvas id="canvas" width=500 height=500></canvas>
</div>
-->

<!-- ////////////////////////////////////////////////// PRODUCT ////////////////////////////////////////////////// -->

<!-- product output name -->
<div id="product-name-wrapper"><?php echo $product_name ?></div>

<!-- output ES score -->
<div id="es-output-wrapper">
<div id="es-output"><?php echo "Cannabinoids " . $cannabionids_ES_Sum . " ES + Terpenes " . $terpenes_ES_Sum . " ES = " . $es_total . " ES"; ?></div>
</div>

<!-- output percentage of elements -->
<div id="main-terp"><?php echo "<span>" . strtoupper($main_terp) . "</span>"?></div>

<hr>

<div id="total-elements-wrapper">
<div id="total-cannabinoids"><?php echo $tac ?></div>

<div id="cannabinoids-list">

<?php
// THC (1)
if ($thc != 0) {
    if ($mode == "mode3") $str = "THC - " . $thc . "mg";
    else $str = "THC - " . $thc . "%";
    echo "<span id='thc-output' class='badge'>$str</span>";
}
// THCA (2)
if ($thca != 0) {
    if ($mode == "mode3") $str = "THCA - " . $thca . "mg";
    else $str = "THCA - " . $thca . "%";
    echo "<span id='thca-output' class='badge'>$str</span>";
}
// THCV (3)
if ($thcv != 0) {
    if ($mode == "mode3") $str = "THCV - " . $thcv . "mg";
    else $str = "THCV - " . $thcv . "%";
    echo "<span id='thcv-output' class='badge'>$str</span>";
}
// THC8 (4)
if ($thc8 != 0) {
    if ($mode == "mode3") $str = "THC8 - " . $thc8 . "mg";
    else $str = "THC8 - " . $thc8 . "%";
    echo "<span id='thc8-output' class='badge'>$str</span>";
}
// THC10 (5)
if ($thc10 != 0) {
    if ($mode == "mode3") $str = "THC10 - " . $thc10 . "mg";
    else $str = "THC10 - " . $thc10 . "%";
    echo "<span id='thc10-output' class='badge'>$str</span>";
}
// THCO (6)
if ($thco != 0) {
    if ($mode == "mode3") $str = "THCO - " . $thco . "mg";
    else $str = "THCO - " . $thco . "%";
    echo "<span id='thco-output' class='badge'>$str</span>";
}
// CBD (7)
if($cbd != 0) {
    if ($mode == "mode3") $str = "CBD - " . $cbd . "mg";
    else $str = "CBD - " . $cbd . "%";
    echo "<span id='cbd-output' class='badge'>$str</span>";
}
// CBDA (8)
if($cbda != 0) {
    if ($mode == "mode3") $str = "CBDA - " . $cbda . "mg";
    else $str = "CBDA - " . $cbda . "%";
    echo "<span id='cbda-output' class='badge'>$str</span>";
}
// CBDV (9)
if($cbdv != 0) {
    if ($mode == "mode3") $str = "CBDV - " . $cbdv . "mg";
    else $str = "CBDV - " . $cbdv . "%";
    echo "<span id='cbdv-output' class='badge'>$str</span>";
}
// CBDG (10)
if($cbg != 0) {
    if ($mode == "mode3") $str = "CBDG - " . $cbg . "mg";
    else $str = "CBDG - " . $cbg . "%";
    echo "<span id='cbg-output' class='badge'>$str</span>";
}
// CBGA (11)
if($cbga != 0) {
    if ($mode == "mode3") $str = "CBGA - " . $cbga . "mg";
    else $str = "CBGA - " . $cbga . "%";
    echo "<span id='cbga-output' class='badge'>$str</span>";
}
// CBN (12)
if($cbn != 0) {
    if ($mode == "mode3") $str = "CBN - " . $cbn . "mg";
    else $str = "CBN - " . $cbn . "%";
    echo "<span id='cbn-output' class='badge'>$str</span>";
}
// CBC (13)
if($cbc != 0) {
    if ($mode == "mode3") $str = "CBC - " . $cbc . "mg";
    else $str = "CBC - " . $cbc . "%";
    echo "<span id='cbc-output' class='badge'>$str</span>";
}

?>
</div> <!-- id="cannabinoids-list" -->

<div id="terpenes-list">

<?php
// "Bisabolol A" (1)
if(!empty($new_terpenes["t_BisabololA"])) {
     echo "<span class='badge-terpene'>Bisabolol A - " . $new_terpenes['t_BisabololA'] . $ext . "</span>";
}
// "Camphene" (2)
if(!empty($new_terpenes["t_Camphene"])) {
    echo "<span class='badge-terpene'>Camphene - " . $new_terpenes['t_Camphene'] . $ext . "</span>";
}
// "Carene" (3)
if(!empty($new_terpenes["t_Carene"])) {
    echo "<span class='badge-terpene'>Carene - " . $new_terpenes['t_Carene'] . $ext . "</span>";
}
// "Cymene" (4)
if(!empty($new_terpenes["t_Cymene"])) {
    echo "<span class='badge-terpene'>Cymene - " . $new_terpenes['t_Cymene'] . $ext . "</span>";
}
// "Caryophyllene B" (5)
if(!empty($new_terpenes["t_CaryophylleneB"])) {
    echo "<span class='badge-terpene'>Caryophyllene B - " . $new_terpenes['t_CaryophylleneB'] . $ext . "</span>";
}
// "Caryophyllene O" (6)
if(!empty($new_terpenes['t_CaryophylleneO'])) {
    echo "<span class='badge-terpene'>Caryophyllene O - " . $new_terpenes['t_CaryophylleneO'] . $ext . "</span>";
}
// "Eucalyptol" (7)
if(!empty($new_terpenes['t_Eucalyptol'])) {
    echo "<span class='badge-terpene'>Eucalyptol - " . $new_terpenes['t_Eucalyptol'] . $ext . "</span>";
}
// "Geraniol" (8)
if(!empty($new_terpenes['t_Geraniol'])) {
    echo "<span class='badge-terpene'>Geraniol - " . $new_terpenes['t_Geraniol'] . $ext . "</span>";
}
// "Guaiol" (9)
if(!empty($new_terpenes['t_Guaiol'])) {
    echo "<span class='badge-terpene'>Guaiol - " . $new_terpenes['t_Guaiol'] . $ext . "</span>";
}
// "Humulene A" (10)
if(!empty($new_terpenes['t_HumuleneA'])) {
    echo "<span class='badge-terpene'>Humulene A - " . $new_terpenes['t_HumuleneA'] . $ext . "</span>";
}
// "Isopulegol" (11)
if(!empty($new_terpenes['t_Isopulegol'])) {
    echo "<span class='badge-terpene'>Isopulegol - " . $new_terpenes['t_Isopulegol'] . $ext . "</span>";
}
// "Limonene" (12)
if(!empty($new_terpenes['t_Limonene'])) {
    echo "<span class='badge-terpene'>Limonene - " . $new_terpenes['t_Limonene'] . $ext . "</span>";
}
// "Linalool" (13)
if(!empty($new_terpenes['t_Linalool'])) {
    echo "<span class='badge-terpene'>Linalool - " . $new_terpenes['t_Linalool'] . $ext . "</span>";
}
// "Myrcene B" (14)
if(!empty($new_terpenes['t_MyrceneB'])) {
    echo "<span class='badge-terpene'>Myrcene B - " . $new_terpenes['t_MyrceneB'] . $ext . "</span>";
}
// "Nerolidol1" (15)
if(!empty($new_terpenes['t_Nerolidol1'])) {
    echo "<span class='badge-terpene'>Nerolidol1 - " . $new_terpenes['t_Nerolidol1'] . $ext . "</span>";
}
// "Nerolidol2" (16)
if(!empty($new_terpenes['t_Nerolidol2'])) {
    echo "<span class='badge-terpene'>Nerolidol2 - " . $new_terpenes['t_Nerolidol2'] . $ext . "</span>";
}
// "Ocimene B" (17)
if(!empty($new_terpenes['t_OcimeneB'])) {
    echo "<span class='badge-terpene'>Ocimene B - " . $new_terpenes['t_OcimeneB'] . $ext . "</span>";
}
// "Ocimene" (18)
if(!empty($new_terpenes['t_Ocimene'])) {
    echo "<span class='badge-terpene'>Ocimene - " . $new_terpenes['t_Ocimene'] . $ext . "</span>";
}
// "Pinene A" (19)
if(!empty($new_terpenes['t_PineneA'])) {
    echo "<span class='badge-terpene'>Pinene A - " . $new_terpenes['t_PineneA'] . $ext . "</span>";
}
// "Pinene B" (20)
if(!empty($new_terpenes['t_PineneB'])) {
    echo "<span class='badge-terpene'>Pinene B - " . $new_terpenes['t_PineneB'] . $ext . "</span>";
}
// "Terpinene A" (21)
if(!empty($new_terpenes['t_TerpineneA'])) {
    echo "<span class='badge-terpene'>Terpinene A - " . $new_terpenes['t_TerpineneA'] . $ext . "</span>";
}
// "Terpinene Y" (22)
if(!empty($new_terpenes['t_TerpineneY'])) {
    echo "<span class='badge-terpene'>Terpinene Y - " . $new_terpenes['t_TerpineneY'] . $ext . "</span>";
}
// "Terpinolene" (23)
if(!empty($new_terpenes['t_Terpinolene'])) {
    echo "<span class='badge-terpene'>Terpinolene - " . $new_terpenes['t_Terpinolene'] . $ext . "</span>";
}

?>
</div><!-- id="terpenes-list" -->

</div><!-- class="info" -->

<hr>

<!-- output taste -->
<div id="taste-output">output taste</div>

<!-- effect output -->
<div id="effect-output">effect output</div>

<!-- other output -->
<div id="other-output">other output</div>

<!-- type output -->
<div id="type-output">type output</div>
<hr>

<div id="net-weight-output">net-weight-output</div>
<div id="custom-content-output">custom-content-output</div>
<div id="custom-content-output2">custom-content-output2</div>

</div>

</body>
</html>
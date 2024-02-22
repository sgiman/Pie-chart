<?php
/*******************************************************************
 * sgi_database.php
 * SGI PIE DIAGRAMMA v3.0 - 2023-10 (prototype)
 * -----------------------------------------------------------------
 * JpGraph 4.4.2 (PHP Graph Plotting library - Asial Corporation)
 * https://jpgraph.net
 *
 * Unical Label Generator - Flower 6.8 (js-original)
 * https://uniwyze.com
 ********************************************************************
 * Writing by sgiman @ 2023-10
 */

//------------------------------------
// DATA-TEST (default value)
// CANNABINOIDS
//------------------------------------
// numbers - %
$thc = 0;
$thca = 0;
$thcv = 0;
$thc8 = 0;
$thc10 = 0;
$thc0 = 0;
$cbd = 0;
$cbda = 0;
$cbdv = 0;
$cbg = 0;
$cbga = 0;
$cbn = 0;
$cbc = 0;

// only for Tinctures (mg)
$tc = 0;
$tv = 0;

//--------------------------------------------------------------
//                       COLOR FOR TEST
//--------------------------------------------------------------
// THC THCA THCV THC8 THC10 THCO CBD CBDA CBDV CBG CBGA CBN CBC
// Color for slices (default test)
$colors_db = array(
    '#050505',  //(0)
    '#545452',  //(1)
    '#717069',  //(2)
    '#a0a0a0',  //(3)
    '#c5c3c3',  //(4)
    '#9a9c9a',  //(5)
    '#b39898',  //(6)
    '#eddfdf',  //(7)
    '#3f4e40',  //(8)
    '#828983',  //(9)
    '#696969',  //(10)
    '#9d9393',  //(11)
    '#ccb6b6',  //(12)
    '#f0f0f0',  //(13) - #f0f0f0, #fafafa, #ffffff (white)
);

//=========================================================================
// S A M P L E S  P R O D U C T :
// product => name1, name2, data-name, bg-color, color
// $center_text1 = $titles[name][0] - Name Product 1
// $center_text2 = $titles[name][1] - Name Product 2
// $center_bgcolor = $titles[name][3] - Color background for circle
// $center_text_color = $titles[name][4] - Color for Text
//=========================================================================
$samples = [
    // Flower (mode 1)
    "Test Run" => ["STRONG", "CYMENE", "test_run", "#a4d805", "black", "%", "mode1"],
    "Typical Cannabis 1" => ["STRONG", "LIMONENE", "typical_can1", "#ffff6f", "black", "%", "mode1"],
    "Typical Cannabis 2" => ["STRONG", "LIMONENE", "typical_can2", "#ffff6f", "black", "%", "mode1"],
    "Typical Cannabis 3" => ["MODERATE", "LIMONENE", "typical_can3", "#ffff6f", "black", "%", "mode1"],
    "Typical Cannabis 4" => ["EXTRA STRONG", "LINALOOL", "typical_can4", "#7937aa", "white", "%", "mode1"],
    "Typical Cannabis 5" => ["STRONG", "LINALOOL", "typical_can5", "#7937aa", "white", "%", "mode1"],
    "Rare Cannabis" => ["STRONG", "BISABOLOL A", "rare_can", "#ff6f05", "black", "%", "mode1"],
    "Typical Hemp" => ["MODERATO", "CARYOHYLLENE B", "typical_hemp", "#6f6f39","white", "%", "mode1"],

    // Concentrate (mode 2)
    "Live Rosin 1" => ["STRONG", "LIMONENE","live_ros1", "#ffff6f", "black", "%", "mode2"],
    "Live Rosin 2" => ["EXTRA STRONG", "MYRCENE B", "live_ros2", "#ffd805", "black", "%", "mode2"],
    "Wax" => ["STRONG", "LINALOOL", "wax", "#7937aa", "white", "%", "mode2"],
    "Diamonds and Sauce" => ["EXTRA STRONG", "LINALOOL", "diam_sauc", "#7937aa", "white", "%", "mode2"],
    "Kief 1" => ["MODERATO", "MYRCENE B", "kief1", "#ffd805", "black", "%", "mode2"],
    "Kief 2" => ["LIGHT", "LIMONENE", "kief2", "#ffff6f", "black", "%", "mode2"],
    "RSO" => ["LIGHT", "LIMONENE", "rso", "#ffff6f", "black", "%", "mode2"],
    "Bubble Hash" => ["EXTRA STRONG", "BISABOLOL A", "buble_h", "#ff6f05", "black", "%", "mode2"],

    // Tinctures (mode 3)
    "Typical Tincture 1" => ["THC CBD Balanced", "LIMONENE", "typical_tinc1", "#ffff6f", "black", "mg", "mode3"],
    "Typical Tincture 2" => ["THC Dominant", "MYRCENE B", "typical_tinc2", "#ffd805", "black", "mg", "mode3"],
    "Typical Hemp Tincture" => ["CBD Dominant", "CARYOPHYLLENE B", "typical_tinc_hemp", "#6f6f39", "white", "mg", "mode3"]
];

//------------------------
// ARRAY TERPENES NAMES
//------------------------
$terpenes_names = [
    ["BisabololA", "Bisabolol A"],
    ["Camphene", "Camphene"],
    ["Carene", "Carene"],
    ["Cymene", "Cymene"],
    ["CaryophylleneB", "Caryophyllene B"],
    ["CaryophylleneO", "Caryophyllene O"],
    ["Eucalyptol", "Eucalyptol"],
    ["Geraniol", "Geraniol"],
    ["Guaiol", "Guaiol"],
    ["HumuleneA", "Humulene A"],
    ["Isopulegol", "Isopulegol"],
    ["Limonene", "Limonene"],
    ["Linalool", "Linalool"],
    ["MyrceneB", "Myrcene B"],
    ["Nerolidol1", "Nerolidol1"],
    ["Nerolidol2", "Nerolidol2"],
    ["OcimeneB", "Ocimene B"],
    ["Ocimene", "Ocimene"],
    ["PineneA", "Pinene A"],
    ["PineneB", "Pinene B"],
    ["TerpineneA", "Terpinene A"],
    ["TerpineneY", "Terpinene Y"],
    ["Terpinolene", "Terpinolene"]
];

//===============================
//  T E R P E N E S   D A T A
//===============================
$terpenes_db = [
    // 0
    "t_BisabololA" => [
        "name" => "BisabololA",
        "name2" => "Bisabolol A",
        "subtype" => "α-Bisabolol",
        "color" => "#FF6F05",
        "color2" => "black",
        "weight" => "0.175"
    ],
    // 1
    "t_Camphene" => [
        "name" => "Camphene",
        "name2" => "Camphene",
        "subtype" => "",
        "color" => "#39A46F",
        "color2" => "black",
        "weight" => "0.125"
    ],
    // 2
    "t_Carene" => [
        "name" => "Carene",
        "name2" => "Carene",
        "subtype"=> "Δ3-Carene",
        "color"=> "#39A439",
        "color2" => "black",
        "weight"=> "0.075"
    ],
    // 3
    "t_Cymene" => [
        "name" => "Cymene",
        "name2" => "Cymene",
        "subtype"=> "p-Cymene",
        "color"=> "#A4D805",
        "color2" => "black",
        "weight"=> "0.075"
    ],
    // 4
    "t_CaryophylleneB" => [
        "name" => "CaryophylleneB",
        "name2" => "Caryophyllene B",
        "subtype" => "Beta",
        "color" => "#6F6F39",
        "color2" => "white",
        "weight" => "0.25"
    ],
    // 5
    "t_CaryophylleneO" => [
        "name" => "CaryophylleneO",
        "name2" => "Caryophyllene O",
        "subtype"=> "Oxide",
        "color" => "#393905",
        "color2" => "white",
        "weight" => "0.175"
    ],
    // 6
    "t_Eucalyptol" => [
        "name" => "Eucalyptol",
        "name2" => "Eucalyptol",
        "subtype"=> "",
        "color" => "#4BB84B",
        "color2" => "black",
        "weight" => "0.125"
    ],
    // 7
    "t_Geraniol" => [
        "name" => "Geraniol",
        "name2" => "Geraniol",
        "subtype"=> "",
        "color" => "#FF1616",
        "color2" => "black",
        "weight"=> "0.125"
    ],
    // 8
    "t_Guaiol" => [
        "name" => "Guaiol",
        "name2" => "Guaiol",
        "subtype" => "",
        "color" => "#38630D",
        "color2" => "white",
        "weight" => "0.075"
    ],
    // 9
    "t_HumuleneA" => [
        "name" => "HumuleneA",
        "name2" => "Humulene A",
        "subtype" => "α-Humulene",
        "color" => "#396F05",
        "color2" => "white",
        "weight" => "0.075"
    ],
    // 10
    "t_Isopulegol" => [
        "name" => "Isopulegol",
        "name2" => "Isopulegol",
        "subtype" => "",
        "color" => "#64920B",
        "color2" => "white",
        "weight" => "0.075"
    ],
    // 11
    "t_Limonene" => [
        "name" => "Limonene",
        "name2" => "Limonene",
        "subtype" => "Δ-Limonene",
        "color" => "#FFFF6F",
        "color2" => "black",
        "weight" => "0.25"
    ],
    // 12
    "t_Linalool" => [
        "name" => "Linalool",
        "name2" => "Linalool",
        "subtype" => "",
        "color" => "#7937AA",
        "color2" => "white",
        "weight" => "0.25"
    ],
    // 13
    "t_MyrceneB" => [
        "name" => "MyrceneB",
        "name2" => "Myrcene B",
        "subtype" => "β-Myrcene",
        "color" => "#FFD805",
        "color2" => "black",
        "weight" => "0.25"
    ],
    // 14
    "t_Nerolidol1" => [
        "name" => "Nerolidol1",
        "name2" => "Nerolidol1",
        "subtype"=> "1",
        "color" => "#FF39A4",
        "color2" => "black",
        "weight" => "0.075"
    ],
    // 15
    "t_Nerolidol2" => [
        "name" => "Nerolidol2",
        "name2" => "Nerolidol2",
        "subtype" => "2",
        "color" => "#CC0505",
        "color2" => "white",
        "weight" => "0.05"
    ],
    // 16
    "t_OcimeneB" => [
        "name" => "OcimeneB",
        "name2" => "Ocimene B",
        "subtype" => "β-Ocimene",
        "color" => "#A4D805",
        "color2" => "black",
        "weight" => "0.075"
    ],
    // 17
    "t_Ocimene" => [
        "name" => "Ocimene",
        "name2" => "Ocimene",
        "subtype" => "Ocimene",
        "color" => "#D8D705",
        "color2" => "black",
        "weight" => "0.075"
    ],
    // 18
    "t_PineneA" => [
        "name" => "PineneA",
        "name2" => "Pinene A",
        "subtype" => "α-Pinene",
        "color" => "#39D839",
        "color2" => "black",
        "weight" => "0.25"
    ],
    // 19
    "t_PineneB" => [
        "name" => "PineneB",
        "name2" => "Pinene B",
        "subtype" => "β-Pinene",
        "color" => "#05FF05",
        "color2" => "black",
        "weight" => "0.2"
    ],
    // 20
    "t_TerpineneA" => [
        "name" => "TerpineneA",
        "name2" => "Terpinene A",
        "subtype" => "α-Terpinene",
        "color" => "#6BA0FF",
        "color2" => "black",
        "weight" => "0.1"
    ],
    // 21
    "t_TerpineneY" => [
        "name" => "TerpineneY",
        "name2" => "Terpinene Y",
        "subtype" => "γ-Terpinene",
        "color" => "#7070FF",
        "color2" => "white",
        "weight" => "0.1"
    ],
    // 22
    "t_Terpinolene" => [
        "name" => "Terpinolene",
        "name2" => "Terpinolene",
        "subtype" =>"",
        "color" => "#39D8D8",
        "color2" => "black",
        "weight" => "0.175"
    ],
];

//===============================
//   C A N N A B I N O I D S
//===============================
$cannabinoids_db = [
    "thc" => [
        "name" => "thc",
        "color" => "#050505",
        "weight" => "1"
    ],
    "thca" => [
        "name" => "thca",
        "color" => "#212121",
        "weight" => "0.7"
    ],
    "thcv" => [
        "name" => "thcv",
        "color" => "#343634",
        "weight" => "0.3"
    ],
    "thc8" => [
        "name" => "thc8",
        "color" => "#2D0A0A",
        "weight" => "0.4"
    ],
    "thc10" => [
        "name" => "thc10",
        "color" => "#482D2D",
        "weight" => "0.2"
    ],
    "thco" => [
        "name" => "thco",
        "color" => "#2D1616",
        "weight" => "1.4"
    ],
    "cbd" => [
        "name" => "cbd",
        "color" => "#B7B6B6",
        "weight" => "0.7"
    ],
    "cbda" => [
        "name" => "cbda",
        "color" => "#C5C3C3",
        "weight" => "0.3"
    ],
    "cbdv" => [
        "name" => "cbdv",
        "color" => "#9A9C9A",
        "weight" => "0.3"
    ],
    "cbg" => [
        "name" => "cbg",
        "color" => "#DFD8D8",
        "weight" => "0.5"
    ],
    "cbga" => [
        "name" => "cbga",
        "color" => "#EDDFDF",
        "weight" => "0.3"
    ],
    "cbn" => [
        "name" => "cbn",
        "color" => "#3F4E40",
        "weight" => "0.5"
    ],
    "cbc" => [
        "name" => "cbc",
        "color" => "#828983",
        "weight" => "0.3"
    ],
    // (EMPTY)
    "empty" => [
    "name" => "",
    "name2" => "",
    "subtype" =>"",
    "color" => "#efefef",
    "color2" => "black",
    "weight" => "1"
    ],
];
// <EOF>

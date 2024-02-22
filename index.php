<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SGI Pie Diagramma v3.0</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>SGI Pie Diagramma v3.0</h1>
</header>

<!-- BUTTONS -->
<div class="left">
    <div class="mode-buttons-wrapper">
        <button id="mode1" value="Flower" name="mode1" class="mode-buttons button active">Flower</button>
        <button id="mode2" value="Concentrate" name="mode2" class="mode-buttons button">Concentrate</button>
        <button id="mode3" value="Tinctures" name="mode3" class="mode-buttons button">Tinctures</button>
    </div>

    <div class="test-buttons-wrapper-flower" id="test-buttons-wrapper-flower">
        <button id="test-submit1" class="test-buttons" name="test_run" data-name="test_run">Test Run</button>
        <button id="test-submit2" class="test-buttons" name="typical_can1" data-name="typical_can1">Typical cannabis 1</button>
        <button id="test-submit3" class="test-buttons" name="typical_can2" data-name="typical_can2">Typical cannabis 2</button>
        <button id="test-submit4" class="test-buttons" name="typical_can3" data-name="typical_can3">Typical cannabis 3</button>
        <button id="test-submit5" class="test-buttons" name="typical_can4" data-name="typical_can4">Typical cannabis 4</button>
        <button id="test-submit6" class="test-buttons" name="typical_can5" data-name="typical_can5">Typical cannabis 5</button>
        <button id="test-submit7" class="test-buttons" name="rare_can" data-name="rare_can">Rare cannabis</button>
        <button id="test-submit8" class="test-buttons" name="typical_hemp" data-name="typical_hemp">Typical Hemp</button>
        <button id="test-submit9" class="test-buttons" name="test_flower_all" data-name="test_flower_all">Test Flower All</button>
    </div>

    <div class="test-buttons-wrapper-tinctures" id="test-buttons-wrapper-tinctures" style="display:none;">
        <button id="test-submit10" class="test-buttons" name="typical_tinc1" data-name="typical_tinc1">Typical Cannabis Tincture 1</button>
        <button id="test-submit11" class="test-buttons" name="typical_tinc2" data-name="typical_tinc2">Typical Cannabis Tincture 2</button>
        <button id="test-submit12" class="test-buttons" name="typical_tinc_hemp" data-name="typical_tinc_hemp">Typical Hemp Tincture</button>
        <button id="test-submit13" class="test-buttons" name="test_tincture_all" data-name="test_tincture_all">Test Tincture All</button>
    </div>

    <div class="test-buttons-wrapper-concetrates" id="test-buttons-wrapper-concetrates" style="display:none;">
        <button id="test-submit14" class="test-buttons" name="live_ros1" data-name="live_ros1">Live Rosin 1</button>
        <button id="test-submit15" class="test-buttons" name="live_ros2" data-name="live_ros2">Live Rosin 2</button>
        <button id="test-submit16" class="test-buttons" name="wax" data-name="wax">Wax</button>
        <button id="test-submit17" class="test-buttons" name="diam_sauc" data-name="diam_sauc">Diamonds and Sauce</button>
        <button id="test-submit18" class="test-buttons" name="kief1" data-name="kief1">Kief 1</button>
        <button id="test-submit19" class="test-buttons" name="kief2" data-name="kief2">Kief 2</button>
        <button id="test-submit20" class="test-buttons" name="rso" data-name="rso">RSO</button>
        <button id="test-submit21" class="test-buttons" name="buble_h" data-name="buble_h">Bubble Hash</button>
        <button id="test-submit22" class="test-buttons" name="test_concentrate_all" data-name="test_concentrate_all">Test Concetrates All</button>
    </div>

<!-- LABELS-FORM -->
<form method="post" action="sgi_pie.php" id="label-form">
        <!-- SUBMIT -->
        <input type="submit" value="Generate" class="button submit">

        <!-- PRODUCT1 -->
        <div class="wrapper main-properties">
            <fieldset>
                <label for="product-name">Name:</label>
                <input type="text" id="product-name" class="" name="product-name" value="">
            </fieldset>

            <fieldset id="net-weight-fieldset">
                <label for="net-weight">Net Weight:</label>
                <input type="text" id="net-weight" class="" name="net-weight" value=""pattern="[0-9]+([\.,][0-9]+)?"><span class="suffix">g</span>
            </fieldset>
        </div>

        <!-- PRODUCT2 (for Tinctures) -->
        <div class="wrapper" id="tinctures-volume" style="display:none;">
            <fieldset>
                <p>Enter for Tinctures:</p>
            </fieldset>

            <!-- Total Cannabinoid % -->
            <fieldset>
                <label>Total Cannabinoid (mg):</label>
                <input type="text" id="tc-input"  name="TC" class="totals" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="tc"><span>mg</span>
            </fieldset>

            <!-- Total Volume % -->
            <fieldset>
                <label>Total Volume (ml):</label>
                <input type="text" id="tv-input"  name="TV" class="totals" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="tv"><span>ml</span>
            </fieldset>
        </div>

        <div class="wrapper">

            <!--------------------------------------------------------------------------------------------------->
            <!-- cannabinoids (I) -->
            <!--------------------------------------------------------------------------------------------------->

            <fieldset>
                <p>Enter your cannabinoids here:</p>
            </fieldset>

            <fieldset>
                <!-- THC % -->
                <label>THC:</label>
                <input type="text" id="thc-input1" class="input1 cannabinoids-tinctures" name="THC-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thc"><span class="input1-suffix">mg</span>
                <input type="text" id="thc-input2" class="input2 cannabinoids main-input" name="THC-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thc"><span class="input2-suffix">%</span>
                <input type="text" id="thc-input3" class="input3" name="THC-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="thc-input4" class="input4" name="THC-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset>
                <!-- THCA % -->
                <label>THCA:</label>
                <input type="text" id="thca-input1" class="input1 cannabinoids-tinctures" name="THCA-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thca"><span class="input1-suffix">mg</span>
                <input type="text" id="thca-input2" class="input2 cannabinoids main-input" name="THCA-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thca"><span class="input2-suffix">%</span>
                <input type="text" id="thca-input3" class="input3" name="THCA-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="thca-input4" class="input4" name="THCA-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset>
                <!-- THCV % -->
                <label>THCV:</label>
                <input type="text" id="thcv-input1" class="input1 cannabinoids-tinctures" name="THCV-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thcv"><span class="input1-suffix">mg</span>
                <input type="text" id="thcv-input2" class="input2 cannabinoids main-input" name="THCV-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thcv"><span class="input2-suffix">%</span>
                <input type="text" id="thcv-input3" class="input3" name="THCV-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="thcv-input4" class="input4" name="THCV-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset style="display:none;">
                <!-- THC-8 % -->
                <label>THC8:</label>
                <input type="text" id="thc8-input1" class="input1 cannabinoids-tinctures" name="THC8-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thc8"><span class="input1-suffix">mg</span>
                <input type="text" id="thc8-input2" class="input2 cannabinoids main-input" name="THC8-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thc8" ><span class="input2-suffix">%</span>
                <input type="text" id="thc8-input3" class="input3" name="THC8-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="thc8-input4" class="input4" name="THC8-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset style="display:none;">
                <!-- THC-10 % -->
                <label>THC10:</label>
                <input type="text" id="thc10-input1" class="input1 cannabinoids-tinctures" name="THC10-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thc10"><span class="input1-suffix">mg</span>
                <input type="text" id="thc10-input2" class="input2 cannabinoids main-input" name="THC10-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thc10"><span class="input2-suffix">%</span>
                <input type="text" id="thc10-input3" class="input3" name="THC10-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="thc10-input4" class="input4" name="THC10-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset style="display:none;">
                <!-- THC-O % -->
                <label>THCO:</label>
                <input type="text" id="thco-input1" class="input1 cannabinoids-tinctures" name="THCO-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thco"><span class="input1-suffix">mg</span>
                <input type="text" id="thco-input2" class="input2 cannabinoids main-input" name="THCO-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="thco"><span class="input2-suffix">%</span>
                <input type="text" id="thco-input3" class="input3" name="THCO-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="thco-input4" class="input4" name="THCO-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset>
                <!-- CBD % -->
                <label>CBD:</label>
                <input type="text" id="cbd-input1" class="input1 cannabinoids-tinctures" name="CBD-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbd"><span class="input1-suffix">mg</span>
                <input type="text" id="cbd-input2" class="input2 cannabinoids main-input" name="CBD-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbd"><span class="input2-suffix">%</span>
                <input type="text" id="cbd-input3" class="input3" name="CBD-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="cbd-input4" class="input4" name="CBD-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset>
                <!-- CBDA % -->
                <label>CBDA:</label>
                <input type="text" id="cbda-input1" class="input1 cannabinoids-tinctures" name="CBDA-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbda"><span class="input1-suffix">mg</span>
                <input type="text" id="cbda-input2" class="input2 cannabinoids main-input" name="CBDA-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbda"><span class="input2-suffix">%</span>
                <input type="text" id="cbda-input3" class="input3" name="CBDA-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="cbda-input4" class="input4" name="CBDA-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset>
                <!-- CBDV % -->
                <label>CBDV:</label>
                <input type="text" id="cbdv-input1" class="input1 cannabinoids-tinctures" name="CBDV-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbdv"><span class="input1-suffix">mg</span>
                <input type="text" id="cbdv-input2" class="input2 cannabinoids main-input" name="CBDV-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbdv"><span class="input2-suffix">%</span>
                <input type="text" id="cbdv-input3" class="input3" name="CBDV-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="cbdv-input4" class="input4" name="CBDV-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset>
                <!-- CBG % -->
                <label>CBG:</label>
                <input type="text" id="cbg-input1" class="input1 cannabinoids-tinctures" name="CBG-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbg"><span class="input1-suffix">mg</span>
                <input type="text" id="cbg-input2" class="input2 cannabinoids main-input" name="CBG-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbg"><span class="input2-suffix">%</span>
                <input type="text" id="cbg-input3" class="input3" name="CBG-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="cbg-input4" class="input4" name="CBG-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset>
                <!-- CBGA % -->
                <label>CBGA:</label>
                <input type="text" id="cbga-input1" class="input1 cannabinoids-tinctures" name="CBGA-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbga"><span class="input1-suffix">mg</span>
                <input type="text" id="cbga-input2" class="input2 cannabinoids main-input" name="CBGA-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbga"><span class="input2-suffix">%</span>
                <input type="text" id="cbga-input3" class="input3" name="CBGA-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="cbga-input4" class="input4" name="CBGA-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset>
                <!-- CBN % -->
                <label>CBN:</label>
                <input type="text" id="cbn-input1" class="input1 cannabinoids-tinctures" name="CBN-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbn"><span class="input1-suffix">mg</span>
                <input type="text" id="cbn-input2" class="input2 cannabinoids main-input" name="CBN-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbn"><span class="input2-suffix">%</span>
                <input type="text" id="cbn-input3" class="input3" name="CBN-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="cbn-input4" class="input4" name="CBN-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <fieldset>
                <!-- CBC % -->
                <label>CBC:</label>
                <input type="text" id="cbc-input1" class="input1 cannabinoids-tinctures" name="CBC-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbc"><span class="input1-suffix">mg</span>
                <input type="text" id="cbc-input2" class="input2 cannabinoids main-input" name="CBC-input2"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="cbc"><span class="input2-suffix">%</span>
                <input type="text" id="cbc-input3" class="input3" name="CBC-input3" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="cbc-input4" class="input4" name="CBC-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

        </div><!-- class="wrapper" -->

        <!--------------------------------------------------------------------------------------------------->
        <!-- terpenes (II) -->
        <!--------------------------------------------------------------------------------------------------->
        <div class="wrapper overflow-wrapper wrapper-terpenes">
            <fieldset>
                <p>Enter your terpenes:</p>
            </fieldset>

            <fieldset>
                <!-- Bisabolol α-Bisabolol % -->
                <label>Bisabolol α-Bisabolol:</label>
                <input type="text" id="alfa-bisabolol-input1" class="input1 terpenes-tinctures" name="alfa-bisabolol-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Bisabolol A"><span class="input1-suffix">mg</span>
                <input type="text" id="alfa-bisabolol-input2" class="input2 terpenes main-input" name="t_BisabololA"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Bisabolol A"><span class="input2-suffix">%</span>
                <input type="text" id="alfa-bisabolol-input3" class="input3 alfa-bisabolol-input" name="BisabololA-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="alfa-bisabolol-input4" class="input4" name="CBC-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>
            <fieldset>

                <!-- Camphene % -->
                <label>Camphene:</label>
                <input type="text" id="camphene-input1" class="input1 terpenes-tinctures" name="camphene-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Camphene"><span class="input1-suffix">mg</span>
                <input type="text" id="camphene-input2" class="input2 terpenes main-input" name="t_Camphene"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Camphene"><span class="input2-suffix">%</span>
                <input type="text" id="camphene-input3" class="input3 camphene-input" name="Camphene-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="camphene-input4" class="input4" name="camphene-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Carene % -->
            <fieldset>
                <label>Carene Δ3-Carene:</label>
                <input type="text" id="carene-input1" class="input1 terpenes-tinctures" name="carene-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Carene"><span class="input1-suffix">mg</span>
                <input type="text" id="carene-input2" class="input2 terpenes main-input" name="t_Carene"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Carene"><span class="input2-suffix">%</span>
                <input type="text" id="carene-input3" class="input3 carene-input" name="Carene-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="carene-input4" class="input4" name="carene-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Cymene % -->
            <fieldset>
                <label>Cymene p-Cymene:</label>
                <input type="text" id="cymene-input1" class="input1 terpenes-tinctures" name="carene-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Cymene"><span class="input1-suffix">mg</span>
                <input type="text" id="cymene-input2" class="input2 terpenes main-input" name="t_Cymene" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Cymene"><span class="input2-suffix">%</span>
                <input type="text" id="cymene-input3" class="input3 cymene-input" name="Cymene-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="cymene-input4" class="input4" name="carene-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Caryophyllene Beta % -->
            <fieldset>
                <label>Caryophyllene Beta:</label>
                <input type="text" id="caryophylleneb-input1" class="input1 terpenes-tinctures" name="caryophylleneb-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Caryophyllene B"><span class="input1-suffix">mg</span>
                <input type="text" id="caryophylleneb-input2" class="input2 terpenes main-input" name="t_CaryophylleneB" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Caryophyllene B"><span class="input2-suffix">%</span>
                <input type="text" id="caryophylleneb-input3" class="input3 caryophylleneB-input" name="CaryophylleneB-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="caryophylleneb-input4" class="input4" name="caryophylleneb-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Caryophyllene Oxide % -->
            <fieldset>
                <label>Caryophyllene Oxide:</label>
                <input type="text" id="caryophylleneO-input1" class="input1 terpenes-tinctures" name="caryophylleneO-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Caryophyllene O"><span class="input1-suffix">mg</span>
                <input type="text" id="caryophylleneO-input2" class="input2 terpenes main-input" name="t_CaryophylleneO" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Caryophyllene O"><span class="input2-suffix">%</span>
                <input type="text" id="caryophylleneO-input3" class="input3 caryophylleneO-input" name="CaryophylleneO-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="caryophylleneO-input4" class="input4" name="caryophylleneO-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Eucalyptol % -->
            <fieldset>
                <label>Eucalyptol:</label>
                <input type="text" id="eucalyptol-input1" class="input1 terpenes-tinctures" name="eucalyptol-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Eucalyptol"><span class="input1-suffix">mg</span>
                <input type="text" id="eucalyptol-input2" class="input2 terpenes main-input" name="t_Eucalyptol" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Eucalyptol"><span class="input2-suffix">%</span>
                <input type="text" id="eucalyptol-input3" class="input3 eucalyptol-input" name="Eucalyptol-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="eucalyptol-input4" class="input4" name="eucalyptol-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Geraniol % -->
            <fieldset>
                <!-- Geraniol % -->
                <label>Geraniol:</label>
                <input type="text" id="geraniol-input1" class="input1 terpenes-tinctures" name="geraniol-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Geraniol"><span class="input1-suffix">mg</span>
                <input type="text" id="geraniol-input2" class="input2 terpenes main-input" name="t_Geraniol" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Geraniol"><span class="input2-suffix">%</span>
                <input type="text" id="geraniol-input3" class="input3 geraniol-input" name="Geraniol-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="geraniol-input4" class="input4" name="geraniol-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Guaiol % -->
            <fieldset>
                <label>Guaiol:</label>
                <input type="text" id="guaiol-input1" class="input1 terpenes-tinctures" name="guaiol-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Guaiol"><span class="input1-suffix">mg</span>
                <input type="text" id="guaiol-input2" class="input2 terpenes main-input" name="t_Guaiol" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Guaiol"><span class="input2-suffix">%</span>
                <input type="text" id="guaiol-input3" class="input3 guaiol-input" name="Guaiol-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="guaiol-input4" class="input4" name="guaiol-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Humulene % -->
            <fieldset>
                <label>Humulene α-Humulene:</label>
                <input type="text" id="humulene-input1" class="input1 terpenes-tinctures" name="humulene-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Humulene A"><span class="input1-suffix">mg</span>
                <input type="text" id="humulene-input2" class="input2 terpenes main-input" name="t_HumuleneA" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Humulene A"><span class="input2-suffix">%</span>
                <input type="text" id="humulene-input3" class="input3 humulene-input" name="HumuleneA-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="humulene-input4" class="input4" name="humulene-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Isopulegol % -->
            <fieldset>
                <label>Isopulegol:</label>
                <input type="text" id="isopulegol-input1" class="input1 terpenes-tinctures" name="isopulegol-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Isopulegol"><span class="input1-suffix">mg</span>
                <input type="text" id="isopulegol-input2" class="input2 terpenes main-input" name="t_Isopulegol" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Isopulegol"><span class="input2-suffix">%</span>
                <input type="text" id="isopulegol-input3" class="input3 isopulegol-input" name="Isopulegol-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="isopulegol-input4" class="input4" name="isopulegol-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Limonene % -->
            <fieldset>
                <label>Limonene Δ-Limonene:</label>
                <input type="text" id="limonene-input1" class="input1 terpenes-tinctures" name="limonene-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Limonene"><span class="input1-suffix">mg</span>
                <input type="text" id="limonene-input2" class="input2 terpenes main-input" name="t_Limonene" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Limonene"><span class="input2-suffix">%</span>
                <input type="text" id="limonene-input3" class="input3 limonene-input" name="Limonene-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="limonene-input4" class="input4" name="limonene-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Linalool % -->
            <fieldset>
                <label>Linalool:</label>
                <input type="text" id="linalool-input1" class="input1 terpenes-tinctures" name="linalool-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Linalool"><span class="input1-suffix">mg</span>
                <input type="text" id="linalool-input2" class="input2 terpenes main-input" name="t_Linalool" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Linalool"><span class="input2-suffix">%</span>
                <input type="text" id="linalool-input3" class="input3 linalool-input" name="Linalool-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="linalool-input4" class="input4" name="linalool-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Myrcene % -->
            <fieldset>
                <label>Myrcene β-Myrcene:</label>
                <input type="text" id="myrcene-input1" class="input1 terpenes-tinctures" name="myrcene-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Myrcene B"><span class="input1-suffix">mg</span>
                <input type="text" id="myrcene-input2" class="input2 terpenes main-input" name="t_MyrceneB" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Myrcene B"><span class="input2-suffix">%</span>
                <input type="text" id="myrcene-input3" class="input3 myrcene-input" name="MyrceneB-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="myrcene-input4" class="input4" name="myrcene-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Nerolidol 1 % -->
            <fieldset>
                <label>Nerolidol 1:</label>
                <input type="text" id="nerolidol1-input1" class="input1 terpenes-tinctures" name="nerolidol1-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Nerolidol1"><span class="input1-suffix">mg</span>
                <input type="text" id="nerolidol1-input2" class="input2 terpenes main-input" name="t_Nerolidol1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Nerolidol1"><span class="input2-suffix">%</span>
                <input type="text" id="nerolidol1-input3" class="input3 nerolidol1-input" name="Nerolidol1-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="nerolidol1-input4" class="input4" name="nerolidol1-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Nerolidol 2 % -->
            <fieldset>
                <label>Nerolidol 2:</label>
                <input type="text" id="nerolidol2-input1" class="input1 terpenes-tinctures" name="nerolidol2-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Nerolidol2"><span class="input1-suffix">mg</span>
                <input type="text" id="nerolidol2-input2" class="input2 terpenes main-input" name="t_Nerolidol2" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Nerolidol2"><span class="input2-suffix">%</span>
                <input type="text" id="nerolidol2-input3" class="input3 nerolidol2-input" name="Nerolidol2-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="nerolidol2-input4" class="input4" name="nerolidol2-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Ocimene % -->
            <fieldset>
                <label>Ocimene β-Ocimene:</label>
                <input type="text" id="ocimeneB-input1" class="input1 terpenes-tinctures" name="ocimeneB-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Ocimene B"><span class="input1-suffix">mg</span>
                <input type="text" id="ocimeneB-input2" class="input2 terpenes main-input" name="t_OcimeneB" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Ocimene B"><span class="input2-suffix">%</span>
                <input type="text" id="ocimeneB-input3" class="input3 ocimeneB-input" name="OcimeneB-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="ocimeneB-input4" class="input4" name="ocimeneB-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Ocimine Ocimine % -->
            <fieldset>
                <label>Ocimene Ocimine:</label>
                <input type="text" id="ocimeneO-input1" class="input1 terpenes-tinctures" name="ocimeneO-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Ocimene"><span class="input1-suffix">mg</span>
                <input type="text" id="ocimeneO-input2" class="input2 terpenes main-input" name="t_Ocimene" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Ocimene"><span class="input2-suffix">%</span>
                <input type="text" id="ocimeneO-input3" class="input3 ocimeneO-input" name="Ocimene-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="ocimeneO-input4" class="input4" name="ocimeneO-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Pinene α-Pinene % -->
            <fieldset>
                <label>Pinene α-Pinene:</label>
                <input type="text" id="pineneA-input1" class="input1 terpenes-tinctures" name="pineneA-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Pinene A"><span class="input1-suffix">mg</span>
                <input type="text" id="pineneA-input2" class="input2 terpenes main-input" name="t_PineneA" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Pinene A"><span class="input2-suffix">%</span>
                <input type="text" id="pineneA-input3" class="input3 pineneA-input" name="PineneA-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="pineneA-input4" class="input4" name="pineneA-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Pinene β-Pinene % -->
            <fieldset>
                <label>Pinene β-Pinene:</label>
                <input type="text" id="pineneB-input1" class="input1 terpenes-tinctures" name="pineneB-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Pinene B"><span class="input1-suffix">mg</span>
                <input type="text" id="pineneB-input2" class="input2 terpenes main-input" name="t_PineneB" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Pinene B"><span class="input2-suffix">%</span>
                <input type="text" id="pineneB-input3" class="input3 pineneB-input" name="PineneB-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="pineneB-input4" class="input4" name="pineneB-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Terpinene α-Terpinene % -->
            <fieldset>
                <label>terpinene α-Terpinene:</label>
                <input type="text" id="terpineneA-input1" class="input1 terpenes-tinctures" name="terpineneA-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Terpinene A"><span class="input1-suffix">mg</span>
                <input type="text" id="terpineneA-input2" class="input2 terpenes main-input" name="t_TerpineneA" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Terpinene A"><span class="input2-suffix">%</span>
                <input type="text" id="terpineneA-input3" class="input3 terpineneA-input" name="TerpineneA-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="terpineneA-input4" class="input4" name="terpineneA-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Terpinene γ-Terpinene % -->
            <fieldset>
                <label>terpinene γ-Terpinene:</label>
                <input type="text" id="terpineneY-input1" class="input1 terpenes-tinctures" name="terpineneY-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Terpinene Y"><span class="input1-suffix">mg</span>
                <input type="text" id="terpineneY-input2" class="input2 terpenes main-input" name="t_TerpineneY" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Terpinene Y"><span class="input2-suffix">%</span>
                <input type="text" id="terpineneY-input3" class="input3 terpineneY-input" name="TerpineneY-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="terpineneY-input4" class="input4" name="terpineneY-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

            <!-- Terpinolene % -->
            <fieldset>
                <label>Terpinolene:</label>
                <input type="text" id="terpinolene-input1" class="input1 terpenes-tinctures" name="terpinolene-input1" value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Terpinolene"><span class="input1-suffix">mg</span>
                <input type="text" id="terpinolene-input2" class="input2 terpenes main-input" name="t_Terpinolene"  value="" pattern="[0-9]+([\.,][0-9]+)?" data-name="Terpinolene"><span class="input2-suffix">%</span>
                <input type="text" id="terpinolene-input3" class="input3 terpinolene-input" name="Terpinolene-mg" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input3-suffix">mg/g</span>
                <input type="text" id="terpinolene-input4" class="input4" name="terpinolene-input4" value="" pattern="[0-9]+([\.,][0-9]+)?"><span class="input4-suffix">mg/ml</span>
            </fieldset>

        </div><!--- class="wrapper overflow-wrapper wrapper-terpenes" --->

        <!--------------------------------------------------------------------------------------------------->
        <!-- Customizable Content (III) -->
        <!--------------------------------------------------------------------------------------------------->

        <!--------------------------------------------------------------------------------------------------->
        <!-- TASTE -->
        <!--------------------------------------------------------------------------------------------------->

    <!--------------------------------------------------------------------------------------------------->
    <!-- Show/hide Background & Guide Lines -->
    <!--------------------------------------------------------------------------------------------------->
    <!-- CIRCLE BORDER -->
    <fieldset class="checkbox-show-background">
        <label for="background"> Hide background</label>
        <input type="checkbox" id="background" name="hide_background" value="1" >

        <label for="hide_label"> Hide lines</label>
        <input type="checkbox" id="hide_guide_lines" name="hide_guide_lines" value="1" ><br>

        <label for="hide_title"> Hide title</label>
        <input type="checkbox" id="hide_title" name="hide_title" value="1">

        <label for="hide_total"> Hide total</label>
        <input type="checkbox" id="hide_total" name="hide_total" value="1">
    </fieldset>

</form><!-- END FORM -->
</div>

</form>

</div><!-- class="left" -->


<!--//////////////////////////////////////////// CANVAS ///////////////////////////////////////////////-->
<div class="right">
    <h3>EMPTY</h3>
</div><!-- class="right" -->

<!--=====================================================================================================================-->
<hr>

<script src="js/test_cases_db.js"></script>
<script src="js/input_functions.js"></script>
<script src="js/test_cases.js"></script>

</body>
</html>
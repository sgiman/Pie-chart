/*******************************************************************
 * input_functions.js
 * INPUT CONTROL
 * SGI PIE DIAGRAMMA v3.0 - 2023-10 (prototype)
 * -----------------------------------------------------------------
 * movingwheel-main (archive)
 * Unical Label Generator - Flower 6.8 (js-original)
 * https://uniwyze.com
 ********************************************************************
 * Modification by sgiman @ 2023-10
 */
  
  //---------------------------------
  //    A D D   C O O K I E S
  //---------------------------------
  //document.cookie = "user=NoNe"; // обновляем только куки с именем 'user'
  //alert(document.cookie); // показываем все куки

  // COOCKIE MODE
  document.querySelector('#mode1').onclick = function (event) {
  console.log(event.type)         // 'click'
  document.cookie = "mode=mode1";
}
  document.querySelector('#mode2').onclick = function (event) {
  console.log(event.type)         // 'click'
  document.cookie = "mode=mode2";
}
  document.querySelector('#mode3').onclick = function (event) {
  console.log(event.type)         // 'click'
  document.cookie = "mode=mode3";
}

  // COOCKIE TEST BUTOONS
  document.querySelector("#test-buttons-wrapper-flower").onclick = function (event) {
  document.cookie = "test=flower";
  console.log(event.type)
}
  document.querySelector("#test-buttons-wrapper-tinctures").onclick = function (event) {
  document.cookie = "test=tinctures";
  console.log(event.type)
}
  document.querySelector("#test-buttons-wrapper-concetrates").onclick = function (event) {
  document.cookie = "test=concetrates";
  console.log(event.type)
}

//==============================================================
// Set Mode Variable
// Задать переменный режим:
// Кнопки: Flower(mode1), Concentrate(mode2), Tinctures(mode3)
//==============================================================
var modeVariable;
modeVariable = setModeVariable();

function setModeVariable() {
  var modeList = document.getElementsByClassName('mode-buttons');
  var modeId = 'mode1';
  modeVariable = 'mode1';
  for (var i=0;i < modeList.length; i++){
    modeList[i].addEventListener('click',function(){
      var modeId = this.getAttribute('id');
      console.log(modeId);
      document.getElementById('mode1').classList.remove('active');
      document.getElementById('mode2').classList.remove('active');
      document.getElementById('mode3').classList.remove('active');
      document.getElementById(modeId).classList.add('active');
      modeVariable = modeId;
      deleteInputs(true);	//
      inputsMisc();
    });
  }
  return modeVariable;
}
          
//**********************************
// inputs Misc
// Настройка ввода в modeVariable:
// mode1, mode2, mode3
//**********************************
function inputsMisc(){
  if (document.getElementById('mode1').classList.contains('active')){
    modeVariable = 'mode1';

    // Cкрываем ввод, который не находится в цветочном режиме ("flower" mode)
    document.getElementById('thc8-input2').closest('fieldset').style.display = "none";
    document.getElementById('thc10-input2').closest('fieldset').style.display = "none";
    document.getElementById('thco-input2').closest('fieldset').style.display = "none";
    document.getElementById('tinctures-volume').style.display = "none";
    document.getElementById('test-buttons-wrapper-flower').style.display = "block";
    document.getElementById('test-buttons-wrapper-tinctures').style.display = "none";
    document.getElementById('test-buttons-wrapper-concetrates').style.display = "none";
    document.getElementById('net-weight-fieldset').style.display = "block";
    showTincturesInput(false);
    calculatePercentage();
  }else if(document.getElementById('mode2').classList.contains('active')){
    modeVariable = 'mode2';

    // Показываем входные данные, находящиеся в режиме концентрации ("concentrate" mode)
    document.getElementById('thc8-input2').closest('fieldset').style.display = "block";
    document.getElementById('thc10-input2').closest('fieldset').style.display = "block";
    document.getElementById('thco-input2').closest('fieldset').style.display = "block";
    document.getElementById('tinctures-volume').style.display = "none";
    document.getElementById('test-buttons-wrapper-flower').style.display = "none";
    document.getElementById('test-buttons-wrapper-tinctures').style.display = "none";
    document.getElementById('test-buttons-wrapper-concetrates').style.display = "block";
    document.getElementById('net-weight-fieldset').style.display = "block";
    showTincturesInput(false);
    calculatePercentage();
  }else if(document.getElementById('mode3').classList.contains('active')){
    modeVariable = 'mode3';

    // Показываем входные данные, находящиеся в режиме настоек ("tinctures" mode)
    document.getElementById('thc8-input2').closest('fieldset').style.display = "block";
    document.getElementById('thc10-input2').closest('fieldset').style.display = "block";
    document.getElementById('thco-input2').closest('fieldset').style.display = "block";
    document.getElementById('tinctures-volume').style.display = "block";
    document.getElementById('net-weight').innerHTML="";
    document.getElementById('net-weight-fieldset').style.display = "none";
    document.getElementById('test-buttons-wrapper-flower').style.display = "none";
    document.getElementById('test-buttons-wrapper-tinctures').style.display = "block";
    document.getElementById('test-buttons-wrapper-concetrates').style.display = "none";
    showTincturesInput(true);
    totalEnter();
  }
  // Установить режим modeVarible (mode1, mode2, mode3)
  if (document.getElementById('mode1').classList.contains('active')){
    modeVariable = 'mode1';
  }else if(document.getElementById('mode2').classList.contains('active')){
    modeVariable = 'mode2';
  }else if(document.getElementById('mode3').classList.contains('active')){
    modeVariable = 'mode3';
  }
}

//********************************************************
// Delete Inputs
// удаляем все входные данные каннабиноидов и терпенов,
// удаляем эффекты, вкус(taste), другую информацию,
// удаляем запись ES и эффектов, пустой холст
//********************************************************
function deleteInputs(x){
  if(x){
    var totalCannabinoid = document.getElementById('tc-input').value="";
    // Очистить общий объем (total volume)
    var totalVolume = document.getElementById('tv-input').value="";
  }

  var allPercentageInputs = document.getElementsByClassName('main-input');
  var allMgInputs = document.getElementsByClassName('input3');
  var allEffectsCheckboxes = document.getElementsByClassName('checkbox');
  var mgInputs = document.getElementsByClassName('input1');
  var mggInputs = document.getElementsByClassName('input4');

  // Очистить основные свойства продукта (product-name и net-weight)
  document.getElementById('product-name').value ='';
  document.getElementById('net-weight').value ='';

  // Очистить mg
  for(var i = 0; i < mgInputs.length; i++ ){
    mgInputs[i].value='';
  }

  // Очистить mgg
  for(var i = 0; i < mggInputs.length; i++ ){
    mggInputs[i].value='';
  }

  // Очистить процентные поля ввода
  for(var i = 0; i < allPercentageInputs.length; i++ ){
    allPercentageInputs[i].value='';
  }

  // Очистить mg поля ввода
  for(var j = 0; j < allMgInputs.length; j++ ){
    allMgInputs[j].value='';
  }

  // uncheck checkbox inputs
  for(var x = 0; x < allEffectsCheckboxes.length; x++ ){
    allEffectsCheckboxes[x].checked = false;
  }

  document.getElementById('net-weight').value='';

}

//************************************************
//  Show Tinctures Input
//  Показать или скрыть ввод и суффикс настоек
//************************************************
function showTincturesInput(x){
  var tincturesInput = document.getElementsByClassName('input1');
  var tincturesMgInput = document.getElementsByClassName('input4');
  var tincturesMgInputSuffix = document.getElementsByClassName('input4-suffix');
  var mgInput = document.getElementsByClassName('input3');
  var tincturesInputSuffix = document.getElementsByClassName('input1-suffix');
  var percSuffix = document.getElementsByClassName('input2-suffix');
  var mgSuffix = document.getElementsByClassName('input3-suffix');

  if(x){
    for(var i = 0; i < tincturesInput.length; i++ ){
      mgInput[i].style.display = "none";
      mgSuffix[i].style.display = "none";
      tincturesMgInputSuffix[i].style.display = "inline-block";
      tincturesMgInput[i].style.display = "inline-block";
      tincturesInput[i].style.display = "inline-block";
      tincturesInputSuffix[i].style.display = "inline-block";
      tincturesInputSuffix[i].innerHTML = "%";
      percSuffix[i].innerHTML = "mg";
    }
  }else{
    for(var i = 0; i < tincturesInput.length; i++ ){
      mgInput[i].style.display = "inline-block";
      mgSuffix[i].style.display = "inline-block";
      tincturesMgInputSuffix[i].style.display = "none";
      tincturesMgInput[i].style.display = "none";
      tincturesInput[i].style.display = "none";
      tincturesInputSuffix[i].style.display = "none";
      tincturesInputSuffix[i].innerHTML = "mg";
      percSuffix[i].innerHTML = "%";
    }
  }
}

//**********************
//  Clean On Tinctures
//**********************
function cleanOnTinctures(){
  var totalVolume = document.getElementById('tv-input');
  var totalCannabinoid = document.getElementById('tc-input');
  totalVolume.addEventListener("keyup", function(){
    deleteInputs(false);
  });
  totalCannabinoid.addEventListener("keyup", function(){
    deleteInputs(false);
  });
}

//*************************************
//  Calculate percentage from mg/g
//*************************************
function calculatePercentage(){
  var mgInputs = document.getElementsByClassName('input3');
  var mggInputs = document.getElementsByClassName('input4');
  var percInputs = document.getElementsByClassName('main-input');
  var input1 = document.getElementsByClassName('input1');
  
  var totalVolume = document.getElementById('tv-input').value;
  var totalCannabinoid = document.getElementById('tc-input').value;
  
    for (i = 0; i < mgInputs.length; i++) {
      var x = mgInputs[i];
      x.removeEventListener("keyup", input3ToInput2,true);
      x.addEventListener("keyup", input3ToInput2,true);
    }
    for (i = 0; i < percInputs.length; i++) {
      var x = percInputs[i];
      x.removeEventListener("keyup", input2Delete,true);
      x.addEventListener("keyup", input2Delete,true);
    }
    for (i = 0; i < input1.length; i++) {
      var x = input1[i];
      x.removeEventListener("keyup", input1to2and4,true);
      x.addEventListener("keyup", input1to2and4,true);
    }
    for (i = 0; i < mggInputs.length; i++) {
      var x = mggInputs[i];
      x.removeEventListener("keyup", input4to2to1,true);
      x.addEventListener("keyup", input4to2to1,true);
    }

  //----------------------------------------------
  //  input4(mg/ml): to Input2(%) to Input1(mg)
  //----------------------------------------------
  function input4to2to1(elem){
    var elem = this;
    var elemVal = elem.value;
    var elem2 = this.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling;
    var elem1 = this.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling;
    
    elem1.value = (elemVal / 10).toFixed(3);
    elem2.value = (elem1.value * totalVolume).toFixed(3);
  }

  //----------------------------------------------
  //  input1(mg): to Input2(%) and Input4(mg/ml)
  //----------------------------------------------
  function input1to2and4(elem){
    var elem = this;
    var elemVal = elem.value;
    var elem2 =this.nextElementSibling.nextElementSibling;
    var elem4 =this.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling;
    
    elem2.value = elemVal * 10;
    elem4.value = (elemVal * 10)* totalVolume;
  }

  //-------------------------------
  //  input3(mg/g): to Input2(%)
  //-------------------------------
  function input3ToInput2(elem){
    var elem = this;
    var elemVal = elem.value;
    var targetElemId = this.previousElementSibling.previousElementSibling.id;
    document.getElementById(targetElemId).value = elem.value / 10;
  }

  //------------------------------
  //  input2: Delete (TV, TC)
  //  Очистить и ввести:
  //  Total Cannabinoid (mg): (TC)
  //  Total Volume (ml): (TV)
  //------------------------------
  function input2Delete(elem){
    var elem = this.nextElementSibling.nextElementSibling;
    var mainElemVal = this.value;
    elem.value='';
    var totalVolume = document.getElementById('tv-input').value;
    var totalCannabinoid = document.getElementById('tc-input').value;
    if((totalVolume != '')&&(totalCannabinoid != ''))
    {
      var elem4 =this.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling;
      elem4.value = mainElemVal / totalVolume;
      var elem1 =this.previousElementSibling.previousElementSibling;
      elem1.value = (((mainElemVal/1000)/totalVolume)*100).toFixed(3);
    }
  }
}

//*******************************
// Total Enter
// TV - Total Cannabinoid (mg):
// TC - Total Volume (ml):
//*******************************
function totalEnter(){
  var totalVolume = document.getElementById('tv-input');
  var totalCannabinoid = document.getElementById('tc-input');
  var inputMain = document.getElementsByClassName('main-input');
  var inputs1 = document.getElementsByClassName('input1');
  var inputs4 = document.getElementsByClassName('input4');
  disableAllInputFields();
  totalVolume.removeEventListener("keyup", disableAllInputFields,true);
  totalVolume.addEventListener("keyup", disableAllInputFields,true);
  totalCannabinoid.removeEventListener("keyup", disableAllInputFields,true);
  totalCannabinoid.addEventListener("keyup", disableAllInputFields,true);
  
  function disableAllInputFields(){
    if((totalVolume.value !='')&&(totalCannabinoid.value !='')){
      for (i = 0; i < inputMain.length; i++) {
        inputMain[i].disabled = false;
      }
      for (i = 0; i < inputs1.length; i++) {
        inputs1[i].disabled = false;
      }
      for (i = 0; i < inputs4.length; i++) {
        inputs4[i].disabled = false;
      }
    }else{
      for (i = 0; i < inputMain.length; i++) {
        inputMain[i].disabled = true;
      }
      for (i = 0; i < inputs1.length; i++) {
        inputs1[i].disabled = true;
      }
      for (i = 0; i < inputs4.length; i++) {
        inputs4[i].disabled = true;
      }
    }
  }
}

//--------------------------------------------------------------
// Check Input Limit
// Проверить ограничения ввода и показать в оповещении (alert)
// !!!! --- Перенесено на PHP (server) --- !!!
//--------------------------------------------------------------
function checkInputLimit(){
  document.querySelector("#label-form").addEventListener("submit",
      function(e) {//e.preventDefault();    //остановить отправку формы

        // проверяем, меньше ли сумма 36
        thcNum = parseFloat(document.getElementById("thc-input2").value);
        thcaNum = parseFloat(document.getElementById("thca-input2").value);
        thcvNum = parseFloat(document.getElementById("thcv-input2").value);
        thc8Num = parseFloat(document.getElementById("thc8-input2").value);
        thc10Num = parseFloat(document.getElementById("thc10-input2").value);
        thcoNum = parseFloat(document.getElementById("thco-input2").value);
        cbdNum = parseFloat(document.getElementById("cbd-input2").value);
        cbdaNum = parseFloat(document.getElementById("cbda-input2").value);
        cbdvNum = parseFloat(document.getElementById("cbdv-input2").value);
        cbgNum = parseFloat(document.getElementById("cbg-input2").value);
        cbgaNum = parseFloat(document.getElementById("cbga-input2").value);
        cbnNum = parseFloat(document.getElementById("cbn-input2").value);
        cbcNum = parseFloat(document.getElementById("cbc-input2").value);

        if(isNaN(thcNum)){thcNum = 0;}
        if(isNaN(thcaNum)){thcaNum = 0;}
        if(isNaN(thcvNum)){thcvNum = 0;}
        if(isNaN(thc8Num)){thc8Num = 0;}
        if(isNaN(thc10Num)){thc10Num = 0;}
        if(isNaN(thcoNum)){thcoNum = 0;}
        if(isNaN(cbdNum)){cbdNum = 0;}
        if(isNaN(cbdaNum)){cbdaNum = 0;}
        if(isNaN(cbdvNum)){cbdvNum = 0;}
        if(isNaN(cbgNum)){cbgNum = 0;}
        if(isNaN(cbgaNum)){cbgaNum = 0;}
        if(isNaN(cbnNum)){cbnNum = 0;}
        if(isNaN(cbcNum)){cbcNum = 0;}

        console.log ("THC: " + thcNum)
        console.log ("THCA: " + thcaNum)
        console.log ("THCV: " + thcvNum)
        console.log ("THC8: " + thc8Num)
        console.log ("THC10: " + thc10Num)
        console.log ("THC0: " + thcoNum)
        console.log ("CBD: " + cbdNum)
        console.log ("CBDA: " + cbdaNum)
        console.log ("CBDV: " + cbdvNum)
        console.log ("CBG: " + cbgNum)
        console.log ("CBGA: " + cbgaNum)
        console.log ("CBN: " + cbnNum)
        console.log ("CBC: " + cbcNum)

    var sum1 = thcNum+thcaNum+thcvNum+thc8Num+thc10Num+thcoNum+cbdNum+cbdaNum+cbdvNum+cbgNum+cbgaNum+cbnNum+cbcNum;

    if(modeVariable == 'mode1') {
      if((sum1 <= 36) && (sum1 > 0)){
        draw(modeVariable, true);
      } else {
        alert('The SUM of all the Cannabinoids must be bigger than 0 and smaller than 36 (Flower)!');
        console.log('The SUM of all the Cannabinoids must be bigger than 0 and smaller than 36 (Flower)!');
      }
    } else if(modeVariable == 'mode2'){
      if((sum1 <= 100)&&(sum1 > 0)){
        draw(modeVariable, true);
      } else {
        alert('The SUM of all the Cannabinoids must be bigger than 0 and smaller than 100 (Concentrate)!');
        console.log('The SUM of all the Cannabinoids must be bigger than 0 and smaller than 100 (Concentrate)!');
      }
    } else {
      draw(modeVariable, true);
    }

 });

} // --- checkInputLimit ---


//****************************
// draw
// Circle Diagramma (no used)
//****************************
function draw(mod, x){
	// .... //
  console.log("***** DRAW ***** ")
  console.log("X: " + x)
  console.log("MOD: " + mod)
}

//*******************
/////////////////////
//  run functions
/////////////////////
//*******************
showTincturesInput(false);
cleanOnTinctures();
calculatePercentage();
checkInputLimit();

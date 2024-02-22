/*******************************************************************
 * test_cases.js
 * INPUT CONTROL
 * Test cases buttons
 * SGI PIE DIAGRAMMA v3.0 - 2023-10 (prototype)
 * -----------------------------------------------------------------
 * movingwheel-main (archive)
 * Unical Label Generator - Flower 6.8 (js-original)
 * https://uniwyze.com
 ********************************************************************
 * Modification by sgiman @ 2023-10
 */

//------------------------------
//  initialize Test Cases
//------------------------------
function initializeTestCases(testCasesDB)
{
  var testCasesDB = testCasesDB;
  var testDataLength,testId;
  var testList = document.getElementsByClassName('test-buttons');
  var mainInput = document.getElementsByClassName("main-input");
  
  // Получить размер базы данных тестовых примеров
  var testDataLength = 0;
  for (let key in testCasesDB){
    testDataLength++;
  }

  for (var i=0;i < testList.length; i++)
  {
      testList[i].addEventListener('click',function()
      {
        // Очистить ввод
        deleteInputs(true);

        // Имя данных в "data-name"
        testId = this.getAttribute('data-name');

        // Get Data
        for(var j=0; j < testDataLength; j++)
        {
          if(Object.keys(testCasesDB)[j] == testId)
          {
             console.log(Object.values(testCasesDB)[j]);
            // Получить значения из testCasesDB и поместить их во входные данные HTML
            Object.keys(Object.values(testCasesDB)[j]).forEach(key => {
            document.getElementById(key).value = Object.values(testCasesDB)[j][key];
            });

            // Добавить событие клавиатуры и имитировать ввод,
            // чтобы активировать преобразование в другие входы mg > % и т. д.
            for(var a=0; a < mainInput.length; a++)
            {
              if(mainInput[a].value != '') {
                mainInput[a].dispatchEvent(new KeyboardEvent("keyup"));
              }
            }
            enableElements();

          } // --- if --

        } // --- for ---

        // Запустить основную функцию для рисования меток
        // draw(true);

      }); // --- addEventListener ---

  } // --- for ---

}  // --- END initializeTestCases ---


//--------------------------
//  Enable Elements
//--------------------------
// Включить все элементы полей ввода HTML для терпенов и каннабиноидов
function enableElements()
{
  var cannabinoids = document.getElementsByClassName('cannabinoids');
  var terpenes = document.getElementsByClassName('terpenes');

  for(var i=0;i < cannabinoids.length; i++){
    cannabinoids[i].disabled = false;
  }

  for(var j=0;j < terpenes.length; j++){
    terpenes[j].disabled = false;
  }

}

initializeTestCases(testCasesDB);

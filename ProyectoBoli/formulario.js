// Obtener el formulario por su id
var formulario = document.getElementById("formulario");

// Agregar un evento al enviar el formulario
formulario.addEventListener("submit", function(event) {
  // Prevenir el comportamiento por defecto del formulario
  event.preventDefault();

  // Obtener los datos del formulario como un objeto FormData
  var datos = new FormData(formulario);

  // Convertir los datos en un objeto JSON
  var json = Object.fromEntries(datos);

  // Llamar a una función que envíe el objeto JSON al archivo excel
  enviarAExcel(json);
});

// Crear una función que envíe el objeto JSON al archivo excel
function enviarAExcel(json) {
    // Leer el archivo excel existente
    var workbook = XLSX.readFile("e.xlsx");
  
    // Obtener la primera hoja del archivo excel
    var worksheet = workbook.Sheets[workbook.SheetNames[0]];
  
    // Obtener el rango de celdas de la hoja
    var range = XLSX.utils.decode_range(worksheet["!ref"]);
  
    // Incrementar el número de filas del rango
    range.e.r++;
  
    // Convertir el objeto JSON en un arreglo de arreglos
    var array = Object.values(json);
  
    // Escribir el arreglo en la última fila del rango
    XLSX.utils.sheet_add_aoa(worksheet, [array], {origin: range.e});
  
    // Actualizar el rango de celdas de la hoja
    worksheet["!ref"] = XLSX.utils.encode_range(range);
  
    // Escribir el archivo excel modificado
    XLSX.writeFile(workbook, "e.xlsx");
  }

  / Obtener el botón por su id
var pdf = document.getElementById("pdf");

// Agregar un evento al hacer clic en el botón
pdf.addEventListener("click", function() {
  // Leer el archivo excel existente
  var workbook = XLSX.readFile("e.xlsx");

  // Convertir el archivo excel en un blob PDF
  var blob = XLSX.write(workbook, {type: "blob", bookType: "pdf"});

  // Descargar el blob PDF con el nombre "e.pdf"
  saveAs(blob, "e.pdf");
});
  

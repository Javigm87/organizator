function guardarFrase() {
    var frase = document.getElementById('frase').value;
    var aux = document.getElementById('aux').value;
    var campo = document.getElementById('campo').value;
    var fechaPlanificada = document.getElementById('fechaPlanificada').value;
    var fechaLimite = document.getElementById('fechaLimite').value;
    var periodicidad = document.getElementById('periodicidad').value;

    // Enviar los datos al servidor mediante AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'guardar.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
            // Puedes hacer más cosas después de guardar la frase si es necesario
        }
    };

    var datos = 'frase=' + encodeURIComponent(frase) +
                '&aux=' + encodeURIComponent(aux) +
                '&campo=' + encodeURIComponent(campo) +
                '&fechaPlanificada=' + encodeURIComponent(fechaPlanificada) +
                '&fechaLimite=' + encodeURIComponent(fechaLimite) +
                '&periodicidad=' + encodeURIComponent(periodicidad);

    xhr.send(datos);
}
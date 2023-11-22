function guardarFrase() {
    var frase = document.getElementById('frase').value;

    // Enviar la frase al servidor mediante AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'guardar.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
            // Puedes hacer más cosas después de guardar la frase si es necesario
        }
    };
    xhr.send('frase=' + encodeURIComponent(frase));
}

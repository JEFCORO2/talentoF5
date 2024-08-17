// Inicializar el arreglo de respuestas
var selectedValues = new Array(60).fill(null);

// Respuestas correctas
var correctAnswers = [
    // Serie A
    4, 5, 1, 2, 6, 3, 6, 2, 1, 3, 4, 5,
    // Serie B
    2, 6, 4, 3, 1, 2, 5, 4, 1, 6, 3, 5,
    // Serie C
    2, 4, 3, 5, 1, 2, 6, 3, 4, 1, 5, 2,
    // Serie D
    3, 5, 2, 6, 4, 1, 3, 5, 2, 4, 6, 1,
    // Serie E
    1, 2, 4, 6, 3, 5, 2, 4, 1, 6, 3, 5
];

// Función para actualizar el valor seleccionado
function updateDropdown(index, value) {
    // Actualizar la respuesta en el arreglo
    selectedValues[index] = parseInt(value); // Convertir a número
}

// Función para terminar el test
function finishTest(timeSpent) {
    // Mostrar el arreglo en la consola
    console.log("Test terminado", selectedValues);

    // Validar las respuestas
    var correctCount = 0;
    for (var i = 0; i < selectedValues.length; i++) {
        if (selectedValues[i] === correctAnswers[i]) {
            correctCount++;
        }
    }

    // Guardar la puntuación en el backend usando un formulario
    var score = correctCount;
    saveScore(score, timeSpent);
}

// Función para guardar la puntuación y el tiempo utilizado
function saveScore(score, timeSpent) {
    // Convertir el tiempo transcurrido a una cadena de texto (formato mm:ss)
    var formattedTime = formatTime(timeSpent);

    // Crear un formulario oculto
    var form = document.createElement('form');
    form.action = '{{ route("guardar-nota") }}'; // Usar el nombre de la ruta
    form.method = 'POST';

    // Agregar el token CSRF
    var csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = '{{ csrf_token() }}'; // Obtener el token CSRF
    form.appendChild(csrfInput);

    // Crear un campo de entrada para la puntuación (solo el número de respuestas correctas)
    var scoreInput = document.createElement('input');
    scoreInput.type = 'hidden';
    scoreInput.name = 'score';
    scoreInput.value = score;
    form.appendChild(scoreInput);

    // Crear un campo de entrada para el tiempo utilizado (como cadena de texto)
    var timeInput = document.createElement('input');
    timeInput.type = 'hidden';
    timeInput.name = 'time_spent';
    timeInput.value = formattedTime; // Enviar el tiempo formateado como mm:ss
    form.appendChild(timeInput);

    // Agregar el formulario al cuerpo del documento
    document.body.appendChild(form);

    // Enviar el formulario
    form.submit();
}

// Función para formatear el tiempo en minutos y segundos
function formatTime(seconds) {
    var minutes = Math.floor(seconds / 60);
    var remainderSeconds = seconds % 60;
    return `${minutes}:${remainderSeconds < 10 ? '0' + remainderSeconds : remainderSeconds}`;
}

// Función para iniciar el temporizador
function startTimer(duration) {
    var timer = duration;
    var interval = setInterval(function () {
        var minutes = Math.floor(timer / 60);
        var seconds = timer % 60;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        document.getElementById('timer').textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            clearInterval(interval);
            finishTest(duration); // Pasar el tiempo utilizado
            alert("El tiempo ha terminado. El test se ha finalizado automáticamente.");
        }
    }, 1000);
}

// Mostrar la página seleccionada
function showPage(page) {
    var pages = document.querySelectorAll('.page');
    for (var i = 0; i < pages.length; i++) {
        pages[i].style.display = (i + 1 === page) ? 'block' : 'none';
    }

    // Actualizar el estado de los botones de paginación
    var pageButtons = document.querySelectorAll('.page-link');
    for (var i = 0; i < pageButtons.length; i++) {
        pageButtons[i].classList.toggle('active', i + 1 === page);
        pageButtons[i].disabled = (i + 1 !== page && i + 1 !== page + 1);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Ocultar todas las páginas excepto la primera
    var pages = document.querySelectorAll('.page');
    for (var i = 1; i < pages.length; i++) {
        pages[i].style.display = 'none';
    }

    // Iniciar el temporizador de 60 minutos
    startTimer(60 * 60);

    // Inicializar la paginación
    showPage(1);
});
$(document).ready(function () {
    var current = 1, current_step, next_step, steps;
    steps = $("fieldset").length;
    $(".next").click(function () {
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
    });
    $(".previous").click(function () {
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
            .html(percent + "%");
    }
});

$(document).on('click', '#removeRow', function () {
    $(this).closest('#nuevafila').remove();
});

$(document).on('click', '#addRow', function(){
    var html = '';
    html += '<div class="row g-2" id="nuevafila">';
    html += '<div class="col-md-10">';
    html += '<div class="form-floating mb-3">';
    html += '<select id="inputMarcaDisco" class="form-select">';
    html += '<option selected value="">Elegir</option>';
    html += '<option value=""> ... </option>';
    html += '</select>';
    html += '<label for="inputMarcaDisco" class="form-label">Marca del Disco</label>';
    html += '</div>';
    html += '<div class="form-floating mb-3">';
    html += '<input class="form-control" name="data[discos]" placeholder="RAM"></input>';
    html += '<label for="discos">Capacidad Disco</label>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-2 align-self-center">';
    html += '<div class="row justify-content-center">';
    html += '<button id="removeRow" type="button" class="btn btn-danger" style="width: 50%;">Borrar</button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';


    $('#newRow').append(html);

});     
    

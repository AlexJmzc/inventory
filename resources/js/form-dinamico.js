$(document).ready(function() {
    $('#show').click(function() {
        $('#rowParlantes').show();
    });
    $('#hide').click(function() {
        document.getElementById("codigoParlantes").value="";
        document.getElementById("inputMarcaParlantes").value="";
        document.getElementById("serieParlantes").value="";
        document.getElementById("inputDescripcionParlante").value="";
        $('#rowParlantes').hide();
    });
});

$(document).ready(function() {
    $('#addRow').click(function() {
        $('#nuevafila').show();
    });
    $('#removeRow').click(function() {
        document.getElementById("disco2").value = "";
        document.getElementById('inputMarcaDisco2').value="";
        $('#nuevafila').hide();

    });
});

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
})

// $(document).on('click', '#removeRow', function () {
//     $(this).closest('#nuevafila').remove();
// });

  



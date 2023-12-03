$(document).ready(function() {
    // Quando um radio button é clicado
    $('input[type="radio"]').on('click', function() {
      // Desativa todos os outros radio buttons no mesmo grupo
      $('input[name="' + $(this).attr('name') + '"]').not(this).prop('disabled', false);

      
      }
    });

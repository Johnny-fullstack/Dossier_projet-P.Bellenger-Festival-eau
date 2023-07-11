$(document).ready(() => {
  var url = $('#prix').data('url');
  
  $('#billeterie_nbpers, #billeterie_jour').change(function() {
    var nbpers = $('#billeterie_nbpers').val();
    var vendredi = $('#billeterie_jour_0').is(':checked');
    var samedi = $('#billeterie_jour_1').is(':checked');
    var deuxJours = $('#billeterie_jour_2').is(':checked');
    
    var prix;
    
    if (vendredi || samedi) {
      prix = nbpers * 10;
    } else if (deuxJours) {
      prix = nbpers * 20;
    } else {
      prix = 0;
    }
    
    $.ajax({
      url: url,
      method: 'POST',
      data: {
        'nbpers': nbpers,
        'vendredi': vendredi,
        'samedi': samedi,
        'deuxJours': deuxJours
      },
      success: function(response) {
        $('#prix').text('Prix total : ' + prix + '€');

        document.cookie = "prix=" + prix;
   
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
});

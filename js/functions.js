function select_county() {
    var county = $("#jimbo").val();
    $.ajax({
        url: '../includes/county.php',
        method: 'POST',
        data: 'county=' + county
    }).done(function(data) {
        data = JSON.parse(data);
        var bunge = $('#bunge') . empty();
        data.forEach(function(data) {
            bunge.append('<option>' + data.constituency_name + '</option>')
        })
    })

}


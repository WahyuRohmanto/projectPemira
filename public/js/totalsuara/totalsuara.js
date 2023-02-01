$.ajax({
    url: 'http://127.0.0.1:8000/api/live_count',
    type: 'GET',
    dataType: 'json',
    cache:true,
    success: function(response) {
        let kandidatData = response.data;

        kandidatData.forEach(response => {
            $('#myTable tr:last').after(
                `<tr><td>${response.id}</td><td>${response.nama_kandidat}</td><td>${response.jumlah_suara}</td></tr>`
            );
        });
    }
});
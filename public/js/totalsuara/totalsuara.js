const countUserHasVote = async () => {
    const response = await axios.get('/api/live_count');
    let kandidatData = response.data.data;

    kandidatData.forEach(response => {
        $('#myTable tr:last').after(
            `<tr><td>${response.id}</td><td>${response.nama_kandidat}</td><td>${response.jumlah_suara}</td></tr>`
        );
    });
    
}
countUserHasVote();
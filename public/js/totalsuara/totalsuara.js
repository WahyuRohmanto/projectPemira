const countUserHasVote = async () => {
    const response = await axios.get('/api/live_count');
    let kandidatData = response.data.data;
    let i = 1;
    kandidatData.forEach(response => {
        $('#myTable tr:last').after(
            `<tr><td>${i++}</td><td>${response.nama_kandidat}</td><td>${response.jumlah_suara}</td></tr>`
        );
    });
    
}
countUserHasVote();
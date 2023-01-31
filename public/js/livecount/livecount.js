const canvasElement = document.getElementById('chartVotingSementara');


// const liveCountChart = () => {
    $.ajax({
        url:'http://127.0.0.1:8000/api/live_count',
        type:'GET',
        dataType:'json',
        success: function(response){
            let kandidatData = response.data;
            let dataJumlahSuara = [];
            let namaKandidat = [];
            
            // console.log(kandidatData);
            kandidatData.forEach(response => {
                dataJumlahSuara.push(response.jumlah_suara);
                namaKandidat.push(response.nama_kandidat);
            });

            new Chart(canvasElement, {
                type: 'bar',
                data: {
                    labels: namaKandidat,
                    datasets: [{
                        label: 'Hasil Vote',
                        data: dataJumlahSuara,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive:true,
                    legend:{position:'bottom'},
                    plugins : {
                        datalabels:{
                            formatter:(value,live_count) => {
                                let sum = 0;
                                const dataArray = live_count.chart.data.datasets[0].data;
                                dataArray.map(data => {
                                    sum += parseInt(data);
                                });
                                let percentage = (value * 100 / sum).toFixed(2)+"%";
                                return percentage;
                            },
                            color:'#fff',
                            backgroundColor:'#000'
                        },
                    }
                },
            });
            // let dataJumlahSuara = kandidat.length == 0 ? [0, 0] : [kandidatData[0].jumlah_suara, kandidatData[1].jumlah_suara];
            // chartVotingSementara.data.labels = namaKandidat;
            // chartVotingSementara.data.datasets[0].data = dataJumlahSuara;
            // chartVotingSementara.update();
            // alert(chartVotingSementara.data.datasets[0].data)
        }
    });
// }
// let i = 1;
// const countDown = () => {
//     console.log(i);
//     document.getElementById('countDown').textContent = i--;
//     if(i === 0) {
//         i = 20;
//         liveCountChart();
//     };
// }
// setInterval(()=> {alert('halow')}), 1000);
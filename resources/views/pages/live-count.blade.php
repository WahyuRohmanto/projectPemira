@extends('layouts.app')
@section('content')
<section class="hero-2 bg-center position-relative" id="home">
  <div class="container">
    <div class="row align-items-center hero-content">
      <div class="col-lg-12">
        <h3 class="text-center display-4 font-weight-semibold mb-3 mt-3 hero-1-title">Live Count</h3>
      </div>
    </div>
  </div>
</section>
<section class="section" id="team">
  <div class="container">
    <div class="row align-items-center hero-content">
      <div class="col-md-6">
        <div class="row align-items-center hero-content">
          {{-- <div class="col-md-6 mt-5">
            <b>Mohamad Rizki Hanif : 1</b>
          </div>
          <div class="col-md-6 mt-5">
            <b>Kotak Kosong : 2 </b>
          </div> --}}
        </div>
      </div>
      <div class="col-md-6">
        <canvas id="live_vote" ></canvas>
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
<script>
  $(document).ready(function(){
    $.ajax({
      url:'http://localhost:8000/live_count',
      type:'GET',
      success: function(data){
        const parsedData = data.data;
        const dataJumlahSuara = [];
        const namaKandidat = [];
        
        console.log(parsedData);
        parsedData.forEach(data => {
          dataJumlahSuara.push(data.jumlah_suara);
          namaKandidat.push(data.nama_kandidat);
        });
        
        new Chart(live_vote, {
          type: 'doughnut',
          backdropColor:'rgba(255, 12, 1, 0.75)',
          data: {
            labels: namaKandidat,
            datasets: [{
              label: 'Perolehan Suara',
              backgroundColor: ["orange", "red"],
              data: dataJumlahSuara
            }]
          },
          options:{
            responsive:true,
            legend:{
              position:'bottom'
            },
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
          }
        });
      }
    });
  });
</script>
@endpush
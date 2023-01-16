<div class="container" id="dpt">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('img/cek-daftar.svg') }}" class="w-100">
        </div>
        <div class="col-md-8 my-5">
            <form name="cek-daftar-pemilih-tetap">
                <h2 class="text-color fw-bold">Cek Daftar Pemilih Tetap</h2>
                <p style="line-height: 175%; color: #777;">sebelum melakukan registrasi ulang, & voting mahasiswa di
                    wajibkan untuk mengecek terlebih dahulu
                    data dirinya sudah terdaftar sebagai pemilih tetap atau belum, untuk mengecek nya bisa mengisikan
                    nim nya dibawah ini.</p>
                <div class="row g-2">
                    <div class="col-md-8">
                        <input type="text" pattern="[0-9].{8,}" class="form-control p-2 px-4 rounded-pill" name="nim"
                            placeholder="Masukan NIM" />
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block rounded-pill bg-color p-2 text-white px-4">
                            <i class="fa fa-paper-plane"></i> Cek
                        </button>
                    </div>
                </div>
            </form>

            <div id="resultDaftarPemilihTetap" class="mt-3"></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
const daftarPemilihTetap = () => {
    const formCekDaftarPemilihTetap = document.forms['cek-daftar-pemilih-tetap'];
    formCekDaftarPemilihTetap.onsubmit = (event) => {
        event.preventDefault();

        axios.post('/api/cekDPT', {
            nim: formCekDaftarPemilihTetap['nim'].value
        }).then((response) => {
            const mahasiswa = response.data.data;
            console.log({
                dpt: mahasiswa.email
            })

            if (response.data.status.toLowerCase() === 'success') {
                let emailResult;
                if (mahasiswa.email == "" || mahasiswa.email == null) {
                    emailResult = 'Anda belum verifikasi';
                } else {
                    emailResult = mahasiswa.email;
                }
                console.log(emailResult);
                document.getElementById('resultDaftarPemilihTetap').innerHTML = `
              <div class="alert alert-success" role="alert">
                Anda Terdaftar Sebagai Pemilih Tetap
              </div>
              <table class="table">
                <thead>
                  <th>NIM</th>
                  <th>Nama</th>
                </thead>  
                <tbody>
                  <tr>
                    <td>${formCekDaftarPemilihTetap['nim'].value}</td>
                    <td>${mahasiswa.name}</td>
                  </tr>
                </tbody>
              </table>
            `;
            }
        }).catch((error) => {
            document.getElementById('resultDaftarPemilihTetap').innerHTML = `
            <div class="alert alert-danger" role="alert">
            NIM Tidak di Temukan
            </div>
          `;
        });
    }
};

daftarPemilihTetap();
</script>
@endpush
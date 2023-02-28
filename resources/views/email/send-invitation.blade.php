<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td, p {
            font-size: 16px;
            /* color:#6D9A86; */
        }
        .section {
            max-width:660px;
            background-color: rgb(255, 255, 255);
            margin:auto;
        }
    </style>
</head>
<body style="background-color:rgb(206, 206, 206)">
    <section class="section">
        <div style="background:#6D9A86;padding:17px;color:white"><h1>Undangan Pemira</h1></div>
        {{-- <img max-width="240" src="{{ asset('/img/bannerpemira-min.jpg')}}"><br> --}}
        <div style="padding:20px">
            <p style="text-align:justify;line-height:1.6">Yang Terhormat,<br>Saudara {{ $mailData['username']}}</p>
            <p style="text-align:justify;line-height:1.6;text-indent:45px">Sehubungan dengan diadakannya <b>Pemilihan Raya (PEMIRA)</b>, kami turut mengundang Saudara {{ $mailData['username']}} untuk 
                hadir pada acara pemilihan Presiden dan Wakil Presiden Mahasiswa tahun 2023 yang akan dilaksanakan pada :</p>

            <table>
                <tr>
                    <td>Hari/Tanggal</td>
                    <td> : </td>
                    <td>Rabu - Kamis, 1 - 2 Maret 2023</td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td> : </td>
                    <td>09.00 - 16.00 WIB</td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td> : </td>
                    <td>Rooftop (Lantai 5) Kampus A, STT Terpadu Nurul Fikri</td>
                </tr>
            </table>
            <p style="text-align:justify;line-height:1.6;text-indent:45px">Ini
                merupakan kesempatan bagi kita untuk memilih pemimpin yang akan memimpin organisasi
                dan memperjuangkan hak dan kepentingan mahasiswa STT Terpadu Nurul Fikri selama satu tahun ke depan. Kami sangat mengharapkan kehadiran dan partisipasi Saudara {{ $mailData['username']}} dalam memilih pemimpin yang terbaik. Jika
                Anda membutuhkan informasi lebih lanjut, silakan hubungi kami melalui 
                <a href="https://api.whatsapp.com/send/?phone=6281511048590&text&type=phone_number&app_absent=0" target="_blank"> 6281511048590</a></p>
            <p>Untuk melakukan Login di sistem voting, berikut adalah username dan password anda : <br> 
            <span style="font-weight:bold">Username : {{$mailData['nim']}}</span><br> 
            <span style="font-weight:bold">Password : {{$mailData['password']}}</span> <br>
            *Mohon untuk tidak menyebarkan informasi ini kepada siapapun</p><br>
            <p>Diakses melalui alamat web resmi <a href="https://pemira.nurulfikri.ac.id/login">KPR STTNF</a></p>
            <p style="text-align:justify;line-height:1.6">Hormat Kami,<br>KPR STTNF</p>
        </div>
    </section>
</body>
 
</html>
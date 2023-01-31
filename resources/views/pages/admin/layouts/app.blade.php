<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - @yield('title')</title>

    <link rel="icon" href="{{ asset('/img/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    @yield('dataTablesCSS')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('pages/admin/partials/sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('pages/admin/partials/navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <main>
                    @yield('content')
                </main>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('pages/admin/partials/footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    {{-- chartjs --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha512-60KwWtZOhzgr840mc57MV8JqDZHAws3w61mhK45KsYHmhyNFJKmfg4M7/s2Jsn4PgtQ4Uhr9xItS+HCbGTIRYQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>
    @yield('dataTablesJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js"
        integrity="sha512-/Q6t3CASm04EliI1QyIDAA/nDo9R8FQ/BULoUFyN4n/BDdyIxeH7u++Z+eobdmr11gG5D/6nPFyDlnisDwhpYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Page level custom scripts -->
    {{-- @method('dashboard-chart') --}}
    <script>
    // axios.get('/api/countRegis').then((response) => {
    //     // index untuk angkatan
    //     const users2018 = 1;
    //     const users2019 = 2;
    //     const users2020 = 3;
    //     const users2021 = 4;

    //     console.log({
    //         countRegis: response
    //     });

    //     const registeredUsers = response.data.data.regis;
    //     const unregisteredUsers = response.data.data.no_regis;

    //     console.log({
    //         registeredUsers
    //     })

    //     // untuk cek apakah value user tahun === index user tahun dan jika salah beri default value 0
    //     const validateRegisteredUserYear = (year, index) => {
    //         if (registeredUsers[index] === undefined) {
    //             return 0;
    //         }
    //         if (registeredUsers[index].tahun === year) {
    //             return registeredUsers[index].jumlah;
    //         }
    //     };

    //     const chartRegisterUsers = new Chart(document.getElementById('chartRegisterUsers'), {
    //         type: 'bar',
    //         data: {
    //             labels: [
    //                 2018, 2019, 2020, 2021
    //             ],
    //             datasets: [{
    //                     label: 'Telah Teregistrasi',
    //                     backgroundColor: [
    //                         'rgba(54, 162, 235, 1)',
    //                         'rgba(54, 162, 235, 1)',
    //                         'rgba(54, 162, 235, 1)',
    //                         'rgba(54, 162, 235, 1)',
    //                     ],
    //                     data: [
    //                         registeredUsers[0].jumlah,
    //                         registeredUsers[1].jumlah,
    //                         registeredUsers[2].jumlah,
    //                         registeredUsers[3].jumlah,
    //                     ],
    //                 },
    //                 {
    //                     label: 'Belum Teregistrasi',
    //                     backgroundColor: [
    //                         'rgba(54, 162, 235, 0.5)',
    //                         'rgba(54, 162, 235, 0.5)',
    //                         'rgba(54, 162, 235, 0.5)',
    //                         'rgba(54, 162, 235, 0.5)',
    //                     ],
    //                     data: [
    //                         unregisteredUsers[users2018].jumlah,
    //                         unregisteredUsers[users2019].jumlah,
    //                         unregisteredUsers[users2020].jumlah,
    //                         unregisteredUsers[users2021].jumlah,
    //                     ],
    //                 },
    //             ],
    //         },
    //         options: {
    //             plugins: {
    //                 title: {
    //                     display: true,
    //                     text: 'Data Mahasiswa yang Melakukan Registrasi'
    //                 }
    //             }
    //         }
    //     });
    // });
    </script>
    {{-- <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script> --}}
    <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400
        });
    });
    </script>
    @include('sweetalert::alert')
</body>

</html>
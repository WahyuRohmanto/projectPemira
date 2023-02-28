@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center item-center ">
    {{-- left container --}}
    <div class="login-container">
        <div class="box-left">
            <div class="sub-container">
                <!-- <h1>KPR STTNF 2023</h1> -->
                <!-- <a href="/">
                    <img src="{{ asset('/img/logo-v2.png') }}" alt="" class="logo-v2" height="200" />
                </a> -->
            </div>
        </div>
        {{-- right container --}}
        <div class="box-right vh-100">
            <div class="box-login br-radius">
                <p class="fs-title">REGISTRASI ULANG</p>
                {{-- <a href="/">
                    <img loading="lazy" src="{{ asset('/img/logo-v2.png') }}" alt="" class="logo-v2" height="150" />
                </a> --}}
				{{-- <h3>REGISTRASI ULANG</h3> --}}
				<p class="mt-2">Masukkan Nim dan Email Aktif anda<br> untuk melakukan registrasi
					Ulang</p>

                {{-- form box --}}
            <!-- @START_Info_Registrasi -->
				<div id="messageRegistrasi" class="d-none justify-content-center w-100 rounded">
					<div class="spinner-border mx-auto" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			<!-- @END_info_registrasi  -->
                <form action="{{route('registerUser')}}" name="register_form" method="POST" class="av-invalid">
                    @csrf
                    <div class="pesan"></div>
					<div class="mb-3">
						<label for="nim" class="form-label fw-bold f-color">NIM</label>
						<input name="nim" required type="text" pattern="[0-9]{10}"
							placeholder="Masukkan Nim anda" id="nim" class="form-control" autocomplete="off"/>
						<small id="messageValidateNim" class="d-none fw-normal invalid-feedback">
							Pastikan NIM benar
						</small>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label fw-bold f-color">Email</label>
						{{-- <small class="text-muted" style="font-size: 12px">Gunakan email kampus
							<b>@student.nurulfikri.ac.id<b></small> --}}
						<input name="email" required placeholder="Masukan email aktif"
							 placeholder="Masukkan Email anda"
							type="email" class="form-control" aria-describedby="inputGroupPrepend3"
							disabled autocomplete="off"/>
					</div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn-login">
                            DAFTAR !
                        </button>
                    </div>
                </form>
                {{-- end form --}}
                {{-- button back and button register --}}
                <div class="d-flex justify-content-between mt-3">
                    {{-- <a href="/admin" class="btn btn-primary text-white">Kembali ke dashboard</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@push('scripts')
	<script>
        const registerForm = document.forms["register_form"];
        // When Form Submited
        // registerForm.addEventListener("submit", async (event) => {
        //     event.preventDefault();
        //     try {
        //         const messageRegistrasi = document.querySelector("#messageRegistrasi");
        //         messageRegistrasi.classList.remove("d-none");
        //         messageRegistrasi.classList.add("d-grid");
        //         const registerResponse = await axios.post("/api/regis", {
        //             nim: registerForm["nim"].value,
        //             email: registerForm["email"].value,
        //         });
        //         switch (registerResponse.data.message) {
        //             case "Email has Already Use Or Register": {
        //                 messageRegistrasi.classList.add("bg-warning");
        //                 messageRegistrasi.innerHTML =
        //                 `<p class="p-2 m-0 text-dark text-center">Email Telah digunakan atau teregistrasi</p>`;
        //                 break;
        //             }
        //             case `Email Success to Registered`: {
        //                 messageRegistrasi.classList.add("d-none");
        //                 messageRegistrasi.innerHTML = `
        //                 <p class="p-2 m-0 text-white text-center">Registrasi NIM ${registerForm["nim"].value} telah berhasil</p>
        //                 `;
        //                 // Sweet Alert
        //                 Swal.fire({
        //                     title: 'Registrasi Berhasil',
        //                     text: `
        //                     NIM ${registerForm["nim"].value} telah teregistrasi
        //                     Mohon cek email ${registerForm["email"].value}
        //                     `,
        //                     icon: 'success',
        //                     confirmButtonText: 'Cool'
        //                 });
        //                 break;
        //             }
        //             default: {
        //                 messageRegistrasi.classList.add('bg-danger')
        //                 messageRegistrasi.innerHTML = `
        //                 <p class="p-2 m-0 text-white text-center">${registerResponse.data.message}</p>
        //                 `;
        //             }
        //         }
        //         console.log({
        //             messageRegister: registerResponse
        //         });
        //     } catch (error) {
        //         console.log({
        //             registerErrors: error
        //         });
        //     }
        // });
        // check nim is exist or not
        registerForm["nim"].addEventListener("keyup", async () => {
            try {
                const checkNimResponse = await axios.post("/api/checkNim", {
                    nim: registerForm["nim"].value
                });
                if (checkNimResponse.data.status.toLowerCase() === "success") {
                    registerForm["nim"].classList.remove("is-invalid")
                    registerForm["email"].removeAttribute("disabled");
                    // registerForm["submit"].removeAttribute("disabled");
                    document.querySelector("#messageValidateNim").classList.add("d-none")
                }
            } catch (error) {
                if (error) {
                    registerForm["nim"].classList.add("is-invalid")
                    registerForm["email"].setAttribute("disabled", "true");
                    // registerForm["submit"].setAttribute("disabled", "true");
                    document.querySelector("#messageValidateNim").classList.remove("d-none")
                }
            }
        });
        // When Email Invalid
        registerForm["email"].addEventListener("invalid", () => {
            registerForm["email"].classList.add("is-invalid");
            document.querySelector("#messageValidateEmail").classList.remove("d-none");
        });
	</script>
@endpush

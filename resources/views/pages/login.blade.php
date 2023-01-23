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
                <p class="fs-title">KPR STTNF 2023</p>
                <a href="/">
                    <img src="{{ asset('/img/logo-v2.png') }}" alt="" class="logo-v2" height="200" />
                </a>
                <p class="fs-label f-color mt-4">Login</p>

                {{-- form box --}}
                <form name="login_form" action="{{ route('auth') }}" method="POST" class="av-invalid">
                    @csrf
                    <div class="pesan"></div>
                    <div class="mb-3">
                        <label for="nim" class="form-label f-color">NIM</label>
                        <input name="nim" required id="nim" pattern="[0-9]{10}" type="text" class="bg-input" />
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="userpassword" class="form-label f-color">Password</label>
                        <input name="password" minlength="4" required id="userpassword" type="password"
                            class="bg-input" />
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn-login">
                            Login
                        </button>
                    </div>
                </form>
                {{-- end form --}}
                {{-- button back and button register --}}
                <div class="d-flex justify-content-between mt-3">
                    <a hidden href="/" class="btn btn-light shadow-sm border" style="color: #333">Kembali ke Halaman
                        Utama</a>
                    <a hidden href="/register" class="btn btn-primary text-white">Halaman Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
{{-- <script>
      const loginForm = document.forms['login_form'];
      loginForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        try {
          const loginResponse = await axios.post('/api/login', {
            nim: loginForm['nim'].value,
            password: loginForm['password'].value,
          });

          console.log(loginResponse);
        } catch (error) {
          console.log({ loginErrors: error });
        }
      });
    </script> --}}
@endpush

<!-- MASIH ADA SCRIPT YANG BELOM DI PANGGIL --->
@endsection
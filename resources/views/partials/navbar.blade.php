<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand text-color" href="{{ Request::is('voting') ? '/' : '#' }}">
            <img loading="lazy" src="{{ asset('/img/logo-v2.png') }}" class="logo-icon" />
            <span class="mx-2 mt-5 fw-bold">PEMIRA</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end w-100">
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{ Request::is('voting') ? '/' : '#' }}">
                        Home
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ Request::is('voting') ? '/#count' : '#count' }}">
                        LiveCount
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ Request::is('voting') ? '/#saran' : '#saran' }}">
                        Saran
                    </a>
                </li>
                @if (Auth::check())
                <li class="nav-item mx-2 border border-2 rounded-pill px-2">
                    <a class="nav-link fw-bold" href="#" onclick="document.getElementById('form-logout').submit()">
                        <i class="fa fa-sign-out"></i>Logout
                    </a>
                </li>
                @else
                <li class="nav-item mx-2 border border-2 rounded-pill px-2">
                    <a class="nav-link fw-bold" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
                @endif
                <form action="{{ route('logout') }}" method="POST" id="form-logout">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>

{{-- @push('scripts')
	<script>
		const navbarChangedStyle = () => {
			const navbar = document.querySelector("#navbar");
			const navLinkPrimary = document.querySelector(".nav-link-primary");
			const navLinkSecondary = document.querySelectorAll(".nav-link-secondary");
			if (
				document.body.scrollTop >= 50 ||
				document.documentElement.scrollTop >= 50
			) {
				navbar.classList.add("nav-sticky");
				navLinkSecondary.forEach((_navLinkSecondary) => {
					_navLinkSecondary.classList.add("text-dark");
					_navLinkSecondary.classList.remove("text-white");
				});

				navLinkPrimary.classList.add("btn-primary", "text-white");
				navLinkPrimary.classList.remove("btn-light", "text-dark");
			} else {
				navbar.classList.remove("nav-sticky");
				navLinkSecondary.forEach((_navLinkSecondary) => {
					_navLinkSecondary.classList.add("text-white");
					_navLinkSecondary.classList.remove("text-dark");
				});
				navLinkPrimary.classList.add("btn-light", "text-dark");
				navLinkPrimary.classList.remove("btn-primary", "text-white");
			}
		};

		window.addEventListener('scroll', (ev) => {
			ev.preventDefault();
			navbarChangedStyle();
		});
	</script>
@endpush --}}
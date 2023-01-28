import '../css/bootstrap.min.css';
// import '../css/materialdesignicons.min.css';
import './bootstrap.bundle.min';
// import './jquery.min'
// import '../css/materialdesignicons.min.css';
import feather from './feather.min';

// AOS
import AOS from 'aos/dist/aos';
import 'aos/dist/aos.css';
AOS.init();


function fadeIn() {
	var fade = document.getElementById("error-msg");
	var opacity = 0;
	var intervalID = setInterval(function () {
		if (opacity < 1) {
			opacity = opacity + 0.5
			fade.style.opacity = opacity;
		} else {
			clearInterval(intervalID);
		}
	}, 200);
}

    setTimeout(function() {
        document.getElementById('choice').style.display = 'block';
    }, 2000);


// feather icon
feather.replace();



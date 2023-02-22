// sweet alert for vote button
const submitButtons = document.querySelectorAll('.vote-btn');
submitButtons.forEach(function(submitButton) {
    submitButton.addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6d9a86',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.value) {
                submitButton.parentElement.submit();
            }
        });
    });
});

setTimeout(function() {
  document.getElementById("mulai").style.display = "block";
}, 1000);

setTimeout(function() {
  document.getElementById("mulai2").style.display = "block";
}, 4000);

$(document).ready(function() {
    $("#pass").html("Ini adalah teks baru menggunakan html()"); // Mengganti isi dengan html()
  });

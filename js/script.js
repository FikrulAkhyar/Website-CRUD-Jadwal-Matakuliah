const message = $('#message').data('message');

if (message) {
    if (message == "Berhasil") {
        Swal.fire({
            title: message,
            icon: "success",
            button: "OK"
        });
    } else {
        Swal.fire({
            title: message,

            icon: "warning",
            button: "OK"
        });
    }
}
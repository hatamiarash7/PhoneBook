function deleteContact($id) {
    swal("آیا مطمئن هستید ؟", {
        closeOnClickOutside: false,
        dangerMode: true,
        buttons: {
            cancel: "خیر",
            confirm: {
                text: "بله",
                value: true,
                visible: true,
                className: "",
                closeModal: true
            }
        }
    }).then(function (value) {
        if (value) {
            var p = "id=" + $id;
            url = "delete.php?" + p;
            window.location.href = url;
        }
    });
}
$(document).ready(function () {
    var showalertIsnert = $('.alert.alert-success.insert_success');
    var showalertEdit = $('.alert.alert-success.update_success');
    setTimeout(
        function () {
            if (showalertIsnert.length) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Thêm thành công",
                    showConfirmButton: false,
                    timer: 1500,
                });
            }else if(showalertEdit.length){
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Sửa thành công",
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        }
    )


    $('.deleted').on('click', function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                }).then(() => {
                    $(event.target).closest('form').submit();
                });
            }
        });
    });

    $('#editProfile').on('click', function() {
        var removeDisabled = document.getElementsByClassName('remove-disabled');
        for(var i = 0; i < removeDisabled.length; i++) {
            removeDisabled[i].disabled = false;
        }
        console.log(removeDisabled);
    });

});

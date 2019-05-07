$(function () {


    $('.tbn-hapus').on('click', function (e) {
        e.preventDefault();

        const href = $(this).attr('href');


        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-2',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'

                )

                setTimeout(function () {
                    document.location.href = href;
                }, 2000);
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })

    });

    $('tbn-tambahdata').on('click', function () {
        $('#judulModallabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });


    $('.tbn-ubah').on('click', function () {
        $('#judulModallabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');

        $('.modal-body form').attr('action', 'http://localhost:8080/phpmvc/public/mahasiswa/ubah')
        // AJAX
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost:8080/phpmvc/public/mahasiswa/getubah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);

            }
        });

    });


    const fless = $('.fless').data('fless');
    if (fless) {


        setTimeout(function () {
            Swal.fire(
                'Data Berasil' + " " + fless,
                'You clicked the button!',
                'success'
            )
        }, 200);
    }


    $('.tbn-home').on('click', function () {
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    });
});
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire ({
        title: 'Success',
        text: flashData,
        icon: 'success'
    });
}

const flashGagal = $('.flash-gagal').data('flashdata');

if (flashGagal) {
    Swal.fire ({
        title: 'Error',
        text: flashGagal,
        icon: 'error'
    });
}


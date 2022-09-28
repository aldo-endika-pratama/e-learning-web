$(document).ready(function() {
    $('#mulaiQuiz').flatpickr();
    $('#berakhirQuiz').flatpickr();

    $("#simpanSoal").on("click", function() {
        $.toast({
            heading: 'Notifikasi !',
            text: '<h5>Loading Simpan Data . .</h5>',
            position: 'top-center',
            icon: 'warning',
            loaderBg: '#509532',
            bgColor: '#F8B90D',
            hideAfter: 1500,
            stack: false,
            showHideTransition: 'slide',
            textAlign: 'center',
            afterHidden: function() {
                $('#formSoal').submit();
            }
        })
    })

    $("#simpanUser").on("click", function() {
        $.toast({
            heading: 'Notifikasi !',
            text: '<h5>Loading Simpan Data . .</h5>',
            position: 'top-center',
            icon: 'warning',
            loaderBg: '#509532',
            hideAfter: 1500,
            stack: false,
            showHideTransition: 'slide',
            textAlign: 'center',
            afterHidden: function() {
                $('#formUser').submit();
            }
        })
    })

})
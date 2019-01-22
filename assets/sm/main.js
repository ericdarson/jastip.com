$(document).ready(function(){    
  $('.ui.dropdown').dropdown();

  $('.ui.form').form({
      fields: {
        username: {
          identifier: '_username',
          rules: [
            {
              type   : 'empty',
              prompt : 'Silahkan masukan Username'
            },
            {
              type   : 'minLength[3]',
              prompt : 'Panjang minimal Username 3 karakter'
            },
            {
              type   : 'maxLength[20]',
              prompt : 'Panjang maksimal Username 20 karakter'
            }
          ]
        },
        email: {
          identifier  : '_email',
          rules: [
            {
              type   : 'empty',
              prompt : 'Silahkan masukan e-mail'
            },
            {
              type   : 'email',
              prompt : 'Masukan e-mail yang valid'
            }
          ]
        },
        password: {
          identifier  : '_password',
          rules: [
            {
              type   : 'empty',
              prompt : 'Silahkan masukan Password'
            },
            {
              type   : 'minLength[5]',
              prompt : 'Panjang Password minimal 5 karakter'
            }
          ]
        },
        name: {
          identifier: '_nama_lengkap',
          rules: [
            {
              type   : 'empty',
              prompt : 'Silahkan masukan Nama Lengkap'
            },
            {
              type   : 'minLength[5]',
              prompt : 'Nama Lengkap minimal 5 karakter'
            },
            {
              type   : 'maxLength[35]',
              prompt : 'Nama Lengkap maksimal 35 karakter'
            }
          ]
        },
        gender: {
          identifier: 'gender',
          rules: [
            {
              type   : 'empty',
              prompt : 'Silahkan Pilih Jenis Kelamin'
            }
          ]
        },
        address: {
          identifier: '_alamat',
          rules: [
            {
              type   : 'empty',
              prompt : 'Masukan Alamat sah.'
            }
          ]
        }
      }
    });

  $('.message .close').on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  });
  $('[data-toggle="modal"]').on('click', function(){
    $('.ui.modal.checkout').modal({
      blurring: true
    }).modal('show');
  });

});
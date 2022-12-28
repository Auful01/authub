@extends('auth.layout')

@section('content')
<div class="row d-flex">
    <div class="col-md-6 my-auto" style="background: #013365; padding-top: 5%;padding-bottom: 10%">

        <img src="https://assets.zyrosite.com/dJo8n6nvr0HrLwZg/malang-4-YbNOOG6K7pF554xb.gif" alt="" style="width: 100%;height: 100%;">
        <div class="text-center mb-3">
            <h3 class="d-flex justify-content-center" style="font-weight: 800">
              <p class="m-0" style="color: rgb(248, 248, 248)">ub</p>
              <p class="m-0" style="color: rgb(230, 103, 0)">
                  designthinking.id
              </p>
             </h3>
         </div>
    </div>
    <div class="col-md-6">
        <div style="margin-top: 25%;">
            <div class="text-center mb-3">
               <h3 class="d-flex justify-content-center" style="font-weight: 800">
                 <p class="m-0" style="color: #013365">Regi</p>
                 <p class="m-0" style="color: rgb(230, 103, 0)">
                    ster
                 </p>
                </h3>
            </div>
            <div class="card mx-auto shadow" style="width: 70%;border-radius: 10px;border: 0">

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control form-control-sm" name="email" id="email" aria-describedby="helpId" placeholder="example@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm" id="password">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-light" id="see-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm" id="password-confirmation">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-light" id="see-password-confirmation">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-light" id="btn-kembali">
                            Kembali
                        </button>&nbsp;
                        <button class="btn btn-sm" id="btn-register" style="background: #013365; color:white;border-radius: 5px">
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('#btn-kembali').on('click', function () {
        window.location.pathname = "/"
    })

    $('#see-password').on('click', function () {
        if ($('#password').attr('type') == 'password') {
            $('#password').attr('type', 'text')
            $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash')
        } else {
            $('#password').attr('type', 'password')
            $(this).find('i').addClass('fa-eye').removeClass('fa-eye-slash')
        }
    })

    $('#see-password-confirmation').on('click', function () {
        if ($('#password-confirmation').attr('type') == 'password') {
            $('#password-confirmation').attr('type', 'text')
            $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash')
        } else {
            $('#password-confirmation').attr('type', 'password')
            $(this).find('i').addClass('fa-eye').removeClass('fa-eye-slash')
        }
    })

    $('#btn-register').on('click', function () {
        var name = $('#name').val()
        var email = $('#email').val()
        var password = $('#password').val()
        var password_confirmation = $('#password-confirmation').val()
        console.log(name);

        if (name == '' || email == '' || password == '' || password_confirmation == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Semua field harus diisi!',
            })
        } else {
            if (password != password_confirmation) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password tidak sama!',
                })
            } else {
                $.ajax({
                    url: '/api/register',
                    type: 'POST',
                    data: {
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Akun Berhasil Didaftarkan!',
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.pathname = "/"
                            }
                        })
                    },
                    error: function (response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Email sudah terdaftar!',
                        })
                    }
                })
            }
        }
    })
</script>

@endsection

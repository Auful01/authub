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
                 <p class="m-0" style="color: #013365">Log</p>
                 <p class="m-0" style="color: rgb(230, 103, 0)">
                    in
                 </p>
                </h3>
            </div>
            <div class="card mx-auto shadow" style="width: 70%;border-radius: 10px;border: 0">

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control form-control-sm" name="email" id="email" aria-describedby="helpId" placeholder="example@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm" id="password">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-light">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-2">
                        <a href="{{url('/register')}}" class="btn btn-link btn-sm p-0 my-auto">Belum punya akun?</a>

                        <button class="btn btn-sm" id="btn-login" style="background: #013365; color:white;border-radius: 5px">
                            Login
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
        $('#btn-login').on('click', function () {
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                url: "/api/login",
                type: "POST",
                data: {
                    email: email,
                    password: password,
                },
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Login Berhasil',
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    })

                    setTimeout(() => {
                        window.location = 'https://ubdesignthinking.id/home';
                    }, 2000);
                },
                error : function (data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: data.responseJSON.message,
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    })
                }
            })

        })
    </script>
@endsection

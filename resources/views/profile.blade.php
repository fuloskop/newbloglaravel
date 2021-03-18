@extends('layouts')


@section('content')

    <div class="jumbotron">
        <h3 class="display-4">Şifre İşlemleri</h3>



        <form method="POST" action="{{route('profile.changepass')}}" >
        <div class="row">
            <div class="col-sm-2 lead">Şifre değişimi : </div>
            @csrf
        <div class="col-sm-8">
            <label class="lead" for="current_password">Eski Şifre:</label>
            <input type="password" class="form-control" id="current_password" name="current_password">

            <label class="lead" for="password">Yeni Şifre:</label>
            <input type="password" class="form-control" id="password" name="password" onkeyup='check();'>

            <label class="lead" for="password_confirm">Yeni Şifre Tekrar:</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" onkeyup='check();'>
            <span id='message'></span>
            @if ($message = Session::get('error'))
                <div class="text-center w-full p-t-23">
                    <a href="#" class="txt1">
                        {{Session::get('msg')}}
                    </a>
                </div>
            @endif
        </div>
        <hr class="my-4">
            <input class="btn btn-primary btn-lg col-sm-2" type="submit" id="submit" value="Şifre Güncelle" >
        </div>
        </form>

    </div>

    <script>
        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('password_confirm').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
                document.getElementById("submit").disabled = false;
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
                document.getElementById("submit").disabled = true;
            }
        }
    </script>
@endsection

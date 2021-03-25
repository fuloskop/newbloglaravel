@extends('layouts')


@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="jumbotron">

        <h5 class="display-5">Avatar İşlemleri</h5>

        <form action="{{route('profile.changeavatar')}}" method="POST" enctype="multipart/form-data" >
            @csrf

            @if($user->avatar_adress!=null)
                <div class="mb-3">
                    <a href="http://127.0.0.1:8000/images/{{$user->avatar_adress}}">
                        <img src="http://127.0.0.1:8000/images/{{$user->avatar_adress}}" width="80" height="80">
                    </a>

                    <a href="{{route('profile.deleteavatar')}}" class="btn btn-danger">Foto Sil</a>
                </div>
            @endif
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="input_img" name="input_img">
                <label class="custom-file-label" for="input_img">Dosya Seç (JPEG,PNG,JPG,GIF)</label>
            </div>
            @if(session()->has('success_avatar'))
                <div class="alert alert-success">
                    {{ session()->get('success_avatar') }}
                </div>
            @endif
            <span id='messagefile'></span>
            <div class="mt-3">
                <button type="submit" id="submitfile" class="btn btn-primary btn-lg col-sm-2">Avatar Değiştir</button>
            </div>
        </form>

        <hr class="my-4">

        <h5 class="display-5">Şifre İşlemleri</h5>



        <form method="POST" action="{{route('profile.changepass')}}" >
        <div class="row ">
            <div class="col-sm-2 lead">Şifre değişimi : </div>
            @csrf
        <div class="col-sm-8">
            <label class="lead" for="current_password">Eski Şifre:</label>
            <input type="password" class="form-control" id="current_password" name="current_password">

            <label class="lead" for="password">Yeni Şifre:</label>
            <input type="password" class="form-control" id="password" name="password" onkeyup='check();'>

            <label class="lead" for="password_confirmation">Yeni Şifre Tekrar:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" onkeyup='check();'>
            <span id='messagepass'></span>
        </div>

            <div class="blockquote-footer m-3">
                Last update
                    {{\Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}

            </div>
            @if(session()->has('success_pass'))
                <div class="alert alert-success">
                    {{ session()->get('success_pass') }}
                </div>
            @endif

        </div>
            <div class="d-flex justify-content-between">
            <input class="btn btn-primary btn-lg col-sm-2" type="submit" id="submit" value="Şifre Güncelle" >

            </div>
    </form>
        <hr class="my-4">

    </div>
    <script>
        $('#input_img').bind('change', function() {
            if(this.files[0].size>5368709){
                document.getElementById("submitfile").disabled = true;
                document.getElementById('messagefile').innerHTML = 'Boyut bu işlem için çok büyük...';
            }
            else{
                document.getElementById("submitfile").disabled = false;
                document.getElementById('messagefile').innerHTML = '';
            }
        });

    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });


    </script>

    <script>

        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('password_confirmation').value) {
                document.getElementById('messagepass').style.color = 'green';
                document.getElementById('messagepass').innerHTML = 'matching';
                document.getElementById("submit").disabled = false;
            } else {
                document.getElementById('messagepass').style.color = 'red';
                document.getElementById('messagepass').innerHTML = 'not matching';
                document.getElementById("submit").disabled = true;
            }
        }
    </script>
@endsection

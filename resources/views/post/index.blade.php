@extends('layouts')


@section('content')



<div>
    @foreach($posts as $post)
        <div class="card">
            <div class="card-body">
                <div class="card-title border ">
                    <h5>{{ $post->title }}</h5>
                </div>

                <p class="card-text border ">{{ $post->content }}</p>
                <div class="w3-bar">
                @if(isset(Auth::user()->email))
                    @if((int)Auth::user()->id == (int)$post->user_id)
                    <form action="{{ route('post.edit',['post' => $post])  }}" style="display: inline;" >
                        @csrf
                        @method('edit')
                        <input type="submit" class="btn btn-success " value="Edit">
                    </form>
                <form action="{{ route('post.destroy',['post' => $post]) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                    @endif
                @endif
                </div>
            </div>
        </div>
    @endforeach

        {{$posts->links("pagination::bootstrap-4")}}
</div>
@endsection

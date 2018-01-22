@extends ('layouts.master')

@section ('content')
    <div class="col-sm-8 blog-main">
        <h1>{{ $post->title }}</h1>

        {{ $post->body }}

        <hr>
        <div class="comments">
            <ul class="list-group">
                @foreach($post->comments as $comment)

                    <li class="list-group-item">
                        <strong>
                            {{ $comment->created_at->diffForHumans() }} :&nbsp;
                        </strong>
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>

        </div>

        <hr>
        {{-- Add a comment --}}
        <div class="card">
            <div class="card-block">
                <form method="POST" action="/posts/{{ $post->id }}/comments">
                    {{-- method_field('PATCH || PUT') --}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" placeholder="Your comment here" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Add Comment</button>
                    </div>
                    @include ('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection

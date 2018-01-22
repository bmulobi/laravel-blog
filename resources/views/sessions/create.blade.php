@extends ('layouts.master')

@section ('content')
    <div class="col-md-8">
        <h1>Sign in</h1>

        <form action="/login" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email</label>

                <input type="email" id="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        @include ('layouts.errors')
    </div>
@endsection

<div class="container-xl">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {!! session('success') !!}
        </div>
    @elseif(isset($success))
        <div class="alert alert-success" role="alert">
            {!! $success !!}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {!! session('error') !!}
        </div>
    @elseif(isset($error))
        <div class="alert alert-danger" role="alert">
            {!! $error !!}
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
</div>
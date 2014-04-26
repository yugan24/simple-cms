@section('title', 'Login::Admin')
@section('content')
<div class="row" style="margin-top: 140px">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please sign in</h3>
            </div>
            <div class="panel-body">
                {{ Form::open() }}
                <div class="body bg-gray">
                    @if ($errors->has('login'))
                    <p class="text-danger">{{ $errors->first('login', ':message') }}</p>
                    @endif
                    <div class="form-group">
                        {{ Form::text('email','',array(
                                'class' => 'form-control',
                                'placeholder'=> 'Email')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password',array(
                                 'class' => 'form-control',
                                 'placeholder'=> 'Password')) }}
                    </div>
                </div>
                <div class="footer">
                    {{ Form::submit('Sign me in', array('class' => 'btn btn-lg btn-success btn-block')) }}
                    <p><a href="#">I forgot my password</a></p>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop
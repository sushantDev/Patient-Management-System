@if( ! empty($errors->all()))
    <div class="alert alert-callout alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            <?php $dumpErrors = []; ?>
            @foreach( $errors->all() as $pos => $error )
                @if( !in_array($error, $dumpErrors) )
                    <li>{{ $error }}</li>
                    <?php $dumpErrors[] = $error; ?>
                @endif
            @endforeach
        </ul>
    </div>
@endif
@if(session('status'))
    <div class="alert alert-callout alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>{!! session('status') !!}</p>
    </div>
@endif
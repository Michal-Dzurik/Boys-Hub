@if ($message = Session::get('success'))
    <div class="alert-container overlay-closable">
        <p class="alert alert-success">{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert-container overlay-closable">
        <p class="alert alert-error">{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('warning'))
<div class="alert-container overlay-closable">
    <p class="alert alert-warning">{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('info'))
    <div class="alert-container overlay-closable">
        <p class="alert alert-info">{{ $message }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="alert-container overlay-closable">
        @foreach($errors->all() as $error)
            <p class="alert alert-error">{{ $error }}</p>
        @endforeach
    </div>
@endif

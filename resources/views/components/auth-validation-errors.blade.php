@props(['errors'])

@if ($errors->any())
<div {{ $attributes }}>
    <div class="col-6 offset-3 alert alert-danger fixed-top" role="alert">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>
</div>

@endif
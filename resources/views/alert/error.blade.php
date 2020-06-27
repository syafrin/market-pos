@if($errors->any())
    <ul class="alert alert-danger alert-block">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
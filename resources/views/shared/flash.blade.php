@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
{{--hint to display errors from the session--}}
{{--        @if($errors->any())--}}
{{--            <ul class="alert alert-danger">--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        @endif--}}
@yield('content')

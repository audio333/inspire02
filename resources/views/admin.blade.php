@include('includes.header')

    <admin :user="{{ auth()->user() }}"></admin>

@include('includes.footer')

@include('includes.header')

    <admin :user="{{ auth()->user()->load('notifications') }}"></admin>

@include('includes.footer')

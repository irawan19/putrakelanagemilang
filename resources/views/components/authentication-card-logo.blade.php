@php($aplikasi = \App\Models\Aplikasi::first())
<a href="{{URL('/')}}">
    <img src="{{URL::asset('storage/'.$aplikasi->logo_aplikasis)}}" width="128px">
</a>
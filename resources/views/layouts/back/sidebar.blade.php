@php($id_users = Auth::user()->id)
@php($aplikasi = App\Models\Aplikasi::first())
<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom" style="margin: 0 auto">
        <div class="sidebar-brand">
            <a class="anostylewhite" href="{{URL('/')}}" target="_blank">
                <img class="sidebar-brand-full" width="162" src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis)}}">
                <img class="sidebar-brand-narrow" width="32" src="{{URL::asset('storage/'.$aplikasi->logo_text_aplikasis)}}">
            </a>
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{URL('/dashboard')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{URL::asset('template/back/vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                </svg> Dashboard
            </a>
        </li>
        <li class="nav-title">Data</li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL('/dashboard/slideshow')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{URL::asset('template/back/vendors/@coreui/icons/svg/free.svg#cil-featured-playlist')}}"></use>
                    </svg> Slideshow
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL('/dashboard/sosial-media')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{URL::asset('template/back/vendors/@coreui/icons/svg/free.svg#cil-share-alt')}}"></use>
                    </svg> Sosial Media
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL('/dashboard/kontak')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{URL::asset('template/back/vendors/@coreui/icons/svg/free.svg#cil-chat-bubble')}}"></use>
                    </svg> Kontak
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL('/dashboard/pesan')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{URL::asset('template/back/vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
                    </svg> Pesan
                </a>
            </li>
        </li>
        <li class="nav-title">Pengaturan</li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL('/dashboard/admin')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{URL::asset('template/back/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                    </svg> Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL('/dashboard/aplikasi')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{URL::asset('template/back/vendors/@coreui/icons/svg/free.svg#cil-settings')}}"></use>
                    </svg> Aplikasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL('/dashboard/logout')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{URL::asset('template/back/vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                    </svg> Keluar
                </a>
            </li>
        </li>
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
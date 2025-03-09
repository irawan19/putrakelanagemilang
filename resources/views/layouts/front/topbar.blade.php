
<div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
    <div class="container">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <div class="ps-3">
                        <a href="mailto:{{$kontak->email_kontaks}}" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>{{ $kontak->email_kontaks }}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex justify-content-end">
                    <div class="d-flex pe-3">
                        @foreach($sosial_medias as $sosial_media)
                            <a class="btn p-0 text-primary me-3" href="{{ $sosial_media->url_sosial_medias }}" target="_blank"><i class="fab fa-{{$sosial_media->icon_sosial_medias}}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
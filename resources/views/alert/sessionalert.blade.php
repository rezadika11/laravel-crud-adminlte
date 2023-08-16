@if (session()->has('sukses'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Sukses</h5>
        {{ session('sukses') }}
    </div>
@endif
@if (session()->has('gagal'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
        {{ session('gagal') }}
    </div>
@endif

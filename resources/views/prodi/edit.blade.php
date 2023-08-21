@extends('layouts.main')
@section('title', 'Edit Prodi')
@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('alert.sessionalert')
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Prodi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text"
                                        class="form-control @error('kode')
                                        is-invalid
                                    @enderror"
                                        name="kode" value="{{ old('kode', $prodi->kode) }}">
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text"
                                        class="form-control @error('nama')
                                        is-invalid
                                    @enderror"
                                        name="nama" value="{{ old('nama', $prodi->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <a href="{{ route('prodi.index') }}" class="btn btn-default">Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

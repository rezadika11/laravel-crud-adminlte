@extends('layouts.main')
@section('title', 'Tambah Mahasiswa')
@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('alert.sessionalert')
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('mahasiswa.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text"
                                        class="form-control @error('nama')
                                        is-invalid
                                    @enderror"
                                        name="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text"
                                        class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                        name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Prodi</label>
                                    <select class="form-control select2 {{ $errors->has('prodi') ? 'is-invalid' : '' }}"
                                        name="prodi" style="width: 100%;">
                                        <option selected disabled>Pilih Prodi</option>
                                        @foreach ($prodi as $prod)
                                            <option value="{{ $prod->id }}"
                                                {{ old('prodi') == $prod->id ? 'selected' : '' }}>
                                                {{ $prod->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('prodi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea
                                        class="form-control @error('alamat')
                                is-invalid
                            @enderror"
                                        name="alamat" cols="30" rows="10">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="text"
                                        class="form-control @error('no_hp')
                                        is-invalid
                                    @enderror"
                                        name="no_hp" value="{{ old('no_hp') }}">
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-default">Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush

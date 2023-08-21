@extends('layouts.main')
@section('title', 'Mahasiswa')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('alert.sessionalert')
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                                Tambah</a>
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Prodi</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $mhs)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mhs->nama }}</td>
                                            <td>{{ $mhs->email }}</td>
                                            <td>{{ $mhs->prodi->nama }}</td>
                                            <td>{{ $mhs->alamat }}</td>
                                            <td>{{ $mhs->no_hp }}</td>
                                            <td>
                                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-success"><i
                                                        class="fas fa-edit"></i>
                                                    Edit</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalHapusMhs{{ $mhs->id }}"><i
                                                        class="fas fa-trash-alt"></i>
                                                    Hapus</button>
                                                @include('modal.modal-hapus-mhs')
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $('#datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush

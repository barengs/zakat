@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jenis Zakat</small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Zakat</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Jenis-Jenis Zakat</h3>
                                <div class="card-tools">
                                    <a href="{{ route('zakat.tambah') }}" class="btn btn-primary btn-sm">Tambah</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Zakat</th>
                                            <th>Jenis Zakat</th>
                                            <th style="width: 40px">Persentase</th>
                                            <th>Nishab</th>
                                            <th style="width: 40px">Satuan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr id="index-{{ $item->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_zakat }}</td>
                                                <td>{{ $item->jenis_zakat }}</td>
                                                <td class="text-center">
                                                    {{ $item->persentase }}%
                                                </td>
                                                <td>
                                                    {{ $item->minimal }}
                                                </td>
                                                <td>
                                                    {{ $item->satuan ? $item->satuan->nama : '-' }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-info btn-sm" data-toggle="modal">Detil</a>
                                                        <a href="{{ route('zakat.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">Ganti</a>
                                                        <a href="javascript:void(0)"
                                                            data-url="{{ route('zakat.delete', $item->id) }}" id="delete"
                                                            data-id="{{ $item->id }}"
                                                            class="btn btn-danger btn-sm">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('table').on('click', '#delete', function() {
                let dataURL = $(this).data('url');
                let id = $(this).data('id');
                let trObj = $(this);
                let token = $("meta[name='csrf-token']").attr("content");

                Swal.fire({
                    title: 'Apakah yakin?',
                    text: 'kamu akan menghapus data ini!!!',
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'TIDAK',
                    confirmButtonText: 'YA, HAPUS!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: dataURL,
                            type: 'DELETE',
                            cache: false,
                            data: {
                                '_token': token
                            },
                            success: function(res) {
                                Swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: `${res.message}`,
                                    showConfirmButton: false,
                                    timer: 3000
                                });

                                //remove post on table
                                $(`#index-${id}`).remove();
                            }
                        })
                    }
                })
            })
        })
    </script>
@endpush

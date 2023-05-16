@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Info Zakat</small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Info</li>
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
                                <h3 class="card-title">Info Zakat</h3>
                                <div class="card-tools">
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Kembali</a>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="activity">
                                        <!-- Post -->
                                        @foreach ($data as $item)
                                            <div class="post">
                                                <div class="user-block">
                                                    <span class="username">
                                                        <a href="#">{{ $item->nama_zakat }}</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                                </div>
                                                <!-- /.user-block -->
                                                <p>
                                                    {{ $item->keterangan ? $item->keterangan : 'belum ada keterangan' }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

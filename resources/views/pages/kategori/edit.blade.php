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
                            <li class="breadcrumb-item"><a href="{{ route('zakat.index') }}">Zakat</a></li>
                            <li class="breadcrumb-item active">Ubah</li>
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
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Ubah Jenis Zakat</h3>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('zakat.update', $data->id) }}" class="form-horizontal">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Zakat</label>
                                        <div class="col-sm-10">
                                            <input name="nama" value="{{ $data->nama_zakat }}" type="text"
                                                class="form-control" id="nama" placeholder="Tulis nama zakat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis" class="col-sm-2 col-form-label">Jenis Zakat</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select name="jenis" class="form-control select2bs4" style="width: 100%;">
                                                    @if ($data->jenis_zakat == 'langsung')
                                                        <option value="{{ $data->jenis_zakat }}" selected="selected">
                                                            {{ $data->jenis_zakat }}</option>
                                                        <option value="tidak langsung">Tidak Langsung</option>
                                                    @else
                                                        <option value="{{ $data->jenis_zakat }}" selected="selected">
                                                            {{ $data->jenis_zakat }}</option>
                                                        <option value="langsung">Langsung</option>
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="satuan" class="col-sm-2 col-form-label">Satuan Zakat</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select name="satuan" class="form-control select2bs4" style="width: 100%;">
                                                    @if ($data->satuan)
                                                        @foreach ($satuan as $item)
                                                            <option value="{{ $item->id }}"
                                                                @selected($data->satuan->id == $item->id)>
                                                                {{ $item->nama }}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach ($satuan as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->nama }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="persen" class="col-sm-2 col-form-label">Persentase</label>
                                        <div class="col-sm-10">
                                            <input name="persen" value="{{ $data->persentase }}" type="number"
                                                class="form-control" id="persen"
                                                placeholder="Tulis angka persentase zakat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="minimal" class="col-sm-2 col-form-label">Nishab</label>
                                        <div class="col-sm-10">
                                            <input name="minimal" value="{{ $data->minimal }}" type="number"
                                                class="form-control" id="minimal" placeholder="Tulis angka nishab zakat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="keterangan" id="" cols="30" rows="3"
                                                placeholder="Tulis informasi tengang zakat disini">{{ $data->keterangan }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="{{ route('zakat.index') }}" class="btn btn-default">Batal</a>
                                    <button type="submit" class="btn btn-info float-right">Simpan Perubahan</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush

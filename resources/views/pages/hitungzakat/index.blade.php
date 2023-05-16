@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hitung Zakat</small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Hitung Zakat</li>
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
                                <h3 class="card-title">Hitung Zakat</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Zakat</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Kategori Zakat</th>
                                                    <th>Jenis Zakat</th>
                                                    <th style="width: 40px">Persentase</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>
                                                            <input onchange="javascript:void(0)"
                                                                data-id="{{ $item->id }}"
                                                                data-url="{{ route('hitung.show', $item->id) }}"
                                                                type="radio" id="radio" name="radio">
                                                        </td>
                                                        <td>
                                                            {{ $item->nama_zakat }}
                                                        </td>
                                                        <td>
                                                            {{ $item->jenis_zakat }}
                                                        </td>
                                                        <td>
                                                            {{ $item->persentase }}%
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" name="persen" id="persen">
                                    <label for="nominal" class="col-sm-2 col-form-label">Nominal Zakat</label>
                                    <div class="col-sm-6">
                                        <input name="nominal" type="text" class="form-control" id="nominal"
                                            placeholder="Masukan jumlah zakat">
                                    </div>
                                    <label for="satuan" class="col-sm-1 col-form-label text-right">Satuan</label>
                                    <div class="col-sm-2">
                                        <input name="satuan" type="text" class="form-control" id="satuan"
                                            placeholder="Pilih">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hasil" class="col-sm-2 col-form-label">Jumlah Zakat</label>
                                    <div class="col-sm-4">
                                        <input name="hasil" type="text" class="form-control" id="hasil"
                                            placeholder="jumlah zakat" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="" class="btn btn-default">Batal</a>
                                <button type="submit" onclick="hitung()" class="btn btn-info float-right">Proses</button>
                            </div>
                            <!-- /.card-footer -->

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script style="text/javascript">
        $(function() {
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            $('body').on('change', '#radio', function() {
                var id = $(this).data('id');
                var URL = $(this).data('url');
                document.getElementById("nominal").value = "";
                $.ajax({
                    url: URL,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        document.getElementById("persen").value = res.data.persentase;
                    }
                })
            })


        })
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        function formatNumber(val) {
            // remove sign if negative
            var sign = 1;
            if (val < 0) {
                sign = -1;
                val = -val;
            }

            // trim the number decimal point if it exists
            let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();

            while (/(\d+)(\d{3})/.test(num.toString())) {
                // insert comma to 4th last position to the match number
                num = num.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
            }

            // add number after decimal point
            if (val.toString().includes('.')) {
                num = num + '.' + val.toString().split('.')[1];
            }

            // return result with - sign if negative
            return sign < 0 ? '-' + num : num;
        }

        function hitung() {
            let persen = document.getElementById("persen").value;
            let nominal = document.getElementById("nominal").value;
            let hasil = nominal * persen / 100
            document.getElementById("hasil").value = formatNumber(hasil);
        }
    </script>
@endpush

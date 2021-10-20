@extends('layouts.app')
@section('title', 'Manajemen istilah')
@section('login_as', 'Administrator')
@section('user-login')
    @if (Auth::check())
    {{ Auth::user()->name }}
    @endif
@endsection
@section('user-login2')
    @if (Auth::check())
    {{ Auth::user()->name }}
    @endif
@endsection
@section('sidebar-menu')
    @include('../sidebar')
@endsection
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Ruang Islam
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>Berhasil :</strong>{{ $message }}
                        </div>
                        @elseif ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>Gagal :</strong>{{ $message }}
                            </div>
                            @else
                            <div class="alert alert-success alert-block" id="keterangan">
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua istilah yang tersedia, silahkan tambahkan jika diperlukan !!
                            </div>
                    @endif
                </div>
                <div class="col-md-12" id="form-istilah">
                    <hr style="width:50%;">
                    <form action="{{ route('post') }}" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Pilih Kategori :</label>
                                <select name="kategori_id" class="form-control" id="">
                                    <option disabled selected>-- pilih kategori --</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nm_kategori }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @if ($errors->has('kategori_id'))
                                        <small class="form-text text-danger">{{ $errors->first('kategori_id') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>istilah :</label>
                                <input type="text" name="nm_istilah" value="{{ old('nm_istilah') }}" class="form-control @error('nm_istilah') is-invalid @enderror" placeholder="masukan nama istilah">
                                <div>
                                    @if ($errors->has('nm_istilah'))
                                        <small class="form-text text-danger">{{ $errors->first('nm_istilah') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Arti :</label>
                                <input type="text" name="arti" value="{{ old('arti') }}" class="form-control @error('arti') is-invalid @enderror" placeholder="masukan arti istilah">
                                <div>
                                    @if ($errors->has('arti'))
                                        <small class="form-text text-danger">{{ $errors->first('arti') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <label>Deskripsi :</label>
                                <textarea name="keterangan" class="form-control" id="keterangan_post" cols="30" rows="10">
                                    {{ old('keterangan') }}
                                </textarea>
                                <div>
                                    @if ($errors->has('keterangan'))
                                        <small class="form-text text-danger">{{ $errors->first('keterangan') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align:center;">
                            <a onclick="batalkan()" class="btn btn-danger btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-close"></i>&nbsp; Batalkan</a>
                            <button type="reset" class="btn btn-warning btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
                        </div>
                    </form>
                    <hr style="width:50%;">
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama istilah</th>
                                <th>Kategori</th>
                                <th>Arti</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($istilahs as $istilah)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $istilah->nm_istilah }} </td>
                                    <td> {{ $istilah->nm_kategori }} </td>
                                    <td> {{ $istilah->arti }} </td>
                                    <td> {!! $istilah->keterangan !!} </td>
                                    <td>
                                        {{-- <a onclick="ubahistilah({{ $istilah->id }})" class="btn btn-primary btn-sm" style="color:white;cursor:pointer;"><i class="fa fa-edit"></i></a> --}}
                                        <a onclick="hapusistilah({{ $istilah->id }})" class="btn btn-danger btn-sm" style="color:white;cursor:pointer;"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal Ubah -->
                    <div class="modal fade" id="modalubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action=" {{ route('update') }} " method="POST">
                                    {{ csrf_field() }} {{ method_field('PATCH') }}
                                    <div class="modal-header">
                                        <p style="font-size:15px; font-weight:bold;" class="modal-title"><i class="fa fa-suitcase"></i>&nbsp;Form Ubah Data istilah Berkas</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id" id="id_ubah">
                                                <div class="form-group">
                                                    <label for="">Kategori :</label>
                                                    <select name="kategori_id" class="form-control" id="kategori_id_edit">
                                                        <option disabled selected>-- pilih kategori --</option>
                                                        @foreach ($kategoris as $kategori)
                                                            <option value="{{ $kategori->id }}">{{ $kategori->nm_kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama istilah :</label>
                                                    <input type="text" name="nm_istilah" id="nm_istilah_edit" class="form-control @error('istilah') is-invalid @enderror" required placeholder="masukan kelas istilah">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Arti :</label>
                                                    <input type="text" name="nm_istilah" id="arti_edit" class="form-control @error('istilah') is-invalid @enderror" required placeholder="masukan kelas istilah">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama istilah :</label>
                                                    <input type="text" name="nm_istilah" id="nm_istilah_edit" class="form-control @error('istilah') is-invalid @enderror" required placeholder="masukan kelas istilah">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Batalkan</button>
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Hapus-->
                <div class="modal fade modal-danger" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action=" {{ route('delete') }} " method="POST">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <div class="modal-header">
                                    <p style="font-size:15px; font-weight:bold;" class="modal-title"><i class="fa fa-trash"></i>&nbsp;Form Konfirmasi Hapus Data</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="id" id="id_hapus">
                                            Apakah anda yakin ingin menghapus data? klik hapus jika iya !!
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" style="border: 1px solid #fff;background: transparent;color: #fff;" class="btn btn-sm btn-outline pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Batalkan</button>
                                    <button type="submit" style="border: 1px solid #fff;background: transparent;color: #fff;" class="btn btn-sm btn-outline"><i class="fa fa-check-circle"></i>&nbsp; Ya, Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
    var konten = document.getElementById("keterangan_post");
        CKEDITOR.replace(konten,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
    </script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );
        
        
        function ubahistilah(id){
            $.ajax({
                url: "{{ url('istilah') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalubah').modal('show');
                    $('#id_ubah').val(id);
                    $('#nm_istilah_edit').val(data.nm_istilah);
                    $('#kategori_id_edit').val(data.kategori_id).change();
                    $('#arti_edit').val(data.arti);
                    $('#keterangan_edit').val(data.keterangan);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        function hapusistilah(id){
            $('#modalhapus').modal('show');
            $('#id_hapus').val(id);
        }

        $(document).ready(function() {
            $('#istilah').select2({width:'100%'});
        });

    </script>
@endpush

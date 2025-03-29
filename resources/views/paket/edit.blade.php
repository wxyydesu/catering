@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="container mb-5">
                                <div class="col-md-4">
                                    <h3 class="text-secondary">Food Package::.Edit</h3>
                                </div>
                            </div>
                            <form action="{{route('paket.update', $data)}}" method="POST" name="frmPaket" id="frmPaket" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="package_name" class="form-label">Package Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="package_name" name="nama_paket" placeholder="example: Regular Wedding Package" maxlength="50" value="{{$data->nama_paket ? $data->nama_paket : old('nama_paket')}}">
                                    <div id="packageNameHelp" class="form-text text-warning"> You Can Only Input 50 Characters Here</div>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis" class="form-label">Package Type<span class="text-danger">*</span></label>
                                    <select class="form-select" id="jenis" name="jenis">
                                        <option selected>Open this select menu</option>
                                        <option value="Prasmanan" @if($data->jenis == 'Prasmanan' || old('jenis') == 'Prasmanan') selected @endif>Buffet</option>
                                        <option value="Box" @if($data->jenis == 'Box' || old('jenis') == 'Box') selected @endif>Box</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select class="form-select" id="category" name="kategori">
                                        <option selected>Open this select menu</option>
                                        <option value="Pernikahan" @if($data->kategori == 'Pernikahan' || old('kategori') == 'Pernikahan')  selected @endif>Wedding</option>
                                        <option value="Selamatan" @if($data->kategori == 'Selamatan' || old('kategori') == 'Selamatan') selected @endif>Salvation</option>
                                        <option value="Ulang Tahun" @if($data->kategori == 'Ulang Tahun' || old('kategori') == 'Ulang Tahun') selected @endif>Birthday Party</option>
                                        <option value="Studi Tour" @if($data->kategori == 'Studi Tour' || old('kategori') == 'Studi Tour') selected @endif>Studi Tour</option>
                                        <option value="Rapat" @if($data->kategori == 'Rapat' || old('kategori') == 'Rapat') selected @endif>Meeting</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pax_amount" class="form-label">Pax Amount<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control text-end" id="pax_amount" name="jumlah_pax" placeholder="0" 
                                    value= "@if($data->jumlah_pax) {{$data->jumlah_pax}} @elseif (old('jumlah_pax')) {{old('jumlah_pax')}} @else {{'0'}} @endif">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label" name="price">Price<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control text-end" id="price" name="harga_paket" placeholder="0" 
                                    value= "@if($data->harga_paket) {{$data->harga_paket}} @elseif (old('jumlah_pax')) {{old('jumlah_pax')}} @else {{'0'}} @endif">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="deskripsi" placeholder="Leave a description here" id="description" style="height: 150px;">{{$data->deskripsi ? $data->deskripsi : old('deskripsi')}} </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image1" class="form-label">1<sup>st</sup>Image</label>
                                    <input class="form-control" type="file" id="image1" name="foto1">
                                </div>
                                <div class="mb-3">
                                    <label for="image2" class="form-label">2<sup>nd</sup>Image</label>
                                    <input class="form-control" type="file" id="image2" name="foto2">
                                </div>
                                <div class="mb-3">
                                    <label for="image3" class="form-label">3<sup>rd</sup>Image</label>
                                    <input class="form-control" type="file" id="image3" name="foto3">
                                </div>
                                <div class="mb-3 mt-5 text-end">
                                    <div class="btn-group" role="group">
                                        <a href="{{route('paket.index')}}" class="btn btn-secondary"><i class="fas fa-ban me-2"></i>Cancel</a>
                                        <button type="button" class="btn btn-primary" id="btnSimpan">
                                            <i class="fas fa-download me-2"></i>Edit This Package</button>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Form End -->
<div id="pesan" class="invisible"> @isset($pesan){{$pesan}} @endisset </div>
<script>
    const btnSave = document.getElementById('btnSimpan')
    const nama_paket = document.getElementById('package_name')
    const jenis_paket = document.getElementById('jenis')
    const kategori = document.getElementById('category')
    const jumlah_pax = document.getElementById('pax_amount')
    const harga = document.getElementById('price')
    const form  = document.getElementById('frmPaket')
    const pesan = document.getElementById('pesan')

    function simpan(){
        if(nama_paket.value == ''){
            nama_paket.focus()
            swal("Invalid Data!", "Package name must be selected first!", "error")
        } else if (jenis_paket.value == 'Open this select menu'){
            jenis_paket.focus()
            swal("Invalid Data!", "Package type must be selected first!", "error")
        } else if (kategori.value == 'Open this select menu'){
            kategori.focus()
            swal("Invalid Data!", "Category must be selected first!", "error")
        } else if (jumlah_pax.value == ''){
            jumlah_pax.focus()
            swal("Invalid Data!", "Pax amount must be filled in!", "error")
        } else if (harga.value == ''){
            harga.focus()
            swal("Invalid Data!", "Price must be filled in!", "error")
        } else {
            form.submit()
        }
    }
    function tampil_pesan(){
        if(pesan.innerHTML.trim() !== '') {
            swal('Data Duplication', pesan.innerHTML, 'error')
        }
    }
    
        jumlah_pax.onfocus = function( ){
        if(jumlah_pax.value.trim() == '0') jumlah_pax.value = '' }

        jumlah_pax.onblur = function( ){
        if(jumlah_pax.value.trim() == '') jumlah_pax.value = '0' }

        jumlah_pax.onkeydown = function( ){
        angka(event)

        }

        harga.onfocus = function( ){
        if(harga.value == '0') harga.value = '' }

        harga.onblur = function( ){
        if(harga.value == '') 	harga.value = '0' }

        harga.onkeydown = function( ){
        angka(event)


        }


    

    btnSave.onclick = function(){
         simpan()
    }

    body.onload = function(){
           tampil_pesan()
     }
    
    // let pesan = document.getElementById('pesan').value 
    

</script>

@endsection
@section('footer')
    @include('be.footer')
@endsection
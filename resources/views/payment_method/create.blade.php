@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="row">
                        <div class="col-auto me-auto mb-5 h3 text-black-50">Payment Method::.create</div>
                    </div>

                    <form action="{{route('payment_method.store')}}" method="POST" id="frmPaymentMethod" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <input class="form-control" name="metode_pembayaran" id="payment_method" maxlength="30"
                                type="text" aria-label="default input example"
                                value="{{ old('metode_pembayaran') }}">
                            <div id="payment_methodHelp" class="form-text text-warning">
                                Payment Method Must be filled in and maximal 30 caracters
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="norek" class="form-label">Account Number</label>
                            <input class="form-control text-end" name="no_rek" id="norek" maxlength="25"
                                type="text" aria-label="default input example"
                                value="{{old('no_rek') ? old('no_rek') : '0'}}">
                            <div id="norekHelp" class="form-text text-warning">
                                Account Number Must be filled in and maximal 25 caracters
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_bayar" class="form-label">Payment Place</label>
                            <input class="form-control" name="tempat_bayar" id="tempat_bayar" maxlength="50"
                                type="text" aria-label="default input example"
                                value="{{ old('tempat_bayar') }}">
                            <div id="tempat_bayarHelp" class="form-text text-warning">
                                Payment Place Must be filled in and maximal 50 caracters
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input class="form-control" type="file" id="logo" name="logo">
                        </div>
                        <input class="form-control invisible" name="id_jenis_pembayaran" id="id_jenis_pembayaran"
                            type="text" aria-label="default input example">
                        <div class="text-end">
                            <a href="{{ route('payment_method.index') }}" class="btn btn-secondary">
                                <i class="fas fa-window-close me-2"></i>Cancel</a>
                            <button type="button" class="btn btn-primary" id="save"><i class="fas fa-save me-2">
                                </i>Save New Payment
                                Method</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const btnSimpan = document.getElementById('save')
        const id = document.getElementById('id_jenis_pembayaran')
        const payment = document.getElementById('payment_method')
        const norek = document.getElementById('norek')
        const tempat_bayar = document.getElementById('tempat_bayar')
        const form = document.getElementById('frmPaymentMethod')
        const body = document.getElementById('body')

        function simpan() {
            if (payment.value == '') {
            payment.focus()
            swal("Invalid Data!", "Payment Method must be filled in!", "error")
            } else if (norek.value == '') {
            norek.focus()
            swal("Invalid Data!", "Account Number must be filled in!", "error")
            } else if (tempat_bayar.value == '') {
            tempat_bayar.focus()
            swal("Invalid Data!", "Pay Place must be filled in!", "error")
            } else {
            form.submit()
            }
        }

        function tampil_pesan() {
            let duplikat = "{{session('duplikat')}}"
            let simpan = "{{session('simpan')}}"

            if(duplikat != ''){
                let pesan = "{{session('duplikat')}}"
                if (pesan.trim() !== '') {
                swal('Data Duplication', pesan.trim(), 'error')
                }
            }else if(simpan != ''){
                let pesan = "{{session('simpan')}}"
                if (pesan.trim() !== '') {
                    swal({
                        title: "Good Job!",
                        text: pesan.trim(),
                        type: "success",
                        showCancelButton: true,
                        cancelButtonClass: "btn-outline-secondary",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Add New Detail?",
                        cancelButtonText: "No, Cancel it!",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            id.value = "{{session('id')}}"
                            payment.value = "{{session('payment')}}"
                            payment.readOnly = true
                            norek.value = '0'
                            tempat_bayar.value = ''
                            btnSimpan.innerHTML = "<i class='fas fa-save me-2'></i>Save New Detail"
                        }else{
                            window.location.href = "{{ route('payment_method.index') }}"
                        }
                     })
                }
            }
        }
        norek.onfocus = function(){
        if(norek.value.trim() == '0') norek.value = ''
        }
        norek.onblur = function(){
        if(norek.value.trim() == '') norek.value = '0'
        }
        norek.onkeydown = function(){
        angka(event)
        }

        body.onload = function() {
        tampil_pesan()
        }

        btnSimpan.onclick = function() {
        simpan()
        }
        </script>






@endsection
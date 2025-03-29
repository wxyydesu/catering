@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="row mb-5">
                        <div class="col-auto me-auto mb-4 h3 text-black-50">Payment Method::.index</div>
                        <div class="col-auto">
                            <a href="{{ route('payment_method.create') }}" class="btn btn-primary justify-content-end">
                                <i class="fab fa-cc-visa text-right m-2"></i>Add New Payment Method</a>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Option</th>
                                <th scope="col">No.</th>
                                <th scope="col">Payment Place</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">Payment Method</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $no => $data)
                                    <tr>
                                        <td>
                                            <div class="btn-group" role="group">
                                            {{-- <a href="/payment_method/{{$data->id_jenis_pembayaran}}/
                                            {{$data->vwPaymentMethod->metode_pembayaran}}"
                                            class="btn btn-sm btn-success"><i
                                            class="fas fa-plus-circle me-2"></i>Add</a> --}}
                                            <a href="{{route('add', [$data->id_jenis_pembayaran,
                                            $data->vwPaymentMethod->metode_pembayaran])}}"
                                            class="btn btn-sm btn-success"><i
                                            class="fas fa-plus-circle me-2"></i>Add</a>
                                            <a href="{{ route('payment_method.edit', $data) }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit me-2"></i>Edit</a>
                                            <a href="{{ route('payment_method.destroy', $data) }}"
                                            class="btn btn-sm btn-danger" onclick="hapus(event, this)"><i
                                                class="fas fa-trash-alt me-2"></i>Delete</a>

                                        </div>
                                    </td>
                                    <th scope="row">{{ $no + 1 . '.' }}</th>
                                    <td>
                                        @if ($data['logo'] !== null)
                                            <img src="storage/{{ $data['logo'] }}" alt="" style="width: 50px"
                                                class="img-thumbnail cur-pointer me-2" data-bs-toggle="modal"
                                                data-bs-target="#logo_{{ $data->id }}">
                                        @endif
                                        {{ $data->tempat_bayar }}
                                    </td>
                                    <td>{{ $data->no_rek }}</td>
                                    <td>{{ $data->vwPaymentMethod->metode_pembayaran }}</td>
                                    </tr>
                                <!-- Modal Logo -->
                                <div class="modal fade" id="logo_{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="logo_{{ $data->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="logo_{{ $data->id }}Label">
                                                    @if (strlen($data->tempat_bayar) > 40)
                                                    {{ substr($data->tempat_bayar, 0, 40) . ' ... ' }}
                                                    @else
                                                    {{ $data->tempat_bayar }}
                                                    @endif
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="storage/{{ $data['logo'] }}" alt="" class="w-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

    <form action="" method="post" id="frmHapus">
        @method('delete')
        @csrf
    </form>

    <script>
        const body = document.getElementById('body')
        const status = document.getElementById('status')
        const pesan = document.getElementById('pesan')
        const form = document.getElementById('frmHapus')

        function tampil_pesan() {
            const pesan = "{{ session('pesan') }}"

        if (pesan.trim() !== '') {
            swal('Good Job', pesan, 'success')
        }
    }
    function hapus(event, el) {
        event.preventDefault()
        swal({
            title: "Are you sure?",
            text: "You will delete the Payment Method data permanently!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
             },
            function() {
            form.setAttribute('action', el.getAttribute('href'))
            form.submit()

            });

    }

    body.onpageshow = function() {
        tampil_pesan()
    }
    </script>


@endsection
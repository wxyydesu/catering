@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
<div class="col-12">
        <div class="bg-light rounded h-100 p-4 m-3">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="text-secondary">Food Packages::Index</h4>
                    </div>
                    <div class="col-md-4 ms-auto">
                        <a href="{{route('paket.create')}}" class="btn btn-primary m-2"><i class="fas fa-cubes me-3"></i>Add New Food Package</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Option</th>
                            <th scope="col">No</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Package Type</th>
                            <th scope="col">Category</th>
                            <th scope="col">Pax Amount</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">1<sup>st</sup> Image</th>
                            <th scope="col">2<sup>nd</sup> Image</th>
                            <th scope="col">3<sup>rd</sup> Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $nmr => $data)
                        <tr class="align-middle">
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{route('paket.edit', $data)}}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit me-2"></i>Edit</a>
                                    <a href="{{route('paket.destroy', $data)}}" onclick="hapus(event, this)" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </td>
                            <th scope="row">{{$nmr + 1 . '.'}}</th>
                            @if (strlen($data['nama_paket']) > 10)
                                <td data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['nama_paket'] }}">
                                    {{ substr($data['nama_paket'], 0, 10) . '...' }}
                                </td>
                            @else
                                <td>{{ $data['nama_paket'] }}</td>
                            @endif

                            @if (strlen($data['jenis']) > 5)
                                <td data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['jenis'] }}">
                                    {{ substr($data['jenis'], 0, 5) . '...' }}
                                </td>
                            @else
                                <td>{{ $data['jenis'] }}</td>
                            @endif

                            @if (strlen($data['kategori']) > 5)
                                <td data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['kategori'] }}">
                                    {{ substr($data['kategori'], 0, 5) . '...' }}
                                </td>
                            @else
                                <td>{{ $data['kategori'] }}</td>
                            @endif

                            <td>{{ $data['jumlah_pax'] }}</td>
                            <td>{{ $data['harga_paket'] }}</td>
                            @if (strlen($data['deskripsi']) > 15)
                                <td data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['deskripsi'] }}">
                                    {{ substr($data['deskripsi'], 0, 15) . '...' }}
                                </td>
                            @else
                                <td>{{ $data['deskripsi'] }}</td>
                            @endif

                            <td>
                                @if ($data['foto1'] !== null)
                                    <img src="storage/{{ $data['foto1'] }}" alt="" style="width: 50px;" class="img-thumbnail cur-pointer" data-bs-toggle="modal" data-bs-target="#foto1_{{ $data->id }}">
                                @endif
                            </td>
                            <td>
                                @if ($data['foto2'] !== null)
                                    <img src="storage/{{ $data['foto2'] }}" alt="" style="width: 50px;" class="img-thumbnail cur-pointer" data-bs-toggle="modal" data-bs-target="#foto2_{{ $data->id }}">
                                @endif
                            </td>
                            <td>
                                @if ($data['foto3'] !== null)
                                    <img src="storage/{{ $data['foto3'] }}" alt="" style="width: 50px;" class="img-thumbnail cur-pointer" data-bs-toggle="modal" data-bs-target="#foto3_{{ $data->id }}">
                                @endif
                            </td>
                        </tr>

                        <!-- Modal Foto1 -->
                         <div class="modal fade" id="foto1_{{ $data->id }}" tabindex="-1" aria-labelledby="foto1_{{ $data->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="foto1_{{$data->id}}Label">
                                            @if (strlen($data->nama_paket) > 40)
                                                {{ substr($data->nama_paket, 0, 40) . '...' }}
                                            @else
                                                {{$data->nama_paket}}
                                            @endif
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="storage/{{ $data['foto1'] }}" alt="" class="w-100">
                                    </div>
                                </div>
                            </div>
                         </div>
                        <!-- Modal Foto2 -->
                         <div class="modal fade" id="foto2_{{ $data->id }}" tabindex="-1" aria-labelledby="foto2_{{ $data->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="foto2_{{$data->id}}Label">
                                            @if (strlen($data->nama_paket) > 40)
                                                {{ substr($data->nama_paket, 0, 40) . '...' }}
                                            @else
                                                {{$data->nama_paket}}
                                            @endif
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="storage/{{ $data['foto2'] }}" alt="" class="w-100">
                                    </div>
                                </div>
                            </div>
                         </div>
                        <!-- Modal Foto3 -->
                         <div class="modal fade" id="foto3_{{ $data->id }}" tabindex="-1" aria-labelledby="foto3_{{ $data->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="foto3_{{$data->id}}Label">
                                            @if (strlen($data->nama_paket) > 40)
                                                {{ substr($data->nama_paket, 0, 40) . '...' }}
                                            @else
                                                {{$data->nama_paket}}
                                            @endif
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="storage/{{ $data['foto3'] }}" alt="" class="w-100">
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
<form action="" id="delete" method="POST">
    @method('delete')
    @csrf
</form>
<div id="pesan">
    @if (@isset($pesan)) {{$pesan}} @endif
</div>
{{session('pesan')}}
<script> 
    const body = document.getElementById('body')
    const form = document.getElementById('delete')
    function hapus(event, el){
        event.preventDefault()
        swal({
            title: "Are you sure?",
            text: "You will delete this package permanently!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            // swal("Deleted!", "Your imaginary file has been deleted.", "success")
            form.setAttribute('action', el.getAttribute('href'))
            form.submit()
        }

        );
    }
    function tampil_pesan(){
        const pesan = "{{session('pesan')}}"
        

        if(pesan.trim() !== ''){
            swal('Good Job', pesan, 'success')
        }
        
    }
    // let pesan = document.getElementById('pesan').value 
    body.onload = function(){
         tampil_pesan()
 }
</script>

@endsection
@section('footer')
    @include('be.footer')
@endsection
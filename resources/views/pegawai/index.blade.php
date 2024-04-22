@extends('_default.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Pegawai</h4>

                        <a
                            href="{{ route('pegawai.tambah') }}"
                            class="btn btn-sm btn-success"
                        >Tambah Data</a>

                        <div class="table-responsive pt-3">
                            <table
                                class="table table-bordered"
                                id="tabel_pegawai"
                            >
                                <thead>
                                    <tr>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            No Telp
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $key => $pegawai)
                                    <tr>
                                        <td>
                                            {{ $pegawai->nama }}
                                        </td>
                                        <td>
                                            {{ $pegawai->email }}
                                            {{-- <div class="progress">
                                                <div
                                                    class="progress-bar bg-success"
                                                    role="progressbar"
                                                    style="width: 25%"
                                                    aria-valuenow="25"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                ></div>
                                            </div> --}}
                                        </td>
                                        <td>
                                            {{ $pegawai->no_telp }}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-sm btn-light"
                                                    type="button"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false"
                                                >
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a
                                                            class="dropdown-item"
                                                            href="{{ route('pegawai.detail', ['uuid' => $pegawai->uuid]) }}"
                                                        >Detail</a></li>
                                                    <li><a
                                                            class="dropdown-item"
                                                            href="{{ route('pegawai.edit', ['uuid' => $pegawai->uuid]) }}"
                                                        >Edit</a></li>
                                                    <li><a
                                                            class="dropdown-item"
                                                            href="{{ route('pegawai.edit.password', ['uuid' => $pegawai->uuid]) }}"
                                                        >Edit Password</a></li>
                                                    <li><a
                                                            class="dropdown-item"
                                                            onclick="handleHapus('{{ $pegawai->uuid }}')"
                                                        >Hapus</a></li>
                                                </ul>
                                            </div>
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

    </div>
    <!-- content-wrapper ends -->

    <script>
        new DataTable('#tabel_pegawai');

        function handleHapus(uuid)
        {
            Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda mungkin tidak dapat mengembalikan data yang telah dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus"
            }).then((res) => {
                if (res.isConfirmed) {
                    $.ajax({
                        url: `/pegawai/hapus/${uuid}`,
                        method: 'POST',
                        data: {
                            _token: `{{ csrf_token() }}`,
                            _method: 'DELETE'
                        },
                        success: function(result) {
                            Swal.fire({
                                title: result.title,
                                text: result.text,
                                icon: result.icon
                            }).then((res1) => {
                                if (res1.isConfirmed) {
                                    window.location.reload()
                                }
                            });
                        },
                        error: function(error) {
                            console.error(error)
                        }
                    })
                }
            });
        }
    </script>

    {{-- Footer --}}
    @include('partials._footer-app')
    {{-- End Footer --}}

    <!-- partial -->
</div>

@endsection

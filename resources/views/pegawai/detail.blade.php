@extends('_default.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Pegawai</h4>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input
                                class="form-control"
                                value="{{ $pegawai->nama }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                class="form-control"
                                value="{{ $pegawai->email }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input
                                class="form-control"
                                value="{{ $pegawai->no_telp }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="peran">Peran</label>
                            @php
                            $data_peran = [
                            ['slug' => 'direktur-produksi', 'name' => 'Direktur Produksi'],
                            ['slug' => 'karyawan', 'name' => 'Karyawan Produksi'],
                            ]
                            @endphp
                            <select
                                class="form-control"
                                disabled
                            >
                                <option value="pilih">-- Pilih --</option>
                                @foreach ($data_peran as $peran)
                                <option
                                    value="{{ $peran['slug'] }}"
                                    {{ old('peran') == $peran['slug'] || $pegawai->peran == $peran['slug'] ? 'selected' : '' }}
                                >{{ $peran['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a
                            href="{{ route('pegawai') }}"
                            class="btn btn-light"
                        >Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    {{-- Footer --}}
    @include('partials._footer-app')
    {{-- End Footer --}}

    <!-- partial -->
</div>

@endsection

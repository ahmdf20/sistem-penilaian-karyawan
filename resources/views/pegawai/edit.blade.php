@extends('_default.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Pegawai</h4>
                        <form
                            action="{{ route('pegawai.update', ['uuid' => $pegawai->uuid]) }}"
                            class="forms-sample"
                            method="POST"
                        >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    name="nama"
                                    placeholder="Inputkan Nama Lengkap"
                                    value="{{ old('nama') ? old('nama') : $pegawai->nama }}"
                                >
                                @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="contoh@email.contoh.com"
                                    value="{{ old('email') ? old('email') : $pegawai->email }}"
                                >
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="no_telp"
                                    name="no_telp"
                                    placeholder="628512345612"
                                    value="{{ old('no_telp') ? old('no_telp') : $pegawai->no_telp }}"
                                >
                                @error('no_telp')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
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
                                    id="peran"
                                    name="peran"
                                >
                                    <option value="pilih">-- Pilih --</option>
                                    @foreach ($data_peran as $peran)
                                    <option
                                        value="{{ $peran['slug'] }}"
                                        {{ old('peran') == $peran['slug'] || $pegawai->peran == $peran['slug'] ? 'selected' : '' }}
                                    >{{ $peran['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('peran')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button
                                type="submit"
                                class="btn btn-success mr-2"
                            >Submit</button>
                            <a
                                href="{{ route('pegawai') }}"
                                class="btn btn-light"
                            >Cancel</a>
                        </form>
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

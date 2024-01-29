@extends('home')
@section('content')

<p class="text-3xl text-gray-900 dark:text-white font-medium text-gray-900 dark:text-white text-center">Daftar Produk</p>
<br>
<button type="button" data-modal-target="tambah-modal" data-modal-toggle="tambah-modal" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-3 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
    Tambah
</button>

<table class="table">
    <thead class="table-success">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Produk</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Kategori</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Stok</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Aksi</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $row)
        <tr>
            <th scope="row">{{++$key}}</th>
            <td><img src="{{ asset('storage/'.$row->gambar_produk) }}" alt="" width="80vw" height="100vw"></td>
            <td>{{$row->nama_produk}}</td>
            <td>{{$row->kategori->kategori}}</td>
            <td>{{$row->harga_satuan}}</td>
            <td>{{$row->stok}}</td>
            <td>{{$row->deskripsi}}</td>
            <td>
                <button  data-modal-target="edit-modal{{$row->id}}" data-modal-toggle="edit-modal{{$row->id}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900" >Edit</button>

                <!-- Main modal -->
                <div id="edit-modal{{$row->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Edit Produk
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{route('barang.update', $row->id)}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                @method('put')
                                @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2" >
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foro Produk</label>
                                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="gambar_produk" class="form-control @error('gambar_produk') is-invalid @enderror" value="{{$row->gambar_produk}}">
                                        @error('gambar_produk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="nama_produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                        <input type="text" name="nama_produk" id="nama_produk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control @error('nama_produk') is-invalid @enderror" placeholder="Nama Produk" required="" value="{{$row->nama_produk}}">
                                        @error('nama_produk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="harga_satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Satuan</label>
                                        <input type="number" name="harga_satuan" id="harga_satuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500form-control @error('nama_produk') is-invalid @enderror" placeholder="Harga Satuan" required="" value="{{$row->harga_satuan}}">
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="harga_satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                                        <input type="number" name="stok" id="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500form-control @error('stok') is-invalid @enderror" placeholder="Harga Satuan" required="" value="{{$row->stok}}">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                        <select name="kategori_id" class="form-select" aria-label="Default select example">
                                            @foreach ($kategori as $d)
                                            <option value="{{$d->id}}" {{($row->kategori_id == $d->id ? 'selected' : '')}}>{{$d->kategori}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Produk</label>
                                        <textarea id="" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketik deskripsi produk di sini">
                                            {{$row->deskripsi}}
                                        </textarea>
                                    </div>

                                </div>
                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>


                <form action="{{ route('barang.destroy', $row->id) }}" method="POST" onclick="return confirm('Apa anda yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                </form>


                <!-- Main modal Tambah -->
                <div id="tambah-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Produk
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-2 md-5">
                                <form action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2" >
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foro Produk</label>
                                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="gambar_produk" class="form-control @error('gambar_produk') is-invalid @enderror" value="{{$row->gambar_produk}}">
                                            @error('gambar_produk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-span-2">
                                            <label for="nama_produk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                            <input type="text" name="nama_produk" id="nama_produk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control @error('nama_produk') is-invalid @enderror" placeholder="Nama Produk" required="" value="{{ old('nama_produk') }}">
                                            @error('nama_produk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="harga_satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Satuan</label>
                                            <input type="number" name="harga_satuan" id="harga_satuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500form-control @error('nama_produk') is-invalid @enderror" placeholder="Harga Satuan" required="" value="{{ old('harga_satuan') }}">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="harga_satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                                            <input type="number" name="stok" id="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500form-control @error('stok') is-invalid @enderror" placeholder="Harga Satuan" required="" value="{{ old('stok') }}">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" aria-label="Default select example">
                                                <option value="" selected>Open this select menu</option>
                                                @foreach ($kategori as $d)
                                                <option value="{{ $d->id }}" {{ old('kategori_id') == $d->id ? 'selected' : '' }}>{{ $d->kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-span-2">
                                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Deskripsi Produk</label>
                                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="floatingTextarea2" style="height: 100px" value="{{ old('deskripsi') }}" placeholder="Ketiki deskripsi produk disini"></textarea>
                                        </div>

                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Tambahkan Data
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
          </tr>

        @endforeach
    </tbody>
</table>

{{$data->links()}}
@endsection

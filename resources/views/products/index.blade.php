@extends('template')

@section('title', 'Daftar Produk')

@section('content')

<div class="container mt-5">

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Daftar Produk</h3>

        <a href="{{ route('products.create') }}"
           class="btn btn-primary">

            Tambah

        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>Nama Produk</th>

                <th>Harga</th>

                <th>Variant</th>

                <th width="200">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach($products as $product)

            <tr>

                <td>

                    {{ $product->name }}

                </td>

                <td>

                    Rp {{ number_format($product->price, 0, ',', '.') }}

                </td>

                <td>

                    @if($product->variants->count() > 0)

                        <ul>

                            @foreach($product->variants as $var)

                                <li>

                                    <strong>{{ $var->name }}</strong>

                                    <br>

                                    Desc :
                                    {{ $var->description }}

                                    <br>

                                    Processor :
                                    {{ $var->processor }}

                                    <br>

                                    RAM :
                                    {{ $var->memory }}

                                    <br>

                                    Storage :
                                    {{ $var->storage }}

                                    <br>

                                    Product :
                                    {{ $var->product->name }}

                                </li>

                                <hr>

                            @endforeach

                        </ul>

                    @else

                        <span class="text-danger">

                            Tidak ada variant

                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('products.edit', $product->id) }}"
                       class="btn btn-warning btn-sm mb-1">

                        Edit

                    </a>

                    <form action="{{ route('products.destroy', $product->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf

                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection
@extends('home.layout')
@section('title')
    Trang chủ
@endsection
@section('content')
    <form action="{{ url('tim-kiem-bai-viet') }}" method="post" class="mb-2">@csrf
        <input type="text" placeholder="Nhập từ khóa tìm kiếm" name="tktt" required class="border w-96 outline-none rounded-lg py-2 px-4">
        <input type="submit" value="Tìm kiếm" class="border cursor-pointer outline-none hover:bg-green-50 rounded-lg py-2 px-4">
    </form>


    <div class="flex justify-between">
        <a href="{{ url('/') }}"
            @if (!isset($xn))
            class="bg-yellow-200 border-gray-200 font-bold px-5 py-2"
            @else
                class="hover:bg-yellow-50 border-gray-200 font-bold px-5 py-2"
            @endif
        >Tất cả</a>
        @foreach ($lt as $t)
            <a href="{{ url('loc/' . $t->id_loaibaiviet) }}">
                <div @if (isset($xn))
                    @if ($xn == $t->id_loaibaiviet)
                        class="bg-yellow-200 border-gray-200 font-bold px-5 py-2"
                    @else
                        class="hover:bg-yellow-50 border-gray-200 font-bold px-5 py-2"
                    @endif
                @else
                    class="hover:bg-yellow-50 border-gray-200 font-bold px-5 py-2"
        @endif
        >
        {{ $t->ten_loaibaiviet }}
    </div>
    </a>
    @endforeach
    </div>
    <hr>

    <div class="grid grid-cols-1 xl:grid-cols-2 mt-3 ">
        @foreach ($tt as $t)
                <div class="flex pb-3">
                    <img src="{{ $t->hinhanh_baiviet }}" alt="" class="h-28 w-40 object-cover">

                    <div class="pl-3 ">
                        <a href="{{ url('chi-tiet-bai-viet/' . $t->id_baiviet) }}">
                            <span class="font-bold text-2xl pt-3">{{ $t->tieude_baiviet }} </span>
                            @if ($t->noibat_baiviet == 1)
                                <span class="bg-red-500 text-xs px-1 rounded-full text-white">Nổi bật</span>
                            @endif
                            <p>{{ $t->ngaythem_baiviet }}</p>
                        </a>
                    </div>
                </div>

        @endforeach
        
    </div>
    @if (count($tt)==0)
        <div class="w-full text-5xl text-center p-10 bg-gray-200">
            Không có
        </div>
    @endif
    <html>

    <head>

    @endsection

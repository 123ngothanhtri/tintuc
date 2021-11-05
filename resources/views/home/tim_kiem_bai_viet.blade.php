@extends('home.layout')
@section('title')
    Tìm kiếm bài viết
@endsection
@section('content')
    @php
    function doimau($str, $tukhoa)
    {
        return str_replace($tukhoa, "<span class='text-pink-500'>" . $tukhoa . '</span>', $str);
    }
    @endphp
    <form action="{{ url('tim-kiem-bai-viet') }}" method="post" class="mb-1">@csrf
        <input type="text" placeholder="Nhập từ khóa tìm kiếm" name="tktt" value="{{ $tukhoa }}" required class="border w-96 outline-none rounded-lg py-2 px-4">
        <input type="submit" value="Tìm kiếm" class="border cursor-pointer outline-none hover:bg-green-50 rounded-lg py-2 px-4">
    </form>

    <div class="flex justify-between">
        @foreach ($lt as $t)
            <a href="{{ url('loc/' . $t->id_loaibaiviet) }}">
                <div @if (isset($xn))
                    @if ($xn == $t->id_loaibaiviet)
                        class="bg-green-200 border-gray-200 font-bold px-5 py-2"
                    @else
                        class="hover:bg-green-50 border-gray-200 font-bold px-5 py-2"
                    @endif
                @else
                    class="hover:bg-green-50 border-gray-200 font-bold px-5 py-2"
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

            @if ($t->anhien_baiviet == 1)
                <div class="flex pb-3">

                    <img src="{{ $t->hinhanh_baiviet }}" alt="" class="h-28 w-40 object-cover">

                    <div class="pl-3 ">
                        <a href="{{ url('chi-tiet-bai-viet/' . $t->id_baiviet) }}">
                            <span class="font-bold text-2xl pt-3">{!! doimau($t->tieude_baiviet, $tukhoa) !!} </span>
                            @if ($t->noibat_baiviet == 1)
                                <span class="bg-red-500 text-xs px-1 rounded-full text-white">Nổi bật</span>
                            @endif
                            <p>{!! doimau($t->tieude_baiviet, $tukhoa) !!}</p>
                        </a>
                    </div>
                </div>
            @endif

        @endforeach
    </div>
@endsection

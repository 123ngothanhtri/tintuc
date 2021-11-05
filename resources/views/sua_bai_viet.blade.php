@extends('layout')
@section('content')
    <div class="bg-yellow-200 py-5 border">
        <p class="w-10/12 mx-auto text-xl">
            Cập nhật bài viết
        </p>
    </div>
    <div class="w-full p-5">
        <form action="{{ url('xu-ly-sua-bai-viet') }}" method="post">@csrf
            <input type="hidden" value="{{ $tt->id_baiviet }} " name="input_id_baiviet">
            <div class="grid grid-cols-1 md:grid-cols-3 md:col-span-2 md:gap-3">

                <label for="">Thể loại </label>
                <select name="input_loaibaiviet" class="px-2 py-1 rounded-lg border w-full focus:ring-1 md:col-span-2">
                    @foreach ($lt as $i)
                        <option value="{{ $i->id_loaibaiviet }}" @if ($i->id_loaibaiviet == $tt->id_loaibaiviet) selected @endif>
                            {{ $i->ten_loaibaiviet }}
                        </option>
                    @endforeach

                </select>


                <label for=""> Tiêu đề</label>
                <input maxlength="100" type="text" name="input_tieude" value="{{ $tt->tieude_baiviet }}" placeholder="Tiêu đề" required class="w-full px-2 py-1 rounded-lg md:col-span-2 outline-none focus:ring-1 border">
                <label>Link hình ảnh</label>

                <input maxlength="998" type="text" value="{{ $tt->hinhanh_baiviet }}" id="link_image" onchange="e()" placeholder="Link hình ảnh" class="bg-white  focus:outline-none focus:ring-1 w-full px-2 py-1 mr-10 rounded-lg border md:col-span-2" name="input_hinhanh">
                <span></span>
                <img id="output_image" src="{{ $tt->hinhanh_baiviet }}" class="h-auto w-40 rounded-lg " alt=" Chưa có ảnh"/>
    </div>
           
            Ẩn/hiện <input type="checkbox" name="input_anhien" value="1" class="mr-10 my-3" @if ($tt->anhien_baiviet == 1) checked @endif>
            Nổi bật <input type="checkbox" name="input_noibat" value="1" class="my-3" @if ($tt->noibat_baiviet == 1) checked @endif>

            <textarea name="editor" id="editor">{!! $tt->noidung_baiviet !!}</textarea>
            <input type="submit" value="Lưu" class="bg-pink-500 m-2 text-white px-2 py-1 rounded-lg border">
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
        function e() {
            var x = document.getElementById('link_image').value;
            document.getElementById("output_image").src = x;
        }
    </script>
@endsection

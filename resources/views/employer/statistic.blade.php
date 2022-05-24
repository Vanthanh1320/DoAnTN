@extends('layouts.main-employer')

@section('content')

    <div class="content px-5 py-4 mb-5" id="statiscal" >
            <div class="cv-manage-head">
                <form action="" class="d-flex">
                    <input type="text" placeholder="Tìm kiếm" class="form-control me-2">

                    <select class="form-select form-select-lg me-2" aria-label=".form-select-lg example">
                        <option selected>Trạng thái</option>
                        <option value="1">Duyệt</option>
                        <option value="2">Chưa duyệt</option>
                    </select>

                    <button class="btn btn-submit" class="btn btn-submit ">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <a href="/" class="btn btn-success">
                    Dowload Excel
                </a>
            </div>
        </div>

@endsection

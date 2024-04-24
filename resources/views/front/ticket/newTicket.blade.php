@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <form method="post" action="{{route('ticket.store')}}">
            @csrf
            <div class="row mb-3">
                <label for="subject" class="col-sm-2 col-form-label">Konu Başlığı</label>
                <div class="col-sm-10">
                    <input type="text" name="title" required class="form-control" id="subject">
                </div>
            </div>
            <div class="row mb-3">
                <label for="dropdown1" class="col-sm-2 col-form-label">Birim Seçin</label>
                <div class="col-sm-4">
                    <select class="form-select" name="unit_id" required id="dropdown1">
                        <option value="">Seçiniz...</option>
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="dropdown2" class="col-sm-2 col-form-label">Önem Derecesi Seçin</label>
                <div class="col-sm-4">
                    <select class="form-select" name="importance_level_id" id="dropdown2" required>
                        <option value="">Seçiniz...</option>
                        @foreach($importances as $importance)
                            <option value="{{$importance->id}}">{{$importance->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="message" class="col-sm-2 col-form-label">Mesajınız</label>
                <div class="col-sm-10">
                    <textarea class="form-control" required name="message" id="message" rows="5"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Gönder</button>
        </form>
    </div>
@endsection

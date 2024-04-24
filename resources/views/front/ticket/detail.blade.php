@extends('layouts.app')
@section('content')
    @if(isset($ticket))
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title">Ticket Detayları</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="title" class="col-sm-3 col-form-label">Başlık:</label>
                                <span class="col-sm-9">{{$ticket->title}}</span>
                            </div>
                            <div class="mb-3 row">
                                <label for="createTime" class="col-sm-3 col-form-label">Oluşturulma Tarihi:</label>
                                <span class="col-sm-9">{{$ticket->created_at}}</span>
                            </div>
                            <div class="mb-3 row">
                                <label for="unit" class="col-sm-3 col-form-label">Birim:</label>
                                <span class="col-sm-9">{{$ticket->unit->name}}</span>
                            </div>
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-3 col-form-label">Durum:</label>
                                <span class="col-sm-9">{{$ticket->status->title}}</span>
                            </div>
                            <div class="mb-3 row">
                                <label for="importance" class="col-sm-3 col-form-label">Önem Derecesi:</label>
                                <span class="col-sm-9">{{$ticket->importanceLevel->title}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Mesaj Ekle</h5>
                        </div>
                        <div class="card-body">
                            @if($ticket->status_id==3)
                                <form action="{{route('ticket.addMessage')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input hidden="true" name="ticket_id" value="{{$ticket->id}}"/>
                                        <label for="comment" class="form-label">Mesaj:</label>
                                        <textarea class="form-control" disabled id="comment" name="message"
                                                  rows="4"></textarea>
                                    </div>
                                    <button type="submit" disabled class="btn btn-primary">Gönder</button>
                                </form>
                            @else
                                <form action="{{route('ticket.addMessage')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input hidden="true" name="ticket_id" value="{{$ticket->id}}"/>
                                        <label for="comment" class="form-label">Mesaj:</label>
                                        <textarea class="form-control" id="comment" name="message"
                                                  rows="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Gönder</button>
                                </form>
                                <br>
                                <a href="{{route('ticket.endTicket',$ticket->id)}}" class="btn btn-danger">Görüşmeyi
                                    Sonlandır</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header mt-2">
                Mesajlar
            </div>
            @foreach($messages as $message)
                <div class="card  mt-2">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">{{$message->user->name}}</h6>
                                <small class="text-muted">{{$message->created_at}}</small>
                            </div>
                        </div>
                        <p class="mb-0">{{$message->content}}</p>
                    </div>
                </div>
            @endforeach

        </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Ticket Detayı Bulunamadı</h5>
                </div>
            </div>
    @endif
@endsection

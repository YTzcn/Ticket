@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
           aria-controls="collapseExample">
            Gelen Ticketler
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round" class="ml-2">
                <path d="M4 6l4 4 4-4z"></path>
            </svg>
        </a>
        <div class="collapse show" id="collapseExample">
            <div class="card card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Başlık</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Kullanıcı</th>
                        <th scope="col">Önem Derecesi</th>
                        <th scope="col">Birim</th>
                        <th scope="col">Oluşturma Tarihi</th>
                        <th scope="col">İncele
                        <th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($unitTickets as $ticket)
                        <tr>
                            <th scope="row">{{$ticket->id}}</th>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->status->title}}</td>
                            <td>{{$ticket->user->name}}</td>
                            <td>{{$ticket->importanceLevel->title}}</td>
                            <td>{{$ticket->unit->name}}</td>
                            <td>{{$ticket->created_at}}</td>
                            <td><a class="btn btn-warning" href="{{route('ticket.show',$ticket->id)}}">İncele</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false"
           aria-controls="collapse2">
            Giden Ticketler
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round" class="ml-2">
                <path d="M4 6l4 4 4-4z"></path>
            </svg>
        </a>
        <div class="collapse" id="collapse2">
            <div class="card card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Başlık</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Kullanıcı</th>
                        <th scope="col">Önem Derecesi</th>
                        <th scope="col">Birim</th>
                        <th scope="col">Oluşturma Tarihi</th>
                        <th scope="col">İncele</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userTickets as $ticket)
                        <tr>
                            <th scope="row">{{$ticket->id}}</th>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->status->title}}</td>
                            <td>{{$ticket->user->name}}</td>
                            <td>{{$ticket->importanceLevel->title}}</td>
                            <td>{{$ticket->unit->name}}</td>
                            <td>{{$ticket->created_at}}</td>
                            <td><a class="btn btn-warning" href="{{route('ticket.show',$ticket->id)}}">İncele</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="container">
        <br>
        <a href="{{route('ticket.newTicket')}}" class="btn btn-success">Yeni Ticket Oluştur</a>
    </div>
@endsection

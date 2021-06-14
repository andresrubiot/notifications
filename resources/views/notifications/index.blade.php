@extends('layouts.app')

@section('content')
    <div class="container card">

        <div class="card-title">
            <h1>Notifications</h1>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="container card">
                        <div class="card-title">
                            <h2>Unread Notifications</h2>
                        </div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($unreadNotifications as $unreadNotification)
                                    <li class="list-group-item">
                                        <a href="{{ $unreadNotification->data['link'] }}">
                                            {{ $unreadNotification->data['text'] }}
                                        </a>

                                        <form action="{{ route('notifications.read', $unreadNotification->id) }}" method="POST" class="float-right">
                                            @method('patch')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                X
                                            </button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="container card">
                        <div class="card-title">
                            <h2>Notifications read</h2>
                        </div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($readNotifications as $readNotification)
                                    <li class="list-group-item">
                                        <a href="{{ $readNotification->data['link'] }}">
                                            {{ $readNotification->data['text'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

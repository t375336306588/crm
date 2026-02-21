@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Список заявок</h2>

        <form action="{{ route('admin.tickets.index') }}" method="GET" class="row g-3 mb-4">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Email или Телефон" value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Все статусы</option>
                    <option value="new">Новые</option>
                    <option value="in_progress">В работе</option>
                    <option value="resolved">Завершены</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-sm">Найти</button>
                <a href="{{ route('admin.tickets.index') }}" class="btn btn-danger btn-sm">Сброс</a>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Клиент</th>
                <th>Тема</th>
                <th>Статус</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->customer->name }} ({{ $ticket->customer->email }})</td>
                    <td>{{ $ticket->subject }}</td>
                    <td><span class="badge bg-info">{{ $ticket->status }}</span></td>
                    <td>{{ $ticket->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.tickets.show', $ticket) }}" class="btn btn-sm btn-outline-dark">Детали</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tickets->links() }}
    </div>
@endsection

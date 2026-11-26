@extends('layout.app')

@section('title', 'Contactos')

@section('content')
<div class="container" style="padding:40px 0;">
    <h2>Contactos del sitio</h2>
    <table class="table" style="width:100%; border-collapse:collapse; margin-top:16px;">
        <thead>
            <tr style="text-align:left;">
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $c)
                <tr>
                    <td>{{ $c->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->type }}</td>
                    <td>{{ Str::limit($c->subject, 60) }}</td>
                    <td>{{ Str::limit($c->message, 120) }}</td>
                    <td>{{ $c->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top:12px;">{{ $contacts->links() }}</div>
</div>
@endsection

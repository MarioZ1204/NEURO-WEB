@extends('layout.app')
@section('title', 'Directorio Médico')
@section('meta_description', 'Directorio médico del Instituto Neurociencias de Nariño: especialistas en neurología, epileptología, terapias y más.')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; max-width: 640px; margin-inline: auto; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .staff-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
    .staff-table thead th {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: #fff; font-size: 11px; font-weight: 700; letter-spacing: 1px;
        text-transform: uppercase; padding: 16px 20px; text-align: left;
    }
    .staff-table tbody tr { border-bottom: 1px solid #eef3f2; transition: background 0.2s; }
    .staff-table tbody tr:last-child { border-bottom: none; }
    .staff-table tbody tr:hover { background: #f7fbfa; }
    .staff-table td { padding: 18px 20px; vertical-align: top; }
    .staff-name { font-size: 15px; font-weight: 800; color: var(--dark); margin: 0 0 4px; }
    .staff-specialty { font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.4px; margin: 0 0 8px; }
    .staff-exp { font-size: 12px; color: #888; margin: 0 0 6px; }
    .staff-bio { font-size: 13px; color: #666; line-height: 1.7; margin: 0; }
    @media (max-width: 700px) {
        .staff-table thead { display: none; }
        .staff-table, .staff-table tbody, .staff-table tr, .staff-table td { display: block; width: 100%; }
        .staff-table tbody tr { padding: 16px 18px; }
        .staff-table td { padding: 4px 0; }
    }
</style>

@php
    $equipo = $teamMembers ?? collect();
@endphp

<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Directorio Médico</span>
        </div>
        <h1>Directorio Médico</h1>
        <p>Especialistas comprometidos con su bienestar neurológico.</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <p style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:10px;">Nuestros especialistas</p>
        <h2 style="font-size:clamp(20px,2.5vw,32px);font-weight:800;color:var(--dark);margin-bottom:40px;">Equipo Médico</h2>

        <table class="staff-table">
            <thead>
                <tr>
                    <th style="width:38%;">Profesional</th>
                    <th style="width:28%;">Especialidad</th>
                    <th>Perfil</th>
                </tr>
            </thead>
            <tbody>
                @forelse($equipo as $doc)
                    <tr>
                        <td>
                            <p class="staff-name">{{ $doc->name }}</p>
                            @if($doc->experience)
                                <p class="staff-exp"><i class="fas fa-star" style="font-size:10px;color:var(--primary);"></i> {{ $doc->experience }}</p>
                            @endif
                        </td>
                        <td>
                            <p class="staff-specialty">{{ $doc->specialty }}</p>
                        </td>
                        <td>
                            <p class="staff-bio">{{ $doc->bio }}</p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align:center;padding:40px;color:#888;">El directorio se actualizará próximamente.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @include('components.page-cta', [
            'title' => '¿Desea agendar con un especialista?',
            'subtitle' => 'Use WhatsApp, llámenos o deje sus datos en «Lo llamamos» y le contactamos.',
            'secondaryHref' => route('especialidades'),
            'secondaryLabel' => 'Ver especialidades',
        ])
    </div>
</section>
@endsection

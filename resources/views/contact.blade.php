@extends('layout.app')
@section('title', 'Contacto')
@section('content')

<!-- Toastr CSS y Scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<div style="background-image: linear-gradient(rgba(255,255,255,0.4), rgba(255,255,255,0.4)), url('{{ asset("assets/images/slide-01.webp") }}'); min-height: 100vh; background-attachment: fixed; background-size: cover; background-position: center; padding: 80px 0; margin-top: 80px;">
    <div class="container">
        <div class="row" style="justify-content: center; margin-top: 40px;">
            <div class="col-lg-8">
                <div style="background: white; padding: 50px; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
                    <h2 style="margin-bottom: 30px; text-align: center; color: #333;">FORMULARIO DE CONTACTO</h2>
                    <p style="text-align: center; margin-bottom: 30px; color: #666;">Envía tus peticiones, quejas o solicitudes</p>

                    @if ($errors->any())
                        <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <script>
                            setTimeout(function() {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000"
                                };
                                toastr.success('{{ session('success') }}', '¡Éxito!');
                            }, 500);
                        </script>
                    @endif

                    @if (session('error'))
                        <script>
                            setTimeout(function() {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000"
                                };
                                toastr.error('Hubo un error al enviar el mensaje. Por favor intenta de nuevo.', 'Error');
                            }, 500);
                        </script>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf

                        <div style="margin-bottom: 20px;">
                            <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Nombre Completo *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="email" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Correo Electrónico *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="phone" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Teléfono</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" inputmode="numeric" placeholder="Ej: 3001234567"
                                style="width: 100%; padding: 12px; border: 1px solid {{ $errors->has('phone') ? '#dc3545' : '#ddd' }}; border-radius: 5px; font-size: 14px;">
                            @if ($errors->has('phone'))
                                <span style="color: #dc3545; font-size: 13px; margin-top: 5px; display: block;">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="type" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Tipo de Solicitud *</label>
                            <select id="type" name="type" required
                                style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
                                <option value="">Selecciona una opción</option>
                                <option value="peticion" {{ old('type') === 'peticion' ? 'selected' : '' }}>Petición</option>
                                <option value="queja" {{ old('type') === 'queja' ? 'selected' : '' }}>Queja</option>
                                <option value="solicitud" {{ old('type') === 'solicitud' ? 'selected' : '' }}>Solicitud</option>
                            </select>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="subject" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Asunto *</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="message" style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Mensaje *</label>
                            <textarea id="message" name="message" rows="8" required
                                style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; font-family: Arial, sans-serif;">{{ old('message') }}</textarea>
                        </div>

                        <div style="text-align: center;">
                            <button type="submit" style="background-color: #ff6b35; color: white; padding: 15px 40px; border: none; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background-color 0.3s;">
                                ENVIAR MENSAJE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const phoneInput = document.getElementById('phone');
        
        // Bloquear caracteres no numéricos al escribir
        phoneInput.addEventListener('keypress', function(e) {
            const char = String.fromCharCode(e.which);
            if (!/[0-9]/.test(char)) {
                e.preventDefault();
                return false;
            }
        });

        // Eliminar caracteres no numéricos al soltar la tecla
        phoneInput.addEventListener('keyup', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Eliminar caracteres no numéricos al cambiar el valor
        phoneInput.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Bloquear pegado de caracteres no numéricos
        phoneInput.addEventListener('paste', function(e) {
            e.preventDefault();
            const pastedText = (e.clipboardData || window.clipboardData).getData('text');
            const numbersOnly = pastedText.replace(/[^0-9]/g, '');
            this.value = numbersOnly;
            return false;
        });

        // Bloquear drag and drop
        phoneInput.addEventListener('drop', function(e) {
            e.preventDefault();
            return false;
        });
    });
</script>


@endsection

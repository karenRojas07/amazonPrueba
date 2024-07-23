<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container mt-5 d-flex flex-column align-items-center">
    <div class="logo-container mb-4">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo">
    </div>
    <div class="form-container">
        <h2 class="text">Crear cuenta</h2>
        <form id="registerForm">
            @csrf
            <div class="form-group">
                <label for="name">Tu nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Debe tener al menos 6 caracteres." required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Vuelve a escribir la contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">Crear tu cuenta de Amazon</button>
        </form>
        <p class="mt-3">
            Al crear una cuenta, aceptas las
            <a href="#" class="text-blue">Condiciones de uso</a> y el
            <a href="#" class="text-blue">Aviso de privacidad</a> de Amazon.
        </p>
        <br>
        <br>
        <p class="mt-3">
            ¿Ya tienes una cuenta? <a href="#" class="text-blue">Iniciar sesión</a>
        </p>
        <div id="message" class="mt-3"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#registerForm').on('submit', function(event) {
            event.preventDefault();

            var password = $('#password').val();
            var passwordConfirmation = $('#password_confirmation').val();
            var isValid = true;

            // Reset previous errors
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').hide();
            $('#message').empty();

            // Validar si las contraseñas coinciden y si la contraseña tiene al menos 6 caracteres
            if (password !== passwordConfirmation) {
                $('#message').html('<div class="alert alert-danger">Las contraseñas no coinciden.</div>');
                isValid = false;
            }

            if (password.length < 6) {
                $('#password').addClass('is-invalid');
                $('.invalid-feedback').show();
                isValid = false;
            }

            if (!isValid) return;

            $.ajax({
                url: '{{ route("register.store") }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#message').html('<div class="alert alert-success">' + response.success + '</div>');
                    $('#registerForm')[0].reset();
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    var errorHtml = '<div class="alert alert-danger"><ul>';
                    $.each(errors, function(key, value) {
                        errorHtml += '<li>' + value[0] + '</li>';
                    });
                    errorHtml += '</ul></div>';
                    $('#message').html(errorHtml);
                }
            });
        });
    });
</script>
</body>
</html>

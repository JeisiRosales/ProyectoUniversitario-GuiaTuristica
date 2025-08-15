$(document).ready(function() {
    // Estilo del botón 
    $('.btn-success').css({
        'background-color': '#DC3545',
        'border-color': '#DC3545'
    });

    // Función para cargar municipios
    function cargarMunicipios(id_estado, selected = null, callback = null) {
        if (!id_estado) return;
        
        $.post($('#SERVERURL').val() + "includes/GetMunicipio.php", {
            id_estado: id_estado,
            SERVERDIR: $('#SERVERDIR').val()
        }, function(data) {
            $('#cbx_municipio').html(data);
            if (selected) {
                $('#cbx_municipio').val(selected);
            }
            if (callback) callback();
        }).fail(function() {
            console.error("Error cargando municipios");
        });
    }

    // Función para cargar ciudades
    function cargarCiudades(id_estado, selected = null) {
        if (!id_estado) return;
        
        $.post($('#SERVERURL').val() + "includes/GetCiudad.php", {
            id_estado: id_estado,
            SERVERDIR: $('#SERVERDIR').val()
        }, function(data) {
            $('#cbx_ciudad').html(data);
            if (selected) {
                $('#cbx_ciudad').val(selected);
            }
        }).fail(function() {
            console.error("Error cargando ciudades");
        });
    }

    // Función para cargar parroquias
    function cargarParroquias(id_municipio, selected = null) {
        if (!id_municipio) return;
        
        $.post($('#SERVERURL').val() + "includes/GetParroquia.php", {
            id_municipio: id_municipio,
            SERVERDIR: $('#SERVERDIR').val()
        }, function(data) {
            $('#cbx_parroquia').html(data);
            if (selected) {
                $('#cbx_parroquia').val(selected);
            }
        }).fail(function() {
            console.error("Error cargando parroquias");
        });
    }

    // Evento change para Estado
    $("#cbx_estado").change(function() {
        const id_estado = $(this).val();
        $('#cbx_municipio').html('<option value="">Seleccione</option>');
        $('#cbx_ciudad').html('<option value="">Seleccione</option>');
        $('#cbx_parroquia').html('<option value="">Seleccione</option>');

        if (id_estado) {
            cargarMunicipios(id_estado);
            cargarCiudades(id_estado);
        }
    });

    // Evento change para Municipio
    $("#cbx_municipio").change(function() {
        const id_municipio = $(this).val();
        $('#cbx_parroquia').html('<option value="">Seleccione</option>');

        if (id_municipio) {
            cargarParroquias(id_municipio);
        }
    });

    // Carga inicial de datos
    function inicializarSelects() {
        const id_estado = $('#cbx_estado').data('selected');
        const id_municipio = $('#cbx_municipio').data('selected');
        const id_ciudad = $('#cbx_ciudad').data('selected');
        const id_parroquia = $('#cbx_parroquia').data('selected');

        if (id_estado) {
            cargarMunicipios(id_estado, id_municipio, function() {
                if (id_municipio) {
                    cargarParroquias(id_municipio, id_parroquia);
                }
            });
            cargarCiudades(id_estado, id_ciudad);
        }
    }

    // Inicializar después de un breve retraso
    setTimeout(inicializarSelects, 100);

    // Validación de RIF (máximo 10 caracteres)
    $('input[name="rif"]').on('input', function() {
        if (this.value.length > 10) {
            this.value = this.value.slice(0, 10);
        }
    });

    // Validación de Teléfono (solo números, máximo 11 dígitos)
    $('input[name="telefono"]').on('input', function() {
        this.value = this.value.replace(/\D/g, '');
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11);
        }
    });

    // Validación de coordenadas (solo números decimales)
    $('input[name="coord_altitud"], input[name="coord_latitud"]').on('input', function() {
        this.value = this.value.replace(/[^0-9.-]/g, '');
    });

    // Validación del formulario antes de enviar
    $('#formAgencia').submit(function (e) {
        e.preventDefault(); // Detiene envío

        let isValid = true;
        const emailInput = $('input[name="email"]');
        const email = emailInput.val().trim().toLowerCase();

        const dominiosComunes = {
            "gmial.com": "gmail.com",
            "gamil.com": "gmail.com",
            "gnail.com": "gmail.com",
            "gmial": "gmail.com",
            "gamil": "gmail.com",
            "gnail": "gmail.com",
            "hotmial.com": "hotmail.com",
            "hotmil.com": "hotmail.com",
            "hotmial": "hotmail.com",
            "hotmil": "hotmail.com",
            "yaho.com": "yahoo.com",
            "yaho": "yahoo.com",
            "outlok.com": "outlook.com",
            "outlok": "outlook.com"
        };

        if (email !== '') {
            const partes = email.split('@');
            if (partes.length === 2) {
                const usuario = partes[0];
                let dominio = partes[1].toLowerCase().trim();

                // Quitar punto final si existe
                dominio = dominio.replace(/\.$/, '');

                if (dominiosComunes[dominio]) {
                    emailInput.addClass('is-invalid').focus();
                    alert(`¿Quisiste decir ${usuario}@${dominiosComunes[dominio]}?\nCorrige el correo antes de continuar.`);
                    return false;
                }
            }

            // Validar formato general
            const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regexCorreo.test(email)) {
                emailInput.addClass('is-invalid').focus();
                alert("Por favor ingresa un correo electrónico válido.");
                return false;
            } else {
                emailInput.removeClass('is-invalid');
            }
        }

        // Validar campos obligatorios
        $('[required]').each(function () {
            if ($(this).val().trim() === '') {
                $(this).addClass('is-invalid');
                isValid = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        const lat = $('input[name="coord_latitud"]').val();
        const alt = $('input[name="coord_altitud"]').val();
        if (isNaN(lat) || isNaN(alt)) {
            $('input[name="coord_latitud"], input[name="coord_altitud"]').addClass('is-invalid');
            isValid = false;
        }

        if (!isValid) {
            alert('Por favor completa todos los campos requeridos.');
            return false;
        }

        // Finalmente, enviar el formulario
        this.submit(); // Se ejecuta solo si todo está bien
    });

    // Animación hover para botón Guardar
    $('.btn-success').hover(
        function() { $(this).css('background-color', '#BB2D3B'); },
        function() { $(this).css('background-color', '#DC3545'); }
    );
});

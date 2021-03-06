$('#contacto').validate(  {
        rules: {
            nombre: {
              required: true,
              minlength: 5
            },
            telefono: {
              required: true,
              minlength: 7
            },
            correo: {
              email: true,
              required: true,
              
            },
            empresa: {
              required: true,
            },
            sector: {
              required: true,
            },
            empleados: {
              required: true,
            },
            cargo: {
              required: true,
            }
          },
          messages: {
            nombre: {
              required: "Por favor escribe tu nombre",
              minlength: "Tu nombre es demasiado corto"
            },
            telefono: {
              required: "Por favor escribe tu teléfono",
              minlength: "Tu teléfono es demasiado corto"
            },
            correo: {
              required: "Por favor escribe tu E-mail",
              minlength: "Escribe un E-mail valido"
            },
            empresa: {
              required: "Por favor completa este campo",
            },
            sector: {
              required: "Por favor selecciona un opsión",
            },
            empleados: {
              required: "Por favor completa este campo",
            },
            cargo: {
              required: "Por favor completa este campo",
            }
            
          },
  submitHandler: function(form){
    $.post('includes/validation.php',$('#contacto').serialize())
    .done(function(data){
      $('.form-control').val('');
      bootbox.alert(data, function() {console.log("Alert Callback");});
      window.location.href = "http://www.javerianaempresarial.com/?content=gracias";
    })
  }

});

$('#contacto2').validate(  {
        rules: {
            nombre: {
              required: true,
              minlength: 5
            },
            telefono: {
              required: true,
              minlength: 7
            },
            correo: {
              email: true,
              required: true,
              
            },
            empresa: {
              required: true,
            },
            sector: {
              required: true,
            },
            empleados: {
              required: true,
            },
            cargo: {
              required: true,
            }
          },
          messages: {
            nombre: {
              required: "Por favor escribe tu nombre",
              minlength: "Tu nombre es demasiado corto"
            },
            telefono: {
              required: "Por favor escribe tu teléfono",
              minlength: "Tu teléfono es demasiado corto"
            },
            correo: {
              required: "Por favor escribe tu E-mail",
              minlength: "Escribe un E-mail valido"
            },
            empresa: {
              required: "Por favor completa este campo",
            },
            sector: {
              required: "Por favor selecciona un opsión",
            },
            empleados: {
              required: "Por favor completa este campo",
            },
            cargo: {
              required: "Por favor completa este campo",
            }
            
          },
  submitHandler: function(form){
    $.post('includes/validation.php',$('#contacto').serialize())
    .done(function(data){
      $('.form-control').val('');
      bootbox.alert(data, function() {console.log("Alert Callback");});
      window.location.href = "http://www.javerianaempresarial.com/?content=gracias";
    })
  }

});

$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
    $('.bxslider').bxSlider({
       mode: 'fade'
    });
  });
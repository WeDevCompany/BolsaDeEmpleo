// Añadimos la configuracion de datepicker
studentRegisterForm.after('<script src="/js/funcionalidad/funciones.js" charset="utf-8"></script>');

// Script personalizado para las funciones de validación
// Estas contienen un objeto con métodos de validación que permiten
// validar una serie de situacione genericas
studentRegisterForm.after('<script src="/js/validaciones/validaciones.js"></script>');

// Script Drag and Drop Personalizado
studentRegisterForm.after('<script src="/js/dragDrop.js" charset="utf-8"></script>');

// Script de chosen (select multiple)
studentRegisterForm.after('<script src="/plugin/chosen/chosen.jquery.js"></script>');

// Script personalizado de chosen
studentRegisterForm.after('<script src="/plugin/chosen/chosenConfig.js"></script>');

// Script personalizado de chosen
studentRegisterForm.after('<script src="/js/validaciones/cycles.js"></script>');

// Script personalizado para aceptar terminos
studentRegisterForm.after('<script src="/js/validaciones/terminos.js"></script>');

// Script personalizado para validar DNI/NIE
studentRegisterForm.after('<script src="/js/validaciones/dniNie.js"></script>');

// Script de validación del nombre
studentRegisterForm.after('<script src="/js/validaciones/firstName.js"></script>');

// Script de validación del apellido
studentRegisterForm.after('<script src="/js/validaciones/lastName.js"></script>');

// Script de validación del telefono
studentRegisterForm.after('<script src="/js/validaciones/phone.js"></script>');

// Script de validación de la dirección
studentRegisterForm.after('<script src="/js/validaciones/address.js"></script>');

// Script de validación del email
studentRegisterForm.after('<script src="/js/validaciones/email.js"></script>');

// Script de validación de la contraseña
studentRegisterForm.after('<script src="/js/validaciones/password.js"></script>');

// Script de validación de la confirmacion de la contraseña
studentRegisterForm.after('<script src="/js/validaciones/passwordConfirmation.js"></script>');

// Script de validación de los años cursados
studentRegisterForm.after('<script src="/js/validaciones/cycleYear.js"></script>');

// Script de validación del nre
studentRegisterForm.after('<script src="/js/validaciones/nre.js"></script>');

// Añadimos las funciones para añadir ciclos
studentRegisterForm.after('<script src="/js/funcionalidad/addFamilyCycles.js" charset="utf-8"></script>');

// Añadimos las funciones para las peticiones ajax
studentRegisterForm.after('<script src="/js/ajax/ajax.js" charset="utf-8"></script>');

// Añadimos el cargado por ajax de la información de los ciclos
studentRegisterForm.after('<script src="/js/ajax/cycles.js" charset="utf-8"></script>');

// Añadimos la configuracion de datepicker
studentRegisterForm.after('<script src="/js/datepicker/datepickerConfig.js" charset="utf-8"></script>');

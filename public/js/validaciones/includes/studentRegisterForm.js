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

// Script de validación del nre
studentRegisterForm.after('<script src="/js/validaciones/nre.js"></script>');

// Añadimos el objeto que nos añadira los ciclos y familias
studentRegisterForm.after('<script src="/js/funcionalidad/addFamilyCycles.js"></script>');

// Añadimos el js encargado de gestionar las peticiones ajax
studentRegisterForm.after('<script src="/js/forms/studentFormActions.js"></script>');

// Añadimos la configuracion de datepicker
studentRegisterForm.after('<script src="/js/datepicker/datepickerConfig.js" charset="utf-8"></script>');

// Script personalizado para las funciones de validación
// Estas contienen un objeto con métodos de validación que permiten
// validar una serie de situacione genericas
teacherRegisterForm.after('<script src="/js/validaciones/validaciones.js"></script>');

// Script Drag and Drop Personalizado
teacherRegisterForm.after('<script src="/js/dragDrop.js" charset="utf-8"></script>');

// Script de chosen (select multiple)
teacherRegisterForm.after('<script src="/plugin/chosen/chosen.jquery.js"></script>');

// Script personalizado de chosen
teacherRegisterForm.after('<script src="/plugin/chosen/chosenConfig.js"></script>');

// Script de validación de terminos de uso
//teacherRegisterForm.after('<script src="/js/validaciones/terminos.js"></script>');

// Script de validación del nombre
//teacherRegisterForm.after('<script src="/js/validaciones/firstName.js"></script>');

// Script de validación del apellido
//teacherRegisterForm.after('<script src="/js/validaciones/lastName.js"></script>');

// Script personalizado para validar DNI/NIE
//teacherRegisterForm.after('<script src="/js/validaciones/dniNie.js"></script>');

// Script de validación del telefono
//teacherRegisterForm.after('<script src="/js/validaciones/phone.js"></script>');

// Script de validación de la dirección
//teacherRegisterForm.after('<script src="/js/validaciones/address.js"></script>');

// Script de validación del email
//teacherRegisterForm.after('<script src="/js/validaciones/email.js"></script>');

// Script de validación de la contraseña
//teacherRegisterForm.after('<script src="/js/validaciones/password.js"></script>');

// Script de validación de la confirmacion de la contraseña
//teacherRegisterForm.after('<script src="/js/validaciones/passwordConfirmation.js"></script>');

// Script de validación de la confirmacion de la contraseña
teacherRegisterForm.after('<script src="/js/validaciones/validateTeacherRegisterForm.js"></script>');

// Script que contiene todas las acciones que hará con jQuery el formulario
teacherRegisterForm.after('<script src="/js/forms/teacherFormActions.js"></script>');

// Script que contiene la configuración del tooltip de validaciones
teacherRegisterForm.after('<script src="/js/funcionalidad/tooltip.js"></script>');

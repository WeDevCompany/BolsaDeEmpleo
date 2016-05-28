// Añadimos la configuracion de datepicker
enterpriseRegisterForm.after('<script src="/js/funcionalidad/funciones.js" charset="utf-8"></script>');

// Script personalizado para las funciones de validación
// Estas contienen un objeto con métodos de validación que permiten
// validar una serie de situacione genericas
enterpriseRegisterForm.after('<script src="/js/validaciones/validaciones.js"></script>');

// Script Drag and Drop Personalizado
enterpriseRegisterForm.after('<script src="/js/dragDrop.js" charset="utf-8"></script>');

// Script de chosen (select multiple)
enterpriseRegisterForm.after('<script src="/plugin/chosen/chosen.jquery.js"></script>');

// Script personalizado de chosen
enterpriseRegisterForm.after('<script src="/plugin/chosen/chosenConfig.js"></script>');

// Script personalizado de chosen
enterpriseRegisterForm.after('<script src="/js/validaciones/cycles.js"></script>');

// Script personalizado para aceptar terminos
enterpriseRegisterForm.after('<script src="/js/validaciones/terminos.js"></script>');

// Script personalizado para validar DNI/NIE
enterpriseRegisterForm.after('<script src="/js/validaciones/dniNie.js"></script>');

// Script de validación del nombre
enterpriseRegisterForm.after('<script src="/js/validaciones/firstName.js"></script>');

// Script de validación del apellido
enterpriseRegisterForm.after('<script src="/js/validaciones/lastName.js"></script>');

// Script de validación del telefono
enterpriseRegisterForm.after('<script src="/js/validaciones/phone.js"></script>');

// Script de validación de la dirección
enterpriseRegisterForm.after('<script src="/js/validaciones/address.js"></script>');

// Script de validación del email
enterpriseRegisterForm.after('<script src="/js/validaciones/email.js"></script>');

// Script de validación de la contraseña
enterpriseRegisterForm.after('<script src="/js/validaciones/password.js"></script>');

// Script de validación de la confirmacion de la contraseña
enterpriseRegisterForm.after('<script src="/js/validaciones/passwordConfirmation.js"></script>');

// Script con el objeto spin
enterpriseRegisterForm.after('<script src="/js/spin/spin.js"></script>');

// Añadimos el objeto que nos añadira los nuevos responsables
enterpriseRegisterForm.after('<script src="/js/funcionalidad/addEnterpriseResponsable.js"></script>');

// Añadimos el objeto de ajax
enterpriseRegisterForm.after('<script src="/js/ajax/ajax.js"></script>');

// Añadimos el js encargado de gestionar las peticiones ajax
enterpriseRegisterForm.after('<script src="/js/forms/enterpriseFormActions.js"></script>');

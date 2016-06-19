// Añadimos la configuracion de datepicker
login.after('<script src="/js/funcionalidad/funciones.js" charset="utf-8"></script>');

// Script personalizado para las funciones de validación
// Estas contienen un objeto con métodos de validación que permiten
// validar una serie de situacione genericas
login.after('<script src="/js/validaciones/validaciones.js"></script>');

// Cargamos las validaciones del email
login.after('<script src="/js/validaciones/email.js" charset="utf-8"></script>');

// Cargamos las validaciones de la contraseña
login.after('<script src="/js/validaciones/password.js" charset="utf-8"></script>');

// Cargamos las validaciones de la contraseña
login.after('<script src="/js/validaciones/validateLoginForm.js" charset="utf-8"></script>');

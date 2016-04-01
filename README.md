# Bolsa de Empleo
## Proyecto Final del Ciclo de Desarrollo de aplicaciones web

> A continuación se redactarán una serie de reglas que deben cumplirse
> para que el trabajo en equipo pueda llevarse a cabo sin problemas.
> Es **IMPORTANTE** seguirlas al pie de la letra.

### Subida de archivos
- Sólamente se subirán archivos contenidos en el interior del proyecto de Laravel.
- No se deben añadir o subir carpetas ajenas al proyecto a no ser que sea extrictamente necesario y que sea para el uso de todos.

### Forma de trabajo
- Cada uno trabajará en una rama **SECUNDARIA**, **NUNCA** sobre la rama principal.
- Cada rama corresponde a una entidad y para cada una de las operaciones **CRUD** se hará una rama de dicha rama secundaria.
- **NUNCA** se hará commit sobre la rama **PRINCIPAL**.
- Antes de unir la rama secundaria con la **PRINCIPAL**, se expondrá a los demás el código realizado y se decidirá en grupo si realmente se unen los cambios a la rama principal o no.
- Cuando se termine una rama o subrama se añadirá una etiqueta con el nombre de la parte del proyecto que se acaba de terminar.
- Se tratará de optimizar el código en la medida de lo posible y de explotar al máximo todos los beneficios de Laravel.

![Ejemplo Principal] (/Imagenes/Ejemplo de Ramas.png "Ejemplo Principal")
![Ejemplo Simplificado] (/Imagenes/Explicación ramas GitHub.png "Ejemplo Simplificado")

### Diagrama de la base de datos
![Diagrama BD] (/Imagenes/Diagrama_sesión10_v1.png "Diagrama de la base de datos a día [01/04/2016 13:56]")

**Actualmente necesita actualizarse**
![Ingeniería inversa] (/Imagenes/ingeniería inversa.png "Ingeniería inersa de la base de datos a día [28/03/2016:16:07]")

### ID para pruebas
![Usuarios de prueba] (/Imagenes/Datos de los seeder.png "Usuarios de prueba")

### Usuarios de acceso
![Usuarios] (/Imagenes/Datos de acceso a la aplicación.png "Usuarios de acceso")

### Relaciones de pruebas entre Empresas - WorkCenter - JobOffers
![Referencias] (/Imagenes/Referencias_empresas_workcenter_ofertas.png "Relaciones de pruebas entre Empresas - WorkCenter - JobOffers")

### Consultas para probar seeders y que posiblemente necesitemos
	/* Las empresas que hayan puesto una oferta*/
	SELECT enterprises.name, cif
	FROM enterprises, workCenters, jobOffers
	WHERE workCenters.enterprise_id = enterprises.id
	AND jobOffers.workCenter_id = workCenters.id
	GROUP BY enterprises.name, cif;
---

	/* Las empresas que no tengan ofertas */
	SELECT enterprises.id, enterprises.name, cif
	FROM enterprises, workCenters
	WHERE enterprises.id NOT IN (SELECT enterprises.id
	FROM enterprises, workCenters, jobOffers
	WHERE workCenters.enterprise_id = enterprises.id
	AND jobOffers.workCenter_id = workCenters.id
	)
	GROUP BY enterprises.id, enterprises.name, cif;
---
	/* Las empresas validadas sin oferta */
	SELECT enterprises.id, enterprises.name, cif
	FROM enterprises, workCenters
	WHERE workCenters.enterprise_id = enterprises.id and workCenters.id NOT IN (SELECT workCenters.id
	FROM workCenters, jobOffers
	WHERE jobOffers.workCenter_id = workCenters.id);
---
	/* Empresas que tienen un centro de trabajo en Murcia */
	SELECT enterprises.id, enterprises.name, cities.name, states.name
	FROM enterprises, workCenters, cities, states
	WHERE enterprises.id = workCenters.enterprise_id
	AND workCenters.citie_id = cities.id
	AND cities.state_id = states.id;
---
	/* Obtener todas las ciudades de una provincia en este*/
	SELECT cities.name
	FROM cities, states
	WHERE state_id = states.id
	AND states.name = 'Murcia';
---
	/* obtenemos los centros principales de las empresas */
	SELECT enterprises.name as empresa, workCenters.name as centro
	FROM enterprises, workCenters
	WHERE enterprise_id = enterprises.id
	AND principalCenter = 1;
---
	/* obtenemos los centros principales de una empresa */
	SELECT enterprises.name as empresa, workCenters.name as centro
	FROM enterprises, workCenters
	WHERE enterprise_id = enterprises.id
	AND principalCenter = 1
	AND enterprises.id = 1;
---
	/* cuantas ofertas de trabajo tiene cada empresa */
	SELECT enterprises.id, enterprises.name, count(*) as ofertas
	FROM enterprises, workCenters, jobOffers
	WHERE workCenters.enterprise_id = enterprises.id
	AND jobOffers.workCenter_id = workCenters.id
	GROUP BY enterprises.id, enterprises.name;
---
	/* cuantas ofertas de trabajo tiene cada empresa en su centro principal */
	SELECT enterprises.id, enterprises.name, count(*) as ofertas
	FROM enterprises, workCenters, jobOffers
	WHERE workCenters.enterprise_id = enterprises.id
	AND jobOffers.workCenter_id = workCenters.id
	AND principalCenter = 1
	GROUP BY enterprises.id, enterprises.name
	HAVING count(*);
---
	/* Obtener el número de suscriptores de una oferta */
	SELECT jobOffers.id ,jobOffers.title, count(*) as alumnos_suscritos
	FROM jobOffers, subcriptions
	WHERE jobOffers.id = jobOffer_id
	GROUP BY jobOffers.id, jobOffers.title;
---
	/* Obtener el número de suscriptores de una oferta con la información del centro de trabajo que lanza la oferta y a que empresa pertenece y el nombrebre del responsable de la oferta */
	SELECT enterprises.name as empresa, workCenters.name as centro_de_trabajo, firstName as Nombre_responsable, lastName as Apellidos_responsable ,jobOffers.title, count(*) as alumnos_suscritos
	FROM jobOffers, subcriptions, enterprises, workCenters, enterpriseResponsables
	WHERE jobOffers.id = jobOffer_id
	AND enterprise_id = enterprises.id
	AND workCenters.id = jobOffers.workCenter_id
	AND enterpriseResponsables.id = enterpriseResponsable_id
	GROUP BY jobOffers.id, jobOffers.title;
---
	/* El nombre y apellidos de los profesores que hayan dado por válida una oferta de una empresa, el titulo de esa oferta y el nombtre de*/
	select firstName, lastName, name as 'Centro de trabajo', title
	 from teachers, verifiedOffers, jobOffers, workCenters
	 where teachers.id = verifiedOffers.teacher_id AND verifiedOffers.jobOffer_id = jobOffers.id
	 and jobOffers.workCenter_id = workCenters.id;
---
	/* Empresas validadas o no que no tienen ofertas de trabajo*/
	SELECT enterprises.id, enterprises.name, cif
	 FROM enterprises
	 WHERE enterprises.id NOT IN (SELECT enterprises.id
	 FROM enterprises, workCenters, jobOffers
	 WHERE workCenters.enterprise_id = enterprises.id
	 AND jobOffers.workCenter_id = workCenters.id);
---
	/* Empresas que tinen centro de trabajo*/
	SELECT enterprises.id, enterprises.name, cif
	 FROM enterprises, workCenters
	 WHERE workCenters.enterprise_id = enterprises.id and workCenters.id NOT IN (SELECT workCenters.id
	 FROM workCenters, jobOffers
	 WHERE jobOffers.workCenter_id = workCenters.id);
---
	 /* Un alumno suscrito a mas de dos ofertas*/
	SELECT firstName as 'Nombre', lastName as 'Apellidos', count(*) as 'Número de suscripciones'
	 FROM students, subcriptions
	 WHERE students.id = student_id group by students.id having count(*) > 2;
---
	/* El nombre de los tags ordenados por numero de repeticiones en sus ofertas de trabajo*/
	SELECT tag_id, tag, count(*) as 'Repeticiones'
	 FROM tags, offerTags
	 WHERE tags.id = tag_id group by tag_id, tag order by count(*) desc;
---
	/* El nombre e identificador de los tags que no han sido usados en ninguna oferta.*/
	SELECT id, tag
	 FROM tags
	 WHERE id NOT IN (SELECT tag_id FROM offerTags);
---
/* Tags mas repetidos en others y que no esten insertados (PENDIENTE)*/

	/* Ciclos activos que no tengan tutores este año*/
	SELECT cycles.id, cycles.name, profFamilies.name
	 FROM cycles, profFamilies
	 WHERE cycles.active = true AND profFamilie_id = profFamilies.id
	 AND cycles.id NOT IN (SELECT cycle_id from tutors where dateTo = '2016');
---
	/* Ciclos sin alumnos matriculados ese año*/
	SELECT cycles.id, cycles.name, profFamilies.name
	 FROM cycles, profFamilies
	 WHERE cycles.active = true AND profFamilie_id = profFamilies.id
	 AND cycles.id NOT IN (SELECT cycle_id from studentCycles where dateTo = '2016');
---
	/* Asignaturas de un ciclo sin tags*/
	SELECT subjects.name, cycles.name, profFamilies.name
	 FROM subjects, cycleSubjects, cycles, profFamilies
	 WHERE subjects.id = cycleSubjects.subject_id AND cycleSubjects.cycle_id = cycles.id
	  AND profFamilies.id = cycles.profFamilie_id AND cycleSubjects.id NOT IN (SELECT tag_id FROM cycleSubjectTags);
### Ideas pendientes de implantar
- Un profesor puede sugerir una oferta a un profesor en concreto.
- Un profesor tutor puede contactar con el administrador desde la aplicacion para poderle sugerir nuevas etiquetas para añadir a la base de datos.
- Fotografía para el profesor (útil a la hora de ver los comentarios que han puesto en una oferta).
- Campo descripción el la tabla Cycles_Subjects
- Procedimiento que compruebe los ciclos activos que aún no tienen un tutor año tras año.

function importStudents(e) {

	// Obtengo el archivo de entrada del elemento con ID "file"
	const fileInput = document.getElementById("file");
	const file = fileInput.files[0];

	// Verifico si se ha seleccionado un archivo
	if (file) {
		// Imprimo el nombre y el tamaño del archivo en la consola
		console.log("Nombre del archivo: " + file.name);
		console.log("Tamaño del archivo: " + file.size);

		// Creo una instancia de FileReader
		const reader = new FileReader();

		// Defino qué hacer cuando se complete la lectura del archivo
		reader.onload = function (event) {
			// Obtengo el contenido del archivo
			const content = event.target.result;
			console.log("Contenido del archivo:");
			console.log(content);

			// Divido el contenido del archivo en líneas
			const lines = content.split("\n");
			console.log("Líneas del archivo:");
			console.log(lines);

			// Inicializo una lista de estudiantes vacía
			let studentList = [];

			// Itero sobre cada línea del archivo, empezando desde la segunda línea
			for (let i = 1; i < lines.length; i++) {
				// Divido los datos de cada línea por coma
				const data = lines[i].split(",");
				console.log("Datos de la línea " + i + ":");
				console.log(data);

				// Creo un objeto con los datos del estudiante
				const studentData = {
					dni: data[0],
					nombre: data[1],
					apellidos: data[2],
					email: data[3],
					edad: data[4],
					fotografia: data[5],
					password: data[6],
					cursos: data[7],
				};

				// Agrego el objeto de datos del estudiante a la lista de estudiantes
				studentList.push(studentData);
			}

			// Imprimo la lista de estudiantes en la consola
			console.log("Lista de estudiantes:");
			console.log(studentList);

			// Inicializo una cadena de contenido de tabla vacía
			let tableContent = "";

			// Itero sobre cada estudiante en la lista y construir filas de tabla
			studentList.forEach(function (row) {
				tableContent += `
        <tr>
            <td>${row.email}</td>
            <td>${row.password}</td>
            <td>${row.nombre}</td>
            <td>${row.apellidos}</td>
            <td>${row.edad}</td>
            <td><img width="100" class="imagen_tabla" src="assets/img/${row.fotografia}"></td>
            <td>${row.dni}</td>
            <td>${row.cursos}</td>
        </tr>
    `;
			});

			// Construyo el contenido de los botones para la gestión
			let buttonsContent = `
        <a class="boton-personalizado" href="index.php?controller=student&action=addImportedStudent&studentList=${encodeURIComponent(
			JSON.stringify(studentList)
		)}">Añadir a la base de datos</a>
        <a class="boton-personalizado" href="index.php?controller=admin&action=logOut">Cerrar sesión</a>
`;

			// Agrego el contenido de los botones al elemento con ID "menu-gestion-btns"
			document.getElementById(
				"menu-gestion-btns"
			).innerHTML = buttonsContent;

			// Elimino el formulario antiguo si existe
			let oldForm = document.getElementById("form-import-students");
			if (oldForm) {
				oldForm.remove();
			}

			// Creo una tabla y su encabezado
			let table = document.createElement("table");
			table.className = "content-table";
			let thead = table.createTHead();
			let headerRow = thead.insertRow();
			let headers = [
				"Correo",
				"Contraseña",
				"Nombre",
				"Apellido",
				"Edad",
				"Fotografia",
				"DNI",
				"Cursos",
			];
			headers.forEach(function (header) {
				let th = document.createElement("th");
				th.appendChild(document.createTextNode(header));
				headerRow.appendChild(th);
			});

			// Creo el cuerpo de la tabla y agrego el contenido de la tabla
			let tbody = table.createTBody();
			tbody.innerHTML = tableContent;

			// Agrego la tabla al elemento con clase "tabla"
			document.querySelector(".tabla").appendChild(table);
		};

		// Defino qué hacer en caso de error al leer el archivo
		reader.onerror = function (event) {
			if (event.target.error !== null) {
				console.error(
					"Error al cargar el archivo: " + event.target.error
				);
			}
		};

		// Leo el contenido del archivo como texto
		reader.readAsText(file);
	} else {
		// Muestro una alerta si no se ha seleccionado ningún archivo
		alert("No se ha seleccionado ningún archivo.");
	}
}

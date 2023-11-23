random = Math.round(Math.random() * 2); //calculamos un numero random para el concurso

var cursos = document.cookie
	.replace(/(?:(?:^|.*;\s*)cursos\s*\=\s*([^;]*).*$)|^.*$/, "$1")
	.split("-");
cursos.shift(); //obtenemos los nombres de los cursos en la base de datos  desde una cookie

randomindex = Math.round(Math.random() * (cursos.length - 1));
cursoAleatorio = cursos[randomindex]; //seleccionamos un curso aleatorio

modal = `<html lang="en"> 
			<head>
			<style>
			.concurso_msg{
				display: flex;
				align-items: center;
				justify-content: center;
				border-radius: 7px;
				border-color: #041925;
				border: 2px solid #041925;
				height: calc(100vh - 20px);
				background-color: cadetblue;
				font-weight: bold;

			}
			
			.concurso_msg button{
			
			
				background-color: #041925;
				color: white;
				border-radius: 7px;
				border-width: 0px;
				transition: all 0.3s ease;
				padding: 5px 10px;
				margin-left: 10px;
			}
			
			.concurso_msg button:hover{
				background-color: #0e3b55;
				transform: scale(1.1)
			}
			</style>
			</head> 
			<body> 
				<div class="concurso_msg">`; //html a cargar en la ventana emergente

switch (
	random //se completa el html segun el caso
) {
	case 0:
		modal +=
			"has ganado gratis el curso de " +
			cursoAleatorio +
			`
				<button id='aceptar_concurso'>Aceptar</button> 
			</div>
			</body>
			</html>
			`;
		break;
	case 1:
		modal +=
			"has ganado un descuento del 30% en el curso de " +
			cursoAleatorio +
			`
		<button id='aceptar_concurso'>Aceptar</button>
	</div>
	</body>
	</html>
	`;
		break;
	case 2:
		modal += `
			¡oh vaya!, que mala suerte tienes, no has ganado un curso
			<button id='aceptar_concurso'>Aceptar</button>
		</div>
		</body>
		</html>
		`;
		break;
}

let medioaltura = window.screen.height / 2 - 100; //calculamos la distáncia que debemos separar la ventana emergente de cada esquina
let medioaancho = window.screen.width / 2 - 250; //teniendo en cuenta que se deben restar las dimensiones de la ventana emergente, para que quede centrado

let nuevaVentana = window.open(
	"",
	"testing",
	"width=700, height=300,left=" + medioaancho + ", top=" + medioaltura
); //abrimos la ventana con la configuración que teníamos

nuevaVentana.document.open();
nuevaVentana.document.write(modal); //establecemos el html a mostrar en la nueva ventana de acuerdo  al caso del concurso
nuevaVentana.document.close();

let boton = nuevaVentana.document.getElementById("aceptar_concurso");
boton.addEventListener("click", () => {
	// damos la accion al boton de cerrar la ventana al ser pulsado
	nuevaVentana.close();
});

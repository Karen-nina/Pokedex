let apiURL = "../data/Pokemones.json";
let apiURL_tipo = "../data/Tipo_pokemones.json";

let pokemones = [];
let tiposPokemon = [];

async function getEventsData(){
    const respuesta = await fetch(apiURL);
    pokemones = await respuesta.json();
    const respuesta2 = await fetch(apiURL_tipo);
    tiposPokemon = await respuesta2.json();
	if(document.title == "Details") crearDetails();
    else pokemones.forEach(pokemon => crearTrajeta(pokemon));
	//else generarFiltros();
}

getEventsData();

//GENERAR FILTROS DINAMICAMENTE
function generarFiltros() {
	console.log(pokemones);
	console.log(tiposPokemon);
    const categorias = [];

	for (let i = 0; i < tiposPokemon.length; i++) {
			categorias.push(tiposPokemon[i].tipo);
		
	}
    console.log(categorias);
	const divFiltros = document.querySelector("#div_filtros_div");
	for (let i = 0; i < categorias.length; i++) {
		const category = categorias[i];
		const label = document.createElement("label");
		label.innerHTML = `
            <input type="checkbox" name="${category}" class="filter-checkbox">
            <span>${category}</span>
        `;
		divFiltros.appendChild(label);
	}
	pokemones.forEach(pokemon => crearTrajeta(pokemon))
}


//CREAR EVENTOS
const contenedor = document.querySelector("#section_cards");
let div_eventos = [];

function crearTrajeta(pokemon) {
	const card = document.createElement("div");
    let resumen = extraerTexto(pokemon.informacion, ".");
	card.classList.add("card","border-0");
	card.id = pokemon.id;
	card.innerHTML = `

    <img class="card-img-top w-100" id="img_card" src="${pokemon.imagen}" alt="${pokemon.nombre}">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">${pokemon.nombre}</h5>
                <p class="card-text">
                ${resumen}
                </p>
                <div class="card_botones card_div_price_buton d-flex" >
                    <a href="./details.html?id=${pokemon.id}" class="btn w-100" id="${pokemon.id}">View more ></a>
                </div>
                <div class="card_edicion card_div_price_buton d-flex pt-2" >
                    <a href="./details.html?id=${pokemon.id}" class="btn btn-outline-info w-100 " id="${pokemon.id}">Editar contenido</a>
                    <a href="./details.html?id=${pokemon.id}" class="btn btn-outline-danger w-100" id="${pokemon.id}">Eliminar</a>
                </div>
            </div>
        `
        contenedor.append(card);
	div_eventos.push(card);
}

function extraerTexto(texto, discriminante){
    let resultado= "";
    for (let i = 0; i < texto.length; i++) {
        if(texto[i] != discriminante) resultado += texto[i]
        else break;
    }
    return resultado;
}

function crearDetails(){
    const contenedor = document.getElementById('card_details');
    // URLSearchParams
    const queryBusqueda = document.location.search;
    const idPokemon = new URLSearchParams(queryBusqueda).get("id");

    const pokemon = pokemones.find(pokemon => pokemon.id == idPokemon);
    let totalCb = pokemon.ataque + pokemon.defensa + pokemon.at_especial + pokemon.def_especial + pokemon.velocidad;
    
    contenedor.innerHTML = `
    <div class="card border-0" id="card_details2">
        <img id="card_details_img" src=${pokemon.imagen} class="card-img-top" alt="...">
        <div class="card-body p-5 " id="card-body_d">
            <div id="titulo_details" class="d-flex justify-content-between align-items-flex-start">
                <h5 class="card-title">${pokemon.nombre}</h5>
                <div>
                    <span class="spanTipo" id="idTipo">Veneno</span>
                    <span class="spanTipo" id="idTipo">Electrico</span>
                </div>
            </div>
            <p class="card-text my-3">
                ${pokemon.informacion}!!</p>
            <table class="w-100">
                <tbody>
                    <tr class="thead">
                        <th colspan="7">Caracteristicas base</th>
                    </tr>
                    <tr class="tabla_titulo">
                        <td class="td_destac">Ranking</td>
                        <td>Ataque</td>
                        <td>Defensa</td>
                        <td>Ataque especial</td>
                        <td>Defensa especial</td>
                        <td>Velocidad</td>
                        <td>Total</td>
                    </tr>
                    <tr>
                        <td class="td_destac">#10</td>
                        <td>${pokemon.ataque}</td>
                        <td>${pokemon.defensa}</td>
                        <td>${pokemon.at_especial}</td>
                        <td>${pokemon.def_especial}</td>
                        <td>${pokemon.velocidad}</td>
                        <td>${totalCb}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    `

}
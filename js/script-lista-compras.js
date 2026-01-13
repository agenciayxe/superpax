var formListaAdiciona = document.getElementById("form-itens-compras");
var boxLista = document.getElementById("lista");
var arrayLista = [];

var limparConteudo = () => {
    boxLista.innerHTML="";
}

var listaVazia = () => {
    limparConteudo();
    var semLista = document.createElement("div");
    semLista.classList.add('rounded-xl', 'overflow-hidden', 'shadow-lg', 'bg-gray-200', 'my-4', 'md:flex', 'items-stretch');
    semLista.setAttribute("id", "lista-negativa");
    boxLista.appendChild(semLista);

    var areaSemLista = document.createElement("div");
    areaSemLista.classList.add('w-full', 'p-10', 'text-center');
    areaSemLista.setAttribute("id", "area-lista-vazia");
    semLista.appendChild(areaSemLista);

    var iconeSemLista = document.createElement("i");
    iconeSemLista.classList.add('fa-solid', 'fa-box-open', 'text-4xl', 'text-red-700', 'my-4');
    areaSemLista.appendChild(iconeSemLista);

    var titleSemLista = document.createElement("h1");
    titleSemLista.classList.add('text-xl', 'text-red-700', 'font-medium', 'uppercase', 'pb-2');
    titleSemLista.innerText="Sua lista ainda está vazia";
    areaSemLista.appendChild(titleSemLista);

    var paragraphSemLista = document.createElement("div");
    paragraphSemLista.classList.add('text-base', 'text-gray-700', 'font-bold', 'uppercase', 'pb-2');
    paragraphSemLista.innerText="Adicione um item para começar a fazer sua lista";
    areaSemLista.appendChild(paragraphSemLista);
}

listaVazia();

var itemGerar = (nameField, nLista) => {
    var singleLista = document.createElement("div");
    singleLista.setAttribute("id", "single-lista");
    singleLista.classList.add('single-lista');
    boxLista.appendChild(singleLista);

    var singleFlex = document.createElement("div");
    singleFlex.classList.add('flex', 'justify-between', 'items-center');
    singleLista.appendChild(singleFlex);
    
    var singleLine = document.createElement("hr");
    singleLine.classList.add('border-gray-200', 'my-2');
    singleLista.appendChild(singleLine);

    var singleTitle = document.createElement("div");
    singleTitle.classList.add('my-2', 'font-medium', 'text-center', 'uppercase', 'text-base', 'font-reading', 'text-red-700');
    singleTitle.innerText = nameField;
    singleFlex.appendChild(singleTitle);

    var singleCampos = document.createElement("div");
    singleCampos.classList.add('campos');
    singleFlex.appendChild(singleCampos);

    var singleQuantidade = document.createElement("input");
    singleQuantidade.classList.add('w-28', 'py-3', 'px-4', 'rounded-lg', 'text-sm', 'font-medium', 'border', 'text-gray-500', 'mx-1');
    singleQuantidade.setAttribute("id", "quantidade");
    singleQuantidade.setAttribute("placeholder", "Quantidade");
    singleQuantidade.setAttribute("name", "quantidade");
    singleQuantidade.setAttribute("type", "number");
    singleQuantidade.innerText = nameField;
    singleCampos.appendChild(singleQuantidade);

    var singleSelect = document.createElement("select");
    singleSelect.classList.add('w-28', 'py-3', 'px-4', 'rounded-lg', 'text-sm', 'font-medium', 'border', 'text-gray-500', 'mx-1');
    singleCampos.appendChild(singleSelect);

    var singleOption = document.createElement("option");
    singleOption.value='kilos';
    singleOption.innerText='kilos';
    singleSelect.appendChild(singleOption);

    var singleOption = document.createElement("option");
    singleOption.value='gramas';
    singleOption.innerText='g';
    singleSelect.appendChild(singleOption);

    var singleOption = document.createElement("option");
    singleOption.value='unidades';
    singleOption.innerText='Unidades';
    singleSelect.appendChild(singleOption);

    var singleOption = document.createElement("option");
    singleOption.value='dinheiro';
    singleOption.innerText='R$';
    singleSelect.appendChild(singleOption);

    var singleMarca = document.createElement("input");
    singleMarca.classList.add('w-28', 'py-3', 'px-4', 'rounded-lg', 'text-sm', 'font-medium', 'border', 'text-gray-500', 'mx-1');
    singleMarca.setAttribute("id", "marca");
    singleMarca.setAttribute("placeholder", "Marca");
    singleMarca.setAttribute("name", "marca");
    singleMarca.setAttribute("type", "number");
    singleMarca.innerText = nameField;
    singleCampos.appendChild(singleMarca);

    var singleButton = document.createElement("button");
    singleButton.classList.add('delete-single', 'bg-red-700', 'text-gray-100', 'hover:bg-red-800', 'hover:text-gray-100', 'text-sm', 'font-medium', 'rounded-r-full', 'md:rounded-full', 'py-2', 'px-4', 'text-base', 'uppercase', 'my-2');
    singleButton.value=nLista;
    singleCampos.appendChild(singleButton);

    var singleIcone = document.createElement("i");
    singleIcone.classList.add('fa-regular', 'fa-trash-can');
    singleButton.appendChild(singleIcone);

}

var itemListagem = () => {
    if (arrayLista.length > 0) {
        limparConteudo();
        var nLista = 0;
        for (let singleListaRevere of arrayLista) {
            itemGerar(singleListaRevere, nLista);
            nLista++;
        }
        itemCliqueDelete();
    }
    else { listaVazia(); }
}

var itemAdicionar = (campoItem) => {
    arrayLista.unshift(campoItem);
    itemListagem();
}

formListaAdiciona.addEventListener('submit', function(event) {
    event.preventDefault();
    var campoItem = this.item.value;
    if (campoItem) {
        itemAdicionar(campoItem);
        this.reset();
    }
});

var itemCliqueDelete = () => {
    var deleteSingle = document.querySelectorAll('.delete-single');
    for (let singleDel of deleteSingle) {
        singleDel.addEventListener('click', function() {
            var valorDelete = singleDel.value;
            arrayLista.splice(valorDelete, 1);
            itemListagem();
        });
    }
}




/*
<button class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-r-full md:rounded-full py-2 px-10 block text-base uppercase my-4 mx-auto">Salvar Lista</button>

var bebidas = [ 'Suco', 'Refrigerante', 'Água Mineral', 'Cerveja', 'Vinho' ];
var hortifruti = [ 'Alface', 'Repolho', 'Vagem', 'Tomate', 'Cebola', 'Batata', 'Beterraba', 'Cenoura', 'Pimentão', 'Couve', 'Couve-flor', 'Chuchu', 'Limão', 'Maçã', 'Abacaxi', 'Uva', 'Morango', 'Melancia', 'Maracuja', 'Laranja', 'Tangerina', 'Banana'];
var higiene = [ 'Shampoo', 'Condicionador', 'Desodorante', 'Creme De Pentear', 'Sabonete', 'Papel Higiênico', 'Creme Dental', 'Fio Dental', 'Cotonete', 'Algodão', 'Absorvente', 'Acetona', 'Escova De Dente', 'Prestobarba', 'Creme De Barbear' ];
var limpeza = [ 'Detergente', 'Desinfetante', 'Água Sanitária', 'Sabão Em Pó', 'Sabão Pastoso', 'Amaciante', 'Lustra Móveis', 'Álcool', 'Sabão Em Pedra', 'Inseticida', 'Saco De Lixo', 'Papel Toalha', 'Esponja De Aço', 'Fósforo', 'Guardanapo', 'Filtro Para Café', 'Papel Alumínio', 'Rodo', 'Vassoura', 'Vela Lâmpada', 'Palito De Dente', 'Palito De Churrasco' ];
var listArray = [bebidas, hortifruti, higiene, limpeza];
var listRadios = [];
*/
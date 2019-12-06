window.onload = catchInativos();
function catchInativos() {

    var url = 'http://localhost/Gerenciador_de_clientes/inativos';
    fetch(
        url, {
    }).then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(cliente => {
                var table = document.getElementById("tabeladeinativos");
                var row = table.insertRow(-1);
                var idCliente = row.insertCell(0);
                var nomeCliente = row.insertCell(1);
                var cidadeCliente = row.insertCell(2);
                var telefoneCliente = row.insertCell(3);
                var tipoCliente = row.insertCell(4);
                idCliente.innerHTML = cliente.id_cliente;
                nomeCliente.innerHTML = cliente.nome;
                cidadeCliente.innerHTML = cliente.cidade;
                telefoneCliente.innerHTML = cliente.telefone;
                tipoCliente.innerHTML = cliente.tipo;
            })

        }).catch(error => console.error(error));
}
window.onload = catchVendas();
function catchVendas() {
    fetch(
        'http://localhost/Gerenciador_de_clientes/vendas', {
    }).then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(venda => {
                var table = document.getElementById("tabelavendas");
                var row = table.insertRow(-1);
                var idVenda = row.insertCell(0);
                var nomeCliente = row.insertCell(1);
                var valorVenda = row.insertCell(2);
                var dataVenda = row.insertCell(3);
                idVenda.innerHTML = venda.id_venda;
                nomeCliente.innerHTML = venda.nome;
                valorVenda.innerHTML = venda.valor;
                dataVenda.innerHTML = venda.data_venda;
            })
        }).catch(error => console.error(error))

}
window.onload = catchClientes();

function catchClientes(){
    fetch(
        'http://localhost/Gerenciador_de_clientes/clientes', {
    }).then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(cliente => {
                var table = document.getElementById("tabeladedados");
                var row = table.insertRow(-1);
                var idCliente = row.insertCell(0);
                var nomeCliente = row.insertCell(1);
                var cidadeCliente = row.insertCell(2);
                var telefoneCliente = row.insertCell(3);
                var tipoCliente = row.insertCell(4);
                idCliente.innerHTML = cliente.id_cliente;
                nomeCliente.innerHTML = cliente.nome;
                cidadeCliente.innerHTML = cliente.cidade;
                telefoneCliente.innerHTML = cliente.telefone;
                tipoCliente.innerHTML = cliente.tipo;
            })
        }).catch(error => console.error(error))
}


function alerta(){

    alert("Cadastrado com sucesso !");

}
function adicionarCliente(){
	document.getElementById('formCliente').style.display="block"
}

function enviarForm() {
	var form = document.getElementById('adicionarCliente');
	var data = {};
	data['nome'] = form.nome.value 
	data['endereco'] = form.endereco.value;
	data['cidade'] = form.cidade.value;
	data['email'] = form.email.value; 
    data['tipo'] = form.tipo.value;
    data['telefone'] = form.telefone.value;
	console.log(JSON.stringify(data));
	fetch('http://localhost/Gerenciador_de_clientes/clientes', {
		method: 'POST',       
		body: JSON.stringify(data)
	})
	.then((response) => {
		if (response.ok) {
			return response.json() 
		} else {
			return Promise.reject({ status: res.status, statusText: res.statusText });
		}   

	})
	.then((data) => console.log(data))
    .catch(err => console.log('Error message:', err.statusText));
    
}
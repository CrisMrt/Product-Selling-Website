// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.



document.addEventListener("DOMContentLoaded", function () {
    var carrinho = sessionStorage.getItem("carrinho") ? JSON.parse(sessionStorage.getItem("carrinho")) : [];

    document.getElementById('vercarrinho').addEventListener('click', verCarrinho);
    AtualizaCarrinhoForm();

});


function GereSessaoCarrinho(id, quanto) {
    carrinho = sessionStorage.getItem("carrinho") ? JSON.parse(sessionStorage.getItem("carrinho")) : [];
    if (!ExisteID(id)) {
        carrinho.push({ id: id, quantidade: 1 });
    }
    else {
        const elemento = carrinho.find(item => item.id === id);
        elemento.quantidade += quanto;
    }
    sessionStorage.setItem("carrinho", JSON.stringify(carrinho));
}


function Adicionar(id, quanto) {
    GereSessaoCarrinho(id, quanto);
    const btVerCarrinho = document.getElementById("vercarrinho");
    btVerCarrinho.innerHTML = "Ver carrinho (" + carrinho.length + ")";
    AtualizaCarrinhoForm();

}

function ExisteID(id) {
    for (var i = 0; i < carrinho.length; i++) {
        if (carrinho[i].id == id) {
            return true;
        }
    }
    return false;
}


function AtualizaCarrinhoForm() {
    carrinho = sessionStorage.getItem("carrinho") ? JSON.parse(sessionStorage.getItem("carrinho")) : [];
    var carrinhoItens = document.getElementById("carrinhoForm");
    // Encontra todos os elementos de entrada do tipo hidden dentro do formulário
    var elementosHidden = carrinhoItens.querySelectorAll('input[type="hidden"]');

    // Removaer cada elemento hidden do formulário
    elementosHidden.forEach(function (elemento) {
        carrinhoItens.removeChild(elemento);
    });
    for (var i = 0; i < carrinho.length; i++) {
        var idInput = document.createElement("input");
        idInput.type = "hidden";
        idInput.name = "itens[" + i +"][id]" ;
        idInput.value = carrinho[i].id;
        carrinhoItens.appendChild(idInput);

        //para a quantidade
        var quantidadeInput = document.createElement("input");
        quantidadeInput.type = "hidden";
        quantidadeInput.name = "itens[" + i + "][quantidade]";
        quantidadeInput.value = carrinho[i].quantidade; 
        carrinhoItens.appendChild(quantidadeInput);

    }

    const btVerCarrinho = document.getElementById("vercarrinho");
    if(btVerCarrinho){
        if(carrinho.length > 0){
            btVerCarrinho.classList.remove("invisivel");
            btVerCarrinho.classList.add("visivel");
            btVerCarrinho.innerHTML = "Ver carrinho (" + carrinho.length + ")";
        }
        else{
            btVerCarrinho.classList.remove("visivel");
            btVerCarrinho.classList.add("invisivel");
        }
    }
    
  
}



function verCarrinho(){
    var carrinho = sessionStorage.getItem("carrinho") ? JSON.parse(sessionStorage.getItem("carrinho")) : [];
    sessionStorage.setItem("carrinho", JSON.stringify(carrinho));
    AtualizaCarrinhoForm();
    document.getElementById('btVerCarrinho').submit();


}

function Adiciona(x, id, preco) {
    
    var quantidade = parseInt(document.getElementById(id).innerHTML);
    quantidade = quantidade + x;

    var total = document.getElementById("total").textContent;
    var totalSemMoeda = total.replace("€", "").trim();
    var valorSemEspaco = totalSemMoeda.replace(/\s/g, ''); // Remove o espaço em branco
    total = parseFloat(valorSemEspaco) + preco;

    var itemSubtotal = document.getElementById("itemsubtotal" +id);
    var valor = quantidade * Math.abs(preco);
    const valorSubtotalFormatado = valor.toLocaleString('pt-PT', { style: 'currency', currency: 'EUR', minimumFractionDigits: 2 });
    
    if (quantidade > 0) {
        document.getElementById(id).innerHTML = quantidade;
        document.getElementById('subtotal').innerHTML = total + " €";
        document.getElementById('total').innerHTML = total + " €";
        itemSubtotal.innerHTML = valorSubtotalFormatado;
    }

    carrinho = sessionStorage.getItem("carrinho") ? JSON.parse(sessionStorage.getItem("carrinho")) : [];
    const elemento = carrinho.find(item => item.id === id);
    elemento.quantidade = quantidade;
    
    sessionStorage.setItem("carrinho", JSON.stringify(carrinho));
    AtualizaCarrinhoForm();
}

function RemoveProduto(id){
    carrinho = sessionStorage.getItem("carrinho") ? JSON.parse(sessionStorage.getItem("carrinho")) : [];
    carrinho = carrinho.filter(objeto => objeto.id !== id);
     
    //retira de memoria
    sessionStorage.setItem("carrinho", JSON.stringify(carrinho)); 
   
    //retira da visualização 
    var linha = document.getElementById("produto" + id);
    linha.parentNode.removeChild(linha);

    
    var formulario = document.getElementById("carrinhoForm");
    var elementosInput = formulario.querySelectorAll('input[type="hidden"]');

    

     //retira do formulário
    var indice = 0;
    elementosInput.forEach(function (elemento) {
        // Itera sobre os elementos para encontrar e remover os correspondentes ao id
        if (elemento.name.includes("itens") && elemento.name.includes("[id]") && elemento.value === id) {
            // Remove o elemento do formulário
            formulario.removeChild(elemento);
            var nomeElementoQuantidade = 'itens[' + indice + '][quantidade]';
            var inputQuantidade = formulario.querySelector('input[name="' + nomeElementoQuantidade + '"]');
            formulario.removeChild(inputQuantidade);
            indice++;
        }
    });
   
    
    //vou mudar a action do formulário e mandá-lo novamente para recarregar o carrinho por post
    formulario.action = "carrinho.php?removeid="+id;
    document.querySelector(".checkout").click();
    
    
}




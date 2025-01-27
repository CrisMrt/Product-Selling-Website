function CloseMessage(){
    var mensagem = document.getElementById("mensagem");
    mensagem.classList="invisivel"

}


function MostraCarregaImagem(){
    var controlo = document.getElementById('fileName');
    controlo.classList.remove('invisivel');
}

/*var filename = document.getElementById('fileName')

document.getElementById('fileName').addEventListener('change', function(){
    var filenameOld = document.getElementById('filenameOld');
    filenameOld.value=filename.value;
});
*/

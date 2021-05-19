function validarSenha(){
   NovaSenha = document.getElementById('senha').value;
   CNovaSenha = document.getElementById('confirm-senha').value;
   if (NovaSenha != CNovaSenha) {
      alert("SENHAS DIFERENTES!\nFAVOR DIGITAR SENHAS IGUAIS"); 
      return false;
   }else{
      return true;
   }
}

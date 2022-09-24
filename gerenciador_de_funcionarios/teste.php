<?php

$mensagem= base64_encode("Dados cadastrados com sucesso");
//criptografia fraca da mensagem
//echo $mensagem;
//redirecionar o sistema
header("location: index.php?message =" . $mensagem);

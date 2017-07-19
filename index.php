<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
 require_once 'cabecalho.php';
 require_once 'logica-usuario.php';

?> 
        
        <?php
        mostraAlerta("sucess");
        mostraAlerta("danger");
        ?>
         <div> 
             <h1>BEM VINDO </h1>
          <?php  if(usuarioEstaLogado()){ ?>              
           <p class="text-success">VC esta logado como <?= usuarioLogado() ?>.<a href="logout.php">Deslogar</a> </p>
        <?php 
           } else {
             
        ?>
           <h2>LOGIN</h2>
           <form action="login.php" method="post">
               <table class="table">
               <tr>
                   <td>Email</td>
                   <td><input class="form-control" type="email" name="email"></td>
               </tr>
               <tr>
                   <td>Senha</td>
                   <td><input class="form-control" type="password" name="senha"></td>
               </tr>
               <tr>
                   <td> </td>
                   <td><button class="btn btn-primary">Login</button></td>
               </tr>
           </table>
          </form>     
         </div>
              <?php 
           } 
           ?>
<?php include 'rodape.php';?> 
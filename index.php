<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>
    <div class="jumbotron" id="jumbotron-index">
      <h1><span class="tittles-pages-logo">El Porteño</span> </h1>
      <p>
          Bienvenido a nuestra tienda en linea, aquí encontraras la bateria que tu auto necesita.
      </p>
      
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <section id="new-prod-index" style="display: flex">
    
         <div class="container">
            <div class="page-header" style="display: flex">
                <h1>Nuestros <small>productos</small></h1>
            </div>
            <div class="row">
              <?php
                  include 'library/configServer.php';
                  include 'library/consulSQL.php';
                  $consulta= ejecutarSQL::consultar("select * from producto where Stock > 0 limit 6");
                  $totalproductos = mysqli_num_rows($consulta);
                  if($totalproductos>0){
                      while($fila=mysqli_fetch_array($consulta)){
                         echo '
                        <div class="col-xs-12 col-sm-6 col-md-4">
                             <div class="thumbnail">
                               <img src="assets/img-products/'.$fila['Imagen'].'">
                               <div class="caption">
                                 <h3>'.$fila['Marca'].'</h3>
                                 <p>'.$fila['NombreProd'].'</p>
                                 <p>$'.$fila['Precio'].'</p>
                                 <p class="text-center">
                                     <a href="infoProd.php?CodigoProd='.$fila['CodigoProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;
                                 </p>

                               </div>
                             </div>
                         </div>     
                         ';
                     }   
                  }else{
                      echo '<h2>No hay productos registrados en la tienda</h2>';
                  }  
              ?>  
            </div>
         </div>
    </section>
    <?php if(!isset($_SESSION['nombreUser'])){?>
    <section id="reg-info-index">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 text-center">
                   <article style="margin-top:20%;">
                        <p><i class="fa fa-users fa-4x"></i></p>
                        <h3>Registrate</h3>
                        <p>Registrese y hagase cliente de <span class="tittles-pages-logo">El Porteño</span> Encontras todo lo que tu auto necesita.</p>
                        <p><a href="registration.php" class="btn btn-info btn-block">Registrarse</a></p>   
                   </article>
                </div>
            </div>
        </div>
    </section>
   <?php }?>
    <?php include './inc/footer.php'; ?>
</body>
</html>
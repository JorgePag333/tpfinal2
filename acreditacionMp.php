<?php   

if(isset($_GET['preference-id'])){
    $id = $_GET['preference-id'];
    echo $id;
}

if(isset($_GET['p'])){
    $p=$_GET['p'];
    echo $p;
}
if(isset($p) and isset($id)){
    echo '<h5>aprobado</h5>';
}

?>
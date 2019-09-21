

<h1>Descripcion del  Item id <?php echo $data['id']?></h1>

<?php echo $data['nombre'] ?>
<br>
<?php echo $data['descripcion'] ?>
<br>
<?php echo "$ ".$data['precio'] ?>
<br>
<!-- La imagen se debe guardar con el nombre del id del item al que corresponde -->
<img class='img' src="/application/resources/img/items/<?php echo $data['id'];?>.jpg" >

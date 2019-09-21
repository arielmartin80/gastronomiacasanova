<?php

include_once 'application/dao/daoItem.php';


class Model_Item extends Model{

	private $id;
	private $nombre;
	private $descripcion;
	private $precio;
	private $id_comercio;

   public function getItemById($item_id){

		$daoItem = new daoItem();
		$item= $daoItem->getItemById($item_id);

        return $item;

	}

   public function getItemsByComercioId($comercio_id){

		$daoItem = new daoItem();
		$arrayItems= $daoItem->getItemsByComercioId($comercio_id);

        return $arrayItems;

	}

    public function getAllItems(){

		$daoItem = new daoItem();
		$arrayItems= $daoItem->getAllItems();
       
        return $arrayItems;

	}

	public function saveItem($item, $FILES){

		$daoItem = new daoItem();
		$id= $daoItem->saveItem($item, $FILES);

	}

	public function deleteItem($item_id){

		$daoItem = new daoItem();
		$daoItem->deleteItem($item_id);

	}

	public function updateItem($item, $FILES){

		$daoItem = new daoItem();
		$daoItem->updateItem($item, $FILES);

	}

 
}

?>
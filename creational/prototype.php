<?php

/*
 * Встречаются ситуации, когда инициализация объекта некоторого класса занимает много ресурсов/времени. 
 * В таком случае, для того чтобы избежать частого создания объектов этого путем инициализации, 
 * используют клонирование уже существующих объектов-прототипов, такое решение называют шаблоном прототип.
 */

interface Product {
}

class Factory {
	private $product;

	public function __construct(Product $product) {
		$this->product = $product;
	}

	public function getProduct() {
		return clone $this->product;
	}
}

class SomeProduct implements Product {
	public $name;
}

$prototypeFactory = new Factory(new SomeProduct());
$firstProduct = $prototypeFactory->getProduct();
$firstProduct->name = 'The first product';
$secondProduct = $prototypeFactory->getProduct();
$secondProduct->name = 'Second product';
print_r($firstProduct->name);
// The first product
print_r($secondProduct->name);
// Second product

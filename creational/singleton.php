<?php

/*
 * Singleton (Синглтон, одиночка) относиться к классу порождающих паттернов.
 * Он используется для создания всего одного экземпляра класса, и гарантирует, что во время работы программы не
 * появиться второй.
 * Например в схеме MVC, зачастую этот паттерн используется для порождения главного контроллера (фронтового)
 *
 * http://dron.by/post/pattern-proektirovaniya-singleton-odinochka-na-php.html
 */

class Product {
	private static $instance = null;
	public $mix = '';

	public static function getInstance() {
		if(!(self::$instance instanceof self)) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	private function __construct() {}
	private function __clone() {}
}

$product1 = Product::getInstance();
$product2 = Product::getInstance();

$product1->mix = '1';
$product2->mix = '2';

echo $product1->mix;
echo $product2->mix;

// Попытка создать дополнительный экземпляр приведет к ошибке
// $object2 = new Product();
// $object3 = clone $product1;
<?php
/*
 * шаблон – строитель. Он полезен, когда мы хотим инкапсулировать создание сложного объекта.
 * Мы просто расскажем фабрике, какому строителю доверить создание продукта
 */

/**
 * Какой-то продукт
 */
class Product {

	/**
	 * @var string
	 */
	private $name;


	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
}

/**
 * Какая-то фабрика
 */
class Factory {

	/**
	 * @var Builder
	 */
	private $builder;


	/**
	 * @param Builder $builder
	 */
	public function __construct(Builder $builder) {
		$this->builder = $builder;
		$this->builder->buildProduct();
	}

	/**
	 * Возвращает созданный продукт
	 *
	 * @return Product
	 */
	public function getProduct() {
		return $this->builder->getProduct();
	}
}

/**
 * Какой-то строитель
 */
abstract class Builder {

	/**
	 * @var Product
	 */
	protected $product;


	/**
	 * Возвращает созданный продукт
	 *
	 * @return Product
	 */
	final public function getProduct() {
		return $this->product;
	}

	/**
	 * Создаёт продукт
	 *
	 * @return void
	 */
	public function buildProduct() {
		$this->product = new Product();
	}
}

/**
 * Первый строитель
 */
class FirstBuilder extends Builder {

	/**
	 * Создаёт продукт
	 *
	 * @return void
	 */
	public function buildProduct() {
		parent::buildProduct();
		$this->product->setName('The product of the first builder');
	}
}

/**
 * Второй строитель
 */
class SecondBuilder extends Builder {

	/**
	 * Создаёт продукт
	 *
	 * @return void
	 */
	public function buildProduct() {
		parent::buildProduct();
		$this->product->setName('The product of second builder');
	}
}

/*
 * =====================================
 *            USING OF BUILDER
 * =====================================
 */

$firstDirector = new Factory(new FirstBuilder());
$secondDirector = new Factory(new SecondBuilder());

print_r($firstDirector->getProduct()->getName());
// The product of the first builder
print_r($secondDirector->getProduct()->getName());
// The product of second builder
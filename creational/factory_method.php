<?php
/*
 * Метод-фабрика — порождающий шаблон, который представляет собой класс с методом для создания различных объектов.
 * Основная цель этого шаблона — инкапсулировать процедуру создания различных классов в одной функции, которая
 * в зависимости от переданного ей контекста возвращает необходимый объект.
 *
 * Фабрика обычно используется для создания различных вариантов базового класса. Допустим, у вас есть класс
 * кнопки — Button — и три варианта — ImageButton, InputButton и FlashButton.
 * С помощью фабрики вы можете создавать различные варианты кнопок в зависимости от ситуации.
 *
 * https://tproger.ru/translations/design-patterns-for-beginners/
 */

abstract class Button {
	protected $_html;

	public function getHtml() {
		return $this->_html;
	}
}

class ImageButton extends Button {
	protected $_html = ''; // HTML-код кнопки-картинки
}
class InputButton extends Button {
	protected $_html = ''; // HTML-код кнопки-картинки
}
class FlashButton extends Button {
	protected $_html = ''; // HTML-код кнопки-картинки
}

class ButtonFactory {
	public static function createButton($type) {
		$baseClass = 'Button';
		$targetClass = ucfirst($type).$baseClass;

		if(class_exists($targetClass) && is_subclass_of($targetClass, $baseClass)) {
			return new $targetClass;
		} else {
			throw new Exception("The button type '$type' is not recognized.");
		}
	}
}

$butons = ['image', 'input', 'flash'];
foreach($butons as $_btn) {
	echo ButtonFactory::createButton($_btn)->getHtml();
}
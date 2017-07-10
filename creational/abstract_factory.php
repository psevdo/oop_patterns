<?php
/*
 * AbstractFactory относится к классу порождающих паттернов. Его основное назначение - предоставить интерфейс для
 * создания семейства взаимосвязанных объектов, не специфицируя их классы.
 *
 * Пример
 * Предположим, мы создаем некоторую игру-стратегию. Как и в каждой стратегии, здесь будут присутствовать несколько
 * враждующих фракций. Например это будут пришельцы (Alien) и зомби (Zombie). Каждая из "рас", допустим, представлена
 * пехотинцами (footman), транспортом (transport) и боевой техникой (weaponry). Для каждого юнита объявим класс.
 *
 * class AlienFootman(){...}
 * class AlienTransport(){...}
 * class AlienWeaponry(){...}
 * class ZombieFootman(){...}
 * class ZombieTransport(){...}
 * class ZombieWeaponry(){...}
 *
 * Тогда бой будет напоминать нечто подобное
 *
 * $footman_1 = new AlienFootman();
 * $footman_2 = new ZombieFootman();
 * и так для каждого юнита
 * $footman_1 -> attack($footman_2);
 *
 * В целом неплохо, НО нам пришлось явно использовать имена классов в коде, и пока юнитов всего 3, это не страшно.
 * А если их станет 200 разновидностей для каждой расы? А если добавиться еще 20 рас?
 * То для определения одного пехотинца придется делать цепочку if else (switch) из 4000 ветвлений,
 * что никак не правильно. В таких случаях применяют паттерн "Абстрактная фабрика".
 *
 * Суть абстрактной фабрики заключается в том, чтобы брать обязанность инстанации объекта на себя. Для каждого из
 * семейств объектов (в нашем случае рас), создается конкретная фабрика (наследник абстрактной), посредством которой
 * создаются продукты (в нашем случае юниты) этого семейства.
 *
 * http://dron.by/post/pattern-proektirovaniya-abstract-factory-abstraktnaya-fabrika-na-php.html
 */

interface Footman {}
interface Transport {}
interface Weaponry {}

class AlienFootman implements Footman {}
class AlienTransport implements Transport {}
class AlienWeaponry implements Weaponry {}

class ZombieFootman implements Footman {}
class ZombieTransport implements Transport {}
class ZombieWeaponry implements Weaponry {}

abstract class AbstractFactoryRace {
	abstract public function createFootman();
	abstract public function createTransport();
	abstract public function createWeaponry();
}

class AlienFactory extends AbstractFactoryRace {

	public function createFootman() {
		// TODO: Implement createFootman() method.
		return new AlienFootman();
	}

	public function createTransport() {
		// TODO: Implement createTransport() method.
		return new AlienTransport();
	}

	public function createWeaponry() {
		// TODO: Implement createWeaponry() method.
		return new AlienWeaponry();
	}
}

class ZombieFactory extends AbstractFactoryRace {

	public function createFootman() {
		// TODO: Implement createFootman() method.
		return new ZombieFootman();
	}

	public function createTransport() {
		// TODO: Implement createTransport() method.
		return new ZombieTransport();
	}

	public function createWeaponry() {
		// TODO: Implement createWeaponry() method.
		return new ZombieWeaponry();
	}
}

$alienFactory = new AlienFactory();
$zombieFactory = new ZombieFactory();

$alienFootman = $alienFactory->createFootman();
$zombieFootman = $zombieFactory->createFootman();
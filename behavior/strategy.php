<?php

/*
 * Шаблон проектирования «Стратегия» имеет дело с алгоритмами. Реализуя его, вы инкапсулируете определённую
 * группу алгоритмов так, чтобы порождённый класс мог воспользоваться ими, не зная ничего об их конкретной
 * реализации
 *
 * По типу клиента (или по типу обрабатываемых данных) выбрать подходящий алгоритм, который следует применить.
 * Если используется правило, которое не подвержено изменениям, нет необходимости обращаться к шаблону «стратегия».
 */

interface NamingStrategy {
	function createName($filename);
}

class ZipFileNamingStrategy implements NamingStrategy {
	function createName($filename) {
		return "http://downloads.foo.bar/{$filename}.zip";
	}
}

class TarGzFileNamingStrategy implements NamingStrategy {
	function createName($filename) {
		return "http://downloads.foo.bar/{$filename}.tar.gz";
	}
}

class Context {
	private $namingStrategy;

	function __construct(NamingStrategy $strategy) {
		$this->namingStrategy = $strategy;
	}

	function execute() {
		$url[] = $this->namingStrategy->createName("Calc101");
		$url[] = $this->namingStrategy->createName("Stat2000");

		return $url;
	}
}

if(strstr($_SERVER["HTTP_USER_AGENT"], "Win"))
	$context = new Context(new ZipFileNamingStrategy());
else
	$context = new Context(new TarGzFileNamingStrategy());

$context->execute();
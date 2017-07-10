<?php


// method 1
class A {
	public function __construct(ClassA $prototype = null) {
		if($prototype !== null) {
		//
		}
	}
}

$prototype = new ClassA();
$newObj = new ClassA($prototype);
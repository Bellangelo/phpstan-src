<?php

namespace Bug10627;

use function PHPStan\Testing\assertType;

class HelloWorld
{
	public function sayHello(): void
	{
		$list = ['A', 'C', 'B'];
		natcasesort($list);
		assertType("non-empty-array<0|1|2, 'A'|'B'|'C'>", $list);
	}

	public function sayHello2(): void
	{
		$list = ['A', 'C', 'B'];
		natsort($list);
		assertType("non-empty-array<0|1|2, 'A'|'B'|'C'>", $list);
	}

	public function sayHello3(): void
	{
		$list = ['A', 'C', 'B'];
		arsort($list);
		assertType("non-empty-array<0|1|2, 'A'|'B'|'C'>", $list);
	}

	public function sayHello4(): void
	{
		$list = ['A', 'C', 'B'];
		asort($list);
		assertType("non-empty-array<0|1|2, 'A'|'B'|'C'>", $list);
	}

	public function sayHello5(): void
	{
		$list = ['A', 'C', 'B'];
		ksort($list);
		assertType("non-empty-array<0|1|2, 'A'|'B'|'C'>", $list);
	}

	public function sayHello6(): void
	{
		$list = ['A', 'C', 'B'];
		uasort($list, function () {

		});
		assertType("non-empty-array<0|1|2, 'A'|'B'|'C'>", $list);
	}

	public function sayHello7(): void
	{
		$list = ['A', 'C', 'B'];
		uksort($list, function () {

		});
		assertType("non-empty-array<0|1|2, 'A'|'B'|'C'>", $list);
	}

	public function sayHello8(): void
	{
		$list = ['A', 'C', 'B'];
		krsort($list);
		assertType("non-empty-array<0|1|2, 'A'|'B'|'C'>", $list);
	}

	/**
	 * @param list<string> $list
	 * @return void
	 */
	public function sayHello9(array $list): void
	{
		krsort($list);
		assertType("array<int<0, max>, string>", $list);
	}
}

<?php

namespace Php82DynamicPropertiesAllow;

use AllowDynamicProperties;

/**
 * @template T of object
 *
 * @property array<T> $properties
 */
trait TraitA {
	/**
	 * @var array<T>
	 */
	public array $items = [];
}

/**
 * @phpstan-use TraitA<ClassB>
 */
#[AllowDynamicProperties]
class ClassA {
	/**
	 * @phpstan-use TraitA<ClassB>
	 */
	use TraitA;
}

class ClassB {
	public function test(): void {
		// empty
	}
}

function (): void {
	foreach ((new ClassA())->properties as $property) {
		$property->test();
	}

	foreach ((new ClassA())->items as $item) {
		$item->test();
	}
};

#[AllowDynamicProperties]
class HelloWorld
{
	public function __get(string $attribute): mixed
	{
		if($attribute == "world")
		{
			return "Hello World";
		}
		throw new \Exception("Attribute '{$attribute}' is invalid");
	}


	public function __isset(string $attribute)
	{
		try {
			if (!isset($this->{$attribute})) {
				$x = $this->{$attribute};
			}

			return isset($this->{$attribute});
		} catch (\Exception $e) {
			return false;
		}
	}
}

function (): void {
	$hello = new HelloWorld();
	if(isset($hello->world))
	{
		echo $hello->world;
	}
};

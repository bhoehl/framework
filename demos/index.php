<?php
/**
 * Go! AOP framework
 *
 * @copyright Copyright 2012, Lisachenko Alexander <lisachenko.it@gmail.com>
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 */

include __DIR__ . (isset($_GET['original']) ? '/autoload.php' : '/autoload_aspect.php');

$example = new Demo\Example\General('test');
$class   = new ReflectionObject($example);

if ($example instanceof Serializable) {
    echo "Yeah, Example is serializable!", PHP_EOL;
    var_dump($class->getTraitNames(), $class->getInterfaceNames());
} else {
    echo "Ooops, {$class->name} isn't serializable!", PHP_EOL;
}
unserialize(serialize($example));
$example->publicHello();
for ($i=10; $i--; ) {
    $example->cacheMe(0.2);
}

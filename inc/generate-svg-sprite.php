<?php
require __DIR__ . '/../vendor/autoload.php'; // Go up one level to vendor

use Vestaware\SvgSpriteGenerator\SvgSpriteGenerator;

function generate_sprite()
{
    $srcDir = __DIR__ . '/../assets/icons/svgs';
    $distDir = __DIR__ . '/../assets/icons/sprite';

    if (! is_dir($distDir)) mkdir($distDir, 0777, true);

    $generator = new SvgSpriteGenerator(
        $srcDir,
        $distDir,
        'sprite.svg',
        $distDir . '/manifest.json',
        removeFill: true
    );

    $generator->generateSprite();
}

generate_sprite();

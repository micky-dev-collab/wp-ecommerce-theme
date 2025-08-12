<?php
function get_sprite_url()
{

    $baseName = 'sprite.svg';

    $sprite_path = (get_template_directory() . '/assets/icons/sprite/sprite.svg');

    $manifest_path = get_template_directory() . '/assets/icons/sprite/manifest.json';


    if (! is_file($manifest_path)) {

        if (! file_exists($sprite_path)) return;

        $version = filemtime($sprite_path);

        return get_template_directory_uri() . '/assets/icons/sprite/sprite.svg?v=' . $version;
    };

    $contents = json_decode(file_get_contents($manifest_path), true);

    return get_template_directory_uri() . '/assets/icons/sprite/' . $contents[$baseName];
}

function get_icon($name, $class = '', $fill = 'none', $stroke = 'currentColor')
{
    $sprite_url = get_sprite_url();

    if (!$sprite_url) return;

    ob_start();
?>
    <svg class="<?php echo esc_attr($class); ?>" aria-hidden="true" focusable="false" width="24" height="24" viewBox="0 0 24 24" fill="<?php echo esc_attr($fill); ?>" stroke="<?php echo esc_attr($stroke); ?>">
        <use xlink:href="<?php echo esc_url($sprite_url . '#' . $name); ?>"></use>
    </svg>
<?php
    return ob_get_clean();
}

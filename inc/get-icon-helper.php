<?php
function get_sprite_url()
{
    $baseName = 'sprite.svg';

    $manifest_path = get_template_directory() . '/manifest.json';

    if (! is_file($manifest_path)) return;

    $contents = json_decode(file_get_contents($manifest_path), true);

    return get_template_directory_uri() . '/assets/icons/sprite/' . $contents[$baseName];
}

function get_icon($name, $class = '')
{
    $sprite_url = get_sprite_url();

    if (! $sprite_url) return;

    ob_start();
?>
    <svg class="<?php echo esc_attr($class); ?>" aria-hidden="true" focusable="false" width="24" height="24" viewBox="0 0 24 24">
        <use xlink:href="<?php echo esc_url($sprite_url . '#' . $name); ?>"></use>
    </svg>
<?php
    return ob_get_clean();
}

<?php
function darkenClass($bgClass) {
    if (preg_match('/^bg-([a-z]+)-(\d{2,3})$/', $bgClass, $matches)) {
        $color = $matches[1];
        $shade = (int)$matches[2];
        $darkerShade = min($shade + 300, 900);
        return "bg-{$color}-{$darkerShade}";
    }
    return $bgClass;
}

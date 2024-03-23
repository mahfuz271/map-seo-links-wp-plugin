<?php
class MarkerRenderer {
    public static function renderMarkers($markers) {
        $html = '';
        foreach ($markers as $marker) {
            $json = $marker->jsonSerialize();
            $html .= '<a class="wpgmza_infowindow_link hiddem" href="'.$json['link'].'" target="">'.$json['title'].'</a>';
        }
        return $html;
    }
}
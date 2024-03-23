<?php
class MapOutputModifier {
    public static function custom_wpgooglemaps_map_div_output($output, $map_div_id) {
        // Modify the output as needed
        $map = \WPGMZA\Map::createInstance($map_div_id);
        $markers = $map->getMarkers();
        
		// Use MarkerRenderer to render markers
		$html = MarkerRenderer::renderMarkers($markers);
		
        $last_div_position = strrpos($output, '</div>');

        if ($last_div_position !== false) {
            // Extract the substring excluding the last </div>
            $output = substr($output, 0, $last_div_position);
        }
        $modified_output = $output . $html . "</div>";

        // Return the modified output
        return $modified_output;
    }
}

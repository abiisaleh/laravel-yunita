<?php

namespace App\Filament\Widgets;

use Cheesegrits\FilamentGoogleMaps\Widgets\MapWidget;

class PendonorMap extends MapWidget
{
    protected static ?string $heading = 'Lokasi Pendonor';

    protected static ?int $sort = 1;

    protected static ?string $pollingInterval = null;

    protected static ?bool $clustering = true;

    protected static ?bool $fitToBounds = true;

    protected static ?int $zoom = 12;

    protected int | string | array $columnSpan = 'full';

    public static function canView(): bool
    {
        if (auth()->user()->role == 'pendonor') {
            return false;
        }
        return true;
    }

    public array $controls = [
        'mapTypeControl'    => false,
        'scaleControl'      => true,
        'streetViewControl' => false,
        'rotateControl'     => false,
        'fullscreenControl' => true,
        'searchBoxControl'  => false,
        'zoomControl'       => true,
    ];

    protected function getData(): array
    {
        /**
         * You can use whatever query you want here, as long as it produces a set of records with your
         * lat and lng fields in them.
         */
        $locations = \App\Models\Pendonor::with('golongan_darah')->get();

        $data = [];

        foreach ($locations as $location) {
            /**
             * Each element in the returned data must be an array
             * containing a 'location' array of 'lat' and 'lng',
             * and a 'label' string (optional but recommended by Google
             * for accessibility.
             *
             * You should also include an 'id' attribute for internal use by this plugin
             */


            $data[] = [
                'location'  => [
                    'lat' => $location->lat ? round(floatval($location->lat), static::$precision) : 0,
                    'lng' => $location->lng ? round(floatval($location->lng), static::$precision) : 0,
                ],

                'label' => $location->nama,

                'id' => $location->getKey(),
                /**
                 * Optionally you can provide custom icons for the map markers,
                 * either as scalable SVG's, or PNG, which doesn't support scaling.
                 * If you don't provide icons, the map will use the standard Google marker pin.
                 */

                'icon' => [
                    'url' => url('upload/images/' . $location->golongan_darah->nama . '-' . $location->rh . '.png'),
                    'type' => 'png',
                    'scale' => [35, 35],
                ],
            ];
        }

        return $data;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Series extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'series';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The genres that belong to the user.
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class, 'series_id');
    }

    /**
     * The genres that belong to the user.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'series_genres');
    }

    public function seasons()
    {
        $seasons = array();
        foreach ($this->episodes as $episode) {
            $seasonNumber = $episode->seasonNumber ?: 'UNKNWOWN';

            if (!array_key_exists($seasonNumber, $seasons)) {
                $seasons[$seasonNumber] = new Collection();
            }
            $seasons[$seasonNumber][$episode->episodeNumber] = $episode;
        }

        ksort($seasons);
        return $seasons;
    }


}

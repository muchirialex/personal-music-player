<?php

namespace App\Http\Requests\API;

use App\Models\Song;
use App\Rules\ValidSmartPlaylistRulePayload;
use Illuminate\Validation\Rule;

/**
 * @property array<string> $songs
 * @property string   $name
 * @property array    $rules
 */
class PlaylistStoreRequest extends Request
{
    /** @return array<mixed> */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'songs' => 'array',
            'songs.*' => [Rule::exists(Song::class, 'id')],
            'rules' => ['array', 'nullable', new ValidSmartPlaylistRulePayload()],
        ];
    }
}

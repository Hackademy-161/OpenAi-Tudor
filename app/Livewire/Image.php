<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Storage;

class Image extends Component
{
    public $prompt="";
    public $image ='';

    public function run() {
        $response = OpenAI::images()->create([
            'model' => 'dall-e-3',
            'prompt' => $this->prompt,
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);
        

        $url = $response->data[0]->url;
        $this->image = $url;

        $content = file_get_contents($url);

        $filename = 'mediaAI/' . Str::random(32) . '.png';

        Storage::disk('public')->put($filename, $content);

        $this->image = $filename;

    }
    public function render()
    {
        return view('livewire.image');
    }


}

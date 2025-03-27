<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Chat extends Component
{
public $prompt="";
public $messages=[];
public $components='[
  {
    "marca": "AMD",
    "modello": "Ryzen 9 5900X",
    "prezzo": 499.99,
    "peso": "82g",
    "tipo": "CPU"
  },
  {
    "marca": "Intel",
    "modello": "Core i9-12900K",
    "prezzo": 589.99,
    "peso": "103g",
    "tipo": "CPU"
  },
  {
    "marca": "NVIDIA",
    "modello": "GeForce RTX 3080",
    "prezzo": 799.99,
    "peso": "1340g",
    "tipo": "GPU"
  },
  {
    "marca": "AMD",
    "modello": "Radeon RX 6800 XT",
    "prezzo": 649.99,
    "peso": "1350g",
    "tipo": "GPU"
  },
  {
    "marca": "Corsair",
    "modello": "Vengeance RGB Pro 32GB",
    "prezzo": 189.99,
    "peso": "150g",
    "tipo": "RAM"
  },
  {
    "marca": "G.Skill",
    "modello": "Trident Z RGB 16GB",
    "prezzo": 99.99,
    "peso": "120g",
    "tipo": "RAM"
  },
  {
    "marca": "Samsung",
    "modello": "970 EVO Plus 1TB",
    "prezzo": 149.99,
    "peso": "50g",
    "tipo": "SSD"
  },
  {
    "marca": "Western Digital",
    "modello": "Black SN850 1TB",
    "prezzo": 169.99,
    "peso": "45g",
    "tipo": "SSD"
  },
  {
    "marca": "Seagate",
    "modello": "Barracuda 2TB",
    "prezzo": 59.99,
    "peso": "415g",
    "tipo": "HDD"
  },
  {
    "marca": "Crucial",
    "modello": "MX500 1TB",
    "prezzo": 99.99,
    "peso": "45g",
    "tipo": "SSD"
  },
  {
    "marca": "Noctua",
    "modello": "NH-D15",
    "prezzo": 99.99,
    "peso": "1320g",
    "tipo": "Dissipatore"
  },
  {
    "marca": "be quiet!",
    "modello": "Dark Rock Pro 4",
    "prezzo": 89.99,
    "peso": "1180g",
    "tipo": "Dissipatore"
  },
  {
    "marca": "NZXT",
    "modello": "Kraken X63",
    "prezzo": 149.99,
    "peso": "1400g",
    "tipo": "Raffreddamento AIO"
  },
  {
    "marca": "Lian Li",
    "modello": "PC-O11 Dynamic",
    "prezzo": 149.99,
    "peso": "9500g",
    "tipo": "Case"
  },
  {
    "marca": "Fractal Design",
    "modello": "Meshify C",
    "prezzo": 109.99,
    "peso": "7300g",
    "tipo": "Case"
  },
  {
    "marca": "Cooler Master",
    "modello": "MasterBox TD500",
    "prezzo": 99.99,
    "peso": "7000g",
    "tipo": "Case"
  },
  {
    "marca": "EVGA",
    "modello": "SuperNOVA 750W",
    "prezzo": 129.99,
    "peso": "2100g",
    "tipo": "Alimentatore"
  },
  {
    "marca": "Corsair",
    "modello": "RM850x 850W",
    "prezzo": 139.99,
    "peso": "2000g",
    "tipo": "Alimentatore"
  },
  {
    "marca": "ASUS",
    "modello": "ROG STRIX B550-F",
    "prezzo": 189.99,
    "peso": "1000g",
    "tipo": "Scheda Madre"
  },
  {
    "marca": "MSI",
    "modello": "MAG B550 TOMAHAWK",
    "prezzo": 179.99,
    "peso": "1100g",
    "tipo": "Scheda Madre"
  },
  {
    "marca": "Gigabyte",
    "modello": "Z690 AORUS Elite",
    "prezzo": 239.99,
    "peso": "1200g",
    "tipo": "Scheda Madre"
  },
  {
    "marca": "Logitech",
    "modello": "G502 HERO",
    "prezzo": 49.99,
    "peso": "121g",
    "tipo": "Mouse"
  },
  {
    "marca": "Razer",
    "modello": "DeathAdder V2",
    "prezzo": 69.99,
    "peso": "82g",
    "tipo": "Mouse"
  },
  {
    "marca": "Logitech",
    "modello": "G915 TKL",
    "prezzo": 229.99,
    "peso": "810g",
    "tipo": "Tastiera"
  },
  {
    "marca": "Razer",
    "modello": "BlackWidow V3",
    "prezzo": 139.99,
    "peso": "1100g",
    "tipo": "Tastiera"
  },
  {
    "marca": "Samsung",
    "modello": "Odyssey G7",
    "prezzo": 699.99,
    "peso": "8500g",
    "tipo": "Monitor"
  },
  {
    "marca": "LG",
    "modello": "UltraGear 27GN950-B",
    "prezzo": 799.99,
    "peso": "7800g",
    "tipo": "Monitor"
  },
  {
    "marca": "Corsair",
    "modello": "VOID RGB Elite Wireless",
    "prezzo": 99.99,
    "peso": "400g",
    "tipo": "Cuffie"
  },
  {
    "marca": "HyperX",
    "modello": "Cloud II",
    "prezzo": 79.99,
    "peso": "320g",
    "tipo": "Cuffie"
  },
  {
    "marca": "SteelSeries",
    "modello": "Arctis 7",
    "prezzo": 149.99,
    "peso": "376g",
    "tipo": "Cuffie"
  },
  {
    "marca": "TP-Link",
    "modello": "Archer T4E",
    "prezzo": 39.99,
    "peso": "85g",
    "tipo": "Scheda di rete"
  },
  {
    "marca": "ASUS",
    "modello": "PCE-AX58BT WiFi 6",
    "prezzo": 79.99,
    "peso": "100g",
    "tipo": "Scheda di rete"
  }
]
';

    public function render()
    {
        return view('livewire.chat');
    }
    public function run(){
        // This prompt gives the rules of how to answer the user question
        $systemPrompt="create a system prompt that says you are an virtual assistant called Wall-E who must assist in buying a pc components and choose the compatible ones given an example. if the user is not interested in this type items , respond 'I am sorry , i can not assist you with that topic' or if the language is in another language translate this message in that language.answer with maximum 20 word using sci-fi emojy using a wierd language. here is the component list:\n $this->components ";
    $this->messages[]=[
        "role"=>"user",
        "content"=>$this->prompt
    ];
    $systemMessage=[
        "role"=>"user",
        "content"=>$systemPrompt
    ];
        $newMessages=[$systemMessage, ...$this->messages];
    
    
        // creates the response message connecting with the api openai with the class installed prevviously
    $result = OpenAI::chat()->create([
        'model' => 'gpt-4o-mini',
        'messages' => $newMessages
        // [
        //     ['role' => 'user', 'content' => $this->prompt],
        // ],
    ]);
        $this->messages[]=[
        "role"=>"assistant",
        "content"=>$result["choices"][0]["message"]["content"]
    ];
    // goes inside the array sent from openai  at chices in index 0  inside is message with value content and saves it in $result
    // $this->message=$result["choices"][0]["message"]["content"] ;
    
    
    
    // resets the prompt message from the user
    $this->prompt="";
    
    }
    
}

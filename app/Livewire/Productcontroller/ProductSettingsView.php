<?php

namespace App\Livewire\Productcontroller;

use Livewire\Component;
use App\Models\ProductSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
class ProductSettingsView extends Component
{
    public $countQuery;
    public $ps_dangerlevel;
    public $ps_greenlevel;
    public $ps_name = "SavedSetting";
    public $id;
    public $user_id;
    public $prodSettings;



    
    public function save(){
        
        
        $this->countQuery= ProductSettings::all()->count();
        
        if($this->countQuery == 0){
            $validated = $this->validate([
                'ps_dangerlevel' => ['required', 'int'],
                'ps_greenlevel' => ['required', 'int'],
                
            ]);
            $validated['ps_name'] = $this->ps_name;
            $validated['user_id']  = auth()->user()->id;
            event(new Registered($prodSettings = ProductSettings::create($validated)));
            session()->flash('message', 'Settings updated successfully!');

        }else{
            

            $prodSettings = ProductSettings::find($this->id);
            $prodSettings->ps_dangerlevel =  $this->ps_dangerlevel ;
           $prodSettings->ps_greenlevel =  $this->ps_greenlevel;
            $prodSettings->user_id = auth()->user()->id;

            $prodSettings->save();
            session()->flash('message', 'Settings updated successfully!');
        }
      
    }
    public function mount(){
        $prodSettings = ProductSettings::all();
        $this->countQuery= $prodSettings->count();
        
        if($this->countQuery <= 0){
            $this->ps_dangerlevel = 0;
            $this->ps_greenlevel = 0;
            $this->id = 0;
            
        }else{
            
            foreach($prodSettings as $prodSetting){
                $this->id = $prodSetting->id;
                $this->ps_dangerlevel = $prodSetting->ps_dangerlevel;
                $this->ps_greenlevel = $prodSetting->ps_greenlevel;
            
            }
            
        }

    }

    public function render()
    {
        return view('livewire.inventory.productsetting.product-settings');
    }
}

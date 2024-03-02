<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AppInfo;
use Livewire\WithFileUploads;

class Appifo extends Component
{
    use WithFileUploads;
    
    public $title;
    public $description;
    public $version;
    public $beta_url;
    public $playstore_url;
    public $appstore_url;
    public $logo;
    public $dark_logo;
    public $fav_icon;

    protected $rules = [
        'title' => "required",
        'description' => "required",
        'version' => "required",
        'logo' => 'image|max:10240', 
      
    ];

    public function mount()
    {
        $appinfo = AppInfo::first();
        $this->title = $appinfo->title;
        $this->description = $appinfo->description;
        $this->version = $appinfo->version;
        $this->beta_url = $appinfo->beta_url;
        $this->playstore_url = $appinfo->playstore_url;
        $this->appstore_url = $appinfo->appstore_url;
        $this->logo = $appinfo->logo;
        $this->dark_logo = $appinfo->dark_logo;
        $this->fav_icon = $appinfo->fav_icon;
       
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        $appinfo = AppInfo::first();
         $appinfo->title = $this->title;
         $appinfo->description = $this->description;
         $appinfo->version = $this->version;

         $appinfo->beta_url = $this->beta_url;
         $appinfo->playstore_url = $this->playstore_url;
         $appinfo->appstore_url = $this->appstore_url;

         $this->logo->store('photos');
        
       
        //$this->beta_url = $appinfo->beta_url;
        //$this->playstore_url = $appinfo->playstore_url;
        //$this->appstore_url = $appinfo->appstore_url;
        //$this->logo = $appinfo->logo;
        //$this->dark_logo = $appinfo->dark_logo;
       // $this->fav_icon = $appinfo->fav_icon;
       $appinfo->save();
      // session()->flash('message', 'App Info successfully updated.');
       $this->dispatch('success', __('App Info successfully updated.'));
    }

    public function render()
    {
        return view('livewire.appifo');
    }
}

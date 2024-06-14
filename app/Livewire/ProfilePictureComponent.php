<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilePictureComponent extends Component
{
    use WithFileUploads;

    public $picture;

    public function updatedPicture()
    {
        $this->validate([
            'picture' => 'image|max:1024', // Validación de la imagen, tamaño máximo 1MB
        ]);

        // Lógica para guardar la imagen en el sistema de archivos o base de datos
        $path = $this->picture->store('profile-pictures', 'public');

        // Aquí podrías actualizar el modelo de usuario con la ruta de la nueva imagen
    }
    public function render()
    {
        return view('livewire.profile-picture-component');
    }
}

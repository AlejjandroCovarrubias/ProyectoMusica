<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_crearArtista(): void
    {
        $response = $this->get(route('cliente.create')); // Intentamos crear un artista sin cuenta
        $response->assertRedirect('/login');  // Nos obliga a ir al login
        $this->actingAs($user=User::factory()->create()); // Creamos un cliente
        $response = $this->get(route('cliente.create')); // Intentamos crear un artista con cuenta
        $response->assertStatus(200)->assertSee('Registro de artista'); // Si nos hace redirect a la pagina correcta y miramos Registro de artista, entonces funciona
    }

    public function test_crearArtistaBD(): void
    {
        $response = $this->get(route('cliente.create')); // Intentamos crear un artista sin cuenta
        $response->assertRedirect('/login');  // Nos obliga a ir al login
        $this->actingAs($user=User::factory()->create()); // Creamos un cliente
        Storage::fake('avatars'); // Creamos un fake de avatar
        $image=UploadedFile::fake()->image('avatar.jpg'); 
        $response = $this->post(route('cliente.store'), [ // Peticion a store
            'username'=>'estoesunaprueba',
            'email'=>'prueba@gmail.com',
            'twitter'=>'twitterPrueba',
            'instagram'=>'instagramPrueba',
            'image'=>$image,
            'descrip'=>'esto es una de las mayores pruebas que jamas se hayan hecho en la historia de la computacion, fiuum',
        ]); 
        
        $this->assertDatabaseHas('clients', [
            'username' => 'estoesunaprueba',
        ]); // Verificamos en base de datos

        $response = $this->get(route('cliente.seleccion-cuenta', ['cliente' => $user->id]));
        $response->assertStatus(200);
    }

    public function test_crearArtistaBDError(): void
    {
        $response = $this->get(route('cliente.create')); // Intentamos crear un artista sin cuenta
        $response->assertRedirect('/login');  // Nos obliga a ir al login
        $this->actingAs($user=User::factory()->create()); // Creamos un cliente
        Storage::fake('avatars'); // Creamos un fake de avatar
        $image=UploadedFile::fake()->image('avatar.jpg'); 
        $response = $this->post(route('cliente.store'), [ // Peticion a store
            'username'=>'estoesunaprueba',
            'email'=>'prueba@gmail.com',
            'twitter'=>'twitterPrueba',
            'instagram'=>'instagramPrueba',
            'image'=>$image,
            // No mandamos la descripcion obligatoria
        ]); 
        
        $response->assertInvalid(['descrip']); // Verificamos el error
        $response = $this->get(route('cliente.seleccion-cuenta', ['cliente' => $user->id]));
        $response->assertStatus(200);
    }

    public function test_eliminarCliente(): void
    {
        $response = $this->get(route('cliente.create')); // Intentamos crear un artista sin cuenta
        $response->assertRedirect('/login');  // Nos obliga a ir al login
        $this->actingAs($user=User::factory()->create()); // Creamos un cliente
        Storage::fake('avatars'); // Creamos un fake de avatar
        $image=UploadedFile::fake()->image('avatar.jpg'); 
        $response = $this->post(route('cliente.store'), [ // Peticion a store
            'username'=>'esto es una prueba de delete',
            'email'=>'prueba@gmail.com',
            'twitter'=>'twitterPrueba',
            'instagram'=>'instagramPrueba',
            'image'=>$image,
            'descrip'=>'esto es una de las mayores pruebas que jamas se hayan hecho en la historia de la computacion, fiuum',
        ]); 
        
        $this->assertDatabaseHas('clients', [
            'username' => 'esto es una prueba de delete',
        ]); // Verificamos en base de datos

        $cliente=Client::where('username', 'esto es una prueba de delete')->first();
        $clientId=$cliente->id;
    
        // Enviar una solicitud DELETE para eliminar el cliente
        $response=$this->delete(route('cliente.destroy', $clientId));
    
        // Verificar que el cliente haya sido eliminado de la base de datos
        $this->assertDatabaseMissing('clients', [
            'username' => 'esto es una prueba de delete',
        ]);

        $response = $this->get(route('cliente.seleccion-cuenta', ['cliente' => $user->id]));
        $response->assertStatus(200);
    }
}

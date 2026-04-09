<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {          
        $this->call([
            IconoSeeder::class,
            ColorSeeder::class,
            PaisSeeder::class,
            DistritoSeeder::class,
            RolUsuarioSeeder::class,
            GeneroSeeder::class,
            TipoAfectacionSeeder::class,
            TipoClienteSeeder::class,
            TipoDocumentoSeeder::class,
            TipoMovimientoSeeder::class,
            TipoPagoSeeder::class,
            TipoComprobanteSeeder::class
        ]);

        User::factory(10)->create();
        User::factory()->create([
            'nom_usuario' => 'Test',
            'ape_usuario' => 'User',
            'ema_usuario' => 'test@example.com',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Lugar;


class LugaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar múltiples registros a la vez
        Lugar::insert([
            ['municipio' => 'Acevedo', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Aipe', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Algeciras', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Altamira', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Baraya', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Campoalegre', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Colombia', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Elías', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'El Agrado', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Garzón', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Gigante', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Guadalupe', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Hobo', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Íquira', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Isnos', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'La Argentina', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'La Plata', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Nátaga', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Neiva', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Oporapa', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Paicol', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Palermo', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Palestina', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Pital', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Pitalito', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Rivera', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Saladoblanco', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Santa María', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'San Agustín', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Suaza', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Tarqui', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Tello', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Teruel', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Tesalia', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Timaná', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Villavieja', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            ['municipio' => 'Yaguará', 'departamento' => 'Huila', 'pais' => 'Colombia'],
            //... Agrega más filas si es necesario
        ]);
    }
}

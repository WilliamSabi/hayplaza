<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Lugar;

class LugaresCapitalTableSeeder extends Seeder
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
            ['municipio' => 'Leticia', 'departamento' => 'Amazonas', 'pais' => 'Colombia'],
    ['municipio' => 'Medellín', 'departamento' => 'Antioquia', 'pais' => 'Colombia'],
    ['municipio' => 'Arauca', 'departamento' => 'Arauca', 'pais' => 'Colombia'],
    ['municipio' => 'Barranquilla', 'departamento' => 'Atlántico', 'pais' => 'Colombia'],
    ['municipio' => 'Cartagena', 'departamento' => 'Bolívar', 'pais' => 'Colombia'],
    ['municipio' => 'Tunja', 'departamento' => 'Boyacá', 'pais' => 'Colombia'],
    ['municipio' => 'Manizales', 'departamento' => 'Caldas', 'pais' => 'Colombia'],
    ['municipio' => 'Florencia', 'departamento' => 'Caquetá', 'pais' => 'Colombia'],
    ['municipio' => 'Yopal', 'departamento' => 'Casanare', 'pais' => 'Colombia'],
    ['municipio' => 'Popayán', 'departamento' => 'Cauca', 'pais' => 'Colombia'],
    ['municipio' => 'Valledupar', 'departamento' => 'Cesar', 'pais' => 'Colombia'],
    ['municipio' => 'Quibdó', 'departamento' => 'Chocó', 'pais' => 'Colombia'],
    ['municipio' => 'Montería', 'departamento' => 'Córdoba', 'pais' => 'Colombia'],
    ['municipio' => 'Bogotá', 'departamento' => 'Cundinamarca', 'pais' => 'Colombia'],
    ['municipio' => 'Inírida', 'departamento' => 'Guainía', 'pais' => 'Colombia'],
    ['municipio' => 'San José del Guaviare', 'departamento' => 'Guaviare', 'pais' => 'Colombia'],
    ['municipio' => 'Riohacha', 'departamento' => 'La Guajira', 'pais' => 'Colombia'],
    ['municipio' => 'Santa Marta', 'departamento' => 'Magdalena', 'pais' => 'Colombia'],
    ['municipio' => 'Villavicencio', 'departamento' => 'Meta', 'pais' => 'Colombia'],
    ['municipio' => 'Pasto', 'departamento' => 'Nariño', 'pais' => 'Colombia'],
    ['municipio' => 'Cúcuta', 'departamento' => 'Norte de Santander', 'pais' => 'Colombia'],
    ['municipio' => 'Mocoa', 'departamento' => 'Putumayo', 'pais' => 'Colombia'],
    ['municipio' => 'Armenia', 'departamento' => 'Quindío', 'pais' => 'Colombia'],
    ['municipio' => 'Pereira', 'departamento' => 'Risaralda', 'pais' => 'Colombia'],
    ['municipio' => 'San Andrés', 'departamento' => 'San Andrés y Providencia', 'pais' => 'Colombia'],
    ['municipio' => 'Bucaramanga', 'departamento' => 'Santander', 'pais' => 'Colombia'],
    ['municipio' => 'Sincelejo', 'departamento' => 'Sucre', 'pais' => 'Colombia'],
    ['municipio' => 'Ibagué', 'departamento' => 'Tolima', 'pais' => 'Colombia'],
    ['municipio' => 'Cali', 'departamento' => 'Valle del Cauca', 'pais' => 'Colombia'],
    ['municipio' => 'Mitú', 'departamento' => 'Vaupés', 'pais' => 'Colombia'],
    ['municipio' => 'Puerto Carreño', 'departamento' => 'Vichada', 'pais' => 'Colombia'],
            //... Agrega más filas si es necesario
        ]);
    }
}


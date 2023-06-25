<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Trabajador;
use App\Models\Area;
use App\Models\Insumo;
use App\Models\ItemControl;
use App\Models\Capacitacion;
use App\Models\Accidente;
use App\Models\Monitoreo;
use App\Models\ComiteMixto;
use App\Models\Auditoria;
use App\Models\MantenimientoMaquinaria;
use App\Models\FotoAuditoria;
use App\Models\ExamenMedico;
use App\Models\FotoMonitoreo;
use App\Models\Maquinaria;
use App\Models\DotacionEPP;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jhoselin Choque',
            'email' => 'jhoselin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Prueba ejemplo',
            'email' => 'prueba@gmail.com',
            'password' => bcrypt('789456'),
        ]);

        Area::create([
            'nombre' => 'Elaboración de jarabe',
        ]);

        Area::create([
            'nombre' => 'Control y calidad',
        ]);
        Area::create([
            'nombre' => 'Produccion',
        ]);
        Area::create([
            'nombre' => 'Soplado de botellas',
        ]);

        Insumo::create([
            'nombre' => 'Protección de cuerpo overol',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Protección de la parte superior chaleco',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Cascos de seguridad',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Casco clase A color amarillo',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Casco clase B color rojo',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Casco clase C color blanco',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Casco clase C color azul',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Botas de seguridad',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Botas de goma antideslizantes',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Tapones auditivos de espuma',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Guantes de tejido palma de goma',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Guantes quirúrgicos',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Barbijos quirúrgicos',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Mandil de cuero',
            'cantidad' => 100,
        ]);

        Insumo::create([
            'nombre' => 'Máscara facial',
            'cantidad' => 100,
        ]);
        
        Maquinaria::create([
            'nombre' => 'Maquina mezcladora Roblemix',
            'descripcion' => 'Esta maquinaria es en la que llega el jarabe la cual tiene la función de mezclar el jarabe con el gas que es el amoniaco, en esta máquina se deben controlar las presiones ya que es de aquí donde se distribuye toda la soda que pasara a la llenadora.',
            'area_id' => 3,
        ]);

        Maquinaria::create([
            'nombre' => 'Maquina llenadora rotativa',
            'descripcion' => 'Esta máquina es la encargada de hacer el llenado en botellas de presentación grande como 2Lt, 2,5Lt de todos los sabores; al mismo tiempo que realiza el llenado procede a tapar las botellas agilizando así la producción.',
            'area_id' => 3,
        ]);
        Maquinaria::create([
            'nombre' => 'Maquina llenadora',
            'descripcion' => 'Esta máquina es la segunda llenadora, pero es la que más presentaciones nos ofrece ya que es la que llena botellas de plástico de 330cc, 500cc, 600cc; también mediante esta máquina se llena el agua producida de 600cc y 2Lt; el tapado de todas las presentaciones de plástico mencionas si bien son llenadas en esta máquina después pasan a ser tapadas en una maquina distinta que es una tapadora para estas presentaciones.',
            'area_id' => 3,
        ]);
        Maquinaria::create([
            'nombre' => 'Sopladora Grande',
            'descripcion' => 'es una maquina especial para el soplado de botellas donde son cargadas principalmente las preformas y se ponen los moldes que serán soplados como 2Lt, 2,5Lt.
            Después que las preformas son cargadas de 4 formatos en uno pasan a ser calentadas en el horno a una temperatura 70º y sopladas en el molde requerido se forma la botella y demora 5 segundos en expulsarla; después procede a una etiquetadora.
            Etiquetadora esta maquinaria es la encarga de etiquetar las botellas de formato grande como 2Lt, 2,5Lt; esta maquinaria etiqueta de 60 a 90 botellas por segundo después del etiquetado las botellas pasan a ser almacenadas.',
            'area_id' => 4,
        ]);
        Maquinaria::create([
            'nombre' => 'Sopladora pequeña',
            'descripcion' => 'es una maquina donde se realiza el soplado de botellas de formato pequeño como 330cc, 500cc, 600cc; esta máquina trabaja juntamente con un horno que oscila entre 70º y 80º controlando las temperaturas conjuntamente; esto funciona con ayuda de un compresor después de que la preforma estuvo en el horno pasa a la sopladora donde son formadas y después de esto son etiquetadas manualmente culminando esto proceden a ser almacenadas.',
            'area_id' => 4,
        ]);

        Trabajador::factory(50)->create();
        Capacitacion::factory(50)->create();
        Accidente::factory(50)->create();
        ComiteMixto::factory(50)->create();
        Auditoria::factory(50)->create();
        FotoAuditoria::factory(200)->create();
        ExamenMedico::factory(50)->create();
        DotacionEPP::factory(10)->create();
        
    }
}

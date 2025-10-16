<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Esdeveniment;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 

        public function run()
        {
            // DB::table('users')->insert([
            //     [
            //         'name' => 'Admin',
            //         'email' => 'admin@admin.es',
            //         'password' => bcrypt('admin1234'), 
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ]
            // ]);

            // self::seedCategorie();
          self::seedEsdeveniment();
            $this->command->info('dades');
        
        }
        
        private function seedUsers()
        {
        
        }
    
       
            
    public function seedCategorie(){

        DB::table('categories')->delete();

        $categories = [
            'Música',
            'Teatre',
            'Cinema',
            'Monòlegs',
            'Màgia'
        ];

        foreach ($categories as $name) {
            DB::table('categories')->insert([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        
            }
    }
    
    public function seedEsdeveniment(){
        DB::table('esdeveniments')->delete();
        $esdeveniments = [
            [
                'nom' => 'Concert de Rock',
                'categorie_id' => '16   ',
                'descripcio' => 'Un concert en viu amb bandes locals.',
                'data' => '2025-06-15',
                'hora' => '20:00:00',
                'num_max_assistents' => 150,
                'edat_minima' => 18,
                'imatge' => 'https://images.unsplash.com/photo-1692271931628-adc2b16670dd?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29uY2llcnRvJTIwZGUlMjByb2NrfGVufDB8fDB8fHww'
            ],
       
        ];
        foreach($esdeveniments as $esdeveniment) 
        {
            $p = new Esdeveniment();
            $p->categorie_id = $esdeveniment['categorie_id'];
            $p->nom = $esdeveniment['nom'];
            $p->descripcio = $esdeveniment['descripcio'];
            $p->data = $esdeveniment['data'];
            $p->hora = $esdeveniment['hora'];
            $p->num_max_assistents = $esdeveniment['num_max_assistents'];
            $p->edat_minima = $esdeveniment['edat_minima'];
            $p->imatge = $esdeveniment['imatge'];
            $p->save();
        }
        
    }
     
}

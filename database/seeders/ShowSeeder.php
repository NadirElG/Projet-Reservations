<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Location;
use App\Models\Show;


class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //Empty the table first
        Show::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        //Define data
        $shows = [
            [
                'slug'=>null,
                'title'=>'Ayiti',
                'description'=>"Un homme est bloqué à l’aéroport.\n "
                    . 'Questionné par les douaniers, il doit alors justifier son identité, '
                    . 'et surtout prouver qu\'il est haïtien – qu\'est-ce qu\'être haïtien ?',
                'poster_url'=>'ayiti.jpg',
                'location_slug'=>'espace-delvaux-la-venerie',
                'bookable'=>true,
                'price'=>8.50,
            ],
           [
                'slug'=>null,
                'title'=>'Cible mouvante',
                'description'=>'Dans ce « thriller d’anticipation », des adultes semblent alimenter '
                    . 'et véhiculer une crainte féroce envers les enfants âgés entre 10 et 12 ans.',
                'poster_url'=>'cible.jpg',
                'location_slug'=>'dexia-art-center',
                'bookable'=>true,
                'price'=>9.00,
            ],
            [
                'slug'=>null,
                'title'=>'Ceci n\'est pas un chanteur belge',
                'description'=>"Non peut-être ?!\nEntre Magritte (pour le surréalisme comique) "
                    . 'et Maigret (pour le réalisme mélancolique), ce dixième opus semalien propose '
                    . 'quatorze nouvelles chansons mêlées à de petits textes humoristiques et '
                    . 'à quelques fortes images poétiques.',
                'poster_url'=>'claudebelgesaison220.jpg',
                'location_slug'=>null,
                'bookable'=>false,
                'price'=>5.50,
            ],
            [
                'slug'=>null,
                'title'=>'Manneke… !',
                'description'=>'A tour de rôle, Pierre se joue de ses oncles, '
                    . 'tantes, grands-parents et surtout de sa mère.',
                'poster_url'=>'wayburn.jpg',
                'location_slug'=>'la-samaritaine',
                'bookable'=>true,
                'price'=>10.50,
            ],
            [
                'slug'=>null,
                'title'=>'Le Roi Lear',
                'description'=>'Une tragédie de Shakespeare mettant en scène un roi qui divise son royaume entre ses filles et plonge dans la folie.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-national',
                'bookable'=>true,
                'price'=>10.50,
            ],
            [
                'slug'=>null,
                'title'=>'Le Malade imaginaire',
                'description'=>'Une comédie classique de Molière qui dépeint les péripéties d\'un homme obsessionnellement préoccupé par sa santé.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-de-poche',
                'bookable'=>true,
                'price'=>9.00,
            ],
            [
                'slug'=>null,
                'title'=>'Othello',
                'description'=>'Une tragédie de Shakespeare explorant les thèmes de la jalousie, de la manipulation et de la trahison.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-royal-du-parc',
                'bookable'=>true,
                'price'=>11.00,
            ],
            [
                'slug'=>null,
                'title'=>'Les Femmes savantes',
                'description'=>'Une comédie de Molière mettant en scène une famille où les femmes sont érudites tandis que les hommes sont ridicules.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-royal-des-galeries',
                'bookable'=>true,
                'price'=>10.00,
            ],
            [
                'slug'=>null,
                'title'=>'Andromaque',
                'description'=>'Une tragédie classique de Racine qui se déroule dans le contexte de la guerre de Troie et explore les passions humaines.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-royal-de-la-monnoye',
                'bookable'=>true,
                'price'=>12.50,
            ],
            [
                'slug'=>null,
                'title'=>'Roméo et Juliette',
                'description'=>'Une tragédie de Shakespeare racontant l\'histoire d\'amour impossible entre Roméo Montaigu et Juliette Capulet.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-national',
                'bookable'=>true,
                'price'=>11.00,
            ],
            [
                'slug'=>null,
                'title'=>'Le Cid',
                'description'=>'Une tragédie classique de Corneille mettant en scène Rodrigue, un héros de guerre déchiré entre l\'honneur et l\'amour.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-de-poche',
                'bookable'=>true,
                'price'=>10.50,
            ],
            [
                'slug'=>null,
                'title'=>'Antigone',
                'description'=>'Une tragédie grecque de Sophocle qui explore les conflits moraux et politiques à travers le personnage d\'Antigone.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-royal-du-parc',
                'bookable'=>true,
                'price'=>9.50,
            ],
            [
                'slug'=>null,
                'title'=>'Le Songe d\'une nuit d\'été',
                'description'=>'Une comédie de Shakespeare mêlant réalité et féérie dans une histoire d\'amour et de confusion magique.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-royal-des-galeries',
                'bookable'=>true,
                'price'=>12.00,
            ],
            [
                'slug'=>null,
                'title'=>'Le Barbier de Séville',
                'description'=>'Une célèbre comédie de Beaumarchais mettant en scène les intrigues amoureuses et les quiproquos du personnage de Figaro.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-royal-de-la-monnoye',
                'bookable'=>true,
                'price'=>11.50,
            ],
            [
                'slug'=>null,
                'title'=>'Le Médecin malgré lui',
                'description'=>'Une comédie classique de Molière mettant en scène Sganarelle, un bûcheron qui se fait passer pour un médecin.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-national',
                'bookable'=>true,
                'price'=>10.00,
            ],
            [
                'slug'=>null,
                'title'=>'Le Malentendu',
                'description'=>'Une pièce d\'Albert Camus explorant les thèmes de la solitude, de la culpabilité et de l\'absurdité de la condition humaine.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-de-poche',
                'bookable'=>true,
                'price'=>9.50,
            ],
            [
                'slug'=>null,
                'title'=>'Le Cercle de craie caucasien',
                'description'=>'Une pièce de Bertolt Brecht qui raconte l\'histoire d\'une servante qui se sacrifie pour sauver un enfant lors d\'un conflit.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-royal-du-parc',
                'bookable'=>true,
                'price'=>11.00,
            ],
            [
                'slug'=>null,
                'title'=>'Le Misanthrope',
                'description'=>'Une comédie classique de Molière mettant en scène Alceste, un homme qui déteste l\'hypocrisie et la superficialité de la société.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-royal-des-galeries',
                'bookable'=>true,
                'price'=>10.50,
            ],
            [
                'slug'=>null,
                'title'=>'Les Fourberies de Scapin',
                'description'=>'Une comédie de Molière mettant en scène Scapin, un valet rusé qui orchestre des intrigues pour aider les amoureux.',
                'poster_url'=>'default.png',
                'location_slug'=>'theatre-royal-de-la-monnoye',
                'bookable'=>true,
                'price'=>12.00,
            ]            
        ];
        
        //Prepare the data
        foreach ($shows as &$data) {
            //Search the location for a given location's slug
            $location = Location::firstWhere('slug',$data['location_slug']);
            unset($data['location_slug']);

            $data['slug'] = Str::slug($data['title'],'-');
            $data['location_id'] = $location->id ?? null;
        }
        unset($data);

        //Insert data in the table
        DB::table('shows')->insert($shows);
    }
        
        
    }


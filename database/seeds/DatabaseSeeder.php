<?php

use App\Official;
use App\Organization;
use App\OrganizationUnit;
use App\Role;
use App\Sector;
use App\Source;
use App\Subsector;
use App\Agency;
use App\User;
use App\ContractType;
use App\Offerer;
use App\ProjectStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::statement("SET foreign_key_checks=0");
        // Offerer::truncate();
        // ContractType::truncate();
        // User::truncate();
        // Agency::truncate();
        // Subsector::truncate();
        // Source::truncate();
        // Sector::truncate();
        // Role::truncate();
        // OrganizationUnit::truncate();
        // Organization::truncate();
        // Official::truncate();
        DB::statement("SET foreign_key_checks=1");
        
        // $this->call(BannerSeeder::class);
        // $this->call(AgencySeeder::class);

        // User::create([
        //     'name' => 'Administrator',
        //     'username' => 'admin',
        //     'email' => 'admin@cost.com',
        //     'password' => bcrypt('testing'),
        //     'type' => 'admin',
        // ]);

        // $agency = Agency::create([
        //     'name' => 'PUTR',
        //     'full_name' => 'Dinas Pekerjaan Umum dan Penataan Ruang',
        // ]);

        // User::create([
        //     'name' => 'PUTR',
        //     'username' => 'putr',
        //     'email' => 'dputr@lombokbaratkab.go.id',
        //     'password' => bcrypt('testing'),
        //     'agency_id' => $agency->id,
        //     'type' => 'agency',
        // ]);

        $this->call(ProjectStatusSeeder::class);

        // $org = Organization::create([
        //     'name' => 'General Directorate of Roads (DGC)',
        //     'legal_name' => 'General Directorate of Roads (DGC)',
        //     'description' => 'The Directorate-General for Traffic (Spanish: Dirección General de Tráfico, DGT) is the government department that is responsible for the Spanish road transport network.',
        //     'address' => 'C. Josefa Valcarcel, 28 - 28071 Madrid - España',
        //     'phone' => '22-32-72-00 ext:1501',
        //     'postal_code' => '421423',
        //     'main' => 0,
        //     'open_uri' => '',
        //     'website' => 'www.dgt.es',
        // ]);

        // $unit = OrganizationUnit::create([
        //     'unit_name' => 'UNIDAD DE APOYO TECNICO Y SEGURIDAD VIAL. (UATSV)',
        //     'entity_id' => $org->id,
        // ]);

        // $official = Official::create([
        //     'entity_unit_id' => $unit->id,
        //     'name' => 'Rene Echeverria',
        //     'position' => 'Credit Coordinator',
        //     'email' => 'reneecheverria2005@yahoo.es',
        //     'phone' => '33092329',
        // ]);

        // $role = Role::create([
        //     'role_name' => 'Coordinator',
        // ]);

        // $sector = Sector::create([
        //     'sector_name' => 'Infrastructure Sector',
        // ]);

        // $subsector = Subsector::create([
        //     'sector_id' => $sector->id,
        //     'subsector_name' => 'Road subsector',
        // ]);

        // $source = Source::create([
        //     'source_name' => 'World Bank',
        //     'acronym' => 'WB',
        // ]);

        // $contractType = ContractType::create([
        //     'type_name' => 'Building',
        // ]);

        // $offerer = Offerer::create([
        //     'offerer_name' => 'Astaldi',
        //     'legal_name' => 'Astaldi S.p.A',
        //     'description' => 'We are an international construction group with a leading position in Italy and among the top 100 International Contractors.',
        //     'phone' => '+39 06 41766 1',
        //     'address' => 'Bureau Administratif et Financier. Lottissement 19/20 Aissat - Idir Cheraga - W Alger',
        //     'website' => 'https://www.astaldi.com/',
        // ]);
    }
}

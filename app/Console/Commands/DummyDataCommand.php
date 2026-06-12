<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\DummyDataSeeder;

class DummyDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dummy:data {action=seed : The action to perform (seed, clear, clean)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed or clean 5 years of dummy infrastructure project data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $action = $this->argument('action');
        $seeder = new DummyDataSeeder();

        if (in_array($action, ['clear', 'clean'])) {
            $this->info('Cleaning up dummy infrastructure data...');
            $seeder->clear();
            $this->info('Dummy data cleaned successfully.');
            return Command::SUCCESS;
        }

        if ($action === 'seed') {
            $this->info('Seeding 5 years of dummy infrastructure data (2022-2026)...');
            $seeder->run();
            $this->info('Dummy data seeded successfully.');
            return Command::SUCCESS;
        }

        $this->error("Invalid action '{$action}'. Use 'seed', 'clear', or 'clean'.");
        return Command::FAILURE;
    }
}

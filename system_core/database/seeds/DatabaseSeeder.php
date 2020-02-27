<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #$this->call(UsersTableSeeder::class);
        // $this->call(AdminsTableSeeder::class);
        // $this->call(CategoriesWithBlogAnalysisTableSeeder::class);
        // $this->call(GeneralTableSeeder::class);
        // $this->call(CurrencyTablesSeeder::class);
        $this->command->info('Importing... admins.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/admins.sql'));

        $this->command->info('Importing... categories.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/categories.sql'));
        
        $this->command->info('Importing... analyses.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/analyses.sql'));
        
        $this->command->info('Importing... blogs.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/blogs.sql'));

        $this->command->info('Importing... currencies.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/currencies.sql'));

        $this->command->info('Importing... signals.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/signals.sql'));

        $this->command->info('Importing... email_logs.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/email_logs.sql'));

        $this->command->info('Importing... signal_destinations.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/signal_destinations.sql'));

        $this->command->info('Importing... subscriptions.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/subscriptions.sql'));

        $this->command->info('Importing... members.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/members.sql'));

        $this->command->info('Importing... profiles.sql');
        // $this->command->info('skipping due to city is not importing');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/profiles.sql'));

        $this->command->info('Importing... accounts.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/accounts.sql'));

        $this->command->info('Importing... deposits.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/deposits.sql'));

        $this->command->info('Importing... transactions.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/transactions.sql'));

        $this->command->info('Importing... monthly_trade_statements.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/monthly_trade_statements.sql'));

        $this->command->info('Importing... performance_graphs.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/performance_graphs.sql'));

        $this->command->info('Importing... meta_trader_accounts.sql');
        // DB::unprepared(file_get_contents(__DIR__ . './../sqls/meta_trader_accounts.sql'));

        $this->command->info('Importing... countries.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/countries.sql'));

        $this->command->info('Importing... cities.sql');
        // $this->command->info('skipping ...');
        
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/cities.sql'));
        $this->command->info('Imported... cities.sql');

        $this->command->info('Importing... plans.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/plans.sql'));

        $this->command->info('Importing... support_department.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/support_department.sql'));

        $this->command->info('Importing... permissions.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/permissions.sql'));

        $this->command->info('Importing... model_has_permissions.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/model_has_permissions.sql'));

        $this->command->info('Importing... permissions_service.sql');
        DB::unprepared(file_get_contents(__DIR__ . './../sqls/permissions_service.sql'));

        $this->command->call("passport:install");
    }
}

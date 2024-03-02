<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Deposito;
use App\Http\Controllers\DepositoController;

class DepositoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deposito-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizacion de depositos';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $controller = new DepositoController();
        $sucursal = $controller->updatedDepositos();

    }
}

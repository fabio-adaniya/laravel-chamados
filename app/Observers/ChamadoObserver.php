<?php

namespace App\Observers;

use App\Models\Chamado;
use App\Models\Status;

class ChamadoObserver
{
    public function creating(Chamado $chamado)
    {
        $chamado['status'] = Status::ABERTO;
    }
}

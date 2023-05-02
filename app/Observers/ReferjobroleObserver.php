<?php

namespace App\Observers;

use App\Models\Referjobrole;

class ReferjobroleObserver
{

    public function saving(Referjobrole $referjobrole)
    {

        if ($referjobrole->isDirty('referjobrole_id') || !$referjobrole->exists) {
            $existingSubmission = Referjobrole::where('referjobrole_id', $referjobrole->Referjobrole_name)->first();

            if ($existingSubmission) {
                $referjobrole->referjobrole_id = $existingSubmission->referjobrole_id;
            } else {
                $referjobrole->referjobrole_id = $this->generateLayerId($referjobrole->id);
            }
        }
    }

    private function generateLayerId($name)
    {
        $serialNumber = Referjobrole::max('id') + 1;
        return 'RJR' . str_pad($serialNumber, 3, '0', STR_PAD_LEFT) . ' ' . strtoupper(str_replace(' ', '', $name));
    }
}

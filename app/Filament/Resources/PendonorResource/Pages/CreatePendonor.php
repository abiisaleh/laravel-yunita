<?php

namespace App\Filament\Resources\PendonorResource\Pages;

use App\Filament\Resources\PendonorResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePendonor extends CreateRecord
{
    protected static string $resource = PendonorResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // dd($data);
        $record = new ($this->getModel())([
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'pekerjaan_id' => $data['pekerjaan_id'],
            'golongan_darah_id' => $data['golongan_darah_id'],
            'jenis_darah_id' => $data['jenis_darah_id'],
            'alamat' => $data['alamat'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'location' => $data['location'],
        ]);

        $user = $record->user()->create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => date('dmY', strtotime($data['tanggal_lahir'])),
        ]);

        $record->user_id = $user->id;

        $record->save();

        return $record;
    }
}

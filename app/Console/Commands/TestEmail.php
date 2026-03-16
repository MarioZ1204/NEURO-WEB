<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'test:email';
    protected $description = 'Test email configuration';

    public function handle()
    {
        try {
            Mail::raw('Test email from Laravel', function($message) {
                $message->to('neurocienciasweb1@gmail.com')
                    ->subject('Test Email from NeuroWeb');
            });
            
            $this->info('Email sent successfully!');
        } catch (\Exception $e) {
            $this->error('Error sending email: ' . $e->getMessage());
        }
    }
}

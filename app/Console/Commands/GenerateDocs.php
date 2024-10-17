<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class GenerateDocs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-docs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate technical documentation using Writerside';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting documentation generation...');

        $process = new Process(['writerside/bin/writerside', 'build', 'docs/', '--output', 'public/docs']);

        dd(
            $process
        );

        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $this->info('Documentation generated successfully!');
    }
}

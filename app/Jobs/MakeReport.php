<?php

namespace App\Jobs;

use App\Notifications\LinkReportCreated;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MakeReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $filename = uniqid() . '.pdf';
        /**
         * gera pdf de uma view
         */
        $pdf = \PDFsnappy::loadView('reports.my-user', ['users' => \App\User::all()]);
        $pdf->save(storage_path("app/public/$filename" ));
        sleep(10);
        $this->user->notify(new LinkReportCreated("/storage/$filename"));
    }
}

<?php

namespace App\Console\Commands;

use App\Events\SurveyCompleted;
use App\Mail\SkinTypeGenerated;
use App\Models\SkinType;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Console\Command;

class SendSkinTypeEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:skintype
                            {email : The user email}
                            {skintype? : What skintype category to send}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email skintype to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $skintype = $this->argument('skintype');

        $allTypes = SkinType::all();

        /** @var User|null */
        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error('User with email '. $email. ' not found. aborting.');
            return Command::FAILURE;
        }

        if (!$skintype) {
            foreach ($allTypes as $type) {
                $survey =  Survey::create([
                    'user_id' => $user->id,

                    'name'         => $user->name,
                    'phone_number' => $user->phone_number,
                    'birth_date'   => $user->birth_date,
                    // 'photo',
                    'email'  => $user->email,
                    'result' => $type->name,
                    'gender' => $user->gender,
                ]);

                event(new SurveyCompleted($survey));
                $this->info('Sending email to : ' . $user->email . ' skintype : ' . $type->name);
            }
        } else {
            $survey =  Survey::create([
                'user_id' => $user->id,

                'name'         => $user->name,
                'phone_number' => $user->phone_number,
                'birth_date'   => $user->birth_date,
                // 'photo',
                'email'  => $user->email,
                'result' => $skintype,
                'gender' => $user->gender,
            ]);
            event(new SurveyCompleted($survey));
            $this->info('Sending email to : ' . $user->email . 'skintype :' . $skintype);
        }



        return Command::SUCCESS;
    }
}

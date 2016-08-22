<?php

namespace Solvre\Console\Commands;

use Crypt;
use EntityManager as orm;
use Illuminate\Console\Command;
use Log;
use Solvre\Model\Doctrine\Entity\Message;
use Solvre\Model\Doctrine\Repository\MessageRepository;
use Solvre\Services\MessageService;

class MailSender extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mails:sender';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find first 100 not sent emails from database and call send method';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /** @var MessageRepository $messages */
        $messages = $this->getRepository(Message::class);
        $messageService = new MessageService();
        $messagesToSend = $messages->findBy(['sent'=>false], ['id'=>'DESC'], 100, 0);
        $sentMessages=0;
        Log::info('Found messages to send: '. sizeof($messagesToSend));

         /** @var Message $message */
        foreach ($messagesToSend as $message) {
            $messageService->sendMail(
                Crypt::decrypt($message->getContent()),
                function ($msg) use ($message) {
                    /** @var \Illuminate\Mail\Message $msg * */
                    $msg->subject(trans($message->getSubject()));
                    $msg->from($message->getSentFrom(), 'Solvre - Project Management System');
                    $msg->to($message->getSentTo(), $message->getToFullName());
                });

            $message->setSent(true);
            $messages->save($message);
            ++$sentMessages;
        }

        Log::info('Messages sent: '. $sentMessages);
    }

    private function getRepository($entityClass) {
        return orm::getRepository($entityClass);
    }
}

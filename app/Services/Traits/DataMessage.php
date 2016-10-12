<?php

namespace App\Service;

trait DataMessage {

    protected function getMessage($messageType)
    {
        $messageType = $messageType . 'Message';
        return $this->$messageType();
    }

    protected function storeMessage()
    {
        return ['message' => 'Data has been saved.'];
    }

    protected function updateMessage()
    {
        return ['message' => 'Data has been updated.'];
    }

    protected function deleteMessage()
    {
        return ['message' => 'Data has been deleted.'];
    }

    protected function siteNotFoundMessage()
    {
        return ['site-not-found' => '<strong>Data not found</strong> or you are in <strong>"All Sites"</strong> mode. Please choose the site first.'];
    }

    protected function dataNotFoundMessage()
    {
        return ['data-not-found' => 'Data not found, please try again.'];
    }
}
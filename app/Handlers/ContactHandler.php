<?php

namespace App\Handlers;

use App\Repositories\Contracts\ContactRepositoryInterface;

class ContactHandler
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function submitContact(array $data)
    {
        return $this->contactRepository->createContact($data);
    }
}

<?php


namespace victor\refactoring;


class ReplaceQueryWithParam
{
    private $userRepo;
    private $offerService;

    public function __construct(UserRepo $userRepo, OfferService $offerService)
    {
        $this->userRepo = $userRepo;
        $this->offerService = $offerService;
    }

    function cancelOffer(int $offerId, int $userId) {
        $user = $this->userRepo->findById($userId);
        if ($user->getProfile()->canCancelOffers()) {
            $this->offerService->cancelOffer($userId, $offerId);
        }
    }
}
class OfferService {
    private $userRepo;
    private $offerRepo;

    public function __construct(UserRepo $userRepo, OfferRepo $offerRepo)
    {
        $this->userRepo = $userRepo;
        $this->offerRepo = $offerRepo;
    }

    public function cancelOffer(int $userId, int $offerId)
    {
        $offer = $this->offerRepo->findById($offerId);
        if ($offer->hasSpecialDeal()) {
            $user = $this->userRepo->findById($userId); // Performance hit
            if ($user->getProfile()->isAdmin()) {
                $this->offerRepo->setCancelled($offerId);
            }
        }
    }
}

// ========== supporting dummy code
class User {

    public function getProfile(): Profile
    {
        return new Profile();
    }
}

class OfferRepo {

    public function findById(int $offerId): Offer
    {
        return null;
    }

    public function setCancelled(int $offerId)
    {

    }
}
class Offer {

    public function hasSpecialDeal()
    {
        return true;
    }
}
class Profile {

    public function canCancelOffers()
    {
        return true;
    }

    public function isAdmin()
    {
        return false;
    }
}
class UserRepo {

    public function findById(int $userId): User
    {

    }
}
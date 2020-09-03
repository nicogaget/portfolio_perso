<?php


namespace App\Service;


class UploadService
{
    private $slug;

    public function __construct(Slugify $slug)
    {
        $this->slug = $slug;
    }

    public function upload($item) :?string
    {
        $newName =null;

        if ($item) {
            $originalName = pathinfo($item->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName = $this->slug->generate($originalName);
            $newName = $safeName . "-" . uniqid() . "." . $item->guessExtension();
        }
        return $newName;
    }
}

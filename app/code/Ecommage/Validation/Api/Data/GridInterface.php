<?php

namespace Ecommage\Validation\Api\Data;

interface GridInterface
{
    const ID = 'id';
    const BADWORD = 'bad_word';
    public function getId();
    public function setId($id);
    public function getBadWord();
    public function setBadWord($badword);

}
